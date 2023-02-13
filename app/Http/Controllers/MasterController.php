<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('master');
    }

    public function cabang()
    {
        
        $cabang = DB::table('m_cabang')->get();
        return view('master.cabang.index', compact('cabang'));
    }


    public function cabang_tambah()
    {
        return view('master.cabang.tambah');
    }
    public function cabang_simpan(Request $request)
    {
        //untuk menguji dat amasuk sebelum di masukkan db
        //echo $request->input('form_kode_cabang');
        //echo $request->input('form_nama_cabang');
        //echo $request->input('form_notelp_cabang');
        //echo $request->input('form_alamat_cabang');
        //die; fungsi ini artinya di bawahnya tdk dijalankan

       try {
            $insert = DB::table('m_cabang')->insert([
                'kode_cabang'   => $request->input('form_kode_cabang'),
                'nama_cabang'   => $request->input('form_nama_cabang'),
                'no_telp'       => $request->input('form_notelp_cabang'),
                'alamat'        => $request->input('form_alamat_cabang'),
                'created_date'  => date('Y-m-d H:i:s'),
            ]);
            if ($insert) {
               // echo 'Berhasil tambah cabang restoran baru';
                return redirect()->route('master-cabang')->with('success', 'Berhasil tambah cabang restoran baru!');
            } else {
               // echo 'Gagal bos';
                return redirect()->route('master-cabang-tambah')->with('warning', 'Gagal!');
            }
        } catch (\Throwable $th) {
           // print_r($th->getMessage());
           return redirect()->route('master-cabang-tambah')->with('danger', $th->getMessage());
        }
    }
    public function menuresto()
    {
        return view('master.menuresto.index');
    }
}
