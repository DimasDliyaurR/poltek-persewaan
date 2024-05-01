<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Http\Controllers\Controller;
use App\Models\DetailFasilitasAsrama;
use App\Services\Asrama\AsramaService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\asrama\RequestAsrama;
use App\Http\Requests\asrama\tipeAsrama\RequestTipeAsrama;
use App\Http\Requests\asrama\fasilitasAsrama\RequestFasilitasAsrama;
use App\Http\Requests\asrama\detailFotoTipeAsrama\RequestDetailFotoTipeAsrama;
use App\Http\Requests\asrama\detailFasilitasAsrama\RequestDetailFasilitasAsrama;

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
            "action" => "asrama",
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
        $asramas = $this->asramaService->getAllDataTipeAsrama();
        return view("admin.asrama.lihat", [
            "title" => "Asrama",
            "action" => "asrama",
            "tipeAsramas" => $asramas->get(),
        ]);
    }

    /**
     * Asrama
     * Create
     */
    public function createAsrama(RequestAsrama $request)
    {
        $validation = $request->validated();

        // Non Active
        if ($request->hasFile('a_foto')) {
            $file_asrama = $request->file('a_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/asrama", $file_asrama);
            $validation['a_foto'] = $foto_asrama_path;
        }

        $validation['a_slug'] = Str::slug($validation["a_nama_ruangan"]);
        // dd($validation);
        // try {
        $this->asramaService->storeAsrama($validation);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

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

        return view("admin.asrama.detail", [
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
            $tipeAsramas = $this->asramaService->getAllDataTipeAsrama($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.edit", [
            "title" => "Asrama",
            "action" => "asrama",
            "asrama" => $asrama,
            "tipeAsramas" => $tipeAsramas->get(),
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
            $this->asramaService->destroyAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $asrama['a_nama_ruangan']);
    }

    /**
     * Tipe Asrama
     * Index
     */
    public function indexTipeAsrama()
    {
        $property = ["action" => "asrama"];
        // Jika ada param request adalah 1
        $is_request_trashed = request("trashed") == 1;
        $property["title"] = $is_request_trashed ? "Tipe Asrama Restore" : "Tipe Asrama";

        return view("admin.asrama.tipeAsrama.lihat", $property);
    }

    /**
     * Tipe Asrama
     * Create
     */
    public function createTipeAsrama(RequestTipeAsrama $request)
    {
        $validation = $request->validated();


        if ($request->hasFile('ta_foto')) {
            $file_asrama = $request->file('ta_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/asrama", $file_asrama);

            $validation["ta_foto"] = $foto_asrama_path;
        } else {
            abort(505);
        }

        $validation['ta_slug'] = Str::slug($validation["ta_nama"]);

        try {
            $this->asramaService->storeTipeAsrama($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Tipe Asrama " . $validation["ta_nama"]);
    }

    /**
     * Tipe Asmara
     * Store
     */
    public function storeTipeAsrama($id)
    {
        try {
            $tipeAsrama = $this->asramaService->getDataTipeAsramaById($id);
            $detailFasilitas = $this->asramaService->getDataDetailFasilitasByTipeAsramaId($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.tipeAsrama.detail", [
            "title" => "Tipe Asrama",
            "action" => "asrama",
            "tipeAsrama" => $tipeAsrama->first(),
            "detailFasilitas" => $detailFasilitas->get(),
        ]);
    }

    /**
     * Asrama
     * Show
     */
    public function showTipeAsrama($id)
    {
        try {
            $asrama = $this->asramaService->getDataTipeAsramaById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.tipeAsrama.edit", [
            "title" => "Tipe Asrama",
            "action" => "asrama",
            "asrama" => $asrama->first(),
        ]);
    }

    /**
     * Asrama
     * Update
     */
    public function updateTipeAsrama(RequestTipeAsrama $request, $id)
    {
        $validation = $request->validated();

        $asramaOld = $this->asramaService->getDataTipeAsramaById($id);

        if ($request->hasFile('ta_foto')) {

            if (Storage::disk('public')->exists($asramaOld['ta_foto'])) {
                Storage::disk('public')->delete($asramaOld['ta_foto']);
            }

            $file_asrama = $request->file('ta_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/asrama", $file_asrama);
            $validation['ta_foto'] = $foto_asrama_path;
        }

        $validation['ta_slug'] = Str::slug($validation["ta_nama"]);

        try {
            $this->asramaService->updateTipeAsrama($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Mengubah Asrama pada ruangan [ " . $validation["ta_nama"] . " ]");
    }

    /**
     * Asrama
     * Destroy
     */
    public function destroyTipeAsrama($id)
    {
        $asrama = $this->asramaService->getDataTipeAsramaById($id)->first();

        try {
            $this->asramaService->destroyTipeAsrama($id);
            // Storage::disk("public")->delete($asrama->ta_foto);
        } catch (\Exception $th) {
            throw new Exception($th->getMessage());
        }

        return back()->with("successTable", "Berhasil Menghapus " . $asrama->ta_nama);
    }

    /**
     * Asrama
     * Restore
     */
    public function restoreTipeAsrama($id)
    {
        $asrama = $this->asramaService->getDataTipeAsramaById($id)->withTrashed()->first();

        try {
            $this->asramaService->getDataTipeAsramaById($id)->withTrashed()->restore();
        } catch (\Exception $th) {
            throw new Exception($th->getMessage());
        }

        return redirect("admin/tipeAsramas")->with("successTable", "Berhasil Memulihkan data " . $asrama->ta_nama);
    }

    /**
     * Detail Fasilitas Asrama
     * Index
     */
    public function indexDetailFasilitasAsrama($id)
    {
        $tipeAsrama = $this->asramaService->getDataTipeAsramaById($id);
        $fasilitasAsramas = $this->asramaService->getAllDataFasilitasAsrama();
        $detailFasilitasAsrama = $this->asramaService->getDataDetailFasilitasByTipeAsramaId($id);

        return view("admin.asrama.detailFasilitasAsrama.lihat", [
            "title" => "Detail Fasilitas Asrama",
            "action" => "asrama",
            "asrama" => $tipeAsrama->first(),
            "fasilitasAsramas" => $fasilitasAsramas,
            "detailFasilitasAsrama" => $detailFasilitasAsrama->get(),
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

        $validation["tipe_asrama_id"] = $id;

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

    /**
     * Detail Foto Tipe Asrama
     * Index
     */
    public function indexDetailFotoTipeAsrama($id)
    {
        $asramas = $this->asramaService->getDataDetailFotoTipeAsramaByTipeAsramaId($id);
        $tipeAsrama = $this->asramaService->getDataTipeAsramaById($id);

        return view("admin.asrama.detailFotoTipeAsrama.lihat", [
            "title" => "Detail Foto Tipe Asrama",
            "action" => "Detail Foto Tipe Asrama",
            "tipeAsrama" => $tipeAsrama->first(),
            "detailFotoTipeAsrama" => $asramas->get(),
        ]);
    }

    /**
     * Detail Foto Tipe Asrama
     * Create
     */
    public function createDetailFotoTipeAsrama(RequestDetailFotoTipeAsrama $request, $id)
    {
        $validation = $request->validated();

        $validation["tipe_asrama_id"] = $id;

        if ($request->hasFile('dfta_foto')) {
            $file_asrama = $request->file('dfta_foto');
            $foto_asrama = $file_asrama->hashName();

            $foto_asrama_path = $file_asrama->storeAs("/detail_foto_tipe_asrama", $foto_asrama);
            $foto_asrama_path = Storage::disk("public")->put("/detail_foto_tipe_asrama", $file_asrama);
            $validation['dfta_foto'] = $foto_asrama_path;
        }

        $this->asramaService->storeDetailFotoTipeAsrama($validation);

        return back()->with("successForm", "Berhasil Menambahkan");
    }

    /**
     * Asmara
     * Store
     */
    public function storeDetailFotoTipeAsrama($id)
    {
        try {
            $asrama = $this->asramaService->getDataDetailFotoTipeAsramaById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.asrama.detailFotoTipeAsrama.detail", [
            "title" => "Detail",
            "action" => "kendaraan",
            "detailFotoTipeAsrama" => $asrama,
        ]);
    }

    /**
     * Detail Foto Tipe Asrama
     * Update
     */
    public function updateDetailFotoTipeAsramaAsrama(RequestDetailFotoTipeAsrama $request, $id)
    {
        $validation = $request->validated();

        $detailFotoTipeAsramaOld = $this->asramaService->getDataDetailFotoTipeAsramaById($id);

        if ($request->hasFile('dfta_foto')) {
            if (Storage::disk('public')->exists($detailFotoTipeAsramaOld['dfta_foto'])) {
                Storage::disk('public')->delete($detailFotoTipeAsramaOld['dfta_foto']);
            }
            $file_detail_foto_tipe_asrama = $request->file('dfta_foto');
            $foto_detail_foto_tipe_asrama = $file_detail_foto_tipe_asrama->hashName();

            $foto_detail_foto_tipe_asrama_path = $file_detail_foto_tipe_asrama->storeAs("/detail_foto_tipe_asrama", $foto_detail_foto_tipe_asrama);
            $foto_detail_foto_tipe_asrama_path = Storage::disk("public")->put("/detail_foto_tipe_asrama", $file_detail_foto_tipe_asrama);
            $validation['dfta_foto'] = $foto_detail_foto_tipe_asrama_path;
        }

        try {
            $this->asramaService->updateAsrama($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Mengubah Asrama pada ruangan ");
    }

    /**
     * Asrama
     * Destroy
     */
    public function destroyDetailFotoTipeAsrama($id)
    {
        $asrama = $this->asramaService->getDataDetailFotoTipeAsramaById($id);

        try {
            $this->asramaService->destroyDetailFotoTipeAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus");
    }
}
