<?php

namespace App\Services\Transaksi;

interface TransaksiService
{
    /**
     * Get All Transaksi Kendaraan
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiKendaraan();

    /**
     * Get All Transaksi Layanan
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiLayanan();

    /**
     * Get All Transaksi Gedung Lapangan
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiGedungLap();

    /**
     * Get All Transaksi Asrama
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiAsrama();

    /**
     * Get All Transaksi Asrama with asrama
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiAsramaAndUser();

    /**
     * Get All Transaksi Alat Barang
     * @return object
     * @throws InvalidArgumentException
     */
    public function getAllTransaksiAlatBarang();

    /**
     * Get Data By Id Transaksi Kendaraan
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiKendaraan($id);

    /**
     * Get Data By Id Transaksi Layanan
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiLayanan($id);

    /**
     * Get Data By Id Transaksi Gedung Lapangan
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiGedungLap($id);

    /**
     * Get Data By Id Transaksi Alat Barang
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiAlatBarang($id);

    /**
     * Get Data By Id Transaksi Asrama
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException
     */
    public function getDataByIdTransaksiAsrama($id);

    /**
     * Search Transaksi Kendaraan
     * @param string $search
     * @return object
     * @throws InvalidArgumentException
     */
    public function searchTransaksiKendaraan($search);

    /**
     * Search Transaksi Kendaraan
     * @param string $search
     * @return object
     * @throws InvalidArgumentException
     */
    public function searchTransaksiAsrama($search);

    /**
     * Search Transaksi Alat Barang
     * @param string $search
     * @return object
     * @throws InvalidArgumentException
     */
    public function searchTransaksiAlatBarang($search);

    /**
     * Search Transaksi Alat Barang
     * @param string $search
     * @return array
     * @throws InvalidArgumentException
     */
    public function searchTransaksiGedungLap($search);

    /**
     * Search Transaksi Alat Barang
     * @param string $search
     * @return array
     * @throws InvalidArgumentException
     */
    public function searchTransaksiLayanan($search);
}
