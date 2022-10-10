<?php

namespace app\Http\Livewire\FrontOffice\Cart;

use App\Models\Commande;
use App\Models\LigneCommande;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{

    public $commande;

    public function decrementQuantity(int $itemId)
    {

        $itemData = LigneCommande::where('id', '=', $itemId)->first();
        if ($itemData->quantity > 1 && $itemData->quantity > 0) {
            $itemData->decrement('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
            $this->emit('CartRefresh');
        }
    }

    public function incrementQuantity(int $itemId)
    {
        $itemData = LigneCommande::where('id', '=', $itemId)->first();
        if ($itemData->variant->quantity > $itemData->quantity) {
            $itemData->increment('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
            $this->emit('CartRefresh');
        }
    }
    public function RemoveCartItem(int $itemId)
    {
        LigneCommande::where('commande_id', $this->commande->id)->where('id', $itemId)->delete();
        $this->emit('CartRefresh');
    }

    public function render()
    {
        $this->commande = Commande::where('user_id', '=', Auth::user()->id)->where('etat', '=', 'en cours')->first();
        return view('livewire.front-office.cart.cart-show', ['commande' => $this->commande]);
    }
}
