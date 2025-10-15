<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/* users */
Route::get('/',PanelController::class)->name('panel');
Route::resource('users',UserController::class);
Route::get('Users/Trashed',[UserController::class,'trashed'])->name('users.trashed');
Route::post('Users/{id}/Restore',[UserController::class,'restore'])->name('users.restore');
Route::delete('Users/{id}/ForceDelete',[UserController::class,'forceDelete'])->name('users.force.delete');
Route::get('/create_role_user/{id}',[UserController::class,'CreateUserRole'])->name('create_role_user');
Route::post('/store_role_user/{id}',[UserController::class,'StoreUserRole'])->name('store_role_user');

/* roles */
Route::resource('roles',RoleController::class);
Route::get('Roles/Trashed',[RoleController::class,'trashed'])->name('roles.trashed');
Route::post('Roles/{id}/Restore',[RoleController::class,'restore'])->name('roles.restore');
Route::delete('Roles/{id}/ForceDelete',[RoleController::class,'forceDelete'])->name('roles.force.delete');

/* categories */
Route::resource('categories', CategoryController::class);
Route::get('Categories/Trashed',[CategoryController::class,'trashed'])->name('categories.trashed');
Route::post('Categories/{id}/Restore',[CategoryController::class,'restore'])->name('categories.restore');
Route::delete('Categories/{id}/ForceDelete',[CategoryController::class,'forceDelete'])->name('categories.force.delete');

/* articles */
Route::resource('articles', ArticlesController::class);
Route::get('Articles/Trashed',[ArticlesController::class,'trashed'])->name('articles.trashed');
Route::post('Articles/{id}/Restore',[ArticlesController::class,'restore'])->name('articles.restore');
Route::delete('Articles/{id}/ForceDelete',[ArticlesController::class,'forceDelete'])->name('articles.force.delete');
Route::post('/ckeditor_image', [ArticlesController::class, 'ckeditorImage'])->name('ckeditor.upload');

/* comments */
Route::get('comments', [CommentController::class, 'comments'])->name('comments.index');
Route::get('approved/comments/{comment}', [CommentController::class, 'approvedComments'])->name('approved.comments');
Route::get('reject/comments/{comment}', [CommentController::class, 'rejectComments'])->name('rejected.comments');
