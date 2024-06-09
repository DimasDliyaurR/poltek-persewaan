<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\gedung_lap\RequestDetailJadwalGedungLap;
use Illuminate\Support\Facades\Storage;
use App\Services\GedungLap\GedungLapService;
use App\Http\Requests\gedungLap\RequestGedungLap;
use App\Http\Requests\gedungLap\propertyGedungLap\RequestPropertyGedungLap;
use App\Http\Requests\gedungLap\detailFotoGedungLap\RequestDetailFotoGedungLap;
use App\Http\Requests\gedungLap\RequestJadwalGedung;

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

        return view("admin.GedungLap.lihat", [
            "title" => "Gedung & Lapangan",
            "action" => "gedunglap",
            "gedungLaps" => $gedungLaps->paginate(5),
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

        $validation["tarif_dp"] = $request->tarif_dp ?? 0;

        if ($request->hasFile('gl_foto')) // Periksa Apakah request gl_foto ada isinya
        {
            $file_gedung_lap = $request->file('gl_foto'); // Inisiasi Request File
            $foto_gedung_lap = $file_gedung_lap->hashName(); // Rename request file

            $foto_gedung_lap_path = $file_gedung_lap->storeAs("/gedungLap", $foto_gedung_lap); // Menentukan Path file
            $foto_gedung_lap_path = Storage::disk("public")->put("/gedungLap", $file_gedung_lap); // Menyimpan file

            $validation['gl_foto'] = $foto_gedung_lap_path; // Modifikasi Request menjadi path file
        }

        $validation['gl_slug'] = Str::slug($validation["gl_nama"]); // Menambahkan slug

        DB::transaction(function () use ($validation) {
            $gedungLap = $this->gedungLapService->storeGedungLap($validation); // Create Gedung lapangan
            $validation["gedung_lap_id"] = $gedungLap->id;
            $this->gedungLapService->storePaymentMethod(Arr::only($validation, ["is_dp", "tarif_dp", "gedung_lap_id"]));
        });

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

        $gedungLapOld = $this->gedungLapService->getDataGedungLapById($id)->first();

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

        try {
            DB::transaction(function () use ($validation, $id) {
                $this->gedungLapService->updateGedungLap($validation, $id); // Update Gedung Lapangan
                $this->gedungLapService->updatePaymentMethod(Arr::only($validation, ["is_dp", "tarif_dp"]), $id); // Update Gedung Lapangan
            });
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

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
     * Jadwal Gedung & Lapangan
     * Index
     */
    public function indexJadwalGedungLap()
    {
        $jadwalGedungLaps = $this->gedungLapService->getAllJadwalGedungLap(); // Dapatkan semua data gedung Lapangan

        return view("admin.gedungLap.jadwalGedung.lihat", [
            "title" => "Jadwal Gedung & Lapangan",
            "action" => "gedunglap",
            "jadwalGedungLaps" => $jadwalGedungLaps->paginate(5),
        ]);
    }

    /**
     * Jadwal Gedung & Lapangan
     * Create
     */
    public function createJadwalGedungLap(
        RequestJadwalGedung $request // Request yang sudah ter-validasi
    ) {
        $validation = $request->validated(); // Inisiasi request yang sudah ter-validasi

        $gedungLap = $this->gedungLapService->storeJadwalGedungLap($validation); // Create Jadwal Gedung lapangan

        return back()->with("successForm", "Berhasil Menambahkan Jadwal");
    }

    /**
     * Gedung Lapangan
     * Destroy
     */
    public function destroyJadwalGedungLap($id)
    {
        $gedungLap = $this->gedungLapService->getDataJadwalGedungLapById($id); // Mendapatkan data Gedung Lapangan By Id Gedung Lapangan

        try {
            $this->gedungLapService->destroyJadwalGedungLap($id); // Hapus data
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus Jadwal");
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

    /**
     * Detail Foto Gedung & Lapangan
     * Index
     */
    public function indexDetailFotoGedungLap($id)
    {
        $gedungLaps = $this->gedungLapService->getDataGedungLapById($id);

        return view("admin.gedungLap.detailFotoGedungLap.lihat", [
            "title" => "Gedung & Lapangan",
            "action" => "gedunglap",
            "gedungLaps" => $gedungLaps,
        ]);
    }

    /**
     * Detail Foto Gedung & Lapangan
     * Create
     * @param \App\Http\Requests\gedungLap\detailFotoGedungLap\RequestDetailFotoGedungLap $request  Request yang sudah ter-validasi
     */
    public function createDetailFotoGedungLap(RequestDetailFotoGedungLap $request, $id)
    {
        $validation = $request->validated(); // Inisiasi request yang sudah ter-validasi

        $validation["gedung_lap_id"] = $id;

        if ($request->hasFile('dfgl_foto')) // Periksa Apakah request dfgl_foto ada isinya
        {
            $file_detail_foto_gedung_lap = $request->file('dfgl_foto'); // Inisiasi Request File
            $foto_detail_foto_gedung_lap = $file_detail_foto_gedung_lap->hashName(); // Rename request file

            $foto_detail_foto_gedung_lap_path = $file_detail_foto_gedung_lap->storeAs("/detailFotoGedungLap", $foto_detail_foto_gedung_lap); // Menentukan Path file
            $foto_detail_foto_gedung_lap_path = Storage::disk("public")->put("/detailFotoGedungLap", $file_detail_foto_gedung_lap); // Menyimpan file

            $validation['dfgl_foto'] = $foto_detail_foto_gedung_lap_path; // Modifikasi Request menjadi path file
        }

        $this->gedungLapService->storeDetailFotoGedungLap($validation); // Create Gedung lapangan

        return back()->with("successForm", "Berhasil Menambahkan Gedung & Lapangan");
    }

    /**
     * Gedung Lapangan
     * Destroy
     */
    public function destroyDetailFotoGedungLap($id)
    {
        $gedungLap = $this->gedungLapService->getDataDetailFotoGedungLapById($id)->first(); // Mendapatkan data Gedung Lapangan By Id Gedung Lapangan

        try {
            Storage::disk("public")->delete($gedungLap->dfgl_foto); // Hapus File Lama
            $this->gedungLapService->destroyDetailFotoGedungLap($id); // Hapus data
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus");
    }

    /**
     * Detail Foto Gedung & Lapangan
     * Index
     */
    public function indexDetailJadwalGedungLap($id)
    {
        $gedungLaps = $this->gedungLapService->getDataGedungLapById($id);
        $jadwalGedungLaps = $this->gedungLapService->getAllJadwalGedungLap();

        return view("admin.gedungLap.detailJadwalGedung.lihat", [
            "title" => "Detail Jadwal Gedung & Lapangan",
            "action" => "gedunglap",
            "gedungLaps" => $gedungLaps,
            "jadwalGedungLaps" => $jadwalGedungLaps->get(),
        ]);
    }

    /**
     * Detail Foto Gedung & Lapangan
     * Create
     * @param \App\Http\Requests\gedungLap\RequestDetailJadwalGedungLap $request  Request yang sudah ter-validasi
     */
    public function createDetailJadwalGedungLap(RequestDetailJadwalGedungLap $request, $id)
    {
        $validation = $request->validated(); // Inisiasi request yang sudah ter-validasi
        $validation["gedung_lap_id"] = $id;
        $this->gedungLapService->storeDetailJadwalGedungLap($validation); // Create Gedung lapangan

        return back()->with("successForm", "Berhasil Menambahkan Gedung & Lapangan");
    }

    /**
     * Gedung Lapangan
     * Destroy
     */
    public function destroyDetailJadwalGedungLap($id)
    {
        // try {
        $this->gedungLapService->destroyDetailJadwalGedungLap($id); // Hapus data
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return back()->with("successTable", "Berhasil Menghapus");
    }
}
