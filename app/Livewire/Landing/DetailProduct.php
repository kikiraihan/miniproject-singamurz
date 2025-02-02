<?php

namespace App\Livewire\Landing;

use App\Models\Product;
use Livewire\Component;

class DetailProduct extends Component
{
    public $id;
    public $qty;

    public function mount($id){
        $this->$id=$id;
    }

    public function render()
    {
        $prod = Product::find($this->id);

        return view('livewire.landing.detail-product',[
            'prod'=>$prod,
            // 'store'=>$store,
        ])->layout('landing.layout');
    }
}
