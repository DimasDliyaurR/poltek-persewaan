<?php

namespace App\Livewire;

use App\Services\Transaksi\TransaksiService;
use Carbon\Carbon;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiGedungLapTable extends Component
{
    public function render(TransaksiService $transaksiService)
    {
        $transaksiGedungLap = $transaksiService->getAllTransaksiGedungLap();
        if (request("pdf") == 1) {
            $pdf =  Pdf::loadView("admin.laporan.gedungLap.pdf", [
                "transaksiGedungLap" => $transaksiGedungLap->get()
            ]);
            return $pdf->download("transaksi_gedung_lap_" . Carbon::now()->isoFormat("D-MMMM-Y") . ".pdf");
        }
        return view('livewire.transaksi-gedung-lap-table', [
            "transaksiGedungLap" => $transaksiGedungLap->paginate(5),
        ]);
    }
}
