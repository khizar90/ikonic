<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
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


Route::prefix('dashboard')->middleware(['auth'])->name('dashboard-')->group(function () {
    Route::get('/', function () {
        return view('index');
    });


    Route::get('feedback', [UserController::class, 'create'])->name('feedback');
    Route::post('feedback', [UserController::class, 'store']);

    Route::get('feedback-list', [UserController::class, 'list'])->name('feedback-list');
    Route::get('feedback/vote/{id}/{fid}', [UserController::class, 'voteFeedback'])->name('feedback-vote');
    
    Route::post('comment', [UserController::class, 'comment'])->name('comment');

});

Route::prefix('admin')->middleware(['auth:admin'])->name('admin-')->group(function () { 
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('user-delete');
    Route::get('feedback', [AdminController::class, 'feedback'])->name('feedback');
    Route::get('feedback/delete/{id}', [AdminController::class, 'feedbackDelete'])->name('feedback-delete');

    
    Route::get('enable/comment', [AdminController::class, 'enableCommenShow'])->name('enable-comment');
    Route::post('enable/comment', [AdminController::class, 'enableCommenCreate']);
    


});


// Route::get('/insert', function () {
//     $user = new Admin();
//     $user->name = 'Kevin Anderson';
//     $user->email = 'admin@admin.com';
//     $user->password = Hash::make('qweqwe');
//     $user->save();
// });





// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/adminauth.php';


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('dashboard');
