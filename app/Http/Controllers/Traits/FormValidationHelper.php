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
            ->join("merk_kendaraans", "kendaraans.merk_kendaraan_id", "=", "merk_kendaraans.id")
            ->where('merk_kendaraans.mk_slug', $slug)
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
    public function checkScheduleBulanHariGedungLap($slug, $start_date, $end_date)
    {
        $startDate = $start_date;
        $endDate = $end_date;

        $conflictingTransactions = $this->modal::join("detail_transaksi_gedungs as dtg", "dtg.transaksi_gedung_id", "=", "transaksi_gedungs.id")
            ->join("gedung_laps", "dtg.gedung_lap_id", "=", "gedung_laps.id")
            ->where('gedung_laps.gl_slug', $slug)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tg_tanggal_pelaksanaan', [$startDate, $endDate])
                    ->orWhereBetween('tg_tanggal_kembali', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('tg_tanggal_pelaksanaan', '<', $startDate)
                            ->where('tg_tanggal_kembali', '>', $endDate);
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
    public function checkScheduleJamGedungLap($slug, $date, $start_time, $end_time)
    {
        $startTime = $start_time;
        $endTime = $end_time;

        $startOfDay = Carbon::parse($date)->startOfDay();
        $endOfDay = Carbon::parse($date)->endOfDay();

        $startTime = Carbon::parse($startTime)->format('H:i:s');
        $endTime = Carbon::parse($endTime)->format('H:i:s');

        $conflictingTransactions = $this->modal::join("detail_transaksi_gedungs as dtg", "dtg.transaksi_gedung_id", "=", "transaksi_gedungs.id")
            ->join("gedung_laps", "dtg.gedung_lap_id", "=", "gedung_laps.id")
            ->where('gedung_laps.gl_slug', $slug)
            ->whereBetween("tg_tanggal_pelaksanaan", [$startOfDay, $endOfDay])
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->whereTime('tg_jam_mulai', '<', $endTime)
                        ->whereTime('tg_jam_akhir', '>', $startTime);
                });
            })
            ->exists();
        // dd($conflictingTransactions);
        return $conflictingTransactions;
    }

    /**
     * Validation Cek Jadwal Asrama
     * @param string $slug Slug
     * @param string $start_date
     * @param string $start_end
     * @return bool
     */
    public function checkScheduleLayanan($slug, $start_date, $start_end)
    {
        $startDate = $start_date;
        $endDate = $start_end;

        $conflictingTransactions = $this->modal::join("detail_transaksi_layanans as dtl", "dtl.transaksi_layanan_id", "=", "transaksi_layanans.id")
            ->join("layanans", "dtl.layanan_id", "=", "layanans.id")
            ->where('layanans.l_slug', $slug)
            ->where('layanans.l_status', "tidak")
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tl_tanggal_pelaksanaan', [$startDate, $endDate])
                    ->orWhereBetween('tl_tanggal_kembali', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('tl_tanggal_pelaksanaan', '<', $startDate)
                            ->where('tl_tanggal_kembali', '>', $endDate);
                    });
            })

            ->exists();

        return $conflictingTransactions;
    }

    public function checkCapacity(object $object, int $qty = 1)
    {
        $table = array_map(function ($q) {
            return (array)$q;
        }, $object->toArray());

        foreach ($table as $value) {
            if ($this->isALargeThenB(($value["count"] - $qty), 0)) {
                return true;
            }
        }

        return false;
    }
}
