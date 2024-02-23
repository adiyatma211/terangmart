<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Models\temporaryFile;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return view('admin.categories.index', compact('category'));
        // retrun view ('admin.category', compact('category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //save image laravel controllers?
        // $image = $request->file('image');

        // if ($image) {
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);

        //     // Gunakan model Category untuk menyimpan data ke dalam database
        //     Category::create([
        //         'name' => $request->name,
        //         'image' => $imageName,
        //     ]);

        //     return redirect('/category')->with('success', 'Kategori berhasil ditambahkan.');
        // } else {
        //     return redirect()->back()->withErrors(['image' => 'Gambar tidak terunggah.'])->withInput();
        // }

        // dd($request->filename);

        category::create([
            'name' => $request->name,
            'image' => $request->filename,
        ]);
       
        return redirect('/category')->with(['success' => 'Data berhasil ditambahkan']);

        // if ($request->filename) {

        // } else {
        //     return 'error';
        // }
        
    }
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('post/category'), $imageName);
            return $imageName;
        }
        return '';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('m_category.e_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Update data kategori menggunakan Eloquent
        $category->update([
            'name' => $request->name,
            // Update atribut lain sesuai kebutuhan
        ]);

        // Redirect kembali ke halaman index kategori dengan pesan sukses
        return redirect('/category')->with(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

    // Periksa apakah kategori ditemukan
    if ($category) {
        // Hapus kategori
        $category->delete();
        
        // Kembalikan respons sukses jika berhasil dihapus
        return redirect('/category')->with(['message' => 'Kategori berhasil dihapus']);
    } else {
        // Kembalikan respons error jika kategori tidak ditemukan
        return redirect('/category')->with(['message' => 'Kategori tidak ditemukan']);
    }
    }
}
