<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() 
    {
        return view('base.app');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function category()
    {
        return view('admin.category');    
    }
    public function barang()
    {
        return view('admin.barang');    
    }

    public function transaksi()
    {
        return view('admin.transaksi');    
    }
    public function rekap()
    {
        return view('admin.rekap');    
    }
}
