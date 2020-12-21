<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\ManageBeneficiaries;
use App\Http\Livewire\Admin\ManageStaffs;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.home');
})->name('website.home');

Route::get('/about', function () {
    return view('website.about');
})->name('website.about');

Route::get('/beneficiaries', function () {
    return view('website.beneficiaries');
})->name('website.beneficiaries');

Route::get('/staffs', function () {
    return view('website.staffs');
})->name('website.staffs');

Route::get('/gallery', function () {
    return view('website.gallery');
})->name('website.gallery');

Route::get('/contact', function () {
    return view('website.contact');
})->name('website.contact');

// Admin routes
Route::name('admin.')->middleware(['auth'])
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/staffs', ManageStaffs::class)->name('staffs');

    Route::get('/admin/beneficiaries', ManageBeneficiaries::class)->name('beneficiaries');

});

require __DIR__.'/auth.php';
