<?php

use App\Http\Controllers\FrontPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', FrontPageController::class);
