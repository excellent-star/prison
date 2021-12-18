<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommandantController;
use App\Http\Controllers\EnregistreurController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RandomController;
use App\Http\Controllers\PreviewController;

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


// I used any to  allow both get and post on post route



Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::any('/login', [HomeController::class, 'login'])->name('login');

Route::middleware(['CheckIfUserLogged'])->group(function () {
    //
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


        // these routes are for preview

Route::get('/previewvisitor/{id}', [PreviewController::class, 'previewvisitor'])->name('previewvisitor');
Route::get('/previewevent/{id}', [PreviewController::class, 'previewevent'])->name('previewevent');
// these routes are for preview



});





Route::middleware(['CheckIfAdmin'])->group(function () {

    //






// these routes are designed for directions

Route::get('/directions', [DirectionController::class, 'directions'])->name('directions');
Route::any('/adddirection', [DirectionController::class, 'adddirection'])->name('adddirection');

Route::get('/fetch-all-directions', [DirectionController::class, 'fetch_all_directions'])->name('fetch_all_directions');
Route::get('/edit-direction', [DirectionController::class, 'edit_direction'])->name('edit_direction');
Route::any('/update-direction', [DirectionController::class, 'update_direction'])->name('update_direction');
Route::any('/delete-direction', [DirectionController::class, 'delete_direction'])->name('delete_direction');


// these routes are designed for directions


// these routes are designed for services

Route::get('/services', [ServiceController::class, 'services'])->name('services');
Route::any('/addservice', [ServiceController::class, 'addservice'])->name('addservice');

Route::get('/fetch-all-services', [ServiceController::class, 'fetch_all_services'])->name('fetch_all_services');

Route::get('/edit-service', [ServiceController::class, 'edit_service'])->name('edit_service');

Route::any('/update-service', [ServiceController::class, 'update_service'])->name('update_service');

Route::any('/delete-service', [ServiceController::class, 'delete_service'])->name('delete_service');


// these routes are designed for services


//these routes are designed for commandants

Route::get('/commandants', [CommandantController::class, 'commandants'])->name('commandants');
Route::any('/addcommandant', [CommandantController::class, 'addcommandant'])->name('addcommandant');

Route::get('/fetch-all-commandants', [CommandantController::class, 'fetch_all_commandants'])->name('fetch_all_commandants');

Route::get('/edit-commandant', [CommandantController::class, 'edit_commandant'])->name('edit_commandant');

Route::any('/update-commandant', [CommandantController::class, 'update_commandant'])->name('update_commandant');

Route::any('/delete-commandant', [CommandantController::class, 'delete_commandant'])->name('delete_commandant');

//these routes are designed for commandants



//these routes are designed for recorders

Route::get('/enregistreurs', [EnregistreurController::class, 'enregistreurs'])->name('enregistreurs');
Route::any('/addenregistreur', [EnregistreurController::class, 'addenregistreur'])->name('addenregistreur');

Route::get('/fetch-all-enregistreurs', [EnregistreurController::class, 'fetch_all_enregistreurs'])->name('fetch_all_enregistreurs');

Route::get('/edit-enregistreur', [EnregistreurController::class, 'edit_enregistreur'])->name('edit_enregistreur');

Route::any('/update-enregistreur', [EnregistreurController::class, 'update_enregistreur'])->name('update_enregistreur');

Route::any('/delete-enregistreur', [EnregistreurController::class, 'delete_enregistreur'])->name('delete_enregistreur');

//these routes are designed for recorders












});





Route::middleware(['CheckIfEnregistreur'])->group(function () {






//these routes are designed for profile

Route::get('/profiles', [ProfileController::class, 'profiles'])->name('profiles');
// Route::post('/addenregistreur', [ProfileController::class, 'addenregistreur'])->name('addenregistreur');

Route::get('/fetch-profile', [ProfileController::class, 'fetch_profile'])->name('fetch_profile');

// Route::get('/edit-profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');

Route::any('/update-profile', [ProfileController::class, 'update_profile'])->name('update_profile');

// Route::any('/delete-profile', [ProfileController::class, 'delete_profile'])->name('delete_profile');

//these routes are designed for profile




// thes routes are for visites personnels
Route::get('/visitespersonnels', [VisiteController::class, 'visitespersonnels'])->name('visitespersonnels');
Route::get('/visitespersonnelsview', [VisiteController::class, 'visitespersonnelsview'])->name('visitespersonnelsview');
Route::any('/visitespersonnelsstore', [VisiteController::class, 'visitespersonnelsstore'])->name('visitespersonnelsstore');
Route::get('/visitespersonnelsservices', [VisiteController::class, 'visitespersonnelsservices'])->name('visitespersonnelsservices');
Route::get('/fetch-all-personnels-visitors', [VisiteController::class, 'fetch_all_personnels_visitors'])->name('fetch_all_personnels_visitors');


// thes routes are for visites personnels




// thes routes are for visites ecrous
Route::get('/visitesecroues', [VisiteController::class, 'visitesecroues'])->name('visitesecroues');
Route::get('/visitesecrouesview', [VisiteController::class, 'visitesecrouesview'])->name('visitesecrouesview');
Route::any('/visitesecrouesstore', [VisiteController::class, 'visitesecrouesstore'])->name('visitesecrouesstore');

// Route::get('/visitesecrouesservices', [VisiteController::class, 'visitesecrouesservices'])->name('visitesecrouesservices');
Route::get('/fetch-all-ecroues-visitors', [VisiteController::class, 'fetch_all_ecroues_visitors'])->name('fetch_all_ecroues_visitors');
// thes routes are for visites ecrous



// thes routes are for visites ecrous
Route::get('/event', [EventController::class, 'event'])->name('event');
Route::get('/eventview', [EventController::class, 'eventview'])->name('eventview');
Route::any('/eventstore', [EventController::class, 'eventstore'])->name('eventstore');
Route::get('/fetch-all-events', [EventController::class, 'fetch_all_events'])->name('fetch_all_events');
// thes routes are for visites ecrous




// these routes are for updates



// these routes are for updates










});


Route::middleware(['CheckIfCommandant'])->group(function () {


    Route::get('/commandantfetch-all-ecroues-visitors', [VisiteController::class, 'commandantfetch_all_ecroues_visitors'])->name('commandantfetch_all_ecroues_visitors');

    Route::get('/commandantfetch-all-personnels-visitors', [VisiteController::class, 'commandantfetch_all_personnels_visitors'])->name('commandantfetch_all_personnels_visitors');

    Route::get('/commandantfetch-all-events', [EventController::class, 'commandantfetch_all_events'])->name('commandantfetch_all_events');

    Route::get('/commandanteventview', [EventController::class, 'commandanteventview'])->name('commandanteventview');
    Route::get('/commandantvisitpersoview', [VisiteController::class, 'commandantvisitpersoview'])->name('commandantvisitpersoview');
    Route::get('/commandantvisitecroueview', [VisiteController::class, 'commandantvisitecroueview'])->name('commandantvisitecroueview');


});









