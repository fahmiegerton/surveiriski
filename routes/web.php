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
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('feedback')->controller(FeedbackController::class)->group(function () {
        Route::get('/', 'index')->name('feedback.index');
        Route::post('/', 'store')->name('feedback.store');
        Route::delete('/', 'destroy')->name('feedback.destroy');
    });
});


Route::get('laporan', function () {
    return view('laporan');
});

Route::get('survey', [EntriesController::class, 'index'])->name('survey.entries');

Route::prefix('survey')->controller(EntriesController::class)->group(function () {
    Route::get('survey')->name('survey.entries');
    Route::post('save')->name('survey.save');
});
