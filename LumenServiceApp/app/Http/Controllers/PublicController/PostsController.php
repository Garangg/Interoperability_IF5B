<?php 

namespace App\Http\Controllers\PublicController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller{
    public function index(Request $request){
        $posts = Post::OrderBy("id", "ASC")->paginate(10)->toArray();
        $acceptHeader = $request->header('Accept');
        $response = [
            "total_count" => $posts["total"],
            "limit" => $posts["per_page"],
            "pagination" => [
                "next_page" => $posts["next_page_url"],
                "current_page" => $posts["current_page"]
            ],
            "data" => $posts["data"],
        ];
        return response()->json($response,200);
    }

    public function show($id){
        $post = Post::with(['user'=>function($query){
            $query->select('id','name');
        }])->find($id);
        
        if(!$post){
            abort(404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $post
        ]);
    }
}
