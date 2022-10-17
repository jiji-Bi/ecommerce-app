<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function commandes()
    {
        return view('client.commandes');
    }
    public function dashboard()
    {
        return view('client.dashboard');
    }
    public function profile()
    {
    }
    public function updateprofile()
    {
    }
    public function addReview(Request $request)
    {
        $review = new Review();
        $review->rating = $request->valueAsNumber;
        $review->review = $request->content;
        $review->produit_id = $request->produit_id;
        $review->user_id = Auth::user()->id;
        if ($review->save()) {
            return redirect()->back()->with('ajout', 'Merci pour votre évalaution');
        }
    }
    public function indexCart(Request $request)
    {
        $commande = Commande::where('user_id', '=', Auth::user()->id)->where('etat', '=', 'en cours')->first();
        return view('guest.components.shoppingcart')->with('commande', $commande);
    }
    public function checkout()
    {
        return view('client.checkout');
    }
}
