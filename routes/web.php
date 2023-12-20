<?php

use App\Http\Controllers\LottoDrawController;
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

Route::get('/', [LottoDrawController::class, 'index'])->name('lotto.index');
Route::post('/lotto-draw/play/{mainSetSize}/{ballsDrawn}', [LottoDrawController::class, 'play'])->name('lotto.play');
