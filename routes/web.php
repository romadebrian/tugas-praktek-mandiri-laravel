<?php

use App\Http\Controllers\NewsController;
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
//     return view('news');
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

Route::get('/', [NewsController::class, 'index']);

Route::resource('news', NewsController::class);
