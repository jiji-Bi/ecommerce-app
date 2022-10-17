<?php

namespace App\Http\Livewire\FrontOffice\Products;

use App\Models\Produit;

use Livewire\Component;

class Products2 extends Component
{
    public $produits;
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
            $this->produits =
                Produit::join('variants', 'produits.id', '=', 'variants.produit_id')
                ->join('couleurs', 'variants.couleur_id', '=', 'couleurs.id')
                ->whereIn('couleurs.nom', $this->ColorFilters)->select('produits.*')
                ->distinct()->get(); // or first() 
        } else {
            $this->produits = Produit::all();
        }
        return view('livewire.front-office.products.products2')->with('produits', $this->produits)->with('colorfilter', $this->ColorFilters);
    }
}
