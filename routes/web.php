<?php

//Admin Panel
use App\Http\Controllers\Admin\CustompagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailtemplatesController;
use App\Http\Controllers\Admin\ModulesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SalonsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AdminController;
//Web Panel
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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
    return redirect('admin');
});

//Auth::routes();
Route::fallback(function () {
    abort(404, 'API resource not found');
});
//Landing Page
// Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
//     // Route::view('/login', 'auth.login')->name('login');
// });
// Route::middleware('auth:web', 'PreventBackHistory')->group(function () {
//     // Route::view('/home', 'home')->name('home');
//     // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//     // Route::prefix('user')->name('user.')->group(function () {
//     //     // Route::view('/home', 'home')->name('home');
//     // });
// });

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/', function () {
            return redirect(route('admin.login'));
        });
        // Route::view('/login', 'auth.adminlogin')->name('login');
        Route::get('/login', [AdminController::class, 'index'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('checklogin');
        Route::get('/forgot-password', function () {
            return view('admin.passwords.email');
        })->name('password.request');
        Route::post('/forgot-password', function (Request $request) {
            $request->validate(['email' => 'required|email']);
            $status = Password::sendResetLink(
                $request->only('email')
            );
            return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
        })->name('password.email');
        Route::get('/reset-password/{token}', function ($token) {
            return view('admin.passwords.reset', ['token' => $token]);
        })->name('password.reset');
        Route::post('/reset-password', function (Request $request) {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]);
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );
            return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
        })->name('password.update');
    });
    Route::middleware('auth:admin', 'PreventBackHistory')->group(function () {
        // Route::view('/home', 'admin.dashboard')->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //Modules
        Route::prefix('modules')->name('modules.')->group(function () {
            Route::get('/', [ModulesController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [ModulesController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [ModulesController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [ModulesController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [ModulesController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [ModulesController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [ModulesController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [ModulesController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [ModulesController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');

            //Dependent-Dropdown
            Route::post('/childmenu', [ModulesController::class, 'childmenu'])->name('childmenu');
        });

        //Permissions
        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [PermissionsController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [PermissionsController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [PermissionsController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [PermissionsController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [PermissionsController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [PermissionsController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [PermissionsController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [PermissionsController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [PermissionsController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
        });

        //Roles
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RolesController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [RolesController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [RolesController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [RolesController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [RolesController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [RolesController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [RolesController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [RolesController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [RolesController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
            Route::get('/access/{id}', [RolesController::class, 'access'])->name('access')->middleware('checkpermission');
            Route::post('/accessupdate/{id}', [RolesController::class, 'accessupdate'])->name('accessupdate');
        });

        //Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingsController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [SettingsController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [SettingsController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [SettingsController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [SettingsController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [SettingsController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [SettingsController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [SettingsController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [SettingsController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
        });

        //Custom Page
        Route::prefix('custompages')->name('custompages.')->group(function () {
            Route::get('/', [CustompagesController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [CustompagesController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [CustompagesController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [CustompagesController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [CustompagesController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [CustompagesController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [CustompagesController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [CustompagesController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [CustompagesController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
        });

        //Email Templates
        Route::prefix('emailtemplates')->name('emailtemplates.')->group(function () {
            Route::get('/', [EmailtemplatesController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [EmailtemplatesController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [EmailtemplatesController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [EmailtemplatesController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [EmailtemplatesController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [EmailtemplatesController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [EmailtemplatesController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [EmailtemplatesController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [EmailtemplatesController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
        });

        //Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [UsersController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [UsersController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [UsersController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [UsersController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [UsersController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [UsersController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [UsersController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
            Route::get('/access/{id}', [UsersController::class, 'access'])->name('access')->middleware('checkpermission');
            Route::post('/accessupdate/{id}', [UsersController::class, 'accessupdate'])->name('accessupdate');
            //Dependent-Dropdown
            Route::post('/salons', [UsersController::class, 'salons'])->name('salons');
        });

        //Salons
        Route::prefix('salons')->name('salons.')->group(function () {
            Route::get('/', [SalonsController::class, 'index'])->name('index')->middleware('checkpermission');
            Route::post('/create', [SalonsController::class, 'create'])->name('create')->middleware('checkpermission');
            Route::post('/store', [SalonsController::class, 'store'])->name('store')->middleware('checkpermission');
            Route::post('/edit/{id}', [SalonsController::class, 'edit'])->name('edit')->middleware('checkpermission');
            Route::post('/update/{id}', [SalonsController::class, 'update'])->name('update')->middleware('checkpermission');
            Route::post('/view/{id}', [SalonsController::class, 'view'])->name('view')->middleware('checkpermission');
            Route::get('/delete/{id}', [SalonsController::class, 'delete'])->name('delete')->middleware('checkpermission');
            Route::post('/isactive/{id}', [SalonsController::class, 'isactive'])->name('isactive')->middleware('checkpermission');
            Route::post('/applystatus', [SalonsController::class, 'applystatus'])->name('applystatus')->middleware('checkpermission');
        });
    });
});

// Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// });