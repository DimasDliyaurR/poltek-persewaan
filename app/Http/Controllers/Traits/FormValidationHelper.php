<?php

namespace App\Http\Controllers\Traits;

use Carbon\Carbon;
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
    public function checkSchedule($column_a, $column_b, $tanggal_awal, $foreignMaster, $id, $tanggal_akhir)
    {
        $table = $this->modal::where("status", "belum bayar")->where($foreignMaster, $id)->get();
        $table = array_map(function ($q) {
            return (array)$q;
        }, $table->toArray());

        foreach ($table as $value) {
            if ($this->isBLargeThenAButCLess(strtotime($value[$column_a]), $tanggal_awal, strtotime($value[$column_b])) || $this->isBLargeThenAButCLess(strtotime($value[$column_a]), $tanggal_akhir, strtotime($value[$column_b]))) {
                // dd($table);
                return true;
            }
        }

        return false;
    }

    /**
     * Validation Cek Jadwal Asrama
     * @param string $slug Slug
     * @param string $start_date
     * @param string $start_end
     * @return bool
     */
    public function checkScheduleKendaraan($slug, $start_date, $start_end)
    {
        $startDate = $start_date;
        $endDate = $start_end;

        $conflictingTransactions = $this->modal::join("detail_transaksi_kendaraans as dtk", "dtk.transaksi_kendaraan_id", "=", "transaksi_kendaraans.id")
            ->join("kendaraans", "dtk.kendaraan_id", "=", "kendaraans.id")
            ->where('kendaraans.k_slug', $slug)
            // ->where("k_status", "tersedia")
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tk_pelaksanaan', [$startDate, $endDate])
                    ->orWhereBetween('tk_tanggal_kembali', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('tk_pelaksanaan', '<', $startDate)
                            ->where('tk_tanggal_kembali', '>', $endDate);
                    });
            })

            ->exists();
        return $conflictingTransactions;
    }

    /**
     * Validation Cek Jadwal Alat Barang
     * @param string $slug Slug
     * @param string $start_date
     * @param string $start_end
     * @return bool
     */
    public function checkScheduleAlatBarang($slug, $start_date, $start_end)
    {
        $startDate = $start_date;
        $endDate = $start_end;

        $conflictingTransactions = $this->modal::join("detail_transaksi_alat_barangs as dtab", "dtab.transaksi_alat_barang_id", "=", "transaksi_alat_barangs.id")
            ->join("alat_barangs", "dtab.alat_barang_id", "=", "alat_barangs.id")
            ->where('alat_barangs.ab_slug', $slug)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tab_tanggal_pesanan', [$startDate, $endDate])
                    ->orWhereBetween('tab_tanggal_kembali', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('tab_tanggal_pesanan', '<', $startDate)
                            ->where('tab_tanggal_kembali', '>', $endDate);
                    });
            })

            ->exists();
        return $conflictingTransactions;
    }

    /**
     * Validation Cek Jadwal Asrama
     * @param string $slug Slug
     * @param string $start_date
     * @param string $start_end
     * @return bool
     */
    public function checkScheduleAsrama($slug, $start_date, $start_end)
    {
        $startDate = $start_date;
        $endDate = $start_end;

        $conflictingTransactions = $this->modal::join("detail_transaksi_asramas as dta", "dta.transaksi_asrama_id", "=", "transaksi_asramas.id")
            ->join("asramas", "dta.asrama_id", "=", "asramas.id")
            ->where('asramas.a_slug', $slug)
            ->where("a_status", "tidak tersedia")
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('ta_check_in', [$startDate, $endDate])
                    ->orWhereBetween('ta_check_out', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('ta_check_in', '<', $startDate)
                            ->where('ta_check_out', '>', $endDate);
                    });
            })

            ->exists();
        return $conflictingTransactions;
    }

    /**
     * Validation Cek Jadwal Asrama
     * @param string $slug Slug
     * @param string $start_date
     * @param string $start_end
     * @return bool
     */
    public function checkScheduleGedungLap($slug, $start_date, $start_end)
    {
        $startDate = $start_date;
        $endDate = $start_end;

        $conflictingTransactions = $this->modal::join("detail_transaksi_gedungs as dtg", "dtg.transaksi_gedung_id", "=", "transaksi_gedungs.id")
            ->join("gedung_laps", "dtg.gedung_lap_id", "=", "gedung_laps.id")
            ->where('gedung_laps.gl_slug', $slug)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tg_tanggal_kembali', [$startDate, $endDate])
                    ->orWhereBetween('tg_tanggal_pelaksanaan', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('tg_tanggal_kembali', '<', $startDate)
                            ->where('tg_tanggal_pelaksanaan', '>', $endDate);
                    });
            })

            ->exists();
        return $conflictingTransactions;
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
