<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RequestMerkKendaraan;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Requests\kendaraan\RequestKendaraan;

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

        $validation["tarif_dp"] = $request->tarif_dp ?? 0;

        if ($request->hasFile('mk_foto')) {
            $file_merk_kendaraan = $request->file('mk_foto');
            $foto_kendaraan = $file_merk_kendaraan->hashName();

            $foto_kendaraan_path = $file_merk_kendaraan->storeAs("/file", $foto_kendaraan);
            $foto_kendaraan_path = Storage::disk("public")->put("/file", $file_merk_kendaraan);
            $validation['mk_foto'] = $foto_kendaraan_path;
        }

        $validation['mk_slug'] = Str::slug($validation["mk_merk"]);

        try {
            DB::transaction(function () use ($validation) {
                $merkKendaraan = $this->kendaraanService->storeMerkKendaraan(Arr::except($validation, ["is_dp", "tarif_dp"]));
                $validation['merk_kendaraan_id'] = $merkKendaraan->id;

                $this->kendaraanService->storePaymentMethod(Arr::only($validation, ["is_dp", "tarif_dp", "merk_kendaraan_id"]));
            });
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
            DB::transaction(function () use ($validation, $id) {
                $merkKendaraan = $this->kendaraanService->updateMerkKendaraan(Arr::except($validation, ["is_dp", "tarif_dp"]), $id);

                $this->kendaraanService->updatePaymentMethod(Arr::only($validation, ["is_dp", "tarif_dp"]), $id);
            });
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

        // dd($merkKendaraan);

        try {
            if ($merkKendaraan) {
                DB::transaction(function () use ($id, $merkKendaraan) {
                    $this->kendaraanService->destroyMerkKendaraan($id);
                    Storage::disk("public")->delete($merkKendaraan['mk_foto']);
                });
            } else {
                return back()->with("errorTable", "Ups ada yang salah ni!");
            }
        } catch (\Exception $th) {
            return back()->with("errorTable", "Ups ada yang salah ni!");
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
    public function updateKendaraan(RequestKendaraan $request, $id)
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
     * Kendaraan
     * Update Status
     */
    public function updateStatusKendaraan($id)
    {
        try {
            $this->kendaraanService->updateKendaraan([
                "k_status" => "tersedia"
            ], $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil mengubah status kendaraan");
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

    public function listEventTransportasi(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiKendaraan::where('tk_pelaksanaan', '>=', $start)
            ->where('tk_tanggal_kembali', '<=', $end)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'title' => $item->tk_title,
                'start' => $item->tk_pelaksanaan,
                'end' => $item->tk_tanggal_kembali
            ]);
        return response()->json($events);
    }
    public function kalender()
    {
        return view('transportasi.kalender', [
            "title" => "Kalender Transportasi"
        ]);
    }
}
