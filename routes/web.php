<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [postController::class , 'homeVues']);


Route::prefix('admin/')->group(function(){
    Route::resource('Categorie', CategorieController::class)->except('show');
});
