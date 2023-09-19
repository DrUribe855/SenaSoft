<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationsController;
use App\Http\Controllers\Admin\HomeController;

Route::get('index', [HomeController::class, 'index']);
