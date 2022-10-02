<?php

namespace App\Http\Livewire\FrontOffice\Images;

use Livewire\Component;
use App\Models\VariantImages;

class ImageShow extends Component
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
        $this->images = VariantImages::filter(request(['picture']))->get();
        return view('livewire.front-office.images.image-show')->with('images', $this->images);
    }
}
