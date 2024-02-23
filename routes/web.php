<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProdakController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//dashboard 

Route::get('/', [PagesController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


//Barang
Route::middleware('auth')->group(function () {
    Route::get('/', [PagesController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/category', [PagesController::class, 'category'])->name('admin.category');
    Route::get('/barang', [PagesController::class, 'barang'])->name('admin.barang');
    Route::get('/transaksi', [PagesController::class, 'transaksi'])->name('admin.transaksi');
    Route::get('/rekap', [PagesController::class, 'rekap'])->name('admin.rekap');
});

//category
Route::middleware('auth')->group(function () {
    Route::get('/category/tambah', [PagesController::class, 'category_tambah']);
    Route::post('/category/tambah', [CategoryController::class, 'create'])->name('category.store');
    Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::post('/tmp-upload', [CategoryController::class, 'tmpUpload']);
    
});

// prodak

Route::middleware('auth')->group(function () {
    Route::get('/barang/tambah', [PagesController::class, 'barang_tambah']);
    Route::post('/barang/tambah', [ProdakController::class, 'store'])->name('barang.store');
    
    
});

//user management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
