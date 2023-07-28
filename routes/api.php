<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Registercontroller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Post\PostController;
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

Route::post('post/new',[PostController::class, 'create']);
Route::middleware('auth:sanctum')->get('/user',[UserController::class,'getUser'] );
// Route::group(['middleware'=>['auth:sanctum']], function () {
    
//     Route::post('user',[UserController::class,'getUser']);
    
//     Route::prefix('post')->group(function(){

//         Route::post('get-all',[PostController::class, 'getAll']);
//     });

// });

// Route::group(['middleware' => ['blog:sanctum'] ],function () {
    Route::prefix('blog')->group(function(){

        Route::post('new');

    //     Route::get('login',function (){

            // $blog= Blog::find(1);
            
            // $token = $blog->createToken('blog-token')->plainTextToken;
            // return $token;
    //     });


    //    Route::group(['middleware' => 'blog'],function(){
    //     Route::get('test',function ()
    //     {
    //         return 'holio';
    //     });
        
    //    });
      
    });
// });


Route::controller(EmailController::class)->group(function(){

    Route::post('send-email',[EmailController::class, 'sendEmail']);
    Route::get('send-email',[EmailController::class, 'viewEmail']);
});
