<?php


use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'createSignin'])->name('signin');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('user.registration');

Route::group(['middleware' => ['auth','isOfficer']], function () {
    Route::get('/officer/dashboard', function () {
        return view('officer.officer_dashboard');
    });


});


Route::get('/resident/dashboard', function () {
    return view('resident.resident_dashboard');
});



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});
