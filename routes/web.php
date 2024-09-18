<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactWebController;





Route::get('/contacts', [ContactWebController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactWebController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactWebController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}/edit', [ContactWebController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactWebController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactWebController::class, 'destroy'])->name('contacts.destroy');
