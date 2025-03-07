<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        'name'=> 'John Doe',
        'email'=> 'john.doe@demo.com',
    ];
    dump($person);
    return view('welcome');
});

Route::view('/about', 'about');

Route::get('/product/{id}', function(string $id) {
    return "<h2>Product ID: $id</h2>";
})->whereNumber('id');

// mandatory parameter
// Route::get("/{lang}/product/{id}/review/{reviewId}", function(string $lang, string $id, string $reviewId) {
//     return "<h2>Product ID: $id, Review ID: $reviewId, Language: $lang</h2>";
// });

// optional parameter
// Route::get('/product/{category?}', function($category = 'mobile') {
//     return "<h2>Product Category: $category</h2>";
// });

Route::get('/user/{username}', function($username) {
    return "Username: $username";
})->where('username','[a-z]+');

// groups
Route::prefix('admin')->group(function() {
    Route::get('/', function() {
        return "<h2>Admin Home</h2>";
    });

    Route::get('/dashboard', function() {
        return "<h2>Admin Dashboard</h2>";
    });

    Route::get('/settings', function() {
        return "<h2>Admin Settings</h2>";
    });
});

Route::fallback(function() {
    return "<h2>404 Not Found</h2>";
});

Route::get('/sum/{num1}/{num2}', function(int $num1, int $num2) {
    return "<h2>Sum: $num1 + $num2 = ".($num1+$num2)."</h2>";
})->whereNumber(['num1', 'num2']);

Route::get('/cars', [CarController::class, 'index']);

Route::controller(CarController::class)->group(function() {
    Route::get('/cars', 'index');
    Route::get('/f1', 'f1');
});