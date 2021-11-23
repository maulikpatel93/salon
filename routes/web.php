<?php

use App\Http\Controllers\Admin\DashboardController;

//Admin Panel
use App\Http\Controllers\Admin\ModulesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
//Web Panel
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::fallback(function () {
    // Route::view('/errors.404', 'home.notfound');
});
//Landing Page
Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
    // Route::view('/login', 'auth.login')->name('login');
});
Route::middleware('auth:web', 'PreventBackHistory')->group(function () {
    Route::view('/home', 'home')->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('user')->name('user.')->group(function () {
        // Route::view('/home', 'home')->name('home');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/', function () {
            return redirect(route('admin.login'));
        });
        // Route::view('/login', 'auth.adminlogin')->name('login');
        Route::get('/login', [AdminController::class, 'index'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('checklogin');
    });
    Route::middleware('auth:admin', 'PreventBackHistory')->group(function () {
        // Route::view('/home', 'admin.dashboard')->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //Modules
        Route::prefix('modules')->name('modules.')->group(function () {
            Route::get('/', [ModulesController::class, 'index'])->name('index');
            Route::post('/create', [ModulesController::class, 'create'])->name('create');
            Route::post('/store', [ModulesController::class, 'store'])->name('store');
            Route::post('/edit/{id}', [ModulesController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ModulesController::class, 'update'])->name('update');
            Route::post('/view/{id}', [ModulesController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [ModulesController::class, 'delete'])->name('delete');
            Route::post('/isactive/{id}', [ModulesController::class, 'isactive'])->name('isactive');
            Route::post('/applystatus', [ModulesController::class, 'applystatus'])->name('applystatus');

            //Dependent-Dropdown
            Route::post('/childmenu', [ModulesController::class, 'childmenu'])->name('childmenu');
        });

        //Permissions
        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [PermissionsController::class, 'index'])->name('index');
            Route::post('/create', [PermissionsController::class, 'create'])->name('create');
            Route::post('/store', [PermissionsController::class, 'store'])->name('store');
            Route::post('/edit/{id}', [PermissionsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [PermissionsController::class, 'update'])->name('update');
            Route::post('/view/{id}', [PermissionsController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [PermissionsController::class, 'delete'])->name('delete');
            Route::post('/isactive/{id}', [PermissionsController::class, 'isactive'])->name('isactive');
            Route::post('/applystatus', [PermissionsController::class, 'applystatus'])->name('applystatus');
        });

        //Roles
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RolesController::class, 'index'])->name('index');
            Route::post('/create', [RolesController::class, 'create'])->name('create');
            Route::post('/store', [RolesController::class, 'store'])->name('store');
            Route::post('/edit/{id}', [RolesController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [RolesController::class, 'update'])->name('update');
            Route::post('/view/{id}', [RolesController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [RolesController::class, 'delete'])->name('delete');
            Route::post('/isactive/{id}', [RolesController::class, 'isactive'])->name('isactive');
            Route::post('/applystatus', [RolesController::class, 'applystatus'])->name('applystatus');
            Route::get('/access/{id}', [RolesController::class, 'access'])->name('access');
            Route::post('/accessupdate/{id}', [RolesController::class, 'accessupdate'])->name('accessupdate');
        });

        //Roles
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('index');
            Route::post('/create', [UsersController::class, 'create'])->name('create');
            Route::post('/store', [UsersController::class, 'store'])->name('store');
            Route::post('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
            Route::post('/view/{id}', [UsersController::class, 'view'])->name('view');
            Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
            Route::post('/isactive/{id}', [UsersController::class, 'isactive'])->name('isactive');
            Route::post('/applystatus', [UsersController::class, 'applystatus'])->name('applystatus');
            Route::get('/access/{id}', [UsersController::class, 'access'])->name('access');
            Route::post('/accessupdate/{id}', [UsersController::class, 'accessupdate'])->name('accessupdate');
        });
    });
});
// Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });
