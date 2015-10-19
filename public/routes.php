<?php


Route::get('/', VIEWS.'home.php');
Route::get('/register', CONTROLLERS.'register.php');
Route::post('/register', CONTROLLERS.'register.php');
Route::get('/signin', CONTROLLERS.'signin.php');
Route::post('/signin', CONTROLLERS.'signin.php');
Route::get('/signout', CONTROLLERS.'signout.php');

Route::get('/admin', VIEWS.'admin.php');

Route::fallback(VIEWS.'404.php');