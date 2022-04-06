<?php

use App\Http\Controllers\BranchMasterController;
use App\Http\Controllers\MemberMasterController;
use App\Http\Controllers\MinistryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('homepage.index'); })->name('home');

    Route::resource('members', MemberMasterController::class);
    Route::resource('ministries', MinistryController::class);
    Route::resource('branches', BranchMasterController::class);

});

require __DIR__.'/auth.php';
