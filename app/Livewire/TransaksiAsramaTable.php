<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;
use App\Services\Transaksi\TransaksiService;

class TransaksiAsramaTable extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $searchInput = "";
    public $searchAction = [];

    public $order = ""; // This Column
    public $orderAction = 0; // Action untuk menentukan ASC atau Descending

    public function render(TransaksiService $transaksiService)
    {
        if (!isset($this->searchAction["search"]))
            $transaksiAsrama = $transaksiService->getAllTransaksiAsrama();

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "")
            $transaksiAsrama = $transaksiService->searchTransaksiAsrama($this->searchAction["search"]);

        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.asrama.pdf", [
                "transaksiAsrama" => $transaksiAsrama->get()
            ]);
            return $pdf->download("transaksi_asrama_" . Carbon::now()->isoFormat("d-MMMM-Y") . ".pdf");
        }

        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'ta_tanggal_sewa':
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
            case 'ta_check_in':
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
            case 'ta_check_out':
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
            case 'ta_sub_total':
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
            $transaksiAsrama = $transaksiAsrama->orderBy($this->order, $sorted);
        }

        $totalTransaksiBelumBayar = 0;
        $totalTransaksiSudahBayar = 0;

        foreach ($transaksiAsrama->paginate(5) as $row) {
            if ($row->status == "terbayar") {
                $totalTransaksiSudahBayar += $row->ta_sub_total;
            } else if ($row->status == "belum bayar") {
                $totalTransaksiBelumBayar += $row->ta_sub_total;
            }
        }

        return view('livewire.transaksi-asrama-table', [
            "transaksiAsrama" => $transaksiAsrama->paginate(5),
            "totalTransaksiBelumBayar" => $totalTransaksiBelumBayar,
            "totalTransaksiSudahBayar" => $totalTransaksiSudahBayar,
        ]);
    }
}
