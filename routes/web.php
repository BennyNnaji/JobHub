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
Route::get('/jobs', [FrontpageController::class, 'jobs'])->name('jobs');
Route::get('/jobs/{id}', [FrontpageController::class, 'show'])->name('jobs.show');
Route::get('/login', [FrontpageController::class, 'login'])->name('login');
Route::get('/register', [FrontpageController::class, 'register'])->name('register');
Route::get('/{pages}', [FrontpageController::class, 'pages'])->name('pages');

// Seeker Routes
Route::prefix('/seeker/')->group(function () {
    Route::get('register', [SeekerAuthController::class, 'seeker_register'])->name('seeker_register');
    Route::post('register', [SeekerAuthController::class, 'seeker_reg_store'])->name('seeker_register_post');
    Route::get('login', [SeekerAuthController::class, 'seeker_login'])->name('seeker_login');
    Route::post('login', [SeekerAuthController::class, 'seeker_login_post'])->name('seeker_login_post');
    Route::get('login-reset', [SeekerAuthController::class, 'seeker_login_reset'])->name('seeker_login_reset');
    Route::post('logout', [SeekerAuthController::class, 'seeker_logout'])->name('seeker_logout');
});



// Protected Seeker Routes
Route::middleware(['seeker'])->prefix('/seeker/profile/')->group(function () {
    Route::get('', [SeekerController::class, 'seeker_profile'])->name('seeker_profile');
    Route::get('edit', [SeekerController::class, 'update_profile_basic_form'])->name('seeker_profile_basic');
    Route::post('edit', [SeekerController::class, 'update_profile_basic'])->name('seeker_profile_basic_update');
    Route::post('profile', [SeekerController::class, 'profile_summary'])->name('profile_summary');
    //Route::post('/seeker/profile/career', [SeekerController::class, 'profile_career'])->name('profile_career');
    // Route::get('/seeker/profile/career/{careerIndex}/edit', [SeekerController::class, 'profile_career_edit'])->name('profile_career_edit');
    Route::put('career/{careerIndex}', [SeekerController::class, 'profile_career_update'])->name('profile_career_update');
    Route::post('career/{careerIndex?}', [SeekerController::class, 'profile_career'])->name('profile_career');
    Route::get('career/{careerIndex}/edit', [SeekerController::class, 'profile_career_edit'])->name('profile_career_edit');
    Route::delete('career/{careerIndex}', [SeekerController::class, 'profile_career_delete'])->name('profile_career_delete');
});

// Company Routes
Route::prefix('/company/')->group(function () {
    Route::get('register', [CompanyAuthController::class, 'company_register'])->name('company_register');
    Route::post('register', [CompanyAuthController::class, 'company_store'])->name('company_store');
    Route::get('login', [CompanyAuthController::class, 'company_login'])->name('company_login');
    Route::post('login', [CompanyAuthController::class, 'company_login_post'])->name('company_login_post');
    Route::get('login-reset', [CompanyAuthController::class, 'company_login_reset'])->name('company_login_reset');
    Route::post('logout', [CompanyAuthController::class, 'company_logout'])->name('company_logout');
});



// Protected Company Routes
Route::middleware(['company'])->prefix('/company/')->group(function () {
    Route::get('dashboard', [CompanyDashboardController::class, 'company_dashboard'])->name('company_dashboard');
    Route::get('profile', [CompanyProfileController::class, 'index'])->name('company_profile');
    Route::get('profile/states/{countryCode}', [CompanyProfileController::class, 'getStatesByCountry']);
    Route::get('profile/cities/{countryCode}/{stateCode}', [CompanyProfileController::class, 'getCitiesByState']);
    Route::post('profile', [CompanyProfileController::class, 'profile_update'])->name('profile_update');

    Route::get('profile/update', [CompanyProfileController::class, 'update_profile'])->name('company_profile.u');
    Route::get('profile/update/states/{countryCode}', [CompanyProfileController::class, 'getStatesByCountry.u']);
    Route::get('profile/update/cities/{countryCode}/{stateCode}', [CompanyProfileController::class, 'getCitiesByState.u']);
    Route::post('profile/update', [CompanyProfileController::class, 'profile_update'])->name('profile_update');

    Route::get('jobs', [JobController::class, 'index'])->name('company_jobs');
    Route::get('jobs/add', [JobController::class, 'create'])->name('company_jobs.add');
    Route::post('jobs/add', [JobController::class, 'store'])->name('company_jobs.store');
    Route::get('jobs/{id}', [JobController::class, 'edit'])->name('company_jobs.show');
    Route::post('jobs/{id}/edit', [JobController::class, 'update'])->name('company_jobs.update');
    Route::delete('jobs/{id}', [JobController::class, 'destroy'])->name('company_jobs.delete');
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