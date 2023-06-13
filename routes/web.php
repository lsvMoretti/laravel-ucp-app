<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/unapproved', function() {
        return view('admin.unapproved');
    })->middleware(['auth', 'verified'])->name('admin.unapproved');

    Route::get('/registrations', function() {
        return view('admin.registration-responses');
    })->middleware(['auth', 'verified'])->name('admin.registration-responses');

    Route::get('/reviewregistration/{submissionId}', function($submissionId) {
        return view('admin.registration-review', ['submissionId' => $submissionId]);
    })->middleware(['auth', 'verified'])->name('admin.registration-review');
});

Route::get('registration-quiz', function() {
    return view('registration-quiz');
})->middleware(['auth', 'verified'])->name('registration.quiz');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
