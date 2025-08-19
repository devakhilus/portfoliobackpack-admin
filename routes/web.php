<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Frontend route
Route::get('/', [HomeController::class, 'index']);

// Enable Laravel Authentication routes with email verification
Auth::routes(['verify' => true]);

// Protect Backpack admin routes with auth and verified middlewares
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),  // usually 'admin'
    'middleware' => ['web', 'auth', 'verified'],
], function () {
    // No need to specify Backpack routes here; they are loaded automatically by the package
});
