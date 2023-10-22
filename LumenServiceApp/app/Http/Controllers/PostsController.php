<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller{

    public function index(){
        $posts = Post::OrderBy("id","DESC")->paginate(10);

        $output = [
            "message" => "posts",
            "result" => $posts
        ];

        return response()->json($posts,200);
    }

    public function store(Request $request){
        $input = $request->all(); //mengambil semua input dari user
        $post = Post::create($input); //membuat post baru

        return response()->json($post,200); //mengembalikan data post baru dalam bentuk json
    }

    public function show($id){
        $post = Post::find($id); //mencari post berdasarkan id

        if(!$post){
            abort(404);
        }

        return response()->json($post,200);
    }

    public function update(Request $request, $id){
        $input = $request->all(); //mengambil semua input dari user
        $post = Post::find($id); //mencari post berdasarkan id

        if(!$post){
            abort(404);
        }

        $post->fill($input); //mengisi post dengan data baru dari input
        $post->save(); //menyimpan post ke database

        return response()->json($post,200); //mengembalikan data post yang baru diupdate dalam bentuk json
    }

    public function destroy($id){
        $post = Post::find($id); //mencari post berdasarkan id

        if(!$post){
            abort(404);
        }

        $post->delete(); //menghapus post

        $message = ["message" => "delete success", "post_id" => $id];

        return response()->json($message,200); //mengembalikan pesan ketika post berhasil dihapus
    }
}