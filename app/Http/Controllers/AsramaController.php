<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Services\Asrama\AsramaService;
use App\Http\Requests\asrama\fasilitasAsrama\RequestFasilitasAsrama;

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

        try {
            $fasilitasAsramas = $this->asramaService->storeFasilitasAsrama($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan " . $validation["fa_nama"]);
    }

    /**
     * FasilitasAsrama
     * Show
     */
    public function showFasilitasAsrama($id)
    {
        try {
            $FasilitasAsrama = $this->asramaService->getDataFasilitasAsramaById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.FasilitasAsrama.edit", [
            "title" => "FasilitasAsrama",
            "action" => "FasilitasAsrama",
            "fasilitasAsrama" => $FasilitasAsrama,
        ]);
    }

    /**
     * Merk FasilitasAsrama
     * Update
     */
    public function updateFasilitasAsrama(RequestFasilitasAsrama $request, $id)
    {
        $validation = $request->validated();

        try {
            $this->asramaService->updateFasilitasAsrama($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan FasilitasAsrama");
    }

    /**
     * Merk FasilitasAsrama
     * Destroy
     */
    public function destroyFasilitasAsrama($id)
    {
        $FasilitasAsrama = $this->asramaService->getDataFasilitasAsramaById($id);

        try {
            $this->asramaService->destroyFasilitasAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $FasilitasAsrama['fa_nama']);
    }
}
