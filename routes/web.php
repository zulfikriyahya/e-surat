<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintSuratTugasController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/print-surat-tugas', [PrintSuratTugasController::class, 'printSuratTugas']);
