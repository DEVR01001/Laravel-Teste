<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Products extends Component
{

    public $products;

    public $search = '';

    public $product = [];


    public function openModal()
    {
        $this->dispatch('openModal');
    }
    public function closeModal()
    {
        $this->dispatch('closeModal');
    }


    public function searchTerm(){


        $productsCollect= collect($this->products);

        $productsFilter = $productsCollect->where('title', $this->search);
        

        $this->products = $productsFilter->toArray();

    }

    public function getProductItem($id){

        $productsCollect= collect($this->products);

        $productsFilter = $productsCollect->where('id', $id);

        $this->product = $productsFilter;

        $this->openModal();

    }

    public function mount(){

        
        $product = Http::get('https://fakestoreapi.com/products');

        $this->products = $product->json();


    }
    
    // public function render()
    // {
    //     return view('livewire.products');
    // }
}
