<?php

use App\Http\Controllers\ApI\CommentsController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\ApI\ProfileController;
use App\Http\Controllers\ProfileController as AppProfileController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// prefix('api/') by default init the prefix in RouteServiceProvider

// Route::apiResource('posts',[PostsController::class]);


// posts api
Route::get('posts/', [PostsController::class, 'index'])->middleware('auth:sanctum');
Route::get('posts/{id}', [PostsController::class, 'show']);
Route::post('posts/store', [PostsController::class, 'store']);
Route::put('posts/update/{id}', [PostsController::class, 'update']);
Route::delete('posts/{id}', [PostsController::class, 'destroy']);

// comments api

Route::post('comments/store',[CommentsController::class,'store']);

//profile api

Route::get('profile/{username?}',[ProfileController::class,'index']);
Route::put('profile/update',[ProfileController::class,'update']);
Route::post('profile/create', [ProfileController::class, 'store']);
Route::post('follow/',[ProfileController::class,'follow']);


// login api
Route::post('login/', [LoginController::class, 'Login'])->middleware('guest:sanctum');
Route::delete('logout/', [LoginController::class, 'logout'])->middleware('auth:sanctum');
Route::get('user/', [LoginController::class, 'user'])->middleware('auth:sanctum');
