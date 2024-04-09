<?php

namespace App\Livewire;

use App\Models\GedungLap;
use Livewire\Component;
use Livewire\WithPagination;

class Kategori extends Component
{
    public $search ='';
    use WithPagination;
    public function render()
    {
        return view('livewire.kategori',[
            'gedung_laps' => GedungLap::where('gl_nama','like','%'. $this->search.'%')->paginate(2)
        ]);
        
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
}
