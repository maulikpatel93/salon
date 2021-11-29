<?php
use App\Http\Controllers\Api\v1\AuthApiController;
use App\Http\Controllers\Api\v1\CategoriesApiController;
use App\Http\Controllers\Api\v1\ClientApiController;
use App\Http\Controllers\Api\v1\GuestApiController;
use App\Http\Controllers\Api\v1\PricetierApiController;
use App\Http\Controllers\Api\v1\ProductsApiController;
use App\Http\Controllers\Api\v1\RosterApiController;
use App\Http\Controllers\Api\v1\ServicesApiController;
use App\Http\Controllers\Api\v1\StaffApiController;
use App\Http\Controllers\Api\v1\SuppliersApiController;
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
    Route::post('/login', [GuestApiController::class, 'login']);
    Route::post('/salonregistration', [GuestApiController::class, 'salonregistration']);
    Route::post('/getSalons', [GuestApiController::class, 'getSalons']);
    Route::post('/register', [GuestApiController::class, 'register']);
    Route::middleware(['auth:api'])->prefix('afterlogin')->group(function () {
        Route::post('/getUser', [AuthApiController::class, 'userdata']);
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
    });
});
