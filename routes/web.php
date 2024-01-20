<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return view('welcome');
});
Route::get('/id/{id?}', [UserController::class, 'index']); 
Route::get('/create', function(){
    return view('users.create');
});
Route::get('/login', function () {
    return view('users.login');
});


Route::middleware('verifyJwt')->group(function(){
    Route::get('/dashboard',function(){
        return view('users.dashboard',['user'=>auth()->user()]);
    });
    Route::get('/list', [UserController::class, 'list']);
    Route::get('/logout', [UserController::class, 'logout']);
});


Route::prefix('/api/v1')->group(function () {

    Route::post('/login',[UserController::class,"login"])->name('user.login');
    
    Route::post('/create', [UserController::class, 'create'])->name('user.create');

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
});
