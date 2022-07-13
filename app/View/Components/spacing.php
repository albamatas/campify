<?php

namespace App\View\Components;

use Illuminate\View\Component;

class spacing extends Component
{
    public $alto = "16px";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alto)
    {
        
        $this->alto = $alto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.spacing');
    }
}
