<?php

namespace App\Http\Controllers\admin;

use App\Models\Asrama;
use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use stdClass;

class LaporanController extends Controller
{
    public function index()
    {
        return view("admin.laporan.lihat", [
            "title" => "Laporan Transaksi",
            "action" => "laporan",
        ]);
    }
}
