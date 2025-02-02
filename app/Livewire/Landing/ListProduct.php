<?php

namespace App\Livewire\Landing;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination;

    public $search = '';

    // Query string binding agar nilai search tersimpan di URL
    protected $queryString = ['search'];

    public function updatedSearch()
    {
        // Reset pagination saat pencarian berubah
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::query();

        if (!empty($this->search)) {
            $products->where('name', 'like', '%' . $this->search . '%')
                     ->orWhere('short_description', 'like', '%' . $this->search . '%');
        }

        return view('livewire.landing.list-product', [
            'products' => $products->paginate(12),
            ])->layout('landing.layout');
    }
}
