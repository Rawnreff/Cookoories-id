<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');
Route::get('/recipe',[\App\Http\Controllers\Frontend\RecipeController::class, 'index'])->name('recipe');
Route::get('/recipe/{recipe:slug}',[\App\Http\Controllers\Frontend\RecipeController::class, 'show'])->name('recipe.show');
Route::get('/blog',[\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{category:slug}', [\App\Http\Controllers\Frontend\BlogController::class, 'showCategory'])->name('blog.category');
Route::get('/blog/{post:slug}',[\App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');
Route::get('/about',[\App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
Route::get('/contact',[\App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class)->except('show');
    Route::resource('recipes', \App\Http\Controllers\Admin\RecipeController::class)->except('show');
    Route::resource('recipes.galleries', \App\Http\Controllers\Admin\GalleryController::class)->only(['store', 'edit', 'update', 'destroy']);
    Route::resource('recipes.todos', \App\Http\Controllers\Admin\TodoController::class)->only(['store', 'edit', 'update', 'destroy']);
    Route::resource('recipes.ingredients', \App\Http\Controllers\Admin\IngredientController::class)->only(['store', 'edit', 'update', 'destroy']);
});
