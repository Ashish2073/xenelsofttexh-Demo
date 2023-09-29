<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Hash;


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



Route::middleware('guestprevent')->group(function () {
    Route::get('/', function () {
     return view('registration');
    });
Route::post('userregistration',[RegisteredUserController::class,'registeruser'])->name('userregistration');
Route::match(['get','post'],'userlogin',[RegisteredUserController::class,'loginuser'])->name('userlogin');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('userdata',[RegisteredUserController::class,'userList'])->name('userlist');
Route::post('adduser',[RegisteredUserController::class,'saveuser'])->name('adduser');
Route::post('edituser',[RegisteredUserController::class,'edituserdata'])->name('edituser');
Route::post('deleteuser',[RegisteredUserController::class,'deleteuserdata'])->name('deleteuser');
Route::get('userlogout', [RegisteredUserController::class,'userlogout'])->name('userlogout');
});

 require __DIR__.'/auth.php';
