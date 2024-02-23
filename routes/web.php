<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


//for frontend part start
Route::get('/',[FrontendController::class,'show']);
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
    // Route::get('/edit/{id}', [FruitController::class, 'edit'])->name('fruit_edit');
    Route::post('/update/{id}', [FruitController::class, 'update'])->name('fruit_update');
    Route::get('/delete/{id}', [FruitController::class, 'delete'])->name('fruit_delete');
});
//Fruit end

// add to cart
Route::get('/add_To_Cart/{id}', [FrontendController::class, 'addToCart'])->name('add_To_Cart');
Route::get('/all_cart_page', [FrontendController::class, 'allCartPage'])->name('all_cart_page');
Route::patch('/update_For_Cart', [FrontendController::class, 'updateForCart'])->name('update_For_Cart');
Route::delete('/remove_from_cart', [FrontendController::class, 'removeFromCart'])->name('remove_from_cart');

// Route::get('/cart', 'CartController@showCart')->name('cart.show');
// Route::post('/cart/add/{product}', 'CartController@addToCart')->name('cart.add');
// Route::post('/cart/remove/{product}', 'CartController@removeFromCart')->name('cart.remove');

















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
