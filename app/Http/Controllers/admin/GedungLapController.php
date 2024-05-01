<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\GedungLap\GedungLapService;
use App\Http\Requests\gedungLap\RequestGedungLap;
use App\Http\Requests\gedungLap\propertyGedungLap\RequestPropertyGedungLap;

class GedungLapController extends Controller
{
    private $gedungLapService;

    public function __construct(GedungLapService $gedungLapService)
    {
        $this->gedungLapService = $gedungLapService;
    }

    /**
     * Gedung & Lapangan
     * Index
     */
    public function indexGedungLap()
    {
        $gedungLaps = $this->gedungLapService->getAllGedungLap(); // Dapatkan semua data gedung Lapangan

        return view("admin.gedungLap.lihat", [
            "title" => "Gedung & Lapangan",
            "action" => "gedunglap",
            "gedungLaps" => $gedungLaps,
        ]);
    }

    /**
     * Gedung & Lapangan
     * Create
     */
    public function createGedungLap(
        RequestGedungLap $request // Request yang sudah ter-validasi
    ) {
        $validation = $request->validated(); // Inisiasi request yang sudah ter-validasi

        if ($request->hasFile('gl_foto')) // Periksa Apakah request gl_foto ada isinya
        {
            $file_gedung_lap = $request->file('gl_foto'); // Inisiasi Request File
            $foto_gedung_lap = $file_gedung_lap->hashName(); // Rename request file

            $foto_gedung_lap_path = $file_gedung_lap->storeAs("/gedungLap", $foto_gedung_lap); // Menentukan Path file
            $foto_gedung_lap_path = Storage::disk("public")->put("/gedungLap", $file_gedung_lap); // Menyimpan file

            $validation['gl_foto'] = $foto_gedung_lap_path; // Modifikasi Request menjadi path file
        }

        $validation['gl_slug'] = Str::slug($validation["gl_nama"]); // Menambahkan slug

        $this->gedungLapService->storeGedungLap($validation); // Create Gedung lapangan

        return back()->with("successForm", "Berhasil Menambahkan Gedung & Lapangan");
    }

    /**
     * Gedung & Lapangan
     * Store
     */
    public function storeGedungLap($id)
    {
        try {
            $gedungLap = $this->gedungLapService->getDataGedungLapById($id); // Mendapatkan data gedung lapangan by id
        } catch (\Exception $th) {
            abort(404);
        }

        return view("admin.gedungLap.detail", [
            "title" => "Gedung Lapangan",
            "action" => "gedunglap",
            "gedungLap" => $gedungLap,
        ]);
    }

    /**
     * Gedung & Lapangan
     * Show
     */
    public function showGedungLap($id)
    {
        try {
            $gedungLap = $this->gedungLapService->getDataGedungLapById($id); // Mendapatkan data gedung lapangan by id
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.gedungLap.edit", [
            "title" => "Gedung Lapangan",
            "action" => "gedunglap",
            "gedungLap" => $gedungLap,
        ]);
    }

    /**
     * Gedung Lapangan
     * Update
     */
    public function updateGedungLap(
        RequestGedungLap $request, // Request yang sudah ter-validasi
        $id // Id Gedung Lapangan
    ) {
        $validation = $request->validated(); // Inisiasi Request yang sudah ter-validasi

        $gedungLapOld = $this->gedungLapService->getDataGedungLapById($id);

        if ($request->hasFile('gl_foto')) // Memeriksa keberadaan request file
        {
            if (Storage::disk('public')->exists($gedungLapOld['gl_foto'])) // Memeriksa keberadaan file lama
            {
                Storage::disk('public')->delete($gedungLapOld['gl_foto']); // Menghapus file lama
            }

            $file_gedung_lap = $request->file('gl_foto'); // Inisiasi request file
            $foto_gedung_lap = $file_gedung_lap->hashName(); // Rename File

            $foto_gedung_lap_path = $file_gedung_lap->storeAs("/gedungLap", $foto_gedung_lap); // Menentukan path file
            $foto_gedung_lap_path = Storage::disk("public")->put("/gedungLap", $file_gedung_lap); // Menyimpan file
            $validation['gl_foto'] = $foto_gedung_lap_path; // memodifikasi file menjadi path file
        }

        $validation['gl_slug'] = Str::slug($validation["gl_nama"]); // Menambahkan slug

        // try {
        $this->gedungLapService->updateGedungLap($validation, $id); // Update Gedung Lapangan
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return back()->with("successForm", "Berhasil Mengubah Gedung Lapangan");
    }

    /**
     * Gedung Lapangan
     * Destroy
     */
    public function destroyGedungLap($id)
    {
        $gedungLap = $this->gedungLapService->getDataGedungLapById($id); // Mendapatkan data Gedung Lapangan By Id Gedung Lapangan

        try {
            Storage::disk("public")->delete($gedungLap['gl_foto']); // Hapus File Lama
            $this->gedungLapService->destroyGedungLap($id); // Hapus data
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $gedungLap['gl_nama']);
    }

    /**
     * Property Gedung Lapangan
     * Index
     */
    public function indexPropertyGedungLap()
    {
        try {
            $propertyGedungLaps = $this->gedungLapService->getAllPropertyGedung();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.gedungLap.propertyGedungLap.lihat", [
            "title" => "Properti Gedung Lapangan",
            "action" => "gedunglap",
            "propertyGedungLaps" => $propertyGedungLaps,
        ]);
    }

    /**
     * Property Gedung Lapangan
     * Create
     */
    public function createPropertyGedungLap(RequestPropertyGedungLap $request)
    {
        $validation = $request->validated();

        try {
            $this->gedungLapService->storePropertyGedung($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Property Gedung Lapangan");
    }

    // /**
    //  * Kendaraan
    //  * Show
    //  */
    // public function showKendaraan($id)
    // {
    //     try {
    //         $kendaraan = $this->kendaraanService->getDataKendaraanById($id);
    //         $merkKendaraan = $this->kendaraanService->getAllDataMerkKendaraan();
    //     } catch (\Exception $th) {
    //         return abort(404);
    //     }

    //     return view("admin.kendaraan.edit", [
    //         "title" => "Kendaraan",
    //         "action" => "kendaraan",
    //         "kendaraan" => $kendaraan,
    //         "merkKendaraans" => $merkKendaraan,
    //     ]);
    // }

    // /**
    //  * Merk Kendaraan
    //  * Update
    //  */
    // public function updateKendaraan(RequestKendaraanUpdate $request, $id)
    // {
    //     $validation = $request->validated();

    //     $validation['k_slug'] = Str::slug($validation["k_plat"]);

    //     try {
    //         $this->kendaraanService->updateKendaraan($validation, $id);
    //     } catch (\Exception $th) {
    //         throw new InvalidArgumentException();
    //     }

    //     return back()->with("successForm", "Berhasil Menambahkan Kendaraan");
    // }

    /**
     * Property Gedung Lapangan
     * Destroy
     */
    public function destroyPropertyGedungLap($id)
    {
        $gedungLap = $this->gedungLapService->getDataPropertyGedungById($id);

        try {
            $this->gedungLapService->destroyPropertyGedung($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $gedungLap['pg_nama']);
    }
}
