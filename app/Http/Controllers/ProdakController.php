<?php

namespace App\Http\Controllers;

use App\Models\prodak;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreprodakRequest;
use App\Http\Requests\UpdateprodakRequest;


class ProdakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
    
        prodak::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);     

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(prodak $prodak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prodak $prodak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodakRequest $request, prodak $prodak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prodak $prodak)
    {
        //
    }

    // public function tambah(Request $request)
    // {
    //     prodak::create([
    //         'name' => $request->name,
    //         'category_id' => $request->category_id,
    //         'price' => $request->price,
    //         'stock' => $request->stock,
    //         'description' => $request->description,
    //     ]);     
    //     return redirect('/barang')->with('success', 'Data berhasil ditambahkan');

    // }
}
