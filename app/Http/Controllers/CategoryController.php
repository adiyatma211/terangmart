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

        $tmp_file = temporaryFile::where('folder', $request->image)->first();

        if ($tmp_file) {
            Storage::copy('post/tmp/'.$tmp_file->folder.'/'.$tmp_file->file, 'post/'.$tmp_file->folder . '/' .$tmp_file->file);

            category::create([
                'name' => $request->name,
                'image' => $tmp_file->folder. '/' .$tmp_file->imageName,
            ]);
            Storage::deleteDirectory('post/tmp/'.$tmp_file->folder);
            $tmp_file->delete();
            return redirect('/category')->with(['success' => 'Data berhasil ditambahkan']);
        } else {
            return 'error';
        }
        
    }
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $folder = uniqid('post', true);
        $image->storeAs('post/tmp/'.$folder, $imageName);
        temporaryFile::create([
            'folder' => $folder,
            'file' => $imageName,
        ]);
        return $folder;
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
