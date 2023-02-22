<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    public function ambil_semua_Stok()
    {
        return DB::select(
            "SELECT
                sa.id, sa.kode_cabang, c.nama_cabang,
                sa.kode_menu, m.nama_menu, m.varian, m.harga_jual,
                sa.qty,
                sa.kode_status, s.nama_status
            FROM stok_awal as sa
            JOIN m_cabang as c      ON c.kode_cabang = sa.kode_cabang
            JOIN m_menu as m        ON m.kode_menu = sa.kode_menu
            JOIN m_stok_status as s ON s.kode_status = sa.kode_status"
        );
    }
}
