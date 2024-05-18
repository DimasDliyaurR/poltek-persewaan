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
        return ($this->isALargeThenB($a, $b) && $this->isALargeThenB($b, $c)) ? true : false;
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
     * Validation Apakah 
     * @param string $table Nama tabel
     * @param string $column_a Kolom a
     * @param string $column_b Kolom b
     * @param integer $target Hari data yang ingin di cek
     */
    public function checkSchedule($table, $column_a, $column_b, $target)
    {
        $table = DB::table($table)->where("status", "terbayar")->get();
        $table = array_map(function ($q) {
            return (array)$q;
        }, $table->toArray());
        try {
            foreach ($table as $value) {
                if ($this->isBLargeThenAButCLess(strtotime($value[$column_a]), $target, strtotime($value[$column_b]))) {
                    return true;
                }
            }
        } catch (\Exception $th) {
            return response()->json([
                "error" => true,
                "message" => "Input tidak sesuai",
            ], 403);
        }

        return false;
    }
}
