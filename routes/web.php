<?php

use Illuminate\Support\Facades\Route;

Route::match(['GET', 'HEAD'], '/', function () {
    return view('welcome');
});
