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
    public function ambil_stok_per_cabang($kode_cabang)
    {
        return DB::select(
            "SELECT
                stok_awal.*,
                m_menu.nama_menu, m_menu.varian, m_menu.harga_jual
            FROM stok_awal
            JOIN m_menu ON m_menu.kode_menu = stok_awal.kode_menu
            WHERE kode_cabang = '$kode_cabang'"
        );
    }


    public function cek_stok($kode_cabang, $kode_menu)
    {
        return DB::select(
            "SELECT * FROM stok_awal
            WHERE
                kode_menu = '$kode_menu' AND
                kode_cabang = '$kode_cabang'"
        );
    }


    public function insert_transaksi_penjualan($kode_cabang, $kode_menu, $jumlah_beli, $sisa_stok, $kode_status)
    {
        $insert_stok_keluar = DB::table('stok_keluar')->insertGetId([
            'kode_cabang'   => $kode_cabang,
            'kode_menu'     => $kode_menu,
            'qty'           => $jumlah_beli,
            'kode_status'   => $kode_status,
            'created_date'  => date('Y-m-d H:i:s'),
        ]);
        if ($insert_stok_keluar) {
            $insert_stok_awal = DB::table('stok_awal')->insertGetId([
                'kode_cabang'   => $kode_cabang,
                'kode_menu'     => $kode_menu,
                'qty'           => $sisa_stok,
                'id_stok_keluar'=> $insert_stok_keluar,
                'kode_status'   => $kode_status,
                'created_date'  => date('Y-m-d H:i:s'),
            ]);
            if ($insert_stok_awal > 0) {
                return redirect()->route('transaksi-sales')->with('success', 'Transaksi Berhasil !');
            } else {
                App::abort(500, 'Some Error');
            }
        }
    }
}
