<?php
use App\Http\Controllers\Api\v1\AppointmentApiController;
use App\Http\Controllers\Api\v1\AuthApiController;
use App\Http\Controllers\Api\v1\BusytimeApiController;
use App\Http\Controllers\Api\v1\CategoriesApiController;
use App\Http\Controllers\Api\v1\ClientApiController;
use App\Http\Controllers\Api\v1\ClientDocumentApiController;
use App\Http\Controllers\Api\v1\ClientNoteApiController;
use App\Http\Controllers\Api\v1\ClientPhotoApiController;
use App\Http\Controllers\Api\v1\GuestApiController;
use App\Http\Controllers\Api\v1\MembershipApiController;
use App\Http\Controllers\Api\v1\PricetierApiController;
use App\Http\Controllers\Api\v1\ProductsApiController;
use App\Http\Controllers\Api\v1\RosterApiController;
use App\Http\Controllers\Api\v1\SaleApiController;
use App\Http\Controllers\Api\v1\SalonAccessApiController;
use App\Http\Controllers\Api\v1\SalonModulesApiController;
use App\Http\Controllers\Api\v1\SalonsApiController;
use App\Http\Controllers\Api\v1\ServicesApiController;
use App\Http\Controllers\Api\v1\StaffApiController;
use App\Http\Controllers\Api\v1\StripeApiController;
use App\Http\Controllers\Api\v1\SubscriptionApiController;
use App\Http\Controllers\Api\v1\SuppliersApiController;
use App\Http\Controllers\Api\v1\TaxApiController;
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
    // Route::prefix('beforelogin')->group(function () {
    //     Route::post('/login', [GuestApiController::class, 'login']);
    //     Route::post('/salonregistration', [GuestApiController::class, 'salonregistration']);
    //     Route::post('/salons', [GuestApiController::class, 'salons']);
    //     Route::post('/register', [GuestApiController::class, 'register']);
    // });
    Route::post('/login', [GuestApiController::class, 'login']);
    Route::post('/salonregistration', [GuestApiController::class, 'salonregistration']);
    Route::post('/salons', [GuestApiController::class, 'salons']);
    Route::post('/register', [GuestApiController::class, 'register']);

    Route::get("/sendmail", function () {return view("emailtemplates.template.mail");});

    Route::middleware(['guest:api'])->prefix('beforelogin')->group(function () {
        Route::controller(SalonsApiController::class)->prefix('salons')->name('salons.')->group(function () {
            Route::post('/checkexist', 'checkexist')->name('checkexist');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
        });
        Route::post('/forgotpassword', [GuestApiController::class, 'forgotpassword']);
    });

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
            Route::post('/addonservices', [ServicesApiController::class, 'addonservices'])->name('addonservices');
            Route::post('/addonstaff', [ServicesApiController::class, 'addonstaff'])->name('addonstaff');
            Route::post('/serviceprice', [ServicesApiController::class, 'serviceprice'])->name('serviceprice');
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
            Route::post('/addonservices', [StaffApiController::class, 'addonservices'])->name('addonservices');
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
            Route::post('/clientmembership', [ClientApiController::class, 'clientmembership'])->name('clientmembership');
        });

        //Client photo
        Route::prefix('clientphoto')->name('clientphoto.')->group(function () {
            Route::post('/view', [ClientPhotoApiController::class, 'view'])->name('view');
            Route::post('/store', [ClientPhotoApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClientPhotoApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ClientPhotoApiController::class, 'delete'])->name('delete');
        });

        //Client document
        Route::prefix('clientdocument')->name('clientdocument.')->group(function () {
            Route::post('/view', [ClientDocumentApiController::class, 'view'])->name('view');
            Route::post('/store', [ClientDocumentApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClientDocumentApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ClientDocumentApiController::class, 'delete'])->name('delete');
        });

        //Client document
        Route::prefix('clientnote')->name('clientnote.')->group(function () {
            Route::post('/view', [ClientNoteApiController::class, 'view'])->name('view');
            Route::post('/store', [ClientNoteApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClientNoteApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [ClientNoteApiController::class, 'delete'])->name('delete');
        });

        //Voucher
        Route::prefix('voucher')->name('voucher.')->group(function () {
            Route::post('/view', [VoucherApiController::class, 'view'])->name('view');
            Route::post('/store', [VoucherApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [VoucherApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [VoucherApiController::class, 'delete'])->name('delete');
        });

        //Membership
        Route::controller(MembershipApiController::class)->prefix('membership')->name('membership.')->group(function () {
            Route::post('/view', 'view');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update')->whereNumber('id');
            Route::post('/delete/{id}', 'delete')->whereNumber('id');
        });

        //Subscription
        Route::controller(SubscriptionApiController::class)->prefix('subscription')->name('subscription.')->group(function () {
            Route::post('/view', 'view');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update')->whereNumber('id');
            Route::post('/delete/{id}', 'delete')->whereNumber('id');
            Route::post('/services', 'services');
        });

        //Appointment
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::post('/view', [AppointmentApiController::class, 'view'])->name('view');
            Route::post('/store', [AppointmentApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [AppointmentApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [AppointmentApiController::class, 'delete'])->name('delete');
            Route::post('/status/{id}', [AppointmentApiController::class, 'status'])->name('status');
            Route::post('/reschedule/{id}', [AppointmentApiController::class, 'reschedule'])->name('reschedule');
        });

        //BusyTime
        Route::prefix('busytime')->name('busytime.')->group(function () {
            Route::post('/view', [BusytimeApiController::class, 'view'])->name('view');
            Route::post('/store', [BusytimeApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [BusytimeApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [BusytimeApiController::class, 'delete'])->name('delete');
        });

        //SalonModule
        Route::prefix('salonmodule')->name('salonmodule.')->group(function () {
            Route::post('/view', [SalonModulesApiController::class, 'view'])->name('view');
            Route::post('/accessupdate', [SalonModulesApiController::class, 'accessupdate'])->name('accessupdate');
        });

        //SalonAccess
        Route::prefix('salonaccess')->name('salonaccess.')->group(function () {
            Route::post('/view', [SalonAccessApiController::class, 'view'])->name('view');
            Route::post('/store', [SalonAccessApiController::class, 'store'])->name('store');
            Route::post('/update/{id}', [SalonAccessApiController::class, 'update'])->name('update');
            Route::post('/delete/{id}', [SalonAccessApiController::class, 'delete'])->name('delete');
        });

        //Tax
        Route::prefix('tax')->name('tax.')->group(function () {
            Route::post('/view', [TaxApiController::class, 'view'])->name('view');
        });

        Route::controller(SaleApiController::class)->prefix('sale')->name('sale.')->group(function () {
            Route::post('/invoice', 'invoice')->name('invoice');
            Route::post('/createinvoice', 'createinvoice')->name('createinvoice');
            Route::post('/services', 'services')->name('services');
            Route::post('/products', 'products')->name('products');
            Route::post('/vouchers', 'vouchers')->name('vouchers');
            Route::post('/membership', 'membership')->name('membership');
            Route::post('/store', 'store')->name('store');
            Route::post('/sendEmailInvoice', 'sendEmailInvoice')->name('sendEmailInvoice');
        });

        //Stripe
        Route::controller(StripeApiController::class)->prefix('stripe')->name('stripe.')->group(function () {
            Route::post('/setup', 'setup');
            Route::post('/store', 'store');
        });
    });
});