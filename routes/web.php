<?php

use App\Http\Controllers\MeetingsController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function(){
    Route::get('/reunioes', [MeetingsController::class, 'index'])->name('meetings.index');
    Route::get('/reunioes/criar', [MeetingsController::class, 'create'])->name('meetings.create');
    Route::post('/reunioes/guardar', [MeetingsController::class, 'store'])->name('meetings.store');
    Route::get('/reunioes/mostrar/{id}', [MeetingsController::class, 'show'])->name('meetings.show');
    Route::get('/reunioes/editar/{id}', [MeetingsController::class, 'edit'])->name('meetings.edit');
    Route::put('/reunioes/atualizar/{id}', [MeetingsController::class, 'update'])->name('meetings.update');
    Route::delete('/reunioes/apagar/{id}', [MeetingsController::class, 'destroy'])->name('meetings.destroy');
    Route::post('/reunioes/validando/{id}', [MeetingsController::class, 'validateMeeting'])->name('meetings.validate');
});
