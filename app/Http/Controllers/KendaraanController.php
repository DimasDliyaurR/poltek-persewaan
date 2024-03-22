<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RequestMerkKendaraan;
use App\Http\Requests\RequestMerkKendaraanUpdate;
use App\Services\Kendaraan\KendaraanService;

class KendaraanController extends Controller
{
    private $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    /**
     * Merk Kendaraan
     * Index
     */
    public function indexMerkKendaraan()
    {
        $kendaraans = $this->kendaraanService->getAllDataMerkKendaraan();

        return view("admin.kendaraan.merkKendaraan.lihat", [
            "title" => "Merk Kendaraan",
            "action" => "merkKendaraan.show",
            "merkKendaraans" => $kendaraans,
        ]);
    }

    /**
     * Merk Kendaraan
     * Create
     */
    public function createMerkKendaraan(RequestMerkKendaraan $request)
    {
        $validation = $request->validated();

        if ($request->hasFile('mk_foto')) {

            $file_merk_kendaraan = $request->file('mk_foto');
            $foto_kendaraan = $file_merk_kendaraan->hashName();

            $foto_kendaraan_path = $file_merk_kendaraan->storeAs("/file", $foto_kendaraan);
            $foto_kendaraan_path = Storage::disk("public")->put("/file", $file_merk_kendaraan);
            $validation['mk_foto'] = $foto_kendaraan_path;
        }

        $validation['mk_slug'] = Str::slug($validation["mk_merk"]);

        try {
            $this->kendaraanService->storeMerkKendaraan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Merk Kendaraan
     * Store
     */
    public function storeMerkKendaraan($id)
    {
        try {
            $merkKendaraan = $this->kendaraanService->getDataMerkKendaraanById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.kendaraan.merkKendaraan.detail", [
            "title" => "Detail",
            "merkKendaraan" => $merkKendaraan,
        ]);
    }

    /**
     * Merk Kendaraan
     * Show
     */
    public function showMerkKendaraan($id)
    {
        try {
            $merkKendaraan = $this->kendaraanService->getDataMerkKendaraanById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.kendaraan.merkKendaraan.edit", [
            "title" => "Merk Kendaraan",
            "merkKendaraan" => $merkKendaraan,
        ]);
    }

    /**
     * Merk Kendaraan
     * Update
     */
    public function updateMerkKendaraan(RequestMerkKendaraanUpdate $request, $id)
    {
        $validation = $request->validated();

        $merkKendaraanOld = $this->kendaraanService->getDataMerkKendaraanById($id);

        if ($request->hasFile('mk_foto')) {
            if (Storage::disk('public')->exists($merkKendaraanOld['mk_foto'])) {
                Storage::disk('public')->delete($merkKendaraanOld['mk_foto']);
            }
            $file_merk_kendaraan = $request->file('mk_foto');
            $foto_kendaraan = $file_merk_kendaraan->hashName();

            $foto_kendaraan_path = $file_merk_kendaraan->storeAs("/file", $foto_kendaraan);
            $foto_kendaraan_path = Storage::disk("public")->put("/file", $file_merk_kendaraan);
            $validation['mk_foto'] = $foto_kendaraan_path;
        }

        $validation['mk_slug'] = Str::slug($validation["mk_merk"]);

        try {
            $this->kendaraanService->updateMerkKendaraan($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Merk Kendaraan
     * Destroy
     */
    public function destroyMerkKendaraan($id)
    {
        $merkKendaraan = $this->kendaraanService->getDataMerkKendaraanById($id);

        try {
            Storage::disk("public")->delete($merkKendaraan['mk_foto']);
            $this->kendaraanService->destroyMerkKendaraan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $merkKendaraan['mk_merk']);
    }
}
