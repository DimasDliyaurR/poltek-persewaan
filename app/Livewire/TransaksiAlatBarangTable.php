<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;
use App\Services\Transaksi\TransaksiService;

class TransaksiAlatBarangTable extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $searchInput = "";
    public $searchAction = [];

    public $order = ""; // This Column
    public $orderAction = 0; // Action untuk menentukan ASC atau Descending

    public function render(TransaksiService $transaksiService)
    {
        if (!isset($this->searchAction["search"]))
            $transaksiAlatBarang = $transaksiService->getAllTransaksiAlatBarang();

        if (isset($this->searchAction["search"]) and $this->searchAction["search"] != "")
            $transaksiAlatBarang = $transaksiService->searchTransaksiAlatBarang($this->searchAction["search"]);

        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.alatBarang.pdf", [
                "transaksiAlatBarang" => $transaksiAlatBarang->get()
            ]);
            return $pdf->download("transaksi_alat_barang_" . Carbon::now()->isoFormat("d-MMMM-Y") . ".pdf");
        }


        $this->orderAction = $this->orderAction == 2 ? -1 : $this->orderAction; // Reset Order Action Max 2

        switch ($this->order) {
            case 'transaksi_alat_barangs.created_at':
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
            case 'tab_tanggal_pesanan':
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
            case 'tab_tanggal_kembali':
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
            case 'tab_sub_total':
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
            $transaksiAlatBarang = $transaksiAlatBarang->orderBy($this->order, $sorted);
        }

        $totalTransaksiBelumBayar = 0;
        $totalTransaksiSudahBayar = 0;

        foreach ($transaksiAlatBarang->paginate(5) as $row) {
            if ($row->status == "terbayar") {
                $totalTransaksiSudahBayar += $row->tab_sub_total;
            } else if ($row->status == "belum bayar") {
                $totalTransaksiBelumBayar += $row->tab_sub_total;
            }
        }

        return view('livewire.transaksi-alat-barang-table', [
            "transaksiAlatBarang" => $transaksiAlatBarang->paginate(5),
            "totalTransaksiBelumBayar" => $totalTransaksiBelumBayar,
            "totalTransaksiSudahBayar" => $totalTransaksiSudahBayar,
        ]);
    }
}
