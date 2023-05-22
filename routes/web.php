<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;

/*-------------------------------------------------------------------------------

  ...      __..--''``---....___   _..._    __                  __
 /// //_.-'    .-/";  `        ``<._  ``.''_ `. / // /      __/_  `.  .-"""-.
///_.-' _..--.'_    \                    `( ) ) // //       \_,` | \-'  /   )`-')
/ (_..-' // (< _     ;_..__               ; `' / ///         "") `"`    \  ((`"`
 / // // //  `-._,_)' // / ``--...____..-' /// / ///        ___Y  ,    .'7 /|
    // // //      `..-' ///               // // //         (_,___/...-` (_/_/
    ` ` ` ` `           ''''               ` ` ` `          ` ` ` `` ` ` `` ` `

|--------------------------------------------------------------------------------
| Web Routes - Principal routes
|------------------------------------------------------------------------------*/

Route::view('/', 'home')->name('home');

Route::view('/la-protectora', 'protectora')->name('protectora');


/*--------------------------------------------------------------------------------
| How to help routes
--------------------------------------------------------------------------------*/

Route::view('/como-ayudar/haz-un-donativo', 'haz-un-donativo')->name('make.donation');

Route::view('/como-ayudar/hazte-voluntario', 'hazte-voluntario')->name('make.volunteer');

Route::view('/voluntario/solicitud', 'solicitud-voluntario')->name('volunteer.request');


/*--------------------------------------------------------------------------------
| Adoptions routes
--------------------------------------------------------------------------------*/

Route::get('/adopciones', [PetController::class, 'index'])->name('adoptions');

Route::get('/mascota/{pet}', [PetController::class, 'show'])->name('pet.show');

Route::get('/mascota/mas-informacion/{pet}', [PetController::class, 'request'])->name('adoption.request');

Route::get('/adopciones/busqueda', [PetController::class, 'search'])->name('adoptions.search');


/*--------------------------------------------------------------------------------
| Legal - Contact routes
--------------------------------------------------------------------------------*/

Route::view('/contacto', 'contacto')->name('contact');

Route::view('legal' , 'legal')->name('legal');

/*--------------------------------------------------------------------------------
| User profile routes
--------------------------------------------------------------------------------*/
Route::view('/dashboard','dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/avatar', [ProfileController::class, 'destroyAvatar'])->name('profile.destroy.avatar');
});

require __DIR__.'/auth.php';
