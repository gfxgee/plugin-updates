
<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\ClientsController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/topics', [TopicController::class,'index'])->middleware(['auth', 'verified'])->name('topics.index');
Route::post('/topics', [TopicController::class,'store'])->middleware(['auth', 'verified'])->name('topics.store');
Route::get('/topics/{topic}/edit', [TopicController::class,'edit'])->middleware(['auth', 'verified'])->name('topics.edit');
Route::get('/topics/create', [TopicController::class,'create'])->middleware(['auth', 'verified'])->name('topics.create');
Route::put('/topics/{topic}', [TopicController::class,'update'])->middleware(['auth', 'verified'])->name('topics.update');
Route::delete('/topics/{topic}', [TopicController::class,'destroy'])->middleware(['auth', 'verified'])->name('topics.destroy');

Route::get('/clients', [ClientsController::class,'index'])->middleware(['auth', 'verified'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class,'create'])->middleware(['auth', 'verified'])->name('clients.create');
Route::post('/clients', [ClientsController::class,'store'])->middleware(['auth', 'verified'])->name('clients.store');
Route::delete('/clients/{client}', [ClientsController::class,'destroy'])->middleware(['auth', 'verified'])->name('clients.destroy');
Route::get('/clients/{client}/edit', [ClientsController::class,'edit'])->middleware(['auth', 'verified'])->name('clients.edit');
Route::put('/clients/{client}', [ClientsController::class,'update'])->middleware(['auth', 'verified'])->name('clients.update');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
