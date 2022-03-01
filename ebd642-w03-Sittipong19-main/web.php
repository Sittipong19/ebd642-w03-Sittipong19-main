<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// product
Route::get('/product', [ProductController::class,'index'])->name('product');
Route::post('/product/search', [ProductController::class,'search']);
Route::get('/product/search', [ProductController::class,'search']);
Route::get('/product/edit/{id?}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class,'update'])->name('product.update');
Route::post('/product/insert', [ProductController::class,'insert'])->name('product.insert');
Route::get('/product/remove/{id}', [ProductController::class,'remove'])->name('product.delete');
// brand
Route::get('/brand',[BrandController::class,'index'])->name('brand');
Route::get('/brand/add',[BrandController::class,'add'])->name('brand.add');
Route::post('/brand/insert',[BrandController::class,'insert'])->name('brand.insert');
Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand/update',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/remove/{id}',[BrandController::class,'remove'])->name('brand.delete');