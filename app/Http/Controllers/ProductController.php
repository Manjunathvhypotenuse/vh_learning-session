<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{
    public function get()
    {
    try {
    $products = DB::select ("SELECT p.name as productName, c.name as categoryName

    From Products p

    INNER JOIN categories c ON c.id= p.category_id

    WHERE 1");
    
    return response()->json(["message" => "Success","result" => $products], 200);
    } catch (Exception $c) {
    Log::error($c);
}
}
}
