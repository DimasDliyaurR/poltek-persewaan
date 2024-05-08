<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FieldForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $name,
        public string $class = "",
        public string $type = "text",
        public string $nameData = "",
        public bool $update = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.field-form');
    }
}
