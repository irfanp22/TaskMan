<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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
    return redirect()->route('dashboard');
});
Route::middleware('auth')->group(function(){
    Route::controller(TaskController::class)->prefix('tasks')->group(function(){
        Route::get('', 'index')->name('dashboard');
        Route::get('completed', 'completed')->name('completed');
        Route::get('incomplete', 'incomplete')->name('incomplete');
        Route::get('tambah', function(){
            return view('tambah')->with('data', null);
        })->name('tambah');
        Route::get('{id}', 'edit')->name('edit');
        Route::post('store', 'store')->name('tambah.store');
        Route::put('{id}', 'update')->name('edit.update');
        Route::delete('{id}', 'hapus')->name('hapus');
        Route::put('{id}/status', 'status')->name('status');
    });
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';
