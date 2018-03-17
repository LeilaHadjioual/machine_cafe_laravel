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

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('back_office', function () {
    return view('back_office.index');
});

//recupère la liste des boissons dispo et l'affiche sur la vue préparation (front)
Route::get('/', 'DrinkController@showDrink');

//la route est sortie du middleware, pour y accéder sans avoir besoin d'une authentification
Route::get('ventes', 'VenteController@index');
Route::post('ventes/store', 'VenteController@store');

Route::group(['middleware' => ['auth', 'admin']], function () {//pour pouvoir accéder aux vues seulement si identification
//boissons
    Route::get('drinks', 'DrinkController@index');
    Route::get('drinks/orderbyprix', 'DrinkController@orderPrix');
    Route::get('drinks/orderbyname', 'DrinkController@orderName');
    Route::get('/drinks/{id}', 'DrinkController@show');
    Route::get('/formAddDrink', function () {
        return view('back_office.formAddDrink');
    });
    Route::post('drinks/create', 'DrinkController@store');
    Route::delete('drinks/{id}', 'DrinkController@destroy');
    Route::put('drinks/{id}', 'DrinkController@update');

//ventes

    Route::delete('ventes/{id}', 'VenteController@destroy');

//stock ingredients
    Route::get('ingredients', 'IngredientController@index');
    Route::get('ingredients/orderbyname', 'IngredientController@orderIng');
    Route::get('ingredients/orderbynb', 'IngredientController@orderNb');
    Route::post('ingredients/create', 'IngredientController@store');
    Route::delete('ingredients/{id}', 'IngredientController@destroy');

//recettes
    Route::get('/recipes', 'RecipeController@index');
    Route::delete('/recipe/{drink_id}/{ingredient_id}', 'RecipeController@destroyIng');
    Route::post('/recipe/create/{drink}', 'RecipeController@create');

//pièces
    Route::get('coins', 'CoinController@index');
    Route::get('coins/orderbycoin', 'CoinController@orderCoin');
    Route::get('coins/orderbynb', 'CoinController@orderNb');
    Route::delete('coins/{id}', 'CoinController@destroy');
    Route::post('coins/create', 'CoinController@store');
});
//route pour l'authentification
Auth::routes(); //route insérée automatiquement grace à la commande php artisan auth
Route::get('/back_office', 'HomeController@index')->name('home');


