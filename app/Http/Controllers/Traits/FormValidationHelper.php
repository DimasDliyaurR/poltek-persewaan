<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\DB;

trait FormValidationHelper
{
    /**
     * Helper perbandingan
     * @param int $a a
     * @param int $b b
     * @param int $c c
     * @return int
     */
    public function isBLargeThenAButCLess(int $a, int $b, int $c)
    {
        return ($this->isALargeAndEqualThenB($a, $b) && $this->isALargeAndEqualThenB($b, $c)) ? true : false;
    }

    /**
     * Helper Perbandingan
     * @param int $a a
     * @param int $b b
     * @return int
     */
    public function isALargeThenB($a, $b)
    {
        return ($a < $b);
    }

    /**
     * Helper Perbandingan
     * @param int $a a
     * @param int $b b
     * @return int
     */
    public function isALargeAndEqualThenB($a, $b)
    {
        return ($a <= $b);
    }

    /**
     * Validation Cek Jadwal
     * @param string $table Nama tabel
     * @param string $column_a Kolom a
     * @param string $column_b Kolom b
     * @param integer $target Hari data yang ingin di cek
     */
    public function checkSchedule($column_a, $column_b, $tanggal_awal, $tanggal_akhir)
    {
        $table = $this->modal::where("status", "belum bayar")->get();
        // dd($table);
        $table = array_map(function ($q) {
            return (array)$q;
        }, $table->toArray());

        foreach ($table as $value) {
            if ($this->isBLargeThenAButCLess(strtotime($value[$column_a]), $tanggal_awal, strtotime($value[$column_b])) || $this->isBLargeThenAButCLess(strtotime($value[$column_a]), $tanggal_akhir, strtotime($value[$column_b]))) {
                return true;
            }
        }

        return false;
    }

    public function checkCapacity(object $object)
    {
        $table = array_map(function ($q) {
            return (array)$q;
        }, $object->toArray());

        foreach ($table as $value) {
            if ($this->isALargeThenB(($value["count"] - 1), 0)) {
                return true;
            }
        }

        return false;
    }
}
