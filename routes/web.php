<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class,'login']);

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
Route::middleware('auth')->group(
    function(){
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

        Route::controller(StateController::class)->group(
            function(){
                Route::get('/states/list','index')->name('states.list');
                Route::get('/states/create','create')->name('states.create');                
                Route::get('states/edit/{uniqueid}','edit')->name('state.edit');

                Route::post('/states/store','store')->name('states.store');
                Route::post('/states/update/{id}','update')->name('states.update');

                Route::get('/states/delete/{uniqueid}','destroy')->name('states.delete');
            }
        );

        Route::controller(RegionController::class)->group(
            function(){
                Route::get('/regions/list','index')->name('regions.list');
            }
        );
        
    }
);


//ADMIN LOGIN 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');