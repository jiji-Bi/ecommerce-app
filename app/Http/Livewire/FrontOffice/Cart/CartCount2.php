<?php

namespace App\Http\Livewire\FrontOffice\Cart;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount2 extends Component
{
    public $cartCount;
    protected $listeners = [
        'CartRefresh' => 'CartCount',
    ];
    public function CartCount()
    {
        if (Auth::check()) {
            $commande = Commande::where('user_id', '=', optional(Auth::user())->id)->where('etat', '=', 'en cours')->get();
            return $this->cartCount = count($commande[0]->items);
        } else {
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->CartCount();
        return view('livewire.front-office.cart.cart-count2', ['cartCount' => $this->cartCount]);
    }
}
