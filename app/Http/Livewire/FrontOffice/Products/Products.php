<?php

namespace App\Http\Livewire\FrontOffice\Products;

use App\Models\Produit;

use Livewire\Component;

class Products extends Component
{
    public $produits;
    public $ColorFilters = [];
    protected $queryString = ['ColorFilters'];
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    
    public function render()
    {

        $this->produits =
            Produit::join('variants', 'produits.id', '=', 'variants.produit_id')
            ->join('couleurs', 'variants.couleur_id', '=', 'couleurs.id')
            ->where('couleurs.nom', $this->ColorFilters)->select('produits.*')
            ->distinct()->get(); // or first() 

        return view('livewire.front-office.products.products')->with('produits', $this->produits)->with('colorfilter', $this->ColorFilters);
    }
}
