<?php

use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('role:SuperAdmin')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
});
