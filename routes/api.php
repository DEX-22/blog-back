<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Registercontroller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
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

Route::post('/register', [Registercontroller::class,'register']);
Route::post('/login', [LoginController::class,'login'])->name('api.login');


Route::prefix( 'auth')->middleware('auth')->group( function () {
   
    Route::post('user',[UserController::class,'index']);
});

// Route::group(['middleware' => ['blog:sanctum'] ],function () {
    Route::prefix('blog')->group(function(){
        Route::get('login',function (){

            $blog= Blog::find(1);
            
            $token = $blog->createToken('blog-token')->plainTextToken;
            return $token;
        });


       Route::group(['middleware' => 'blog'],function(){
        Route::get('test',function ()
        {
            return 'holio';
        });
        
       });
      
    });
// });


Route::controller(EmailController::class)->group(function(){

    Route::post('send-email',[EmailController::class, 'sendEmail']);
    Route::get('send-email',[EmailController::class, 'viewEmail']);
});
