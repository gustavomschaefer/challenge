<?php
Auth::routes();

Route::get('/posts/novo', 'PostsController@novo');
Route::get('/posts/{postagem}/editar', 'PostsController@editar');
Route::post('/posts/salvar', 'PostsController@salvar');
Route::patch('/posts/{postagem}', 'PostsController@atualizar');
Route::delete('/posts/{postagem}', 'PostsController@deletar');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/postagem/{postagem}', 'PublicController@postagem');
Route::get('/', 'PublicController@index');
