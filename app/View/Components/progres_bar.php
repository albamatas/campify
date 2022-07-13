<?php

namespace App\View\Components;

use Illuminate\View\Component;

class progres_bar extends Component
{
    public $progres;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($progres)
    {
        $this->progres= $progres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.progres_bar');
    }
}
