<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;

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

Route::get('/', function () {
    return view('identification');
});

//Route::get('/download',[\App\Http\Controllers\DownloadController::class,'download'])->name('download.file');

Route::post('/download',[DownloadController::class,'download'])->name('download.file');
Route::get('/download', function () {
    return view('identification');    
});