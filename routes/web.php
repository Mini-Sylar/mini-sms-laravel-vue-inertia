<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\GroupsController;

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
    return Inertia::render('Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [ContactsController::class, 'getData']);
})->middleware(['auth', 'verified'])->name('dashboard');

// Contact Controller Routes
Route::controller(ContactsController::class)->group(function () {
    Route::get('/dashboard', 'getData')->name('dashboard');
    Route::post('/add-contact', 'addData')->name('add-contact');
    Route::get('/delete-contact{id}', 'deleteData')->name('delete-contact');
    Route::post('/update-contact', 'updateUser')->name('update-contact');
})->middleware(['auth', 'verified'])->name('dashboard');
// Group Controller Routes
Route::controller(GroupsController::class)->group(function () {
    Route::post('/add-group', 'addData')->name('add-group');
    Route::get('/delete-group{id}', 'deleteData')->name('delete-group');
    Route::post('/update-group', 'updateUser')->name('update-group');
})->middleware(['auth', 'verified'])->name('dashboard');


// Group Routes

require __DIR__ . '/auth.php';
