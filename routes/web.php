<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\ProfileController;
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


//for frontend part start
Route::get('/home',[FrontendController::class,'show']);
Route::get('/fruit',[FrontendController::class,'fruit'])->name('fruit');
//for frontend part end


//for backend part start
Route::get('/admin',[BackendController::class,'admin'])->name('admin');
//for backend part end

//Fruit start
Route::prefix('fruit')->group(function () {
    Route::get('/index', [FruitController::class, 'index'])->name('fruit_index');
    Route::get('/create', [FruitController::class, 'create'])->name('fruit_create');
    Route::post('/store', [FruitController::class, 'store'])->name('fruit_store');
    Route::get('/edit/{id}', [FruitController::class, 'edit'])->name('fruit_edit');
    Route::post('/update/{id}', [FruitController::class, 'update'])->name('fruit_update');
    Route::get('/delete/{id}', [FruitController::class, 'delete'])->name('fruit_delete');
});
//Fruit end


















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
