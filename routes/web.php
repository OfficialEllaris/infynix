<?php

use App\Livewire\Calculator;
use App\Livewire\Counter;
use App\Livewire\Onboarding;
use App\Livewire\StudentManager;
use App\Livewire\SupervisorManager;
use Illuminate\Support\Facades\Route;

Route::get('/counter', Counter::class)->name('counter');

Route::get('/calculator', Calculator::class)->name('calculator');

Route::get('/onboarding', Onboarding::class)->name('onboarding');

Route::get('/manage-students', StudentManager::class)->name('manage-students');

Route::get('/manage-supervisors', SupervisorManager::class)->name('manage-supervisors');