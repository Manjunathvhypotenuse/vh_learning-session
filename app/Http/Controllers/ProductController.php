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
//     public function get()
//     {
//     try {
//     $products = DB::select ("SELECT p.name as productName, c.name as categoryName

//     From Products p

//     INNER JOIN categories c ON c.id= p.category_id

//     WHERE 1");
    
//     return response()->json(["message" => "Success","result" => $products], 200);
//     } catch (Exception $c) {
//     Log::error($c);
// }
// }
// }

// public function get() //1.	Create 20 records in product table and get the lists of products ordered by its category name descending
// {
// try{

// $products = Product::orderBy('name', 'DESC')
// ->get();
// return response()->json(["message" => "Success","result" => $products], 200);
// }
// catch (Exception $c) {
//     Log::error($c);
// }
// }

public function get(Request $request)
{
try{
$filter = $request->query("filter");
$Search = $request->query("search");

$query=Product::join("categories", "categories.id", "=", "products.category_id")
->select(
    "products.name as product_name",
    "categories.name as category_name",    
);
if ($filter){
    $flag = ($filter === "active only") ? 1: 0;
    $query = $query->where("products.is_active", $flag);

}

if ($Search){

    $query=$query->whereRaw("
    products.name LIKE '%$Search%'
   
    OR categories.name LIKE '%$Search%'
    
    ");

}

$products=$query->orderBy("products.name","ASC")
->paginate();

$pagination_options = [
    "current_page" => $products->currentPage(),
    "total_records"=> count($products->items()),
];

return response()->json(["message" => "Success",
"result" => $products->items(),
"pagination_options" => $pagination_options], 200);

}
catch (Exception $c) {
Log::error($c);
return response()->json([
    "message" => "internal server error",
], 500);
}
}
}





