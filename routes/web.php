<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
Route::get('/posts',[PostController::class, 'index']) -> name(name:'posts.index');
Route::get('/posts/create', [PostController::class, 'create']) -> name(name :'posts.create');

Route::post('/posts',[PostController::class, 'store'])->name(name:'posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name(name:'posts.edit');

Route::get('/posts/{post}',[PostController::class , 'show']) -> name(name:'posts.show');
Route::put('/posts/{post}', [PostController::class , 'update'])->name(name:'posts.update');
Route::DELETE('/posts/{post}',[PostController::class,'destroy'])->name(name:'posts.destroy');


// 1- define a new route so the user can access it though browser

// 2- define controller that renders a view
// 3- define view that contains list of posts
// 4- remove any static html data frome the view   