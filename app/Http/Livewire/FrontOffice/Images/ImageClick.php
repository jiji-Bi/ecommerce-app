<?php

namespace App\Http\Livewire\FrontOffice\Images;

use Livewire\Component;

class ImageClick extends Component
{
    public $variant;

    public function update($variant)
    {
        $this->emit('urlchanged', http_build_query(['picture' => $variant["id"]]));
        $this->emit('EventChanged');
    }
    public function mount($variant)
    {
        $this->variant = $variant;
    }
    public function render()
    {
        return view('livewire.front-office.images.image-click');
    }
}
