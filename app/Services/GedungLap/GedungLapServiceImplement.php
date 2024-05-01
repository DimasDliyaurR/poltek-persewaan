<?php

namespace App\Services\GedungLap;

use App\Services\GedungLap\GedungLapService;
use App\Repositories\GedungLap\GedungLapRepository;
use App\Repositories\GedungLap\PropertyGedung\PropertyGedungRepository;
use InvalidArgumentException;

class GedungLapServiceImplement implements GedungLapService
{
    private $gedungLapRepository;
    private $propertyGedungRepository;

    public function __construct(GedungLapRepository $gedungLapRepository, PropertyGedungRepository $propertyGedungRepository)
    {
        $this->gedungLapRepository = $gedungLapRepository;
        $this->propertyGedungRepository = $propertyGedungRepository;
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
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateGedungLap($data, $id)
    {
        // try {
        $data = $this->gedungLapRepository->update($data, $id);
        // } catch (\Exception $th) {
        //     throw new InvalidArgumentException();
        // }

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
