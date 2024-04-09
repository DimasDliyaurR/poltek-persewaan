<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Services\Layanan\LayananService;
use App\Http\Requests\layanan\RequestLayanan;
use App\Http\Requests\layanan\TimLayanan\RequestTimLayanan;
use App\Http\Requests\layanan\DetailVideoLayanan\RequestVideoLayanan;
use App\Http\Requests\layanan\DetailFotoLayanan\RequestDetailFotoLayanan;

class LayananController extends Controller
{
    private $layananService;

    public function __construct(LayananService $layananService)
    {
        $this->layananService = $layananService;
    }

    /**
     * Layanan
     * Index
     */
    public function indexLayanan()
    {
        $layanans = $this->layananService->getAllLayanan();

        return view("admin.layanan.lihat", [
            "title" => "Layanan",
            "action" => "layanan",
            "layanans" => $layanans,
        ]);
    }

    /**
     * Layanan
     * Create
     */
    public function createLayanan(RequestLayanan $request)
    {
        $validation = $request->validated();

        if ($request->hasFile('l_foto')) {
            $file_layanan = $request->file('l_foto');
            $foto_layanan = $file_layanan->hashName();

            $foto_layanan_path = $file_layanan->storeAs("/layanan", $foto_layanan);
            $foto_layanan_path = Storage::disk("public")->put("/layanan", $file_layanan);
            $validation['l_foto'] = $foto_layanan_path;
        }

        $validation['l_personil'] = $request->input('l_personil') == "on" ? true : false;
        $validation['l_slug'] = Str::slug($validation["l_nama"]);

        try {
            $this->layananService->storeLayanan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Layanan
     * Store
     */
    public function storeLayanan($id)
    {
        try {
            $layanan = $this->layananService->getDataLayananById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.layanan.detail", [
            "title" => "Detail Layanan",
            "action" => "layanan",
            "layanan" => $layanan,
        ]);
    }

    /**
     * Layanan
     * Show
     */
    public function showLayanan($id)
    {
        try {
            $layanan = $this->layananService->getDatalayananById($id);
        } catch (\Exception $th) {
            return abort(404);
        }

        return view("admin.layanan.edit", [
            "title" => "Update Layanan",
            "action" => "layanan",
            "layanan" => $layanan,
        ]);
    }

    /**
     * Layanan
     * Update
     */
    public function updateLayanan(RequestLayanan $request, $id)
    {
        $validation = $request->validated();

        $layananOld = $this->layananService->getDataLayananById($id);

        if ($request->hasFile('l_foto')) {
            if (Storage::disk('public')->exists($layananOld['l_foto'])) {
                Storage::disk('public')->delete($layananOld['l_foto']);
            }
            $file_layanan = $request->file('l_foto');
            $foto_layanan = $file_layanan->hashName();

            $foto_layanan_path = $file_layanan->storeAs("/file", $foto_layanan);
            $foto_layanan_path = Storage::disk("public")->put("/file", $file_layanan);
            $validation['l_foto'] = $foto_layanan_path;
        }

        $validation['l_personil'] = $request->input('l_personil') == "on" ? true : false;
        $validation['l_slug'] = Str::slug($validation["l_nama"]);

        try {
            $this->layananService->updatelayanan($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Layanan
     * Destroy
     */
    public function destroyLayanan($id)
    {
        $layanan = $this->layananService->getDataLayananById($id);

        try {
            Storage::disk("public")->delete($layanan['l_foto']);
            $this->layananService->destroyLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $layanan['l_nama']);
    }

    /**
     * Tim Layanan
     * Index
     */
    public function indexTimLayanan($id)
    {
        try {
            $timLayanans = $this->layananService->getAllTimLayananByLayananId($id);
            $layanan = $this->layananService->getDataLayananById($id);

            if (!$layanan->l_personil) return redirect("admin/layanans")->with("errorTable", "Ups data tidak ditemukan nih");
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.layanan.timLayanan.lihat", [
            "title" => "Tim Layanan",
            "action" => "layanan",
            "timLayanans" => $timLayanans,
            "layanan" => $layanan,
        ]);
    }

    /**
     * Tim Layanan
     * Create
     */
    public function createTimLayanan(RequestTimLayanan $request, $id)
    {
        $validation = $request->validated();

        $validation["tl_slug"] = Str::slug($validation["tl_nama"]);
        $validation["layanan_id"] = $id;

        try {
            $this->layananService->storeTimLayanan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Tim Layanan " . $validation["tl_nama"]);
    }

    /**
     * Tim Layanan
     * Update
     */
    public function updateTimLayanan(RequestTimLayanan $request, $id)
    {
        $timLayanan = $this->layananService->getDataTimLayananById($id);

        $validation = $request->validated();
        $validation['tl_slug'] = Str::slug($validation["tl_nama"]);

        try {
            $this->layananService->updateTimLayanan($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Mengubah " . $timLayanan['tl_nama'] . " Menjadi " . $validation['tl_nama']);
    }

    /**
     * Tim Layanan
     * Destroy
     */
    public function destroyTimLayanan($id)
    {
        $timLayanan = $this->layananService->getDataTimLayananById($id);

        try {
            $this->layananService->destroyTimLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $timLayanan['tl_nama']);
    }

    /**
     * Video Layanan
     * Index
     */
    public function indexVideoLayanan($id)
    {
        try {
            $videoLayanans = $this->layananService->getDataVideoLayananByLayananId($id);
            $layanan = $this->layananService->getDataLayananById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.layanan.videoLayanan.lihat", [
            "title" => "Video Layanan",
            "action" => "layanan",
            "videoLayanans" => $videoLayanans,
            "layanan" => $layanan,
        ]);
    }

    /**
     * Video Layanan
     * Create
     */
    public function createVideoLayanan(RequestVideoLayanan $request, $id)
    {
        $validation = $request->validated();
        $validation["layanan_id"] = $id;

        dd($request->all());

        if ($request->hasFile("vl_link")) {
            $file_video = $request->file("vl_link");
        }

        try {
            $this->layananService->storeVideoLayanan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Video Layanan");
    }

    /**
     * Video Layanan
     * Update
     */
    public function updateVideoLayanan(RequestVideoLayanan $request, $id)
    {
        $videoLayanan = $this->layananService->getDataVideoLayananById($id);

        $validation = $request->validated();

        try {
            $this->layananService->updateVideoLayanan($validation, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Mengubah Video Layanan");
    }

    /**
     * Video Layanan
     * Destroy
     */
    public function destroyVideoLayanan($id)
    {
        $timLayanan = $this->layananService->getDataVideoLayananById($id);

        try {
            $this->layananService->destroyVideoLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus Video Layanan");
    }

    /**
     * Detail Foto Layanan
     * Index
     */
    public function indexDetailFotoLayanan($id)
    {
        try {
            $detailFotoLayanans = $this->layananService->getDataDetailFotoLayananByLayananId($id);
            $layanan = $this->layananService->getDataLayananById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.layanan.detailFotoLayanan.lihat", [
            "title" => "Detail Foto Layanan",
            "action" => "layanan",
            "detailFotoLayanans" => $detailFotoLayanans,
            "layanan" => $layanan,
        ]);
    }

    /**
     * Detail Foto Layanan
     * Create
     */
    public function createDetailFotoLayanan(RequestDetailFotoLayanan $request, $id)
    {
        $validation = $request->validated();
        $validation["layanan_id"] = $id;

        if ($request->hasFile("dfl_foto")) {

            $file_detail_layanan = $request->file("dfl_foto");
            $foto_detail_layanan = $file_detail_layanan->hashName();
            $foto_detail_layanan_path = Storage::disk("public")->put("layanan/detailFoto", $file_detail_layanan);

            $validation["dfl_foto"] = $foto_detail_layanan_path;
        }

        try {
            $this->layananService->storeDetailFotoLayanan($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Menambahkan Detail Foto Layanan");
    }

    /**
     * Detail Foto Layanan
     * Destroy
     */
    public function destroyDetailFotoLayanan($id)
    {
        $timLayanan = $this->layananService->getDataDetailFotoLayananById($id);

        try {
            $this->layananService->destroyDetailFotoLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus Detail Foto Layanan");
    }
}
