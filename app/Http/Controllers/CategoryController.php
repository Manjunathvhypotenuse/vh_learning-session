<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function post()
    {
        try {
            $insert = Category::create([
                "name" => "new",
                "is_active" => 1
            ]);
            return response()->json([
                "message" => "Success",
                "result" => $insert
            ], 200);
        } catch (Exception $c) {
            Log::error($c);
        }
    }

    public function bulkInsert()

    {

        try {
            $category = [

                ['name' => 'Category 1', 'is_active' => true],

                ['name' => 'Category 2', 'is_active' => true],

                ['name' => 'Category 3', 'is_active' => true],

                ['name' => 'Category 4', 'is_active' => true],

                ['name' => 'Category 5', 'is_active' => true],

                ['name' => 'Category 6', 'is_active' => true],

                ['name' => 'Category 7', 'is_active' => true],

                ['name' => 'Category 8', 'is_active' => true],

                ['name' => 'Category 9', 'is_active' => true],

                ['name' => 'Category 10', 'is_active' => true],

            ];




            Category::insert($category);




            if ($category) {

                Log::info("user", [$category]);

                return response()->json([

                    'message' => 'bulkInsert successfully',

                    'result' => $category,

                ], 200);
            } else {

                return response()->json([

                    'message' => 'bulkInsert error',

                ], 404);
            }
        } catch (Exception $e) {

            Log::error('error', [$e]);

            return response()->json([

                "message" => "Internal server error",

            ], 500);
        }
    }
    public function get()
    {
        try {
            $categories = Category::get();
            return response()->json([
                "message" => "Success",
                "result" => $categories
            ], 200);
        } catch (Exception $c) {
            Log::error($c);
        }
    }

    public function put()
    {
        try {
            $update = Category::wherein("id", [48,49])->update([
                 'is_active' => false
            ]);
            return response()->json([
                "message" => "Success",
                "result" => $update
            ], 200);
        } catch (Exception $c) {
            Log::error($c);
        }
    }

    public function delete()
    {
        try {
            $delete = Category::where('is_active', false)->delete([
                "is_active" => 0
            ]);
            return response()->json([
                "message" => "Success",
                "result" => $delete
            ], 200);
        } catch (Exception $c) {
            Log::error($c);
        }
    }
}
