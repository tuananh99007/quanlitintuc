<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('admin/login', [AuthenticateController::class, 'login'])->name('admin.authenticate.login');
Route::post('admin/postlogin', [AuthenticateController::class, 'postlogin'])->name('admin.authenticate.postlogin');
Route::get('admin/logout', [AuthenticateController::class, 'logout'])->name('admin.authenticate.logout');

Route::prefix('admin')->middleware('auth_admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('admin.users.list');
        Route::get('/add', [UserController::class, 'add'])->name('admin.users.add');
        Route::post('/postadd', [UserController::class, 'postadd'])->name('admin.users.postadd');
        Route::get('/detail', [UserController::class, 'detail'])->name('admin.users.detail');
        Route::get('/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::post('/postupdate', [UserController::class, 'postupdate'])->name('admin.users.postupdate');
        Route::get('/delete', [UserController::class, 'delete'])->name('admin.users.delete');
    });


    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/postadd', [CategoryController::class, 'postadd'])->name('admin.category.postadd');
        Route::get('/detail', [CategoryController::class, 'detail'])->name('admin.category.detail');
        Route::get('/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/postupdate', [CategoryController::class, 'postupdate'])->name('admin.category.postupdate');
        Route::get('/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/list', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('/confirm', [ProductController::class, 'confirm'])->name('admin.product.confirm');
        Route::get('/updateConfirm', [ProductController::class, 'updateConfirm'])->name('admin.product.updateConfirm');
        Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('/postadd', [ProductController::class, 'postadd'])->name('admin.product.postadd');
        Route::get('/detail', [ProductController::class, 'detail'])->name('admin.product.detail');
        Route::get('/update', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('/postupdate', [ProductController::class, 'postupdate'])->name('admin.product.postupdate');
        Route::get('/delete', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});
