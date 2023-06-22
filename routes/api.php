<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
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

Route::post('/register', [LoginController::class,'register']);
Route::post('/login', [LoginController::class,'login'])->name('api.login');


Route::group(['middleware' => ['auth:sanctum']], function () {
   
    Route::post('user',function(){
        return auth()->user() ?? 'api/login';
    });
});

// Route::group(['middleware' => ['blog:sanctum'] ],function () {
//     Route::prefix('blog')->middleware('blog')->group(function(){
//         Route::get('test',function ()
//         {
//             return 'holio';
//         });
//     });
// });


Route::controller(EmailController::class)->group(function(){

    Route::post('send-email',[EmailController::class, 'sendEmail']);
    Route::get('send-email',[EmailController::class, 'viewEmail']);
});
