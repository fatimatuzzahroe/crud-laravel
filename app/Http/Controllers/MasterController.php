<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $aturan = [
            'form_kode_cabang' => 'required|unique:m_cabang,kode_cabang|min:3',
            'form_nama_cabang' => 'required|min:5',
            'form_notelp_cabang' => 'numeric',
            'form_alamat_cabang' => 'required',
        ];
        $pesan = [
            'form_kode_cabang.unique' => 'Kode Cabang sudah terdaftar, silakan pakai kode yang lain !!',
            'form_notelp_cabang.numeric' => 'Nomor telpon harus angka !!',
        ];
        $validator = Validator::make($request->all(), $aturan, $pesan);
        try {
           
            if ($validator->fails()) {
                return redirect()->route('master-cabang-tambah')->withErrors($validator)->withInput();
            } else {
                
                $insert = DB::table('m_cabang')->insert([
                    'kode_cabang'   => $request->input('form_kode_cabang'),
                    'nama_cabang'   => $request->input('form_nama_cabang'),
                    'no_telp'       => $request->input('form_notelp_cabang'),
                    'alamat'        => $request->input('form_alamat_cabang'),
                    'created_date'  => date('Y-m-d H:i:s'),
                ]);
                if ($insert) {
                    return redirect()->route('master-cabang')->with('success', 'Berhasil tambah cabang restoran baru!');
                }
            }
        } catch (\Throwable $th) {
           
            return redirect()->route('master-cabang-tambah')->withErrors($th->getMessage())->withInput();
        }

    }

    public function cabang_edit($kode)
    {
        $cabang = DB::table('m_cabang')->where('kode_cabang', $kode)->get()->first();
        return view('master.cabang.edit', compact('cabang'));
    }


    public function cabang_update($kode, Request $request)
    {
       
        $aturan = [
           
            'form_nama_cabang' => 'required|min:5',
            'form_notelp_cabang' => 'numeric',
            'form_alamat_cabang' => 'required',
        ];
        $pesan = [
           
            'form_notelp_cabang.numeric' => 'Nomor telpon harus angka !!',
        ];
        $validator = Validator::make($request->all(), $aturan, $pesan);
        try {
            if ($validator->fails()) {
                return redirect()->route('master-cabang-edit',[$kode])->withErrors($validator)->withInput();
            } else {
                $update = DB::table('m_cabang')->where('kode_cabang', $kode)->update([
                    'nama_cabang'   => $request->input('form_nama_cabang'),
                    'no_telp'       => $request->input('form_notelp_cabang'),
                    'alamat'        => $request->input('form_alamat_cabang'),
                    'updated_date'  => date('Y-m-d H:i:s'),
                ]);
                if ($update) {
                    return redirect()->route('master-cabang')->with('success', 'Berhasil update restoran '.$kode.'!');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('master-cabang-edit',[$kode])->withErrors($th->getMessage())->withInput();
        }
    
    }

    public function menuresto()
    {
        return view('master.menuresto.index');
    }
}
