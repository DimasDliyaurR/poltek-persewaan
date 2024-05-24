<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UlasanItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public int $userid,
        public string $username,
        public int $time,
        public int $nilai,
        public int $liked,
        public int $unlike,
        public string $ulasan,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ulasan-item');
    }
}
