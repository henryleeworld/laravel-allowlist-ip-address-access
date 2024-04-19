<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['middleware' => ['ip.allowllist'], function () {
    return view('welcome');
}]);
