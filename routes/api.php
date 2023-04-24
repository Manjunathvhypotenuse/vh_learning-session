<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formcontroller;

use function PHPUnit\Framework\returnValue;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route:: get("/test", function () {
//     return response ()->json([
//         "message" => "Welcome to learning session", // Day 6 task
//         "result" => [],
//     ], 200);
// });

// Route::post("/post",returnValue("welcome"));

Route::post("/form", [formcontroller::class,"insert"]);
Route::get("/forms/{email}", [formcontroller::class,"user_lists"]);
Route::put("/edit", [formcontroller::class,"update"]);
Route::delete("/del", [formcontroller::class,"destroy"]);


  


