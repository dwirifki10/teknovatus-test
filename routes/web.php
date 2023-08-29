<?php

use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\DownloadController;
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

Route::get("/", function () {
    return view("auth.login");
});
Route::group(["middleware" => ["auth:sanctum", "verified"]], function() {
    Route::get("/dashboard", [ChartController::class, "showChart"])->name("dashboard");
    Route::get("/download", [DownloadController::class, "downloadClientFile"])->name("download");
    Route::get("/notification", [DownloadController::class, "sendNotification"])->name("notification");
});
