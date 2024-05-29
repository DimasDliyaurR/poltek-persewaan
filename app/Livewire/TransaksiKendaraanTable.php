<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;
use App\Services\Transaksi\TransaksiService;

class TransaksiKendaraanTable extends Component
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

    public function render(TransaksiService $transaksiService)
    {
        if (!isset($this->searchAction["search"]))
            $transaksiKendaraan = $transaksiService->getAllTransaksiKendaraan();

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "")
            $transaksiKendaraan = $transaksiService->searchTransaksiKendaraan($this->searchAction["search"]);

        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.kendaraan.pdf", [
                "transaksiKendaraan" => $transaksiKendaraan->paginate()
            ]);
            return $pdf->download("transaksi_kendaraan_" . Carbon::now()->isoFormat("d-MMMM-Y") . ".pdf");
        }

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'tk_tanggal_sewa':
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
            case 'tk_pelaksanaan':
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
            case 'tk_tanggal_kembali':
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
            case 'tk_sub_total':
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
            case 'status':
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
            case 'profiles.nama_lengkap':
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

        if ($this->orderAction != 0) {
            $transaksiKendaraan = $transaksiKendaraan->orderBy($this->order, $sorted);
        }

        $totalTransaksiBelumBayar = 0;
        $totalTransaksiSudahBayar = 0;

        foreach ($transaksiKendaraan->paginate(5) as $row) {
            if ($row->status == "terbayar") {
                $totalTransaksiSudahBayar += $row->tk_sub_total;
            } else if ($row->status == "belum bayar") {
                $totalTransaksiBelumBayar += $row->tk_sub_total;
            }
        }

        return view('livewire.transaksi-kendaraan-table', [
            "totalTransaksiSudahBayar" => $totalTransaksiSudahBayar,
            "totalTransaksiBelumBayar" => $totalTransaksiBelumBayar,
            "transaksiKendaraan" => Str::contains(".", $this->order) ? $transaksiKendaraan->paginate(5)->sortBy($this->order) : $transaksiKendaraan->paginate(5),
        ]);
    }
}
