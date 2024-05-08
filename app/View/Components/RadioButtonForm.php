<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioButtonForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $title,
        public bool $nameData = false,
        public bool $update = false,
        public string $option1 = "Iya",
        public string $option2 = "Tidak",
        public string $class = "",
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-button-form');
    }
}
