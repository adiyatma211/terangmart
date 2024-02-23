<?php

namespace App\Http\Controllers;

use App\Models\prodak;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
// category_tambah


    public function category()
    {
        $categories = Category::with('temporaryFile')->get();
        
        return view('admin.category', ['categories' => $categories]); 
    // Loop melalui setiap kategori dan konstruksi URL gambar untuk setiap kategori
    // Kirim data kategori yang telah diperbarui ke view
   
    }

    public function category_tambah()
    {
        return view('m_category.t_category');    
    }


    // category_end
    public function barang()
    {
        $barang = Prodak::with('category')->get();
        // dd($barang);

        
        return view('admin.barang', ['barang' => $barang]);   
    }

    public function barang_tambah()
    {   
        $cat= category::all();
        return view('m_prodak.t_barang', ['cat'=>$cat]);    
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
