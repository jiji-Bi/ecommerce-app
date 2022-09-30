<?php

namespace App\Http\Livewire\FrontOffice\Gallery;

use Livewire\Component;


class Galleryclick extends Component
{

    public $variant;

    public function update($variant)
    {
        $this->emit('urlChanged', http_build_query(['picture' => $variant["id"]]));
        $this->emit('EventChanged');
    }
    public function render()
    {
        return view('livewire.front-office.gallery.galleryclick');
    }
    public function mount($variant)
    {
        $this->variant = $variant;
    }
}
