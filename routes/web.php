<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', function (){
   return view('welcome');
});

//Route::middleware(['auth'])->group(function (){
Route::resource('employee', 'EmployeeController');
Route::resource('companies', 'CompanyController');
//});

Route::post('company/store', 'CompanyController@store');


