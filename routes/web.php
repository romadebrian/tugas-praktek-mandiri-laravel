<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/programming-languages', function () {
    $programmingLanguages = ['php', 'java', 'c', 'javascript', 'dart'];
    echo "Bahasa pemrograman yang saya bisa adalah : ";
    for ($i = 0; $i < count($programmingLanguages); $i++) {
        echo $programmingLanguages[$i] . ", ";
    };
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

// Route::get('admin', function () {
//     return view('index');
// });

Route::get('admin', [NewsController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('admin/news', [NewsController::class, 'index']);

Route::resource('admin/news', NewsController::class)->middleware(['auth', 'admin']);

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::resource('post', HomeController::class);
Route::get('post/{id_post}', [HomeController::class, 'show']);


// Route::get('post', function () {
//     return redirect('/');
// });
