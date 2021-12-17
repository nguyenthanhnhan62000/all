<?php

use PHPUnit\Util\Test;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\TextEnrollmentController;
use App\Http\Controllers\admin\PermissionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('admin', [HomeController::class,'admin'])->name('home.admin');

Route::get('post/list', [PostController::class,'index'])->name('post.index');
Route::get('post/show/{id}', [PostController::class,'show'])->name('post.show');

//user
Route::get('user/list', [AdminController::class,'index'])->name('user.index');
Route::get('user/create', [AdminController::class,'create'])->name('user.create');
Route::post('user/store', [AdminController::class,'store'])->name('user.store');
Route::get('user/edit/{id}', [AdminController::class,'edit'])->name('user.edit');
Route::post('user/update/{id}', [AdminController::class,'update'])->name('user.update');
Route::get('user/delete/{id}', [AdminController::class,'delete'])->name('user.delete');

//roles

Route::get('role/list', [RoleController::class,'index'])->name('role.index');
Route::get('role/create', [RoleController::class,'create'])->name('role.create');
Route::post('role/store', [RoleController::class,'store'])->name('role.store');
Route::get('role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
Route::post('role/update/{id}', [RoleController::class,'update'])->name('role.update');

//category
Route::get('cat/list', [CategoryController::class,'index'])->middleware(['can:category-list']);

//permission
Route::get('permission/create', [PermissionController::class,'create'])->name('role.create');
Route::post('permission/store', [PermissionController::class,'store'])->name('permission.store');

//Route for mailing

// Route::get('/email', function () {
//     Mail::to('nhanmtmt9@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });

Route::get('/email',[EmailController::class, 'email']);

Route::get('send-testenrollment',[TextEnrollmentController::class,'sendTextNotification']);

//sms 
Route::get('sms',[SmsController::class, 'index']);