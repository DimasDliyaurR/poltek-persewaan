<?php

namespace App\Http\Controllers;

use App\Http\Requests\asrama\fasilitasAsrama\RequestFasilitasAsrama;
use App\Services\Asrama\AsramaService;
use Illuminate\Http\Request;

class AsramaController extends Controller
{
    private $asramaService;

    public function __construct(AsramaService $asramaService)
    {
        $this->asramaService = $asramaService;
    }

    public function indexFasilitasAsrama()
    {
        $fasilitasAsramas = $this->asramaService->getAllDataFasilitasAsrama();

        return view("admin.asrama.fasilitasAsrama.lihat", [
            "title" => "Fasilitas Asrama",
            "action" => "asrama",
            "fasilitasAsramas" => $fasilitasAsramas,
        ]);
    }

    public function createFasilitasAsrama(RequestFasilitasAsrama $request)
    {
        $validation = $request->validated();

        $fasilitasAsramas = $this->asramaService->storeFasilitasAsrama($validation);

        return back()->with("successFotm", "Berhasil Menambahkan " . $validation["fa_nama"]);
    }
}
