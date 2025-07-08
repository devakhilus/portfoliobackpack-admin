<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () {
    // 👇 Add this to override the default dashboard:
    Route::get('dashboard', 'AdminDashboardController@dashboard')->name('backpack.dashboard');

    // Your CRUDs
    Route::crud('about', 'AboutCrudController');
    Route::crud('skill', 'SkillCrudController');
    Route::crud('project', 'ProjectCrudController');
    Route::crud('career', 'CareerCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('setting', 'SettingCrudController');
});
