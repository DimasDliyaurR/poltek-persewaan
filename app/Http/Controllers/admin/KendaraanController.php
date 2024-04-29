<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use InvalidArgumentException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RequestMerkKendaraan;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Requests\kendaraan\RequestKendaraan;
use App\Http\Requests\kendaraan\RequestKendaraanUpdate;

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

        /** 
         * Controller Has been controller On
         * App\Livewire\MerkKendaraanTable
         */

        return view("admin.kendaraan.merkKendaraan.lihat", [
            "title" => "Merk Kendaraan",
            "action" => "kendaraan",
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
            "action" => "kendaraan",
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
            "action" => "kendaraan",
            "merkKendaraan" => $merkKendaraan,
        ]);
    }

    /**
     * Merk Kendaraan
     * Update
     */
    public function updateMerkKendaraan(RequestMerkKendaraan $request, $id)
    {
        $validation = $request->validated();

        $merkKendaraanOld = $this->kendaraanService->getDataMerkKendaraanById($id);

        if ($request->hasFile('mk_foto')) {
            if (Storage::disk('public')->exists($merkKendaraanOld['mk_foto'])) {
                Storage::disk('public')->delete($merkKendaraanOld['mk_foto']);
            }
            $file_merk_kendaraan = $request->file('mk_foto');
            $foto_kendaraan = $file_merk_kendaraan->hashName();

            $foto_kendaraan_path = $file_merk_kendaraan->storeAs("/merkKendaraan", $foto_kendaraan);
            $foto_kendaraan_path = Storage::disk("public")->put("/merkKendaraan", $file_merk_kendaraan);
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

    /**
     * Kendaraan
     * Index
     */
    public function indexKendaraan()
    {
        $kendaraans = $this->kendaraanService->getAllDataKendaraanWithMerkKendaraan();


        $merkKendaraans = $this->kendaraanService->getAllDataMerkKendaraan();

        return view("admin.kendaraan.lihat", [
            "title" => "Kendaraan",
            "action" => "kendaraan",
            "kendaraans" => $kendaraans,
            "merkKendaraans" => $merkKendaraans->get(),
        ]);
    }

    /**
     * Kendaraan
     * Create
     */
    public function createKendaraan(RequestKendaraan $request)
    {
        $validation = $request->validated();

        $validation["k_slug"] = Str::slug($validation["k_plat"]);
        try {
            $this->kendaraanService->storeKendaraan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Kendaraan
     * Show
     */
    public function showKendaraan($id)
    {
        try {
            $kendaraan = $this->kendaraanService->getDataKendaraanById($id);
            $merkKendaraan = $this->kendaraanService->getAllDataMerkKendaraan();
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.kendaraan.edit", [
            "title" => "Kendaraan",
            "action" => "kendaraan",
            "kendaraan" => $kendaraan,
            "merkKendaraans" => $merkKendaraan->get(),
        ]);
    }

    /**
     * Merk Kendaraan
     * Update
     */
    public function updateKendaraan(RequestKendaraanUpdate $request, $id)
    {
        $validation = $request->validated();

        $validation['k_slug'] = Str::slug($validation["k_plat"]);

        try {
            $this->kendaraanService->updateKendaraan($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Kendaraan");
    }

    /**
     * Merk Kendaraan
     * Destroy
     */
    public function destroyKendaraan($id)
    {
        $kendaraan = $this->kendaraanService->getDataKendaraanById($id);

        try {
            $this->kendaraanService->destroyKendaraan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $kendaraan['k_plat']);
    }
}
