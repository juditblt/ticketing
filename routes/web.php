<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

//Route::view('/', 'welcome');

Route::get('/', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/ticket/details/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::get('/ticket/delete/{id}', [TicketController::class, 'delete'])->name('ticket.delete');

Route::get('ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('ticket/store', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/ticket/home', [TicketController::class, 'home'])->name('ticket.home');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/details/{id}', [UserController::class, 'show'])->name('users.show');
