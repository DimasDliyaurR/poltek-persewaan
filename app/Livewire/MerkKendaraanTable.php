<?php

namespace App\Livewire;

use App\Services\Kendaraan\KendaraanService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MerkKendaraanTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = "";

    public $order = ""; // This Column
    public $orderAction = 0; // Action untuk menentukan ASC atau Descending

    public function render(KendaraanService $kendaraanService)
    {
        $merkKendaraans = $kendaraanService->getAllDataMerkKendaraan(); // Inisialisasi Semua Data Merk Kendaraan

        if ($this->search != "") $merkKendaraans = $kendaraanService->searchMerkKendaraan($this->search); // Search 

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
        }

        $this->order = $this->orderAction != 0 ? $this->order : "";

        if ($this->orderAction != 0) $merkKendaraans = $merkKendaraans->orderBy($this->order, $sorted);

        return view('livewire.merk-kendaraan-table', [
            "merkKendaraans" => $merkKendaraans->paginate(5),
        ]);
    }
}
