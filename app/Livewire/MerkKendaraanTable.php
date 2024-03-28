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

    public $order = "mk";
    public $orderAction = 0;

    public function render(KendaraanService $kendaraanService)
    {
        if ($this->search != "") {
            $merkKendaraans = $kendaraanService->searchMerkKendaraan($this->search);
        } else {
            $merkKendaraans = $kendaraanService->getAllDataMerkKendaraan();
        }

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'mk_merek':
                $this->orderAction += 1;
                switch ($this->orderAction) {
                    case 1:
                        $merkKendaraans = $merkKendaraans->orderBy("mk_merk", "asc");
                        break;
                    case 2:
                        $merkKendaraans = $merkKendaraans->orderBy("mk_merk", "desc");
                        break;
                    default:
                        $merkKendaraans = $kendaraanService->getAllDataMerkKendaraan();
                        break;
                }
                break;
            case 'mk_seri':
                $this->orderAction += 1;
                switch ($this->orderAction) {
                    case 1:
                        $merkKendaraans = $merkKendaraans->orderBy("mk_seri", "asc");
                        break;
                    case 2:
                        $merkKendaraans = $merkKendaraans->orderBy("mk_seri", "desc");
                        break;
                    default:
                        $merkKendaraans = $kendaraanService->getAllDataMerkKendaraan();
                        break;
                }
                break;
                break;
        }
        // $merkKendaraans = $this->merek ? $merkKendaraans->orderBy("mk_merk", "asc") : $merkKendaraans->orderBy("mk_merk", "desc");

        return view('livewire.merk-kendaraan-table', [
            "merkKendaraans" => $merkKendaraans->paginate(5),
        ]);
    }
}
