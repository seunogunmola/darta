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
                #SHOW LIST
                Route::get('/distributors/list','index')->name('distributor.list');

                #SHOW CREATE FORM
                Route::get('/distributors/create','create')->name('distributor.create');

                #SHOW EDIT FORM
                Route::get('/distributors/edit/{id}','edit')->name('distributor.edit');                
                
                #STORE
                Route::post('/distributors/store','store')->name('distributor.store');

                #UPDATE
                Route::post('/distributors/update/{id}','update')->name('distributor.update');
                
                #DELETE
                Route::get('/distributors/delete/{id}','destroy')->name('distributor.delete');
            }
        );

        Route::controller(StateController::class)->group(
            function(){
                #SHOW LIST
                Route::get('/states/list','index')->name('states.list');
                #SHOW CREATE FORM
                Route::get('/states/create','create')->name('states.create');   
                #SHOW EDIT FORM             
                Route::get('states/edit/{uniqueid}','edit')->name('state.edit');
                
                #CREATE
                Route::post('/states/store','store')->name('states.store');
                
                #UPDATE
                Route::post('/states/update/{id}','update')->name('states.update');
                
                #DELETE
                Route::get('/states/delete/{uniqueid}','destroy')->name('states.delete');
            }
        );

        Route::controller(RegionController::class)->group(
            function(){
                #SHOW LIST
                Route::get('/regions/list','index')->name('regions.list');
                
                #SHOW CREATE FORM
                Route::get('/regions/create','create')->name('regions.create');
                
                #SHOW EDIT FORM
                Route::get('/regions/edit/{uniqueid}','edit')->name('regions.edit');

                #CREATE
                Route::post('/regions/store','store')->name('regions.store');

                #UPDATE
                Route::post('/regions/update/{id}','update')->name('regions.update');

                #DELETE
                Route::get('/regions/delete/{uniqueid}','destroy')->name('regions.delete');
            }
        );
        
    }
);


//ADMIN LOGIN 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');