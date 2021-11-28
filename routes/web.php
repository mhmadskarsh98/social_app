<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAge;
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





// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/posts', [PostsController::class,'index'])->name('posts.index');
// Route::get('/posts/create', [PostsController::class,'create'])->name('posts.create');
// Route::post('/posts', [PostsController::class,'store'])->name('posts.store');
// Route::get('/posts/{id}', [PostsController::class,'show'])->name('posts.show');
// Route::get('/posts/{id}/edit', [PostsController::class,'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [PostsController::class,'update'])->name('posts.update');
// Route::delete('/posts/{id}', [PostsController::class,'destroy'])->name('posts.destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





Route::middleware(['auth'])->group(function () {
    // ->prefix('insta') //route على مستوى ال
    //->as('insta.') // name على مستوى الاسم

    //POST PAGE
    Route::get('/', [PostsController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
    Route::resource('/posts', PostsController::class);
    Route::get('/trash', [PostsController::class, 'trash'])->name('trash');
    Route::put('trash/{id}', [PostsController::class, 'restore'])->name('trash.restore');
    Route::delete('trash/{id}', [PostsController::class, 'forceDelete'])->name('trash.forceDelete');
    //COMMENT PAGE
    
    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');

    //FOLLOW PAGE
    Route::post('/follow', [ProfileController::class, 'follow'])->name('follow');
    Route::post('/unfollow', [ProfileController::class, 'unfollow'])->name('unfollow');

    //PROFILE PAGE

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{username?}', [ProfileController::class, 'index'])->name('profile.index');

    //NOTIFICATION
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
    Route::get('/notifications/{id}', [NotificationsController::class, 'show'])->name('notifications.show');
    Route::delete('/notifications/{id>}', [NotificationsController::class, 'destroy'])->name('notifications.destroy');


    //likes
    Route::post('/likes',[LikesController::class, 'store'])->name('likes.store');

    //paypal
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('paypal/return',[CheckoutController::class,'paypalReturn'])->name('paypal.return');
    Route::get('paypal/cancel', [CheckoutController::class, 'paypalCancel'])->name('paypal.cancel');









    // if want customize name route of resource
    // Route::resource('/posts', PostsController::class)->names([
    //     'index' => 'posts.list',


    // ]);


});









// match => can use more method
//  =>> "#" that mean bookmark  and don't care
// any => can use any method

/*
opertions for info "CRUD"
CREATE
READ
UPDATE
DELETE
-------------------------------------
-------------------------------------
http request support method
GET => retrive info ( show info) => READ
, POST => store info => CREATE
, PUT => update single resource =>UPDATE
, PATCH =>update mulitresource
, DELETE  => delete info => DELETE
, HEAD => like get
, OPTIONS

*/
