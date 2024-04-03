<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use App\Services\AlatBarang\AlatBarangService;
use App\Http\Requests\alatBarang\RequestAlatBarang;

class AlatBarangController extends Controller
{
    private $alatBarangService;

    public function __construct(AlatBarangService $alatBarangService)
    {
        $this->alatBarangService = $alatBarangService;
    }

    /**
     * Alat Barang
     * Index
     */
    public function indexAlatBarang()
    {
        $alatBarangs = $this->alatBarangService->getAllAlatBarang();

        return view("admin.alatBarang.lihat", [
            "title" => "Alat Barang",
            "action" => "alat barang",
            "alatBarangs" => $alatBarangs,
        ]);
    }

    /**
     * Alat Barang
     * Create
     * @param App\Http\Requests\alatBarang\RequestAlatBarang
     * 
     */
    public function createAlatBarang(
        RequestAlatBarang $request  // Parameter untuk Validation Alat Barang
    ) {
        $validation = $request->validated();

        if ($request->hasFile('a_foto')) {
            $file_alat_barang = $request->file('a_foto'); // Akses Input File
            $foto_alat_barang = $file_alat_barang->hashName(); // Rename File

            $foto_kendaraan_path = $file_alat_barang->storeAs("/alatBarang", $foto_alat_barang); // Menentukan path file 
            $foto_kendaraan_path = Storage::disk("public")->put("/alatBarang", $file_alat_barang); // Memindahkan ke lokal

            $validation['a_foto'] = $foto_kendaraan_path; // Memodifikasi a_foto menjadi path file
        }

        $validation['a_slug'] = Str::slug($validation["a_nama"]); // Menambahkan slug

        $this->alatBarangService->storeAlatBarang($validation); // Create alat Barang

        return back()->with("successForm", "Berhasil Menambahkan Merek Kendaraan");
    }

    /**
     * Alat Barang
     * Store
     */
    public function storeAlatBarang($id)
    {
        try // Mencoba Statement di bawah 
        {
            $AlatBarang = $this->alatBarangService->getDataAlatBarangById($id);
            $detailFotoAlatBarang = $this->alatBarangService->getDataFotoAlatBarangById($id);
        } catch (\Exception $th) // Jika statement di atas terdapat exception maka akan mengeksekusi statement di bawah 
        {
            abort(404);
        }

        return view("admin.AlatBarang.detail", [
            "title" => "Foto Alat Barang",
            "action" => "kendaraan",
            "AlatBarang" => $AlatBarang,
            "detailFotoAlatBarang" => $detailFotoAlatBarang,
        ]);
    }

    /**
     * Alat Barang
     * Show
     */
    public function showAlatBarang($id)
    {
        try // Mencoba Statement di bawah 
        {
            $alatBarang = $this->alatBarangService->getDataAlatBarangById($id);
        } catch (\Exception $th) // Jika statement di atas terdapat exception maka akan mengeksekusi statement di bawah 
        {
            abort(404);
        }

        return view("admin.AlatBarang.edit", [
            "title" => "Update Alat Barang",
            "action" => "alat barang",
            "alatBarang" => $alatBarang,
        ]);
    }

