<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('master.cabang.index');
    }
    public function cabang_tambah()
    {
        return view('master.cabang.tambah');
    }
    public function menuresto()
    {
        return view('master.menuresto.index');
    }
}
