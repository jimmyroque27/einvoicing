<?php

use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\GoogleController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'], function () {
    // check if session is available
    if(!session('user_tp_id')){
        session(['user_tp_id' => '0000000000']);
    }
    if(!session('role_name')){
        session(['role_name' => 'Guest']);
    }
        
     
})->name('home');

 

// Authenticated Routes
Route::middleware('auth')->group(function(){
     
    
    // User Management
    Route::resource('users', App\Http\Controllers\UserController::class,['except' => 'destroy']);
    Route::get('/users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/status/{user_id}/{status_code}', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('users.status.update');


    Route::resource('atc', App\Http\Controllers\AlphaTaxCodeController::class,['except' => 'destroy']);
    Route::get('/atc/destroy/{id}', [App\Http\Controllers\AlphaTaxCodeController::class, 'destroy'])->name('atc.destroy');
    Route::get('/atc/atcList',[App\Http\Controllers\AlphaTaxCodeController::class,'atcList'])->name('atc.atcList');

    Route::resource('currency', App\Http\Controllers\CurrencyController::class,['except' => 'destroy']);
    Route::get('/currency/destroy/{id}', [App\Http\Controllers\CurrencyController::class, 'destroy'])->name('currency.destroy');
    Route::get('/currencyList',[App\Http\Controllers\CurrencyController::class,'currencyList'])->name('currency.currencyList');

   
    // Route::resource('roles', RoleController::class);
  


    Route::resource('profile', App\Http\Controllers\UserProfileController::class);

    // Tax Payers Management
    Route::resource('taxpayers', App\Http\Controllers\TaxPayerController::class,['except' => 'destroy']);
    Route::get('/taxpayers/destroy/{user_id}', [App\Http\Controllers\TaxPayerController::class, 'destroy'])->name('taxpayers.destroy');
    Route::get('taxpayersList',[App\Http\Controllers\TaxPayerController::class,'taxpayersList'])->name('taxpayers.taxpayersList');
    

    // User Tax Payer Management
    Route::prefix('users')->group(function () {
        // Your routes here
        // Route::resource('user/taxpayers', App\Http\Controllers\UserTaxPayerController::class);
        Route::get('/taxpayers/list', [App\Http\Controllers\UserTaxPayerController::class, 'index'])->name('usertaxpayers.index');
        Route::post('/taxpayers/assign', [App\Http\Controllers\UserTaxPayerController::class, 'assign'])->name('usertaxpayers.assign');
        Route::get('/taxpayers/status/{id}', [App\Http\Controllers\UserTaxPayerController::class, 'statusOn'])->name('usertaxpayers.statusOn');
        
        Route::get('/taxpayers/create/{id}', [App\Http\Controllers\UserTaxPayerController::class, 'create'])->name('usertaxpayers.create');
        Route::get('/taxpayers/destroy/{user_id}', [App\Http\Controllers\UserTaxPayerController::class, 'destroy'])->name('usertaxpayers.destroy');
    });
     
     
    // Contacts Management
    Route::resource('contacts', App\Http\Controllers\ContactController::class,['except' => 'destroy']);
    Route::get('/contacts/destroy/{user_id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contacts/getTaxPayer/{Tin?}/{TIN_BranchCode?}',[App\Http\Controllers\ContactController::class,'getTaxPayer'])->name('contacts.getTaxPayer');
    Route::get('/contacts/getBuyer/{id}',[App\Http\Controllers\ContactController::class,'getBuyer'])->name('contacts.getBuyer');

    Route::get('buyersList',[App\Http\Controllers\ContactController::class,'buyersList'])->name('contacts.buyersList');
    
    // // Sellers
    // Route::resource('sellers', App\Http\Controllers\SellerController::class);

    // // Buyers
    // Route::resource('buyers', App\Http\Controllers\BuyerController::class);
    // Route::controller(App\Http\Controllers\BuyerController::class)->group(function(){
        // Route::get('demo-search', 'index');
    // Route::get('buyerslist', 'buyerslist')->name('buyerslist');
    // });

    

    // Products
    Route::resource('products', App\Http\Controllers\ItemController::class,['except' => 'destroy']);
    Route::get('/products/destroy/{user_id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('products.destroy');

    Route::get('/products/getItemRow/{id}',[App\Http\Controllers\ItemController::class,'getItemRow'])->name('products.getItemRow');
 
    Route::controller(App\Http\Controllers\ItemController::class)->group(function(){
        // Route::get('demo-search', 'index');
        Route::get('itemslist', 'itemslist')->name('itemslist');
    });

    Route::resource('category', App\Http\Controllers\CategoryController::class,['except' => 'destroy']);
    Route::get('/category/destroy/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
      
    Route::get('categoryList',[App\Http\Controllers\CategoryController::class,'categoryList'])->name('categoryList');

    // Invoices
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class,['except' => 'destroy']);
    Route::get('/invoices/destroy/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoices.destroy');
    



});
 
 
// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});


// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});
 