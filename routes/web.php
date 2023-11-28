<?php

use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
Route::get('/seeker/register', [FrontpageController::class, 'seeker_register'])->name('seeker_register');
Route::get('/seeker/login', [FrontpageController::class, 'seeker_login'])->name('seeker_login');

Route::get('/company/register', [FrontpageController::class, 'company_register'])->name('company_register');
Route::get('/company/login', [FrontpageController::class, 'company_login'])->name('company_login');
=======
Route::get('/login', [FrontpageController::class, 'login'])->name('login');
Route::get('/register', [FrontpageController::class, 'register'])->name('register');
Route::get('/seeker/register', [FrontpageController::class, 'seeker_register'])->name('seeker_register');
Route::get('/seeker/login', [FrontpageController::class, 'seeker_login'])->name('seeker_login');
Route::get('/seeker/login-reset', [FrontpageController::class, 'seeker_login_reset'])->name('seeker_login_reset');

Route::get('/company/register', [FrontpageController::class, 'company_register'])->name('company_register');
Route::get('/company/login', [FrontpageController::class, 'company_login'])->name('company_login');
Route::get('/company/login-reset', [FrontpageController::class, 'company_login_reset'])->name('company_login_reset');
>>>>>>> 12ad778570f98332ec0128a554668a4168f758da



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

require __DIR__.'/auth.php';
