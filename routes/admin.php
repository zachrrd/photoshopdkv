<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FotoController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware([ 'auth', 'isAdmin'])->group(function(){
    
    
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('foto', FotoController::class);

Route::delete('/admin/foto/{id}/delete', [FotoController::class, 'destroy'])->name('foto.delete');


Route::get('/admin/foto/{foto}', [FotoController::class, 'show'])->name('foto.show');

});