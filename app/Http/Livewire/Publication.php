<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Publication extends Component
{

    public $publications = [];

    public function mount()
    {
        $this->publication = [
            []
        ];
    }

    public function render()
    {
        return view('livewire.publication');
    }

    public function ajoutePubl()
    {
        $this->publication[]=[];
    }
}
