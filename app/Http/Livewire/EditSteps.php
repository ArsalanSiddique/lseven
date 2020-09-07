<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Steps;

class EditSteps extends Component
{


    public $counter = [];

    public function mount($counter)
    {
        $this->counter = $counter->toArray();
    }

    public function addStep()
    {
        $this->counter[] =  count($this->counter);
    }

    public function removeStep($index)
    {

        $step = $this->counter[$index];
        if(isset($step['id'])) {
            Steps::find($step['id'])->delete();
        }
        unset($this->counter[$index]);
    }

    public function render()
    {
        return view('livewire.edit-steps');
    }
}
