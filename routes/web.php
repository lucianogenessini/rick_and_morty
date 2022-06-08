<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses' => 'App\Http\Controllers\RickAndMortyController@index',
    'as' => 'rick_and_morty.index',
]);

Route::get('/download', [
    'uses' => 'App\Http\Controllers\RickAndMortyController@excelDownload',
    'as' => 'rick_and_morty.download',
]);
