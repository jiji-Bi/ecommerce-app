<?php

namespace App\Http\Livewire\FrontOffice\Gallery;

use Livewire\Component;


use App\Models\Variant;
use App\Models\VariantImages;

use Illuminate\Support\Facades\DB;

class Galleryshow extends Component
{
    protected $listeners = [
        'EventChanged' => 'render'
    ];

    public $variant;
    public $variants;

    public function render()
    {

        return view('livewire.front-office.gallery.galleryshow', ['images' => $this->images]);
    }
    public function mount($variant, $variants, $images)
    {
        $this->variant = $variant;
        $this->variants = $variants;
        $this->images = $images;
    }
}
