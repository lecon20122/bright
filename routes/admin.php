<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController  ;
use App\Http\Controllers\doctorController  ;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::resource('categories', CategoryController::class)->except(['show', 'update' , 'destroy']);

    Route::post('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //question
    Route::resource('question', QuestionController::class)->except(['show', 'update' , 'destroy']);
    Route::get('question/{id}/delete', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::post('question/{id}/update', [QuestionController::class, 'update'])->name('questions.update');
    Route::resource('answer', AnswerController::class);
    //doctor
    Route::get('doctors', [doctorController::class, 'index'])->name('doctor.index');
});


Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('login', [AdminAuthController::class, 'postLogin'])->name('admin.postLogin');
