<?php

namespace app\Http\Livewire\FrontOffice\Cart;

use App\Models\Commande;
use App\Models\LigneCommande;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    public $commande;

    public function decrementQuantity(int $itemId)
    {

        $itemData = LigneCommande::where('id', '=', $itemId)->first();
        if ($itemData) {
            $itemData->decrement('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
            $this->emit('reviewSectionRefresh');
        }
    }

    public function incrementQuantity(int $itemId)
    {
        $itemData = LigneCommande::where('id', '=', $itemId)->get();
        if ($itemData) {
            $itemData[0]->increment('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
            $this->emit('reviewSectionRefresh');
        }
    }
    public function RemoveCartItem(int $itemId)
    {
        LigneCommande::where('commande_id', $this->commande->id)->where('id', $itemId)->delete();
    }

    public function render()
    {
        $this->commande = Commande::where('user_id', '=', Auth::user()->id)->where('etat', '=', 'en cours')->first();
        return view('livewire.front-office.cart.cart-show', ['commande' => $this->commande]);
    }
}
