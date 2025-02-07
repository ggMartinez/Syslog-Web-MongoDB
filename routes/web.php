<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemEventController;

Route::get('/', [SystemEventController::class, 'index']);
