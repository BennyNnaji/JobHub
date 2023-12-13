<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\Company\Auth\CompanyAuthController;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\ProfileController as CompanyProfileController;
use App\Http\Controllers\Company\JobController;

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
Route::get('/login', [FrontpageController::class, 'login'])->name('login');
Route::get('/register', [FrontpageController::class, 'register'])->name('register');
Route::get('/seeker/register', [FrontpageController::class, 'seeker_register'])->name('seeker_register');
Route::get('/seeker/login', [FrontpageController::class, 'seeker_login'])->name('seeker_login');
Route::get('/seeker/login-reset', [FrontpageController::class, 'seeker_login_reset'])->name('seeker_login_reset');

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
    Route::get('/company/jobs', [JobController::class, 'index'])->name('company_jobs');
    Route::get('/company/jobs/add', [JobController::class, 'create'])->name('company_jobs.add');
    Route::post('/company/jobs/add', [JobController::class, 'store'])->name('company_jobs.store');
    
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