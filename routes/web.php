<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;

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

Route::get('/', [WelcomeController::class,'index']);

Route::get('/categories', [FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('/menus', [FrontendMenuController::class,'index'])->name('menus.index');

Route::get('/categories/{category}', [FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('/reservation/step-one', [FrontendReservationController::class,'stepOne'])->name('reservation.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class,'stepTwo'])->name('reservation.step.two');

Route::post('/reservation/step-one', [FrontendReservationController::class,'storeStepOne'])->name('reservation.store.step.one');
Route::post('/reservation/step-two', [FrontendReservationController::class,'storeStepTwo'])->name('reservation.store.step.two');
Route::get('/reservation/thanku', [FrontendReservationController::class,'thankYou'])->name('reservations.thankyou');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth' , 'admin'])->name('admin.')->prefix('admin')->group(function(){
Route::get('/', [AdminController::class,'index'])->name('index');
Route::resource('/categories', CategoryController::class);
Route::resource('/menues', MenuController::class);
Route::resource('/tables', TableController::class);
Route::resource('/reservations', ReservationController::class);
});

require __DIR__.'/auth.php';
