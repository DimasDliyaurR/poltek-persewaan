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

    public $order = "";
    public $orderAction = 0;

    public function render(KendaraanService $kendaraanService)
    {
        $kendaraans = $kendaraanService->getAllDataKendaraan()->join("merk_kendaraans", "merk_kendaraans.id", "=", "kendaraans.merk_kendaraan_id"); // Inisialisasi Semua Data Kendaraan

        if ($this->search != "") $kendaraans = $kendaraanService->searchKendaraan($this->search); // Search 

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'mk_merk':
                $this->orderAction += 1;
                switch ($this->orderAction) {
                    case 1:
                        $sorted = "asc";
                        break;
                    case 2:
                        $sorted = "desc";
                        break;
                }
                break;
            case 'mk_seri':
                $this->orderAction += 1;
                switch ($this->orderAction) {
                    case 1:
                        $sorted = "asc";
                        break;
                    case 2:
                        $sorted = "desc";
                        break;
                }
                break;
            case 'k_plat':
                $this->orderAction += 1;
                switch ($this->orderAction) {
                    case 1:
                        $sorted = "asc";
                        break;
                    case 2:
                        $sorted = "desc";
                        break;
                }
                break;
        }

        $this->order = $this->orderAction != 0 ? $this->order : "";

        if ($this->orderAction != 0) $kendaraans->orderBy($this->order, $sorted);

        return view('livewire.kendaraan-table', [
            "kendaraans" => $kendaraans->paginate(5),
        ]);
    }
}
