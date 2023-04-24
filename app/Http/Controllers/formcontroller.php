<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Else_;

class formcontroller extends Controller
{
public function insert(Request $request)
{

$validation = Validator::make(
$request->all(), 
[
"email" => "required|string|email",
"password" => "required|string|max:10",
]
);

if ($validation->fails()) {
return response()->json(
    [
"message"=> "validation error",
"error" => $validation->errors()
],
400
);
}

try {
$user = [];
$use["email"] = $request->email;
$user["password"] = $request->password;
return response()-> json(
[
"message"=> "Success",
],
200
);


}catch (Exception $e){
    Log::error("error", [$e]); 
    return response()-> json(
        [
        "message"=> "Internal server error",
        ],
        500
        );
}
}
public function user_lists($email)
{
    return response()->json(
[
    "message" => $email,
],
200
);
}

public function update (Request $request)
{

$validation = Validator::make(
$request->all(),
[
"email" => "required|string|email",
"password" => "required|string|max:10",
]
);

if ($validation->fails()) {
return response()->json(
    [
"message"=> "validation error",
"error" => $validation->errors()
],
400
);
}

try {
    $user = [];
    $user["email"] = $request->email;
    $user["password"] = $request->password;
    Log::error("error",[$user]);    
    return response()-> json(
    [
    "message"=> "Success",
    "result" => $user
    ],
    200
    );
    
    
    }catch (Exception $e){
        Log::error("error", [$e]); 
        return response()-> json(
            [
            "message"=> "Internal server error",
            ],
            500
            );
    }

}
public function destroy(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
    ]);
    
   
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    
       try{ 
        $user = [

             'email' => $request->email,
            
             'password' => 'password',
            
            ];
            
           if ($user) {
            
            return response()->json([
            
             'message' => 'User deleted successfully',
            
            ], 200);
            
        }
    }
        catch (Exception $e){
            Log::error("error", [$e]); 
            return response()-> json(
                [
                "message"=> "Internal server error",
                ],
                500
                );
        }
}

}