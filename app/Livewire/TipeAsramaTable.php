<?php

namespace App\Livewire;

use App\Services\Asrama\AsramaService;
use Livewire\Component;

class TipeAsramaTable extends Component
{

    public $searchInput = "";
    public $searchAction = [];

    public $order = "";
    public $orderAction = 0;

    public function searchTrigger()
    {
        if ($this->searchInput != "") {
            $this->searchAction["search"] = $this->searchInput;
        }
    }

    public function render(AsramaService $asramaService)
    {
        $is_request = request("trashed") == 1;

        if (!isset($this->searchAction["search"])) $asramas = $is_request ? $asramaService->getAllDataTipeAsrama()->onlyTrashed() : $asramaService->getAllDataTipeAsrama(); // Inisiasi Data Asrama

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "") $asramas = $asramaService->searchTipeAsrama($this->searchAction["search"]);

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'ta_nama':
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
            case 'ta_tarif':
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

        if ($this->orderAction != 0) $asramas = $asramas->orderBy($this->order, $sorted);

        if ($is_request) {
            return view('livewire.tipe-asrama-table-restore', [
                "tipeAsramas" => $asramas->paginate(5),
            ]);
        }

        return view('livewire.tipe-asrama-table', [
            "tipeAsramas" => $asramas->paginate(5),
        ]);
    }
}
