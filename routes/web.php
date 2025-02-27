<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/users/view/{id}', [AdminController::class, 'show'])->name('admin.users.show');
    Route::delete('/users/{type}/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.delete');
    Route::get('/admin/manageallpost',[AdminController::class,'managepost'])->name('admin.postmanage');
   
});

//user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users1/view/{id}', [UserController::class, 'show'])->name('users1.view');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/post/update{id}',[UserController::class,'update'])->name('post.update');
    Route::delete('/user/post/delete/{id}', [UserController::class, 'destroy'])->name('user.post.delete');
});

//Anyone can  view post router
Route::get('/users/view/{id}', [UserController::class, 'show1'])->name('users.view');

//for search
Route::get('/search',[UserController::class,'search'])->name('home.search');

//welcome page Router
Route::get('/', [UserController::class, 'index1'])->name('home');
