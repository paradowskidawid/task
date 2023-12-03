<?php

use App\Http\Controllers\PetController;
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


Route::resource('pet', PetController::class);
Route::post('/upload-image', [PetController::class, 'uploadImage'])->name('upload.image');
Route::get('/pet/create/{tab}/{title}', [PetController::class, 'create'])->name('pet.create');
Route::post('/status', [PetController::class, 'findByStatus'])->name('pet.findByStatus');
Route::post('/postDataPet', [PetController::class, 'postDataPet'])->name('pet.postDataPet');
