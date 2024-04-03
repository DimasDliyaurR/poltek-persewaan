<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kendaraan;
use Livewire\WithPagination;

class Transportasi extends Component
{
    use WithPagination;
    public $search='';
    public $queryString =['search'];
    public function render()
    {
        return view('livewire.transportasi',[
            'kendaraans' =>Kendaraan::when($this->search, function($query){
                $query->where('k_nama','like','%'.$this->search.'%');
            })->paginate(3),
            ]);
        
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
