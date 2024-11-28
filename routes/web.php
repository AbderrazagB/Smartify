<?php

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
Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('landing');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('manageProduct', App\Http\Controllers\ManageProductController::class);

Route::get('/admin/manageProducts', [App\Http\Controllers\ManageProductController::class, 'index'])
->middleware('admin')
->name('manageProducts');
Route::put('/confirm_purchase/{id}', [App\Http\Controllers\PurchaseController::class, 'confirm'])->middleware('admin')->name('ConfirmPurchase');

Route::get('/admin/manageProducts/add', [App\Http\Controllers\ManageProductController::class, 'create'])
->middleware('admin')
->name('addProduct');
Route::get('/show', [App\Http\Controllers\ManageProductController::class, 'show'])->name('show');

Route::get('/search', [App\Http\Controllers\ProduitController::class, 'search'])->name('search');
;
Route::resource('Profiles', App\Http\Controllers\ProfileController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('Profile');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('ProfileEdit');
    Route::delete('/cart/{id}', [App\Http\Controllers\ProduitController::class, 'destroyCart'])->name('DeleteFromCart');
    Route::get('/addCart/{id}', [App\Http\Controllers\ProduitController::class, 'addCart'])->name('addCart');
    Route::get('/Cart', [App\Http\Controllers\ProduitController::class, 'Cart'])->name('Cart');
    Route::get('/accDestroy', [App\Http\Controllers\ProfileController::class, 'accDestroy'])->name('accDestroy');
    Route::get('/changePassword', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordGet'])->name('changePasswordGet');
    Route::post('/changePassword', [App\Http\Controllers\ChangePasswordController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('/cart/purchased', [App\Http\Controllers\PurchaseController::class, 'purchase'])->name('Purchase');
    Route::resource('Carts', App\Http\Controllers\CartController::class);
    Route::get('/purchases', [App\Http\Controllers\PurchaseController::class, 'index'])->name('Purchases');
    Route::delete('/cancel/{id}', [App\Http\Controllers\PurchaseController::class, 'cancel'])->name('cancelPurchase');
    Route::put('/purchase/billinginfo/{ord_id}', [App\Http\Controllers\PurchaseController::class, 'billing'])->name('billingInfo');
    Route::get('/order/details/{ord_id}', [App\Http\Controllers\PurchaseController::class, 'details'])->name('PurchaseDetails');
});
Route::delete('/deleteUser/{id}', [App\Http\Controllers\UsersController::class, 'userDelete'])->middleware('admin')->name('DeleteUser');
Route::get('/manageUsers', [App\Http\Controllers\UsersController::class, 'index'])->middleware('admin')->name('manageUsers');
