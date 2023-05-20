<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,'index'])->name('homepage');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


//ADMIN ROUTES
// AUTH
Route::middleware(['auth','validateAccess:admin'])->group(
    function(){
        Route::controller(AdminController::class)->group(
            function(){
                // DASHBOARD 
                Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
        
                // LOGOUT 
                Route::get('/admin/logout','logout')->name('admin.logout');

                #USERS
                Route::get('/admin/users/list','users')->name('users.list');
                Route::get('/admin/users/create','create')->name('users.create');
                Route::post('/admin/users/store','storeAdminUser')->name('users.store');
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
        
        #PRODUCTS
        Route::controller(ProductController::class)->group(
            function(){
                #SHOW ALL PRODUCTS
                Route::get('/products/list','index')->name('products.list');
                #SHOW PRODUCT CREATION PAGE
                Route::get('products/create','create')->name('products.create');
                #SHOW PRODUCT EDIT PAGE
                Route::get('/products/edit/{id}','edit')->name('products.edit');

                #STORE NEW PRODUCT
                Route::post('/products/store','store')->name('products.store');
                #UPDATE EXISTING PRODUCT
                Route::post('/products/update/{id}','update')->name('products.update');

                Route::get('/products/delete/{id}','destroy')->name('products.delete');
            }
        );
        // DISTRIBUTORS
        Route::controller(RetailerController::class)->group(
            function(){
                #SHOW LIST
                Route::get('/retailers/list','index')->name('retailers.list');
            }
        );       
    }
);

#RETAILERS
Route::middleware(['auth','validateAccess:retailer'])->group(
    function(){        
        Route::controller(RetailerController::class)->group(
            function(){
                Route::get('/retailer/dashboard','dashboard')->name('retailer.dashboard');
                Route::get('/retailer/logout','logout')->name('retailer.logout');
            }
        );
    }
);


//ADMIN LOGIN 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('/admin',[AdminController::class,'login'])->name('admin.direct.login');


