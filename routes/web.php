<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactsController;

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

Route::post('/add-contact', [ContactsController::class, 'addData'])->middleware(['auth', 'verified'])->name('add-contact');
Route::get('/dashboard', [ContactsController::class, 'getData'])->middleware(['auth', 'verified'])->name('dashboard');
// Delete
Route::get('/delete/{id}', [ContactsController::class, 'deleteData'])->middleware(['auth', 'verified'])->name('delete');
// Get Specific Contact
Route::post('/update', [ContactsController::class, 'updateUser'])->middleware(['auth', 'verified'])->name('update');


require __DIR__ . '/auth.php';
