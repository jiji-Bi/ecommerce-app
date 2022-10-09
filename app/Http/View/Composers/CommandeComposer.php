<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class CommandeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $commande = Commande::where('user_id', '=', Auth::user()->id)->where('etat', '=', 'en cours')->first();
        $view->with('commande', $commande);
    }
}
