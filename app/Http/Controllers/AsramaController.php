<?php

namespace App\Http\Controllers;

use App\Http\Requests\asrama\detailFasilitasAsrama\RequestDetailFasilitasAsrama;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Services\Asrama\AsramaService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\asrama\fasilitasAsrama\RequestFasilitasAsrama;
use App\Http\Requests\asrama\RequestAsrama;
use App\Models\DetailFasilitasAsrama;

class AsramaController extends Controller
{
    private $asramaService;

    public function __construct(AsramaService $asramaService)
    {
        $this->asramaService = $asramaService;
    }

    /**
     * Fasilitas Asrama
     * Index
     */
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
     * Fasilitas Asrama
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
     * Fasilitas Asrama
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
     * Fasilitas Asrama
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

    /**
     * Asrama
     * Index
     */
    public function indexAsrama()
    {
        $asramas = $this->asramaService->getAllDataAsrama();

        return view("admin.asrama.lihat", [
            "title" => "Asrama",
            "action" => "asrama",
            "asramas" => $asramas,
        ]);
    }

    /**
     * Asrama
     * Create
     */
    public function createAsrama(RequestAsrama $request)
    {
        $validation = $request->validated();

        if ($request->hasFile('a_foto')) {
            $file_asrama = $request->file('a_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/asrama", $file_asrama);
            $validation['a_foto'] = $foto_asrama_path;
        } else {
            abort(505);
        }

        $validation['a_slug'] = Str::slug($validation["a_nama_ruangan"]);

        try {
            $this->asramaService->storeAsrama($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Asrama ruangan " . $validation["a_nama_ruangan"]);
    }

    /**
     * Asmara
     * Store
     */
    public function storeAsrama($id)
    {
        try {
            $asrama = $this->asramaService->getDataAsramaById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.kendaraan.merkKendaraan.detail", [
            "title" => "Detail",
            "action" => "kendaraan",
            "merkKendaraan" => $asrama,
        ]);
    }

    /**
     * Asrama
     * Show
     */
    public function showAsrama($id)
    {
        try {
            $asrama = $this->asramaService->getDataAsramaById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.edit", [
            "title" => "Asrama",
            "action" => "asrama",
            "asrama" => $asrama,
        ]);
    }

    /**
     * Asrama
     * Update
     */
    public function updateAsrama(RequestAsrama $request, $id)
    {
        $validation = $request->validated();

        $asramaOld = $this->asramaService->getDataAsramaById($id);

        if ($request->hasFile('a_foto')) {

            if (Storage::disk('public')->exists($asramaOld['a_foto'])) {
                Storage::disk('public')->delete($asramaOld['a_foto']);
            }

            $file_asrama = $request->file('a_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/asrama", $file_asrama);
            $validation['a_foto'] = $foto_asrama_path;
        }

        $validation['a_slug'] = Str::slug($validation["a_nama_ruangan"]);

        try {
            $this->asramaService->updateAsrama($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Mengubah Asrama pada ruangan [ " . $validation["a_nama_ruangan"] . " ]");
    }

    /**
     * Asrama
     * Destroy
     */
    public function destroyAsrama($id)
    {
        $asrama = $this->asramaService->getDataAsramaById($id);

        try {
            Storage::disk("public")->delete($asrama['a_foto']);
            $this->asramaService->destroyAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $asrama['a_nama_ruangan']);
    }

    /**
     * Detail Fasilitas Asrama
     * Index
     */
    public function indexDetailFasilitasAsrama($id)
    {

        $asrama = $this->asramaService->getDataAsramaById($id);
        $fasilitasAsramas = $this->asramaService->getAllDataFasilitasAsrama();
        $detailFasilitasAsrama = $this->asramaService->getDataDetailFasilitasByAsramaId($id);

        return view("admin.asrama.detailFasilitasAsrama.lihat", [
            "title" => "Detail Fasilitas Asrama",
            "action" => "asrama",
            "asrama" => $asrama,
            "fasilitasAsramas" => $fasilitasAsramas,
            "detailFasilitasAsrama" => $detailFasilitasAsrama,
        ]);
    }

    /**
     * Detail Fasilitas Asrama
     * Create
     */
    public function createDetailFasilitasAsrama(RequestDetailFasilitasAsrama $request, $id)
    {
        $validation = $request->validated();

        $existDetail = $this->asramaService->IsExistFasilitasTransaksi($validation["fasilitas_asrama_id"], $id);

        if (!$existDetail) {
            return back()->withErrors(["fasilitas_asrama_id" => "Fasilitas Sudah digunakan"]);
        }

        $validation["asrama_id"] = $id;

        $this->asramaService->storeDetailFasilitasAsrama($validation);

        return back()->with("successForm", "Berhasil Menambahkan Fasilitas");
    }

    public function destroyDetailFasilitas($id)
    {
        try {
            $this->asramaService->destroyDetailFasilitasAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus");
    }
}
