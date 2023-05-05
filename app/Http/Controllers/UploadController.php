<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\Validator;


class UploadController extends Controller
{
//     public function upload(Request $request)
//     {
//         try {
//             Log::info("request file", [$request->image]);
//             Log::info("request type", [$request->type]);
//             Log::info("request->image meta data ", [
//                 "extention" => $request->image->extension(),
//                 "original file name" => $request->image->getClientOriginalName(),
//                 "file size" => $request->image->getsize(),
//             ]);

//             $file = $request->image->getClientOriginalName();
//             $file_path = Storage::putFileAs(storage_path('/public/uploads'), $file); 
//             //$file_path = Storage::putFileAs(public_path("app/"), $file); 

//             //unlink(storage_path("app/") . $file);

//             return response()->json([
//                 "message" => "Success",
//                 "file_path" => $file_path
//             ]);
            
//         }catch (Exception $e) {
//             Log::error("Upload error", [$e]);
//         }
//     }

// }

public function upload(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'file' => 'required|file|max:1024|mimes:jpg,jpeg,png'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                "message" => "Validation error",
                "result" => $validatedData->errors()
            ], 400);
        }
        try {

            $fileName = date('j_F_Y') . '.' . $request->file('file')->extension();

            $path = $request->file('file')->storeAs('/public/uploads', $fileName);
            Log::info('file', [$path]);


            if ($path) {
                return response()->json([
                    "message" => 'success',
                    'path' => $path,
                ], 200);
            }
        } catch (Exception $e) {
            Log::error("getAllEmployees_error", [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }

    public function delete(Request $request, $fileName)
    {
        try {


            Log::info('file', [$fileName]);


            if (Storage::exists('public/uploads/' . $fileName)) {

                Storage::delete('public/uploads/' . $fileName);
                return response()->json([
                    "message" => "Success"
                ], 200);
            }


            return response()->json([
                "message" => "File not found"
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Internal server error"
            ], 500);
        }
    }
}

