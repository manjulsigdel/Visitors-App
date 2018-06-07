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

$route->get('/', 'Visitor\VisitorCOntroller@index')->name('visitor-lists');

$route->get('/visitors/add', 'Visitor\VisitorController@add')->name('visitor-form');

$route->post('/visitors', 'Visitor\VisitorController@save')->name('visitor-save');

$route->get('/visitors/{email}', 'Visitor\VisitorController@getOne')->name('visitor-single');
