<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserControlController;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('auth', 'verified', 'role:manager|staff');
Route::get('/admin/create', [AdminController::class, 'create'])->name('barang.create')->middleware('auth', 'verified', 'permission:tambah-barang');
Route::post('/admin', [AdminController::class, 'store']) ->name("barang.store")->middleware('auth', 'verified', 'role:manager');
Route::get('/admin/{Toko}/edit', [AdminController::class, 'edit']) ->name("barang.edit")->middleware('auth', 'verified', 'permission:edit-barang');
Route::post('/admin/{Toko}', [AdminController::class, 'update']) ->name("barang.update")->middleware('auth', 'verified', 'role:manager');
Route::delete('/admin/{Toko}', [AdminController::class, 'destroy']) ->name("barang.destroy")->middleware('auth', 'verified', 'permission:hapus-barang');

Route::get('supplier', [SupplierController::class, 'supplier'])->name('supplier')->middleware('auth', 'verified', 'role:manager');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create')->middleware('auth', 'verified', 'role:manager');
Route::post('/supplier', [SupplierController::class, 'store']) ->name("supplier.store")->middleware('auth', 'verified', 'role:manager');
Route::get('/supplier/{Supplier}/edit', [SupplierController::class, 'edit']) ->name("supplier.edit")->middleware('auth', 'verified', 'role:manager');
Route::post('/supplier/{Supplier}', [SupplierController::class, 'update']) ->name("supplier.update")->middleware('auth', 'verified', 'role:manager');
Route::delete('/supplier/{Supplier}', [SupplierController::class, 'destroy']) ->name("supplier.destroy")->middleware('auth', 'verified', 'role:manager');

Route::get('/customer', [CustomerController::class, 'customer'])->name('customer')->middleware('auth', 'verified', 'role:manager');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create')->middleware('auth', 'verified', 'role:manager');
Route::post('/customer', [CustomerController::class, 'store']) ->name("customer.store")->middleware('auth', 'verified', 'role:manager');
Route::get('/customer/{Customer}/edit', [CustomerController::class, 'edit']) ->name("customer.edit")->middleware('auth', 'verified', 'role:manager');
Route::post('/customer/{Customer}', [CustomerController::class, 'update']) ->name("customer.update")->middleware('auth', 'verified', 'role:manager');
Route::delete('/customer/{Customer}', [CustomerController::class, 'destroy']) ->name("customer.destroy")->middleware('auth', 'verified', 'role:manager');

Route::get('/barang', [AdminController::class, 'barang'])->name('barang')->middleware('auth', 'verified', 'role:manager|staff');

Route::get('/user', [UserControlController::class, 'index'])->name('user')->middleware('auth', 'verified', 'role:manager');
Route::get('/user/create', [UserControlController::class, 'create'])->name('create')->middleware('auth', 'verified', 'permission:tambah-user');
Route::post('/user', [UserControlController::class, 'store']) ->name("store")->middleware('auth', 'verified', 'role:manager');
Route::get('/user/{User}/edit', [UserControlController::class, 'edit']) ->name("edit")->middleware('auth', 'verified', 'role:manager');
Route::post('/user/{User}', [UserControlController::class, 'update']) ->name("update")->middleware('auth', 'verified', 'role:manager');
Route::delete('/user/{User}', [UserControlController::class, 'destroy']) ->name("destroy")->middleware('auth', 'verified', 'role:manager');

require __DIR__.'/auth.php';
