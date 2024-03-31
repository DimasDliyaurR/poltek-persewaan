<?php

namespace App\Livewire;

use App\Services\Asrama\AsramaService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AsramaTable extends Component
{
    use WithPagination, WithoutUrlPagination;
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
        if (!isset($this->searchAction["search"])) $asramas = $asramaService->getAllDataAsrama(); // Inisiasi Data Asrama

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "") $asramas = $asramaService->searchAsrama($this->searchAction["search"]);

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'a_nama_ruangan':
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
            case 'a_tarif':
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

        return view('livewire.asrama-table', [
            "asramas" => $asramas->paginate(5),
        ]);
    }
}
