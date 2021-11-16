<?php

use Illuminate\Support\Facades\Route;

//Admin Panel
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModulesController;
//Web Panel
use App\Http\Controllers\Auth\LoginController;

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

//Landing Page
Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
    Route::view('/login', 'auth.login')->name('login');
});
Route::middleware('auth:web', 'PreventBackHistory')->group(function(){
    Route::view('/home', 'home')->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('user')->name('user.')->group(function(){
        // Route::view('/home', 'home')->name('home');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::get('/', function () {
            return redirect(route('admin.login'));
        });
        Route::view('/login', 'auth.adminlogin')->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('checklogin');
    });
    Route::middleware('auth:admin', 'PreventBackHistory')->group(function(){
        // Route::view('/home', 'admin.dashboard')->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //Modules
        Route::prefix('modules')->name('modules.')->group(function() {
            Route::get('/', [ModulesController::class, 'index'])->name('index');
            Route::post('/create', [ModulesController::class, 'create'])->name('create');
            Route::post('/store', [ModulesController::class, 'store'])->name('store');
            Route::post('/edit/{id}', [ModulesController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ModulesController::class, 'update'])->name('update');
            Route::post('/view/{id}', [ModulesController::class, 'view'])->name('view');
            Route::get('/delete', [ModulesController::class, 'delete'])->name('delete');
            Route::post('/isactive/{id}', [ModulesController::class, 'isactive'])->name('isactive');
            Route::post('/applystatus', [ModulesController::class, 'applystatus'])->name('applystatus');

            //Dependent-Dropdown
            Route::post('/childmenu', [ModulesController::class, 'childmenu'])->name('childmenu');
        });
    });
});
// Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });