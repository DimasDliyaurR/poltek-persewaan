<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UlasanForm extends Form
{
    #[Validate("required")]
    public $nilai;
    #[Validate("required")]
    public $ulasan;
}
