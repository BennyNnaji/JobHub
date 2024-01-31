<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Seeker\SeekerController;
use App\Http\Controllers\Seeker\ApplicationController;
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
Route::get('/search', [FrontpageController::class, 'job_search'])->name('jobs.search');
Route::get('/jobs/{id}', [FrontpageController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{id}', [ApplicationController::class, 'save_job'])->name('save_job');
Route::post('/jobs/{id}/report', [ApplicationController::class, 'report_job'])->name('report_job');
Route::get('/login', [FrontpageController::class, 'login'])->name('login');
Route::get('/register', [FrontpageController::class, 'register'])->name('register');
Route::get('/about', [FrontpageController::class,'about'])->name('about');
//Route::get('/{pages}', [FrontpageController::class, 'pages'])->name('pages');

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
Route::middleware(['seeker'])->prefix('/seeker/')->group(function () {
    Route::get('profile/', [SeekerController::class, 'seeker_profile'])->name('seeker_profile');
    Route::get('profile/edit', [SeekerController::class, 'update_profile_basic_form'])->name('seeker_profile_basic');
    Route::post('profile/edit', [SeekerController::class, 'update_profile_basic'])->name('seeker_profile_basic_update');
    Route::post('profile/profile', [SeekerController::class, 'profile_summary'])->name('profile_summary');
    //Route::post('/seeker/profile/career', [SeekerController::class, 'profile_career'])->name('profile_career');
    // Route::get('/seeker/profile/career/{careerIndex}/edit', [SeekerController::class, 'profile_career_edit'])->name('profile_career_edit');

    Route::put('profile/career/{careerIndex}', [SeekerController::class, 'profile_career_update'])->name('profile_career_update');
    Route::post('profile/career/{careerIndex?}', [SeekerController::class, 'profile_career'])->name('profile_career');
    Route::get('profile/career/{careerIndex}/edit', [SeekerController::class, 'profile_career_edit'])->name('profile_career_edit');
    Route::delete('profile/career/{careerIndex}', [SeekerController::class, 'profile_career_delete'])->name('profile_career_delete');

    Route::post('profile/education/{eduIndex?}', [SeekerController::class, 'profile_education'])->name('profile_education');
    Route::get('profile/education/{eduIndex}/edit', [SeekerController::class, 'profile_education_edit'])->name('profile_education_edit');
    Route::put('profile/education/{eduIndex}', [SeekerController::class, 'profile_education_update'])->name('profile_education_update');
    Route::delete('profile/education/{eduIndex}', [SeekerController::class, 'profile_education_delete'])->name('profile_education_delete');

    Route::post('profile/license/{licenseIndex?}', [SeekerController::class, 'profile_license'])->name('profile_license');
    Route::get('profile/license/{licenseIndex}/edit', [SeekerController::class, 'profile_license_edit'])->name('profile_license_edit');
    Route::put('profile/license/{licenseIndex}', [SeekerController::class, 'profile_license_update'])->name('profile_license_update');
    Route::delete('profile/license/{licenseIndex}', [SeekerController::class, 'profile_license_delete'])->name('profile_license_delete');

    Route::post('profile/skills/{skillIndex?}', [SeekerController::class, 'profile_skills'])->name('profile_skills');
    Route::delete('profile/skills/{skillIndex}', [SeekerController::class, 'profile_skills_delete'])->name('profile_skills_delete');

    Route::post('profile/languages/{langIndex?}', [SeekerController::class, 'profile_languages'])->name('profile_languages');
    Route::delete('profile/languages/{langIndex}', [SeekerController::class, 'profile_languages_delete'])->name('profile_languages_delete');

    Route::get('/jobs/{id}/apply', [ApplicationController::class, 'apply_job'])->name('apply_job');
    Route::post('/jobs/{id}/apply', [ApplicationController::class, 'apply_job_store'])->name('apply_job_store');

    Route::get('/jobs/applied', [ApplicationController::class,'applied_jobs'])->name('applied_jobs');
    Route::get('/jobs/saved', [ApplicationController::class,'saved_jobs'])->name('saved_jobs');
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


Route::get('/company/test', [CompanyProfileController::class, 'index']);
Route::get('/company/test/states/{countryCode}', [CompanyProfileController::class, 'getStatesByCountry']);
Route::get('/company/test/cities/{countryCode}/{stateCode}', [CompanyProfileController::class, 'getCitiesByState']);



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