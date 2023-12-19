<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Seeker\SeekerController;
use App\Http\Controllers\Seeker\Auth\SeekerAuthController;
use App\Http\Controllers\Company\Auth\CompanyAuthController;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\ProfileController as CompanyProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontpageController::class, 'index'])->name('index');
Route::get('/jobs/{id}', [FrontpageController::class, 'show'])->name('jobs.show');
Route::get('/login', [FrontpageController::class, 'login'])->name('login');
Route::get('/register', [FrontpageController::class, 'register'])->name('register');


// Seeker Routes
Route::get('/seeker/register', [SeekerAuthController::class, 'seeker_register'])->name('seeker_register');
Route::post('/seeker/register', [SeekerAuthController::class, 'seeker_reg_store'])->name('seeker_register_post');
Route::get('/seeker/login', [SeekerAuthController::class, 'seeker_login'])->name('seeker_login');
Route::post('/seeker/login', [SeekerAuthController::class, 'seeker_login_post'])->name('seeker_login_post');
Route::get('/seeker/login-reset', [SeekerAuthController::class, 'seeker_login_reset'])->name('seeker_login_reset');
Route::post('/seeker/logout', [SeekerAuthController::class, 'seeker_logout'])->name('seeker_logout');


// Protected Seeker Routes
Route::middleware(['seeker'])->group(function () {
    Route::get('/seeker/profile', [SeekerController::class, 'seeker_profile'])->name('seeker_profile');
});

// Company Routes
Route::get('/company/register', [CompanyAuthController::class, 'company_register'])->name('company_register');
Route::post('/company/register', [CompanyAuthController::class, 'company_store'])->name('company_store');
Route::get('/company/login', [CompanyAuthController::class, 'company_login'])->name('company_login');
Route::post('/company/login', [CompanyAuthController::class, 'company_login_post'])->name('company_login_post');
Route::get('/company/login-reset', [CompanyAuthController::class, 'company_login_reset'])->name('company_login_reset');
Route::post('/company/logout', [CompanyAuthController::class, 'company_logout'])->name('company_logout');


// Protected Company Routes
Route::middleware(['company'])->group(function () {
    Route::get('/company/dashboard', [CompanyDashboardController::class, 'company_dashboard'])->name('company_dashboard');
    Route::get('/company/profile', [CompanyProfileController::class, 'index'])->name('company_profile');
    Route::get('/company/profile/states/{countryCode}', [CompanyProfileController::class, 'getStatesByCountry']);
    Route::get('/company/profile/cities/{countryCode}/{stateCode}', [CompanyProfileController::class, 'getCitiesByState']);
    Route::post('/company/profile', [CompanyProfileController::class, 'profile_update'])->name('profile_update');

    Route::get('/company/profile/update', [CompanyProfileController::class, 'update_profile'])->name('company_profile.u');
    Route::get('/company/profile/update/states/{countryCode}', [CompanyProfileController::class, 'getStatesByCountry.u']);
    Route::get('/company/profile/update/cities/{countryCode}/{stateCode}', [CompanyProfileController::class, 'getCitiesByState.u']);
    Route::post('/company/profile/update', [CompanyProfileController::class, 'profile_update'])->name('profile_update');

    Route::get('/company/jobs', [JobController::class, 'index'])->name('company_jobs');
    Route::get('/company/jobs/add', [JobController::class, 'create'])->name('company_jobs.add');
    Route::post('/company/jobs/add', [JobController::class, 'store'])->name('company_jobs.store');
    Route::get('/company/jobs/{id}', [JobController::class, 'edit'])->name('company_jobs.show');
    Route::post('/company/jobs/{id}/edit', [JobController::class, 'update'])->name('company_jobs.update');
    Route::delete('/company/jobs/{id}', [JobController::class, 'destroy'])->name('company_jobs.delete');
});






Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::get('/company/profiles/', [CountryController::class, 'showCountryDropdown'])->name('test');
// Route::get('/company/profiles/states/{countryCode}', [CountryController::class, 'getStatesByCountry']);
// Route::get('/company/profiles/cities/{countryCode}/{stateCode}', [CountryController::class, 'getCitiesByState']);