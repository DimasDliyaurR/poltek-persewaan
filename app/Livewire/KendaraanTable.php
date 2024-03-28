<?php

namespace App\Livewire;

use App\Models\Kendaraan;
use App\Services\Kendaraan\KendaraanService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class KendaraanTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = "";

    public function render(KendaraanService $kendaraanService)
    {
        $kendaraans = $kendaraanService->getAllDataKendaraan();

        return view('livewire.kendaraan-table', [
            "kendaraans" => $kendaraans->paginate(5),
        ]);
    }
}
