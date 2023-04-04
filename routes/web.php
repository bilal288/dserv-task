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


Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update',  [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::post('/user/activate',  [App\Http\Controllers\UserController::class, 'activateUser'])->name('user.activate');
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.list');
Route::get('user/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('send-mail', [App\Http\Controllers\MailController::class, 'index']);


// Task 7
// Add a Route in Laravel that returns all Usergroups including
// Users (This will be a multidimensional
// array)
Route::get('/usergroups-with-users', [App\Http\Controllers\UserController::class, 'getAllUsergroupsAndUsers']);
