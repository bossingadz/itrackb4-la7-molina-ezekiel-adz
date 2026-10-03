<?php

use App\Http\Controllers\MonsterHunterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Ezekiel Adz F. Molina | 2023-70345 | Block 4C';
});

Route::get('/monsterhunters/featured', [MonsterHunterController::class, 'featured'])
    ->name('monsterhunter.featured');

Route::get('/monsterhunters/filter/{value?}', function ($value = null) {
    if ($value) {
        return redirect()->route('monsterhunters.index', ['platform' => $value]);
    }
    return redirect()->route('monsterhunters.index');
});

Route::resource('monsterhunters', MonsterHunterController::class)
    ->only(['index', 'show', 'create', 'store'])
    ->names('monsterhunters');