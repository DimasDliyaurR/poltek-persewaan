<?php

namespace App\Livewire\Transaksi;

use Exception;
use Livewire\Component;
use App\Models\MerkKendaraan;

class TransaksiKendaraanForm extends Component
{
    public $slug;
    public $slugInput = "";
    public $slugArray = [];

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function resetSlug()
    {
        $this->slugInput = "";
    }

    public function saveSlug()
    {
        $isSame = in_array($this->slugInput, $this->slugArray);

        if (!$isSame) {
            $this->slugArray[] = $this->slugInput;
        }

        $this->slugInput = "";
    }

    public function render()
    {

        try {
            $item = $this->slug;
            $item = MerkKendaraan::whereMkSlug($item)->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "!=", "tersedia")]);
            $MerkKendaraan = MerkKendaraan::with("kendaraans")->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")])->where("mk_slug", "!=", $this->slug);

            foreach ($this->slugArray as $key => $value) {
                $MerkKendaraan->where("mk_slug", "!=", $value);
                $item->orWhere("mk_slug", "=", $value);
            }
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }

        return view('livewire.transaksi.transaksi-kendaraan-form', [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan->get(),
            "items" => $item->get(),
        ]);
    }
}
