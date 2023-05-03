<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistributorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//ADMIN ROUTES
// AUTH
Route::controller(AdminController::class)->group(
    function(){
        // DASHBOARD 
        Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');

        // LOGOUT 
        Route::get('/admin/logout','logout')->name('admin.logout');
    }
);
// DISTRIBUTORS
Route::controller(DistributorController::class)->group(
    function(){
        Route::get('/distributors/create','create')->name('distributor.create');
        Route::post('/distributors/store','store')->name('distributor.store');
        Route::get('/distributors/list','index')->name('distributor.list');
        Route::get('/distributors/edit/{id}','edit')->name('distributor.edit');
        Route::post('/distributors/update/{id}','update')->name('distributor.update');
        Route::get('/distributors/delete/{id}','destroy')->name('distributor.delete');
    }
);

//ADMIN LOGIN 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');