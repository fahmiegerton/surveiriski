<?php

use App\Http\Controllers\EntriesController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);

    return view('landingpage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [EntriesController::class, 'dash'])->name('dashboard');

    Route::prefix('dash/feedback')->controller(FeedbackController::class)->group(function () {
        Route::get('/', 'index')->name('feedback.index');
        Route::delete('destroy/{id}', 'destroy')->name('feedback.destroy');
    });

    Route::prefix('survey')->controller(EntriesController::class)->group(function () {
        Route::delete('destroy/{id}', 'destroy')->name('survey.destroy');
        Route::get('report/{id}', 'report')->name('survey.report');
    });
});


Route::get('laporan', [EntriesController::class, 'generateReport']);

Route::prefix('survey')->controller(EntriesController::class)->group(function () {
    Route::get('/', 'index')->name('survey.entries');
    Route::post('save', 'store')->name('survey.save');
    Route::get('gettest', 'gettesst')->name('survey.test');
});


Route::prefix('feedback')->controller(FeedbackController::class)->group(function () {
    Route::post('store', 'store')->name('feedback.store');
});
