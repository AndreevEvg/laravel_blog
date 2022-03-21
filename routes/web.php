<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\Admin\PostController as AdminPostController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
Route::get('/blog/posts', [PostController::class, 'index']);
Route::get('/blog/admin/category', [CategoryController::class, 'index']);
Route::get('/blog/admin/category/{id}', [CategoryController::class, 'edit']);
Route::get('/blog/admin/category/create', [CategoryController::class, 'create']);
Route::patch('/blog/admin/category/update', [CategoryController::class, 'update'])->name('blog.admin.category.update');
//Route::patch('/blog/admin/category/update/{id}', [CategoryController::class, 'update'])->name('blog.admin.category.update');
Route::get('/blog/admin/category/create', [CategoryController::class, 'create'])->name('blog.admin.category.create');
Route::get('/blog/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('blog.admin.category.edit');
Route::post('/blog/admin/category/store', [CategoryController::class, 'store'])->name('blog.admin.category.store');
*/


Route::group(['prefix' => 'blog'], function() {
    Route::resource('posts', PostController::class)->names('blog.posts');
});

/*
|--------------------------------------------------------------------------
| Админка блога
|--------------------------------------------------------------------------
*/

$groupData = [
    'prefix' => 'admin/blog'
];

Route::group($groupData, function() {
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('category', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.category');

    //BlogPost
    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});

