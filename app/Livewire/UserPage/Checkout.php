<?php

namespace App\Livewire\UserPage;

use App\Models\Order;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\View\View;
use Livewire\Component;

class Checkout extends Component implements HasForms, HasTable, HasInfolists
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->orderBy('created_at', 'desc')) // Order terbaru muncul duluan
            ->columns($this->getTableColumns())
            ->actions([
                // ViewAction::make()
                //     ->label('Lihat Detail')
                //     ->modalHeading('Detail Order')
                //     ->infolist(fn (Order $record) => $this->getOrderInfolistSchema($record)),
                ViewAction::make()
                    ->label('Lihat Detail')
                    ->modalHeading('Detail Order')
                    ->modalContent(fn (Order $record): View => view('livewire.user-page.order-detail', ['order' => $record])),
            ]);
    }

    protected function getOrderInfolistSchema(Order $record): Infolist
    {
        // Lazy load relasi untuk menghindari N+1 query
        $record->load(['user', 'orderItems.product']);

        return Infolist::make()
            ->record($record)
            ->schema([
                Section::make('Detail Order')
                    ->columns(2) // 🔥 Membuat grid 2 kolom
                    ->schema([
                        TextEntry::make('id')
                            ->label('Order ID'),

                        TextEntry::make('created_at')
                            ->label('Tanggal Order')
                            ->dateTime('d M Y H:i'),

                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'payment_pending' => 'warning',
                                'shipping' => 'blue',
                                'success' => 'success',
                                'canceled' => 'danger',
                                default => 'gray',
                            }),

                        TextEntry::make('payment_method')
                            ->label('Metode Pembayaran'),

                        TextEntry::make('total_amount')
                            ->label('Total Harga')
                            ->money('IDR'),

                        TextEntry::make('user.address')
                            ->label('Alamat Pengiriman')
                            ->columnSpanFull()
                            ->formatStateUsing(fn ($state) => $state ?? 'Alamat tidak tersedia'),
                    ]),

                Section::make('Daftar Produk')
                    ->schema([
                        RepeatableEntry::make('orderItems') // 🔥 Membuat produk dalam order horizontal
                            ->columns(1)
                            ->schema([
                                ImageEntry::make('product.image_url')
                                    ->label('Gambar')
                                    ->width(100)
                                    ->height(100)
                                    ->hidden(fn ($record) => empty($record->product?->image_url)), // Hide jika tidak ada gambar

                                TextEntry::make('product.name')
                                    ->label('Nama Produk')
                                    ->formatStateUsing(fn ($record) => $record->product?->name ?? 'Produk tidak tersedia')
                                    ->weight('bold'),

                                TextEntry::make('price')
                                    ->label('Harga')
                                    ->money('IDR'),

                                TextEntry::make('quantity')
                                    ->label('Jumlah'),

                                TextEntry::make('subtotal')
                                    ->label('Subtotal')
                                    ->formatStateUsing(fn ($record) => 'Rp' . number_format($record->price * $record->quantity, 0, ',', '.'))
                                    ->weight('bold'),
                            ])
                            ->grid(4), // 🔥 Menampilkan 4 kolom dalam satu baris
                    ]),
            ]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('created_at')
                ->label('Tanggal Order')
                ->dateTime('d M Y H:i')
                ->sortable(),

            TextColumn::make('id')
                ->label('Order ID')
                ->sortable()
                ->searchable(),

            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'payment_pending' => 'warning',
                    'shipping' => 'blue',
                    'success' => 'success',
                    'canceled' => 'danger',
                    default => 'gray',
                }),

            TextColumn::make('total_amount')
                ->label('Total Harga')
                ->money('IDR'),
        ];
    }

    public function render()
    {
        return view('livewire.user-page.checkout')
            ->layout('landing.layout-user');
    }
}
