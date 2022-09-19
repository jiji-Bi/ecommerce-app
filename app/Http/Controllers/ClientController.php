<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
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
}
