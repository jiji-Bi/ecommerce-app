<?php

namespace App\Http\Livewire\FrontOffice\Cart;

use Livewire\Component;
use App\Models\Commande;
use App\Models\Variant;

use App\Models\LigneCommande;

use Illuminate\Support\Facades\Auth;

class ShopCart extends Component
{
    public $commande;
    public $lignecommande;

    protected $listeners = [
        'CartRefresh' => '$refresh',
    ];

    public function render()
    {
        $id = optional(Auth::user())->id;
        $this->commande = Commande::where('user_id', '=', $id)->where('etat', '=', 'en cours')->get();

        return view('livewire.front-office.cart.shop-cart', ['commande' => $this->commande]);
    }
}
