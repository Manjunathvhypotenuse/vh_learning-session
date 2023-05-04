<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// Route::post("/form", [formcontroller::class,"insert"]); //task_8
// Route::get("/forms/{email}", [formcontroller::class,"user_lists"]);
// Route::put("/edit", [formcontroller::class,"update"]);
// Route::delete("/del", [formcontroller::class,"destroy"]);


// Route::post("/category", [CategoryController::class,"post"]);
// Route::post("/categories", [CategoryController::class,"bulkInsert"]);
// Route::get("/categories", [CategoryController::class,"get"]);
// Route::put("/category", [CategoryController::class,"put"]);
// Route::delete("/category", [CategoryController::class,"delete"]);


//Route::get("/products", [ProductController::class,"getproductformal"]);


Route::group([
    "middleware" => ["testing"],
], function () {
    Route::get ("/", function () {
        return response()->json([
            "message" => "success"
            ], 200);

   });
 });

 


  


