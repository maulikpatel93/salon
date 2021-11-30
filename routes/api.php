<?php
use App\Http\Controllers\Api\v1\AppointmentApiController;
use App\Http\Controllers\Api\v1\AuthApiController;
use App\Http\Controllers\Api\v1\BusytimeApiController;
use App\Http\Controllers\Api\v1\CategoriesApiController;
use App\Http\Controllers\Api\v1\ClientApiController;
use App\Http\Controllers\Api\v1\GuestApiController;
use App\Http\Controllers\Api\v1\PricetierApiController;
use App\Http\Controllers\Api\v1\ProductsApiController;
use App\Http\Controllers\Api\v1\RosterApiController;
use App\Http\Controllers\Api\v1\ServicesApiController;
use App\Http\Controllers\Api\v1\StaffApiController;
use App\Http\Controllers\Api\v1\SuppliersApiController;
use App\Http\Controllers\Api\v1\VoucherApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::fallback(function () {
    abort(404, 'API resource not found');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/index', [GuestApiController::class, 'index']);
    Route::prefix('beforelogin')->group(function () {
        Route::post('/login', [GuestApiController::class, 'login']);
        Route::post('/salonregistration', [GuestApiController::class, 'salonregistration']);
        Route::post('/salons', [GuestApiController::class, 'salons']);
        Route::post('/register', [GuestApiController::class, 'register']);
    });
    Route::post('/login', [GuestApiController::class, 'login']);
    Route::post('/salonregistration', [GuestApiController::class, 'salonregistration']);
    Route::post('/salons', [GuestApiController::class, 'salons']);
    Route::post('/register', [GuestApiController::class, 'register']);
    Route::middleware(['auth:api'])->prefix('afterlogin')->group(function () {
        Route::post('/user', [AuthApiController::class, 'user']);
        Route::post('/logout', [GuestApiController::class, 'logout']);

        //Suppliers
        Route::prefix('suppliers')->name('suppliers.')->group(function () {
            Route::post('/view', [SuppliersApiController::class, 'view'])->name('view');
            Route::post('/store', [SuppliersApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [SuppliersApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [SuppliersApiController::class, 'delete'])->name('delete');
        });

        //Products
        Route::prefix('products')->name('products.')->group(function () {
            Route::post('/view', [ProductsApiController::class, 'view'])->name('view');
            Route::post('/store', [ProductsApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ProductsApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ProductsApiController::class, 'delete'])->name('delete');
        });

        //Categories
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::post('/view', [CategoriesApiController::class, 'view'])->name('view');
            Route::post('/store', [CategoriesApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CategoriesApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [CategoriesApiController::class, 'delete'])->name('delete');
        });

        //Services
        Route::prefix('services')->name('services.')->group(function () {
            Route::post('/view', [ServicesApiController::class, 'view'])->name('view');
            Route::post('/store', [ServicesApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ServicesApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ServicesApiController::class, 'delete'])->name('delete');
        });

        //Price tier
        Route::prefix('pricetier')->name('pricetier.')->group(function () {
            Route::post('/view', [PricetierApiController::class, 'view'])->name('view');
            Route::post('/store', [PricetierApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [PricetierApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [PricetierApiController::class, 'delete'])->name('delete');
        });

        //Staff
        Route::prefix('staff')->name('staff.')->group(function () {
            Route::post('/view', [StaffApiController::class, 'view'])->name('view');
            Route::post('/store', [StaffApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [StaffApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [StaffApiController::class, 'delete'])->name('delete');
        });

        //Roster
        Route::prefix('roster')->name('roster.')->group(function () {
            Route::post('/view', [RosterApiController::class, 'view'])->name('view');
            Route::post('/store', [RosterApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [RosterApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [RosterApiController::class, 'delete'])->name('delete');
        });

        //Client
        Route::prefix('client')->name('client.')->group(function () {
            Route::post('/view', [ClientApiController::class, 'view'])->name('view');
            Route::post('/store', [ClientApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClientApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ClientApiController::class, 'delete'])->name('delete');
        });

        //Voucher
        Route::prefix('voucher')->name('voucher.')->group(function () {
            Route::post('/view', [VoucherApiController::class, 'view'])->name('view');
            Route::post('/store', [VoucherApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [VoucherApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [VoucherApiController::class, 'delete'])->name('delete');
        });

        //Appointment
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::post('/view', [AppointmentApiController::class, 'view'])->name('view');
            Route::post('/store', [AppointmentApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [AppointmentApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [AppointmentApiController::class, 'delete'])->name('delete');
            Route::post('/status/{id}', [AppointmentApiController::class, 'status'])->name('status');
        });

        //BusyTime
        Route::prefix('busytime')->name('busytime.')->group(function () {
            Route::post('/view', [BusytimeApiController::class, 'view'])->name('view');
            Route::post('/store', [BusytimeApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [BusytimeApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [BusytimeApiController::class, 'delete'])->name('delete');
        });

    });
});
