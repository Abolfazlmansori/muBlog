<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)->name('home');
Route::get('articles/{category}',[ArticleController::class,'articles'])->name('frontend.articles');
Route::get('article/{article}',[ArticleController::class,'article'])->name('frontend.article');
Route::post('store_users_comments',[CommentController::class,'StoreComment'])->middleware(['auth'])->name('store.users.comments');
