<?php

use App\Livewire\Calculator;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/counter', Counter::class)->name('counter');

Route::get('/calculator', Calculator::class)->name('calculator');