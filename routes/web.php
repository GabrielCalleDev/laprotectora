<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*-------------------------------------------------------------------------------

  ...      __..--''``---....___   _..._    __                  __
 /// //_.-'    .-/";  `        ``<._  ``.''_ `. / // /      __/_  `.  .-"""-.
///_.-' _..--.'_    \                    `( ) ) // //       \_,` | \-'  /   )`-')
/ (_..-' // (< _     ;_..__               ; `' / ///         "") `"`    \  ((`"`
 / // // //  `-._,_)' // / ``--...____..-' /// / ///        ___Y  ,    .'7 /|
    // // //      `..-' ///               // // //         (_,___/...-` (_/_/
    ` ` ` ` `           ''''               ` ` ` `          ` ` ` `` ` ` `` ` `

|--------------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------------*/

Route::view('/', 'home')->name('home');

Route::view('/la-protectora', 'protectora')->name('protectora');

Route::view('/como-ayudar/haz-un-donativo', 'haz-un-donativo')->name('haz.un.donativo');

Route::view('/como-ayudar/hazte-voluntario', 'hazte-voluntario')->name('hazte.voluntario');

Route::view('/adopciones', 'adopciones')->name('adopciones');

Route::view('/contacto', 'contacto')->name('contacto');

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
