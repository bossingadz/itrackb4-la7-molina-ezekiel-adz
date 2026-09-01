<?php

use App\Http\Controllers\MonsterHunterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whoami', function () {
    return 'Ezekiel Adz F. Molina | 2023-70345 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/monsterhunters', [MonsterHunterController::class, 'index'])
    ->name('monsterhunter.index');

Route::get('/monsterhunters/featured', [MonsterHunterController::class, 'featured'])
    ->name('monsterhunter.featured');

Route::get('/monsterhunters/filter/{value?}', [MonsterHunterController::class, 'filter'])
    ->name('monsterhunter.filter');

Route::get('/monsterhunters/{id}', [MonsterHunterController::class, 'show'])
    ->name('monsterhunter.show');