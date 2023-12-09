<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\CustDashboardController;
use App\Http\Controllers\DataInputController;
use App\Http\Controllers\MercDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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




Route::get('/register', [RegisController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::post('/send-review/{order_id}', [ReviewController::class, 'sendReview']);
    

    Route::middleware(['auth', 'cekRole:customer'])->group(function () {
        Route::get('/customer-dashboard', [CustDashboardController::class, 'index'])->name('customer-dashboard');
        Route::get('/customer-account-settings',[CustDashboardController::class, 'userSettingView'])->name('customer-setting');
        Route::post('/customer-account-settings-store',[CustDashboardController::class, 'userSettingStore']);

        Route::get('/customer-order-history',[CustDashboardController::class, 'orderHistoryCustomer']);
        
        // Menambahkan route lain yang hanya dapat diakses oleh pengguna biasa
        Route::post('/search',[CustDashboardController::class, 'search']);
        Route::get('/search-{data}' , [CustDashboardController::class, 'result'])->name('result');

        Route::get('/merchant-view/{merchant}' , [CustDashboardController::class, 'view'])->name('view-merchant');

        Route::post('/order/{merchant_username}/{serviceItem}',[OrderController::class, 'order'])->name('order');
        
        Route::post('/customer-input-data/get-regency', [DataInputController::class, 'getRegencyCustomer'])->name('get-regency-customer');
        Route::post('/customer-input-data/get-district', [DataInputController::class, 'getDistrictCustomer'])->name('get-district-customer');
        Route::post('/customer-input-data/get-village', [DataInputController::class, 'getVillageCustomer'])->name('get-village-customer');




        Route::get('/customer-input-data', [DataInputController::class, 'DataCustomer'])->name('customer-data-input');

        Route::put('/customer-input-data/{customer_username}', [DataInputController::class, 'UpdateDataCustomer'])->name('customer-data-update');



    });
    
    Route::middleware(['auth', 'cekRole:merchant'])->group(function () {
        Route::get('/merchant-dashboard', [MercDashboardController::class, 'index'])->name('merchant-dashboard');
        Route::get('/merchant-account-settings',[MercDashboardController::class, 'userSettingView'])->name('merchant-setting');
        Route::post('/merchant-account-settings-store',[MercDashboardController::class, 'userSettingStore']);

        Route::get('/merchant-order-history',[MercDashboardController::class, 'orderHistoryMerchant']);
    
        
        // Menambahkan route lain yang hanya dapat diakses oleh merchant
        Route::post('/order/{order_id}',[OrderController::class, 'accOrder'])->name('acc-order');

        Route::get('/order/{order_id}',[OrderController::class, 'orderDiterima'])->name('order-diterima');

        Route::get('/order/progress/{order_id}',[OrderController::class, 'orderProgress']);
        Route::get('/order/selesai/{order_id}',[OrderController::class, 'orderSelesai']);


        Route::get('/merchant-input-data', [DataInputController::class, 'DataMerchant'])->name('merchant-data-input');

        Route::post('/merchant-input-data/get-regency', [DataInputController::class, 'getRegencyMerchant'])->name('get-regency-merchant');
        Route::post('/merchant-input-data/get-district', [DataInputController::class, 'getDistrictMerchant'])->name('get-district-merchant');
        Route::post('/merchant-input-data/get-village', [DataInputController::class, 'getVillageMerchant'])->name('get-village-merchant');

        Route::put('/merchant-input-data/{merchant_username}', [DataInputController::class, 'UpdateDataMerchant'])->name('merchant-data-update');
    });

Route::get('/',function(){
    return redirect()->route('login');
});
