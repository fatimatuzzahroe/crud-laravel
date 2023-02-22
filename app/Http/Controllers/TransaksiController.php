<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('transaksi');
    }



    public function sales()
    {
        $data = [
            'kode_cabang' => DB::table('m_cabang')->get(),
            'kode_menu' => DB::table('m_menu')->get(),
        ];
        return view('transaksi/sales/index', compact('data'));
    }

    public function sales_jual(Request $request)
    {
        echo 'barang sudah terjual';
    }



    public function stock()
    {
        
        $transaksimodel = new TransaksiModel();
        $stok = $transaksimodel->ambil_semua_stok();
        return view('transaksi/stock/index', compact('stok'));
    }



    public function stock_tambah()
    {
        $data = [
            'kode_cabang' => DB::table('m_cabang')->get(),
            'kode_menu' => DB::table('m_menu')->get(),
        ];
        return view('transaksi/stock/tambah', compact('data'));
    }



    public function stock_simpan(Request $request)
    {
        $aturan = [
            'form_kode_cabang' => 'required',
            'form_kode_menu' => 'required',
            'form_jumlah' => 'required|integer|min:1',
        ];
        $validator = Validator::make($request->all(), $aturan);
        try {
            if ($validator->fails()) {
                return redirect()->route('transaksi-stock-tambah')->withErrors($validator)->withInput();
            } else {
                $insert = DB::table('stok_awal')->insert([
                    'kode_cabang'   => $request->input('form_kode_cabang'),
                    'kode_menu'     => $request->input('form_kode_menu'),
                    'qty'           => $request->input('form_jumlah'),
                    'id_stok_keluar'=> null,
                    'kode_status'   => 'INC',
                    'created_date'  => date('Y-m-d H:i:s'),
                ]);
                if ($insert) {
                    return redirect()->route('transaksi-stock')->with('success', 'Berhasil tambah barang baru!');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('transaksi-stock-tambah')->withErrors($th->getMessage())->withInput();
        }
    }

}
