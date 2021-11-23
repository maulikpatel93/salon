<?php
use App\Http\Controllers\Api\v1\AuthApiController;
use App\Http\Controllers\Api\v1\GuestApiController;
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
    Route::post('/register', [GuestApiController::class, 'register']);
    Route::middleware(['auth:api'])->group(function () {
        Route::post('/getUser', [AuthApiController::class, 'userdata']);
        Route::post('/logout', [GuestApiController::class, 'logout']);
    });
});
