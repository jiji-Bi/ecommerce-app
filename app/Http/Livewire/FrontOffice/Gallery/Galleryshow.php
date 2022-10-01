<?php

namespace App\Http\Livewire\FrontOffice\Gallery;

use Livewire\Component;


use App\Models\Variant;
use App\Models\VariantImages;

use Illuminate\Support\Facades\DB;

class Galleryshow extends Component
{
    protected $listeners = [
        'EventChanged' => 'fire', 'refre' => '$refresh'
    ];


    public function fire()
    {
        $this->emitSelf('refre');
    }
    public function render()
    {
        $images = VariantImages::filter(request(['picture']))->get();
        return view('livewire.front-office.gallery.galleryshow', ['images' => $images]);
    }
}
