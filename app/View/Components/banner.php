<?php

namespace App\View\Components;

use Illuminate\View\Component;

class banner extends Component
{
    public $value;
    public $counter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $counter = 0)
    {
        $this->value = $value;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
