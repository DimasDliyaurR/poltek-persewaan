<?php

namespace App\Services\Transaksi;

use InvalidArgumentException;
use App\Services\Transaksi\TransaksiService;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepository;
use App\Repositories\GedungLap\TransaksiGedung\TransaksiGedungRepository;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepository;
use App\Repositories\Kendaraan\TransaksiKendaraan\TransaksiKendaraanRepository;
use App\Repositories\AlatBarang\TransaksiAlatBarang\TransaksiAlatBarangRepository;

class TransaksiServiceImplement implements TransaksiService
{
    private $transaksiKendaraanRepository;
    private $transaksiLayananRepository;
    private $transaksiGedungLapRepository;
    private $transaksiAsramaRepository;
    private $transaksiAlatBarangRepository;

    public function __construct(
        TransaksiKendaraanRepository $transaksiKendaraanRepository,
        TransaksiLayananRepository $transaksiLayananRepository,
        TransaksiGedungRepository $transaksiGedungLapRepository,
        TransaksiAsramaRepository $transaksiAsramaRepository,
        TransaksiAlatBarangRepository $transaksiAlatBarangRepository
    ) {
        $this->transaksiKendaraanRepository = $transaksiKendaraanRepository;
        $this->transaksiLayananRepository = $transaksiLayananRepository;
        $this->transaksiGedungLapRepository = $transaksiGedungLapRepository;
        $this->transaksiAsramaRepository = $transaksiAsramaRepository;
        $this->transaksiAlatBarangRepository = $transaksiAlatBarangRepository;
    }

    /**
     * Get All Transaksi Kendaraan
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiKendaraan()
    {
        try {
            $data = $this->transaksiKendaraanRepository->getAllWithDetailTransaksiKendaraan();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Transaksi Layanan
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiLayanan()
    {
        try {
            $data = $this->transaksiLayananRepository->getAllWithDetailTransaksi();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Transaksi Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiGedungLap()
    {
        try {
            $data = $this->transaksiGedungLapRepository->getAllWithDetailTransaksiAndDetailProperty();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Transaksi Asrama
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiAsrama()
    {
        try {
            $data = $this->transaksiAsramaRepository->getAllWithDetailTransaksiAsrama();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get All Transaksi Alat Barang
     * @return array
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiAlatBarang()
    {
        try {
            $data = $this->transaksiAlatBarangRepository->getAllWithDetailTransaksiAlatBarang();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data By Id Transaksi Kendaraan
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiKendaraan($id)
    {
        try {
            $data = $this->transaksiKendaraanRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data By Id Transaksi Layanan
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiLayanan($id)
    {
        try {
            $data = $this->transaksiLayananRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data By Id Transaksi Gedung Lapangan
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiGedungLap($id)
    {
        try {
            $data = $this->transaksiGedungLapRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data By Id Transaksi Alat Barang
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiAlatBarang($id)
    {
        try {
            $data = $this->transaksiAlatBarangRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Get Data By Id Transaksi Asrama
     * @param integer $id
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiAsrama($id)
    {
        try {
            $data = $this->transaksiAsramaRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Search Transaksi Kendaraan
     * @param string $search
     * @return array
     * @throws InvalidArgumentException
     */
    public function searchTransaksiKendaraan($search)
    {
        try {
            $data = $this->transaksiKendaraanRepository->search($search);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Search Transaksi Asrama
     * @param string $search
     * @return array
     * @throws InvalidArgumentException
     */
    public function searchTransaksiAsrama($search)
    {
        try {
            $data = $this->transaksiAsramaRepository->search($search);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }

    /**
     * Search Transaksi Alat Barang
     * @param string $search
     * @return array
     * @throws InvalidArgumentException
     */
    public function searchTransaksiAlatBarang($search)
    {
        try {
            $data = $this->transaksiAlatBarangRepository->search($search);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
        return $data;
    }
}
