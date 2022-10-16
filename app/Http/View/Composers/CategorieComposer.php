<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Categorie;

class CategorieComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Categorie::all());
    }
}
