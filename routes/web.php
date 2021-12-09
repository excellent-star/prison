<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommandantController;
use App\Http\Controllers\EnregistreurController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\ProfileController;

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



Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::middleware(['CheckIfUserLogged'])->group(function () {
    //
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});





Route::middleware(['CheckIfAdmin'])->group(function () {

    //






// these routes are designed for directions

Route::get('/directions', [DirectionController::class, 'directions'])->name('directions');
Route::post('/adddirection', [DirectionController::class, 'adddirection'])->name('adddirection');

Route::get('/fetch-all-directions', [DirectionController::class, 'fetch_all_directions'])->name('fetch_all_directions');
Route::get('/edit-direction', [DirectionController::class, 'edit_direction'])->name('edit_direction');
Route::post('/update-direction', [DirectionController::class, 'update_direction'])->name('update_direction');
Route::post('/delete-direction', [DirectionController::class, 'delete_direction'])->name('delete_direction');


// these routes are designed for directions


// these routes are designed for services

Route::get('/services', [ServiceController::class, 'services'])->name('services');
Route::post('/addservice', [ServiceController::class, 'addservice'])->name('addservice');

Route::get('/fetch-all-services', [ServiceController::class, 'fetch_all_services'])->name('fetch_all_services');

Route::get('/edit-service', [ServiceController::class, 'edit_service'])->name('edit_service');

Route::post('/update-service', [ServiceController::class, 'update_service'])->name('update_service');

Route::post('/delete-service', [ServiceController::class, 'delete_service'])->name('delete_service');


// these routes are designed for services


//these routes are designed for commandants

Route::get('/commandants', [CommandantController::class, 'commandants'])->name('commandants');
Route::post('/addcommandant', [CommandantController::class, 'addcommandant'])->name('addcommandant');

Route::get('/fetch-all-commandants', [CommandantController::class, 'fetch_all_commandants'])->name('fetch_all_commandants');

Route::get('/edit-commandant', [CommandantController::class, 'edit_commandant'])->name('edit_commandant');

Route::post('/update-commandant', [CommandantController::class, 'update_commandant'])->name('update_commandant');

Route::post('/delete-commandant', [CommandantController::class, 'delete_commandant'])->name('delete_commandant');

//these routes are designed for commandants



//these routes are designed for recorders

Route::get('/enregistreurs', [EnregistreurController::class, 'enregistreurs'])->name('enregistreurs');
Route::post('/addenregistreur', [EnregistreurController::class, 'addenregistreur'])->name('addenregistreur');

Route::get('/fetch-all-enregistreurs', [EnregistreurController::class, 'fetch_all_enregistreurs'])->name('fetch_all_enregistreurs');

Route::get('/edit-enregistreur', [EnregistreurController::class, 'edit_enregistreur'])->name('edit_enregistreur');

Route::post('/update-enregistreur', [EnregistreurController::class, 'update_enregistreur'])->name('update_enregistreur');

Route::post('/delete-enregistreur', [EnregistreurController::class, 'delete_enregistreur'])->name('delete_enregistreur');

//these routes are designed for recorders







});




Route::get('/visitespersonnels', [VisiteController::class, 'visitespersonnels'])->name('visitespersonnels');




//these routes are designed for profile

Route::get('/profiles', [ProfileController::class, 'profiles'])->name('profiles');
Route::post('/addenregistreur', [ProfileController::class, 'addenregistreur'])->name('addenregistreur');

// Route::get('/fetch-all-profiles', [ProfileController::class, 'fetch_all_profiles'])->name('fetch_all_profiles');

Route::get('/edit-profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');

Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('update_profile');

Route::post('/delete-profile', [ProfileController::class, 'delete_profile'])->name('delete_profile');

//these routes are designed for profile









