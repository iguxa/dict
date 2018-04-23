<?php

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

Route::get('/','IndexController@index'); //главная
Route::get('/search','IndexController@search'); //поиск
Route::get('/page','IndexController@index_page'); //ajax пагинация
Route::get('/add_word','IndexController@add_word'); //добавление слова


Route::post('/edit_letter','IndexController@edit_letter'); //редактирование записи
Route::post('/delete_letter','IndexController@delete_letter'); //удаление записи
Route::post('/search_letter','IndexController@search_letter'); //поиск слова
Route::post('/adder_word','IndexController@adder_word'); //добавление слова в базу

Route::get('/test','IndexController@test'); //тест