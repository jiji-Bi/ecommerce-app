<?php

namespace app\Http\Livewire\FrontOffice\Cart;

use App\Models\LigneCommande;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{

    public $commande;

    public function decrementQuantity(int $itemId)
    {
        $itemData = LigneCommande::where('id', $itemId)->first();

        if ($itemData) {
            $itemData->decrement('quantity');
        }
    }

    public function incrementQuantity(int $itemId)
    {
        $itemData = LigneCommande::where('id', $itemId)->first();
        if ($itemData) {
            $itemData->increment('quantity');
        }
    }
    public function render()
    { //$this->commande just like useState() in RHooks
        return view('livewire.front-office.cart.cart-show', ['commande' => $this->commande]);
    }
}