    /**
     * Alat Barang
     * Update
     * @param App\Http\Requests\alatBarang\RequestAlatBarang;
     * @throws InvalidArgumentException
     */
    public function updateAlatBarang(
        RequestAlatBarang $request, // Parameter untuk Validation Alat Barang
        $id // Parameter untuk mengambil ID
    ) {
        $validation = $request->validated(); // Semua input yang telah ter-validation

        $AlatBarangOld = $this->alatBarangService->getDataAlatBarangById($id);

        if ($request->hasFile('a_foto')) // Periksa Apakah form a_foto ada isinya
        {
            if (Storage::disk('public')->exists($AlatBarangOld['a_foto'])) // Periksa apakah sebelumnya ada gambarnya
            {
                Storage::disk('public')->delete($AlatBarangOld['a_foto']); // Menghapus gambar pada data sekarang
            }

            $file_alat_barang = $request->file('a_foto'); // Inisiasi isi input foto dari form
            $foto_alat_barang = $file_alat_barang->hashName(); // Rename foto menggunakan hash

            $foto_alat_barang_path = $file_alat_barang->storeAs("/alatBarang", $foto_alat_barang); // Menentukan path file
            $foto_alat_barang_path = Storage::disk("public")->put("/alatBarang", $file_alat_barang); // Menyimpan foto pada path file yang sudah ditentukan
            $validation['a_foto'] = $foto_alat_barang_path; // Memodifikasi input a_foto pada validation menjadi path file
        }

        $validation['a_slug'] = Str::slug($validation["a_nama"]); // Menambahkan slug


        try // Mencoba Statement di bawah 
        {
            $this->alatBarangService->updateAlatBarang($validation, $id); // Update alat Barang
        } catch (\Exception $th) // Jika statement di atas terdapat exception maka akan mengeksekusi statement di bawah 
        {
            throw new InvalidArgumentException();
        }

        return back()->with("successForm", "Berhasil Mengubah Alat Barang"); // Mengembalikan redirect kembali serta membuat session successForm
    }

    /**
     * Alat Barang
     * Destroy
     */
    public function destroyAlatBarang($id)
    {
        $AlatBarang = $this->alatBarangService->getDataAlatBarangById($id);


        try {
            Storage::disk("public")->delete($AlatBarang['a_foto']);
            $this->alatBarangService->destroyAlatBarang($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menghapus " . $AlatBarang['a_nama']);
    }

    /**
     * Detail Foto Alat Barang
     * Index
     */
    public function indexFotoAlatBarang($id)
    {
        $alatBarang = $this->alatBarangService->getDataAlatBarangById($id);
        $detailFotoAlatBarang = $this->alatBarangService->getDataFotoAlatBarangById($id);

        return view("admin.alatBarang.detailFotoAlatBarang.lihat", [
            "title" => "Alat Barang",
            "action" => "alat barang",
            "alatBarang" => $alatBarang,
            "detailFotoAlatBarang" => $detailFotoAlatBarang,
        ]);
    }

    /**
     * Detail Foto Alat Barang
     * Index
     */
    public function createFotoAlatBarang(Request $request, $id)
    {
        $validation = $request->validate([
            "fab_foto" => "required|image",
        ], [
            "fab_foto.required" => "Foto mohon diisi !",
            "fab_foto.image" => "Foto harus menggunakan gambar !",
        ]);

        if ($request->hasFile('fab_foto')) // Periksa Apakah form fab_foto ada isinya
        {

            $file_alat_barang = $request->file('fab_foto'); // Inisiasi isi input foto dari form
            $foto_alat_barang = $file_alat_barang->hashName(); // Rename foto menggunakan hash

            $foto_alat_barang_path = $file_alat_barang->storeAs("/detailFotoAlatBarang", $foto_alat_barang); // Menentukan path file
            $foto_alat_barang_path = Storage::disk("public")->put("/detailFotoAlatBarang", $file_alat_barang); // Menyimpan foto pada path file yang sudah ditentukan
            $validation['fab_foto'] = $foto_alat_barang_path; // Memodifikasi input a_foto pada validation menjadi path file
        }

        $validation["alat_barang_id"] = $id;

        $alatBarang = $this->alatBarangService->getDataAlatBarangById($id);
        $detailFotoAlatBarang = $this->alatBarangService->getDataFotoAlatBarangById($id);

        try {
            $this->alatBarangService->storeFotoAlatBarang($validation);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Menambahkan");
    }

    public function destroyFotoAlatBarang($id)
    {
        $detailFotoAlatBarang = $this->alatBarangService->getDataFotoAlatBarangById($id);


        try {
            if (Storage::disk('public')->exists($detailFotoAlatBarang['fab_foto'])) // Periksa apakah sebelumnya ada gambarnya
            {
                Storage::disk("public")->delete($detailFotoAlatBarang['fab_foto']); // Menghapus gambar pada data sekarang
            }

            $this->alatBarangService->destroyFotoAlatBarang($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return back()->with("successTable", "Berhasil Terhapus");
    }
}
