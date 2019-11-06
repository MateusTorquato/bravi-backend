<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('people', ['as' => 'api.people.index', 'uses' => 'PersonController@index']);
$router->post('people', ['as' => 'api.people.store', 'uses' => 'PersonController@store']);
$router->patch('people/{id}', ['as' => 'api.people.update', 'uses' => 'PersonController@update']);
$router->put('people/{id}', ['as' => 'api.people.update', 'uses' => 'PersonController@update']);
$router->delete('people/{id}', ['as' => 'api.people.destroy', 'uses' => 'PersonController@destroy']);

$router->get('contacts', ['as' => 'api.contacts.index', 'uses' => 'ContactController@index']);
$router->post('contacts', ['as' => 'api.contacts.store', 'uses' => 'ContactController@store']);
$router->patch('contacts/{id}', ['as' => 'api.contacts.update', 'uses' => 'ContactController@update']);
$router->put('contacts/{id}', ['as' => 'api.contacts.update', 'uses' => 'ContactController@update']);
$router->delete('contacts/{id}', ['as' => 'api.contacts.destroy', 'uses' => 'ContactController@destroy']);

