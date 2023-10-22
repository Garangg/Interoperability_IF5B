<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::OrderBy("id","DESC")->paginate(10);

        $output = [
            "message" => "product",
            "result" => $product
        ];

        return response()->json($product,200);
    }
    
    public function store(Request $request){
        $input = $request->all(); //mengambil semua input dari user
        $product = Product::create($input); //membuat product baru

        return response()->json($product,200); //mengembalikan data product baru dalam bentuk json
    }

    public function show($id){
        $product = Product::find($id); //mencari product berdasarkan id

        if(!$product){
            abort(404);
        }

        return response()->json($product,200);
    }

    public function update(Request $request, $id){
        $input = $request->all(); //mengambil semua input dari user
        $product = Product::find($id); //mencari product berdasarkan id

        if(!$product){
            abort(404);
        }

        $product->fill($input); //mengisi product dengan data baru dari input
        $product->save(); //menyimpan product ke database

        return response()->json($product,200); //mengembalikan data product yang baru diupdate dalam bentuk json
    }

    public function destroy($id){
        $product = Product::find($id); //mencari product berdasarkan id

        if(!$product){
            abort(404);
        }

        $product->delete(); //menghapus product

        $message = ["message" => "delete success", "product_id" => $id];

        return response()->json($message,200); //mengembalikan pesan ketika product berhasil dihapus
    }
}