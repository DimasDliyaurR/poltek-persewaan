<?php

namespace App\Livewire;

use App\Services\Kendaraan\KendaraanService;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MerkKendaraanTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $searchInput = "";
    public $searchAction = [];

    public $order = ""; // This Column
    public $orderAction = 0; // Action untuk menentukan ASC atau Descending

    public function searchTrigger()
    {
        if ($this->searchInput != "") {
            $this->searchAction["search"] = $this->searchInput;
        }
    }

    public function render(KendaraanService $kendaraanService)
    {
        if (!isset($this->searchAction["search"])) $merkKendaraansModel = $kendaraanService->getAllDataMerkKendaraan()->with("kendaraans")->withCount("kendaraans"); // Inisialisasi Semua Data Merk Kendaraan

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "") $merkKendaraansModel = $kendaraanService->searchMerkKendaraan($this->searchAction["search"]); // Search 


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
        $this->order = $this->orderAction != 0 ? $this->order : ""; // Reset Jika Order Action 0

        if ($this->orderAction != 0) $merkKendaraansModel = $merkKendaraansModel->orderBy($this->order, $sorted);

        return view('livewire.merk-kendaraan-table', [
            "merkKendaraans" => $merkKendaraansModel->paginate(5),
        ]);
    }
}
