<?php

namespace App\Http\Controllers;

use App\Services\Transaksi\TransaksiService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class TransaksiController extends Controller
{
    private $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }

    public function indexTransaksiKendaraan()
    {
        try {
            $transaksiKendaraan = $this->transaksiService->getAllTransaksiKendaraan();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.kendaraan.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiKendaraan" => $transaksiKendaraan->paginate(5),
        ]);
    }

    public function indexTransaksiLayanan()
    {
        try {
            $transaksiLayanan = $this->transaksiService->getAllTransaksiLayanan();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.layanan.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiLayanan" => $transaksiLayanan->paginate(5),
        ]);
    }

    public function indexTransaksiGedungLap()
    {
        try {
            $transaksiGedungLap = $this->transaksiService->getAllTransaksiGedungLap();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.gedungLap.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiGedungLap" => $transaksiGedungLap->paginate(5),
        ]);
    }

    public function indexTransaksiAsrama()
    {
        try {
            $transaksiAsrama = $this->transaksiService->getAllTransaksiAsrama();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.asrama.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiAsrama" => $transaksiAsrama->paginate(5),
        ]);
    }

    public function indexTransaksiAlatBarang()
    {
        try {
            $transaksiAlatBarang = $this->transaksiService->getAllTransaksiAlatBarang();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.alatBarang.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiAlatBarang" => $transaksiAlatBarang->paginate(5),
        ]);
    }

    public function showTransaksiKendaraan($id)
    {
        try {
            $transaksiKendaraan = $this->transaksiService->getDataByIdTransaksiKendaraan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.kendaraan.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiKendaraan" => $transaksiKendaraan,
        ]);
    }

    public function showTransaksiLayanan($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.layanan.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }

    public function showTransaksiGedungLap($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiGedungLap($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.gedungLap.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }

    public function showTransaksiAsrama($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.asrama.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }

    public function showTransaksiAlatBarang($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiAlatBarang($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.transaksi.alatBarang.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "transaksi",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }
}
