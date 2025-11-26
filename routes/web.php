<?php

use App\Http\Middleware\CheckAdmin;
use App\Livewire\Calculator;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Onboarding;
use App\Livewire\StudentManager;
use App\Livewire\SupervisorManager;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/onboarding', Onboarding::class)->name('onboarding');
Route::get('/login', Login::class)->name('login');

// Protected routes
Route::middleware('auth')->group(function () {

    Route::get('/counter', Counter::class)->name('counter');

    Route::get('/calculator', Calculator::class)->name('calculator');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/manage-students', StudentManager::class)->middleware(CheckAdmin::class)->name('manage-students');

    Route::get('/manage-supervisors', SupervisorManager::class)->middleware(CheckAdmin::class)->name('manage-supervisors');
});
