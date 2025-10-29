<?php

use App\Http\Controllers\DragonController;

Route::get('/', [DragonController::class, 'index'])->name('inicio');
Route::get('/personaje/{id}', [DragonController::class, 'detalle'])->name('detalle.personaje');
