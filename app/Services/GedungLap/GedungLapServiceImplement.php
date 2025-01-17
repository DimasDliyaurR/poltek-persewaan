<?php

namespace App\Services\GedungLap;

use App\Repositories\GedungLap\DetailFotoGedungLap\DetailFotoGedungLapRepository;
use App\Repositories\GedungLap\DetailJadwalGedung\DetailJadwalGedungRepository;
use App\Services\GedungLap\GedungLapService;
use App\Repositories\GedungLap\GedungLapRepository;
use App\Repositories\GedungLap\JadwalGedung\JadwalGedungRepository;
use App\Repositories\GedungLap\PaymentMethod\GedungLapPaymentMethodRepository;
use App\Repositories\GedungLap\PropertyGedung\PropertyGedungRepository;
use InvalidArgumentException;

class GedungLapServiceImplement implements GedungLapService
{
    private $gedungLapRepository;
    private $propertyGedungRepository;
    private $detailFotoGedungLapRepository;
    private $paymentMethodRepository;
    private $jadwalGedungRepository;
    private $detailJadwalGedungRepository;

    public function __construct(
        GedungLapRepository $gedungLapRepository,
        PropertyGedungRepository $propertyGedungRepository,
        DetailFotoGedungLapRepository $detailFotoGedungLapRepository,
        GedungLapPaymentMethodRepository $paymentMethodRepository,
        JadwalGedungRepository $jadwalGedungRepository,
        DetailJadwalGedungRepository $detailJadwalGedungRepository,
    ) {
        $this->gedungLapRepository = $gedungLapRepository;
        $this->propertyGedungRepository = $propertyGedungRepository;
        $this->detailFotoGedungLapRepository = $detailFotoGedungLapRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
        $this->jadwalGedungRepository = $jadwalGedungRepository;
        $this->detailJadwalGedungRepository = $detailJadwalGedungRepository;
    }

    /**
     * Get Data Detail Foto Gedung Lapangan By Id
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoGedungLapById($id)
    {
        try {
            $data = $this->detailFotoGedungLapRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Foto Gedung Lapangan By Gedung Lap Id
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoGedungLapByGedungLapId($id)
    {
        try {
            $data = $this->detailFotoGedungLapRepository->getDataByGedungLapId($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Gedung Lapangan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataGedungLapById($id)
    {
        try {
            $data = $this->gedungLapRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Jadwal Gedung Lapangan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataJadwalGedungLapById($id)
    {
        try {
            $data = $this->jadwalGedungRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Detail Jadwal Gedung Lapangan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailJadwalGedungLapById($id)
    {
        try {
            $data = $this->detailJadwalGedungRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get Data Property Gedung By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataPropertyGedungById($id)
    {
        try {
            $data = $this->propertyGedungRepository->getDataById($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailFotoGedungLap()
    {
        try {
            $data = $this->detailFotoGedungLapRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllGedungLap()
    {
        try {
            $data = $this->gedungLapRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Jadwal Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllJadwalGedungLap()
    {
        try {
            $data = $this->jadwalGedungRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Detail Jadwal Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailJadwalGedungLap()
    {
        try {
            $data = $this->detailJadwalGedungRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Get All data Property Gedung
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllPropertyGedung()
    {
        try {
            $data = $this->propertyGedungRepository->getAll();
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data)
    {
        try {
            $data = $this->paymentMethodRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Detail Foto Gedung Lapangan
     * @param array $data
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailFotoGedungLap($data)
    {
        try {
            $data = $this->detailFotoGedungLapRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeGedungLap($data)
    {
        try {
            $data = $this->gedungLapRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Jadwal Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeJadwalGedungLap($data)
    {
        try {
            $data = $this->jadwalGedungRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Detail Jadwal Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailJadwalGedungLap($data)
    {
        try {
            $data = $this->detailJadwalGedungRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePropertyGedung($data)
    {
        try {
            $data = $this->propertyGedungRepository->store($data);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Alat Barang
     * @param array $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePaymentMethod($data, $id)
    {
        try {
            $data = $this->paymentMethodRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     */
    public function updateDetailFotoGedungLap($data, $id)
    {
        $data = $this->detailFotoGedungLapRepository->update($data, $id);

        return $data;
    }

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     */
    public function updateGedungLap($data, $id)
    {
        try {
            $data = $this->gedungLapRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Jadwal Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     */
    public function updateJadwalGedungLap($data, $id)
    {
        try {
            $data = $this->jadwalGedungRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Detail Jadwal Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     */
    public function updateDetailJadwalGedungLap($data, $id)
    {
        try {
            $data = $this->detailJadwalGedungRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePropertyGedung($data, $id)
    {
        try {
            $data = $this->propertyGedungRepository->update($data, $id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Detail Foto Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailFotoGedungLap($id)
    {
        try {
            $data = $this->detailFotoGedungLapRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyGedungLap($id)
    {
        try {
            $data = $this->gedungLapRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Jadwal Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyJadwalGedungLap($id)
    {
        try {
            $data = $this->jadwalGedungRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }

    /**
     * Delete Detail Jadwal Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailJadwalGedungLap($id)
    {
        // try {
        $data = $this->detailJadwalGedungRepository->delete($id);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

        return $data;
    }

    /**
     * Delete Property Gedung
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyPropertyGedung($id)
    {
        try {
            $data = $this->propertyGedungRepository->delete($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return $data;
    }
}
