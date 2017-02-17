<?php

Route::get('/', function () {
    return view('inicio');
});

Route::get('/animais', 'AnimalController@lista');
Route::post('/animais/ver-animal', 'AnimalController@verAnimal');
Route::get('/animais/editar-animal/{id}', 'AnimalController@veranimalEditar');
Route::post('/animais/updateAnimal', 'AnimalController@updateAnimal');
Route::get('/animais/remover-animal/{id}', 'AnimalController@removerAnimal');
Route::get('/animais/novo-animal', 'AnimalController@novoAnimal');
Route::post('/animais/adicionar-animal', 'AnimalController@adicionarAnimal');


Route::get('/logar', 'LoginController@formLogin');

Route::post('/logar', 'LoginController@autenticarLogin');

Auth::routes();

//Route::get('/home', 'HomeController@index');
