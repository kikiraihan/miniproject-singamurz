<?php

namespace App\Livewire\UserPage;

use App\Models\Order;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Checkout extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query())
            ->columns($this->getTableColumns())
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make()
                    ->label('Lihat Detail')
                    ->modalHeading('Detail Order')
                    ->modalContent(fn (Order $record): View => view('livewire.user-page.order-detail', ['order' => $record])),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('created_at')
                ->label('Tanggal Order')
                ->dateTime('d M Y H:i'),

            TextColumn::make('id')
                ->label('Order ID')
                ->sortable()
                ->searchable(),

            TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'completed' => 'success',
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
