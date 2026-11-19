<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\XmasGiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'LoadHome'])->name('welcome');

Route::get('/hello/{message}', function ($message) {
    return '<h1>Hello ' . $message . '</h1>';
});

//rota de home
Route::get(
    '/home',
    [UtilController::class, 'LoadHome']
)->name('home');

///////////////////////////////////////////////////////
//  USERS
///////////////////////////////////////////////////////

//rota do todos usuarios
Route::get(
    '/users',
    [UserController::class, 'LoadAllUser']
)->name('users.all');

//rota do criar usuarios
Route::get(
    '/users/create',
    [UserController::class, 'LoadCreateUser']
)->name('users.create');

//rota de apagar users
Route::get(
    '/delete-users/{id}',
    [UserController::class, 'DeleteUser']
)->name('users.delete');

Route::get(
    '/edit-users/{id}',
    [UserController::class, 'UpdateUser']
)->name('users.update')->middleware('auth');

Route::post(
    '/store-users',
    [UserController::class, 'StoreUser']
)->name('users.store');

Route::put(
    '/update-users',
    [UserController::class, 'UpdateForm']
)->name('users.updateForm');

///////////////////////////////////////////////////////
//  TASKS
///////////////////////////////////////////////////////

//rotas de tarefas
Route::get(
    '/all_tasks',
    [TaskController::class, 'LoadTasks']
)->name('tasks.all');

Route::get(
    '/delete-task/{id}',
    [TaskController::class, 'DeleteTask']
)->name('tasks.delete');

Route::get(
    '/edit-tasks/{id}',
    [TaskController::class, 'UpdateTask']
)->name('tasks.update');

Route::get(
    '/create_tasks',
    [TaskController::class, 'CreateTasks']
)->name('tasks.create');


Route::post(
    '/store-tasks/',
    [TaskController::class, 'StoreTask']
)->name('tasks.store');

///////////////////////////////////////////////////////
//  XMAS GIFTS
///////////////////////////////////////////////////////

Route::get(
    '/all_giftsxmas',
    [XmasGiftController::class, 'LoadGift']
)->name('xmas.all_giftxmas');

Route::get(
    '/xmas/create',
    [XmasGiftController::class, 'CreateGift']
)->name('xmas.create');

Route::get(
    '/edit-gifts/{id}',
    [XmasGiftController::class, 'UpdateGift']
)->name('xmas.update');

Route::get(
    '/delete-gifts/{id}',
    [XmasGiftController::class, 'DeleteGift']
)->name('xmas.delete');

Route::post(
    '/store-gifts',
    [XmasGiftController::class, 'StoreGift']
)->name('xmas.store');

Route::put(
    '/xmas-updateGiftForm',
    [XmasGiftController::class, 'UpdateGiftForm']
)->name('xmas.updateGiftForm');

///////////////////////////////////////////////////////
//  Dashboard
///////////////////////////////////////////////////////
Route::get(
    '/dashboard',
    [DashboardController::class, 'LoadDashboard']
)->name('backoffice.dashboard')->middleware('auth');

///////////////////////////////////////////////////////
//  FALLBACK
///////////////////////////////////////////////////////

Route::fallback(
    [UtilController::class, 'LoadFallback']
)->name('fallback');
