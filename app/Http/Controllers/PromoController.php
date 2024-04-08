<?php

namespace App\Http\Controllers;

use App\Http\Requests\Promo\RequestPromo;
use App\Models\Promo;
use App\Services\Promo\PromoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    private $promoService;

    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }

    /**
     * Index Promo
     */
    public function indexPromo()
    {
        $promos = $this->promoService->getAllPromo();

        return view("admin.promo.lihat", [
            "title" => "Promo",
            "action" => "promo",
            "promos" => $promos->paginate(5),
        ]);
    }

    /**
     * Create Promo
     */
    public function createPromo(RequestPromo $request)
    {
        $validation  = $request->validated();

        if ($request->hasFile("p_foto")) {
            $file_promo = $request->file("p_foto");

            $foto_promo = $file_promo->hashName();

            $foto_promo_path = $file_promo->storeAs("/promo", $foto_promo);
            $foto_promo_path = Storage::disk("public")->put("/promo", $file_promo);
            $validation["p_foto"] = $foto_promo_path;
        }

        $promo = $this->promoService->createPromo($validation);


        return back()->with("success", "Berhasil menambahkan " . $validation['p_judul']);
    }

    /**
     * Show Promo
     */
    public function showPromo($id)
    {
        $promo = $this->promoService->getDataPromoById($id);

        $promo["p_mulai"] = date("Y-m-d", strtotime($promo["p_mulai"]));
        $promo["p_kadaluarsa"] = date("Y-m-d", strtotime($promo["p_kadaluarsa"]));

        return view("admin.promo.edit", [
            "title" => "Promo",
            "action" => "promo",
            "promo" => $promo,
        ]);
    }

    /**
     * Store Promo
     */
    public function storePromo($id)
    {
        $promo = $this->promoService->getDataPromoById($id);

        return view("admin.promo.detail", [
            "title" => "Promo",
            "action" => "promo",
            "promo" => $promo,
        ]);
    }

    /**
     * Update Promo
     */
    public function updatePromo(RequestPromo $request, $id)
    {
        $validation = $request->validated(); // Data yang sudah ter-validasi
        $promo = $this->promoService->getDataPromoById($id); // Get Old Data

        if ($request->hasFile("p_foto")) {

            // Check Existed File
            if (Storage::disk("public")->exists($promo["p_foto"])) {
                // Delete File
                Storage::disk("public")->delete($promo["p_foto"]);
            }

            // Inisialisasi Request Input file
            $file_promo = $request->file("p_foto");

            // Rename Foto
            $foto_promo = $file_promo->hashName();

            // Tambahkan File
            $foto_promo_path = Storage::disk("public")->put("/promo", $file_promo);

            // Ubah Isi dari request foto di validation
            $validation["p_promo"] == $foto_promo_path;
        }

        // Update
        $this->promoService->updatePromo($validation, $id);

        return back()->with("successForm", "Berhasil Mengubah " . $promo["p_judul"]);
    }

    /**
     * Destroy Promo
     */
    public function destroyPromo($id)
    {
        $promo = $this->promoService->getDataPromoById($id); // Get Old Data

        // Check File Existed
        if (Storage::disk("public")->exists($promo["p_foto"])) {
            // Delete File
            Storage::disk("public")->delete($promo["p_foto"]);
        }

        $this->promoService->destroyPromo($promo['id']);

        return back()->with("success", "Berhasil Menghapus");
    }

    public function getCountdown($id)
    {
        $promo = Promo::whereId($id)->get()
            ->map(fn ($q) => [
                "mulai" => $q->p_mulai,
                "akhir" => $q->p_kadaluarsa,
            ]);

        return response()->json($promo);
    }
}
