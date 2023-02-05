<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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
    return view('home');
});
Route::get("/all-products", [ImageController::class, 'allProduct']);
Route::post("/store-product", [ImageController::class, 'uploadImage']);
Route::get("/edit-photo/{id}", [ImageController::class, "editImage"]);
Route::post("/update-photo/{id}", [ImageController::class, "updateImg"]);
Route::get("/delete-photo/{id}", [ImageController::class, "deleteImg"]);
