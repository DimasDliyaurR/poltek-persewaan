<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;
use App\Services\Transaksi\TransaksiService;

class TransaksiLayananTable extends Component
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
            $transaksiLayanan = $transaksiService->getAllTransaksiLayanan();

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "")
            $transaksiLayanan = $transaksiService->searchTransaksiLayanan($this->searchAction["search"]);


        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.gedungLap.pdf", [
                "transaksiGedungLap" => $transaksiLayanan->get()
            ]);
            return $pdf->download("transaksi_gedung_lap_" . Carbon::now()->isoFormat("D-MMMM-Y") . ".pdf");
        }

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'tl_tanggal_sewa':
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
            case 'tl_tanggal_pelaksanaan':
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
            case 'tl_tanggal_kembali':
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
            case 'tl_sub_total':
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
            $transaksiLayanan = $transaksiLayanan->orderBy($this->order, $sorted);
        }

        $totalTransaksiBelumBayar = 0;
        $totalTransaksiSudahBayar = 0;

        foreach ($transaksiLayanan->paginate(5) as $row) {
            if ($row->status == "terbayar") {
                $totalTransaksiSudahBayar += $row->tl_sub_total;
            } else if ($row->status == "belum bayar") {
                $totalTransaksiBelumBayar += $row->tl_sub_total;
            }
        }

        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.layanan.pdf", [
                "transaksiLayanan" => $transaksiLayanan->get()
            ]);
            return $pdf->download("transaksi_layanan_" . Carbon::now()->isoFormat("D-MMMM-Y") . ".pdf");
        }
        return view('livewire.transaksi-layanan-table', [
            "transaksiLayanan" => $transaksiLayanan->paginate(5),
        ]);
    }
}
