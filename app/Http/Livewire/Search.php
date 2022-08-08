<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.search', [
            'products' => Product::where('name', 'like', $searchTerm)->get()
        ]);
    }
}
