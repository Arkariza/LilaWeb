<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login',[AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register',[AuthController::class, 'register']);
    Route::post('register',[AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');
    Route::get('rent-logs', [RentLogController::class, 'index'])->middleware('only_admin');
    Route::post('rent-approve/{id}', [RentLogController::class, 'approve'])->name('rent.approve')->middleware('only_admin');
    Route::post('rent-dismiss/{id}', [RentLogController::class, 'dismiss'])->name('rent.dismiss')->middleware('only_admin');



    Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('only_client');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('only_client');
    Route::post('profile/edit', [UserController::class, 'update'])->name('profile.update')->middleware('only_client');

    Route::get('desk-book/{slug}', [BookController::class, 'show'])->middleware('only_client')->name('desk-book');

    Route::post('rent-book', [BookRentController::class, 'rentBook'])->name('rent.book')->middleware('only_client');
    Route::get('form-rent/{slug}', [BookRentController::class, 'showFormRent'])->name('form.rent')->middleware('only_client');
    Route::post('process-rent', [BookRentController::class, 'processRent'])->name('process.rent')->middleware('only_client');

    Route::post('rent/approve/{id}', [BookRentController::class, 'approveRent'])->name('rent.approve')->middleware('only_admin');
    Route::post('rent/dismiss/{id}', [BookRentController::class, 'dismissRent'])->name('rent.dismiss')->middleware('only_admin');
    Route::post('rent/return/{id}', [BookRentController::class, 'returnBook'])->name('rent.return')->middleware('only_admin');
    
    Route::middleware('only_admin')->group(function () {
        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book-deleted', [BookController::class, 'deletedBook']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);
        
        
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}',[CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);
    
    
    
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-user', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);



    });


    Route::get('rent-logs', [RentLogController::class, 'index']);

});
