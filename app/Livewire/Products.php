<?php

namespace App\Livewire;

use Livewire\Component;
use App\Product;
class Products extends Component
{
    // public $products;


    public function render()
    {
        return view('livewire.products', ['products' => products::all()]);
    }
}
