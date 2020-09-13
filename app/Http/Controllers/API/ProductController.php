<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {

        $products = User::find(Auth::id())->products;
//          $products = Product::where('user_id', '=', 1)->paginate(5);
        return $products;


    }


    public function store(Request $request)
    {
        Product::create([
            'description' => $request->description,
            'product_link' => $request->product_link,
            'count' => $request->count,
            'price' => $request->price,
            'user_id' => Auth::id(),
            'product_number' => '#'.rand(1, 100000),
        ]);
        return response()->json([
            'status' => 201,
            'message' => 'product created',
        ]);
    }


    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }


    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->description = $request->description;
        $product->product_link = $request->product_link;
        $product->count = $request->count;
        $product->price = $request->price;
        $product->update();
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'status' => 200,
            'message' => 'resource delete successfully'
        ]);
    }
}
