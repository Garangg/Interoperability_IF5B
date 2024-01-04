<?php

namespace App\Http\Controllers\PublicController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        // print_r($request->all());die();
        $posts = Post::OrderBy("id", "ASC")->paginate(10)->toArray();
        $response = [
            "total_count" => $posts["total"],
            "limit" => $posts["per_page"],
            "pagination" => [
                "next_page" => $posts["next_page_url"],
                "current_page" => $posts["current_page"]
            ],
            "data" => $posts["data"],
        ];
        $acceptHeader = $request->header('Accept');
        if ($acceptHeader === 'application/json') {
            return response()->json($response, 200);
        } else {
            $xml = new \SimpleXMLElement('<Posts/>');
            foreach ($posts['data'] as $item) {
                $xmlItem = $xml->addChild('post');
                $xmlItem->addChild('id', $item['id']);
                $xmlItem->addChild('title', $item['title']);
                $xmlItem->addChild('author', $item['author']);
                $xmlItem->addChild('category', $item['category']);
                $xmlItem->addChild('status', $item['status']);
                $xmlItem->addChild('content', $item['content']);
                $xmlItem->addChild('user_id', $item['user_id']);
                $xmlItem->addChild('created_at', $item['created_at']);
                $xmlItem->addChild('updated_at', $item['updated_at']);
            }
            return $xml->asXML();
        }
    }

    public function show($id)
    {
        $post = Post::with(['user' => function ($query) {
            $query->select('id', 'name');
        }])->find($id);

        if (!$post) {
            abort(404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $post
        ]);
    }
}
