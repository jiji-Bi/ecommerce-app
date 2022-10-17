<?php

namespace App\Http\Livewire\FrontOffice\Products;

use App\Models\Produit;
use Livewire\Component;

class Products extends Component
{
    public $ColorFilters = [];
    protected $queryString = ['ColorFilters'];
    // protected $listeners = [
    //     'refresh' => 'render',
    // ];
    // public function update()
    // {
    //     if (isset($this->ColorFilters)) {
    //         $this->emit('refresh');
    //     }
    // }

    public function render()
    {
        if (count($this->ColorFilters) != 0) {
            $produits =
                Produit::join('variants', 'produits.id', '=', 'variants.produit_id')
                ->join('couleurs', 'variants.couleur_id', '=', 'couleurs.id')
                ->whereIn('couleurs.nom', $this->ColorFilters)->select('produits.*')->distinct()
                ->simplepaginate(10); // or first()
        } else {
            $produits = Produit::simplepaginate(10);
        }
        return view('livewire.front-office.products.products')->with('produits', $produits)->with('colorfilter', $this->ColorFilters);
    }
}
