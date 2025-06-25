<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalProgressController;

Route::post('/progress', [GoalProgressController::class, 'store']);
