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

Route::get('/test', function () {
    return view('layouts.main');
});

Route::view('legal' , 'legal')->name('legal');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
