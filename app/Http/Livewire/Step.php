<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{

    public $counter = [];

    public function addStep() {
        $this->counter[] =  count($this->counter);
    }

    public function removeStep($index) {
        unset($this->counter[$index]);
    }

    public function render()
    {
        return view('livewire.step');
    }
}
