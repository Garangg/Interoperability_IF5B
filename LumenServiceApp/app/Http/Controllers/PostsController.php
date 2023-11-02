<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index(Request $request)
    {
        $acceptHeader = $request->header("Accept");

        // 
        if ($acceptHeader === "application/json" || $acceptHeader === "application/xml") {
            $posts = Post::OrderBy("id", "ASC")->paginate(10);

            if ($acceptHeader === "application/json") {
                // JSON
                return response()->json($posts->items('data'), 200);
            } else {
                // XML
                $xml = new \SimpleXMLElement('<posts/>');
                foreach ($posts->items('data') as $item) {
                    $xmlItem = $xml->addChild('post');
                    $xmlItem->addChild('id', $item->id);
                    $xmlItem->addChild('title', $item->title);
                    $xmlItem->addChild('author', $item->author);
                    $xmlItem->addChild('category', $item->category);
                    $xmlItem->addChild('status', $item->status);
                    $xmlItem->addChild('content', $item->content);
                    $xmlItem->addChild('user_id', $item->user_id);
                    $xmlItem->addChild('created_at', $item->created_at);
                    $xmlItem->addChild('updated_at', $item->updated_at);
                }
                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }

    public function store(Request $request)
    {
        $acceptHeader = $request->header("Accept");

        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            $contentTypeHeader = $request->header('Content-Type');

            if ($contentTypeHeader === 'application/json'){
                $input = $request->all(); //mengambil semua input dari user
                $post = Post::create($input); //membuat post baru
                
                return response()->json($post, 200); //mengembalikan data post baru dalam bentuk json
            }elseif ($contentTypeHeader === 'application/xml'){
                $xmldata = $request->getContent(); //mengambil data xml
                $xml = simplexml_load_string($xmldata); //mengubah string xml menjadi object

                if ($xml === false){
                    return response('Bad Request', 400);
                }else{
                    $post = Post::create([
                        'title' => $xml->title,
                        'author' => $xml->author,
                        'category' => $xml->category,
                        'status' => $xml->status,
                        'content' => $xml->content,
                        'user_id' => $xml->user_id
                    ]);
                    
                    if ($post->save()){
                        return $xml -> asXML();
                    }else{
                        return response('Internal Server Error', 500);
                    }
                }
            }
        }else{
            return response('Not Acceptable!', 406);
        }
    }

    public function show(Request $request,$id)
    {
        $acceptHeader = $request->header("Accept");
        if ($acceptHeader === "application/json"){
            $post = Post::find($id); //mencari post berdasarkan id

            if (!$post) {
                return response('Post not found', 404);
            }

            return response()->json($post, 200);
        }elseif ($acceptHeader === "application/xml"){
            $post = Post::find($id); //mencari post berdasarkan id

            if (!$post) {
                return response('Post not found', 404);
            }

            $xml = new \SimpleXMLElement('<posts/>');
            $xmlItem = $xml->addChild('post');
            $xmlItem->addChild('id', $post->id);
            $xmlItem->addChild('title', $post->title);
            $xmlItem->addChild('author', $post->author);
            $xmlItem->addChild('category', $post->category);
            $xmlItem->addChild('status', $post->status);
            $xmlItem->addChild('content', $post->content);
            $xmlItem->addChild('user_id', $post->user_id);
            $xmlItem->addChild('created_at', $post->created_at);
            $xmlItem->addChild('updated_at', $post->updated_at);

            return $xml->asXML();
        }else{
            return response('Not Acceptable!', 406);
        }
    }

    public function update(Request $request, $id)
    {
        $acceptHeader = $request->header("Accept");
        if ($acceptHeader==="application/json" || $acceptHeader==="application/xml"){
            $contentTypeHeader = $request->header("Content-Type");

            if ($contentTypeHeader === "application/json"){
                // JSON
                $input = $request->all(); //mengambil semua input dari user
                $post = Post::find($id); //mencari post berdasarkan id

                if (!$post) {
                    return response('Post not found', 404);
                }

                $post->fill($input); //mengisi post dengan data baru dari input
                $post->save(); //menyimpan post ke database

                return response()->json($post, 200); //mengembalikan data post yang baru diupdate dalam bentuk json
            }elseif ($contentTypeHeader === "application/xml"){
                // XML
                $xmldata = $request->getContent(); //mengambil data xml
                $xml = simplexml_load_string($xmldata); //mengubah string xml menjadi object

                if ($xml === false){
                    return response('Bad Request', 400);
                }else{
                    $post = Post::find($id); //mencari post berdasarkan id

                    if (!$post) {
                        return response('Post not found', 404);
                    }else{
                        $input = [
                            'title' => $xml->title,
                            'author' => $xml->author,
                            'category' => $xml->category,
                            'status' => $xml->status,
                            'content' => $xml->content,
                            'user_id' => $xml->user_id
                        ];
                        $post->fill($input);
                        if ($post->save()){
                            return $xml -> asXML();
                        }else{
                            return response('Internal Server Error', 500);
                        }
                    }
                }
            }else{
                return response('Not Acceptable!', 406);
            }
        }
    }

    public function destroy(Request $request,$id)
    {
        $acceptHeader = $request->header("Accept");
        if ($acceptHeader==="application/json" ){
            // JSON
            $post = Post::find($id); //mencari post berdasarkan id

            if (!$post) {
                return response('Post not found', 404);
            }

            $post->delete(); //menghapus post

            $message = ["message" => "delete success", "id" => $id];

            return response()->json($message, 200); //mengembalikan pesan ketika post berhasil dihapus
        }elseif($acceptHeader==="application/xml"){
            // XML
            $post = Post::find($id); //mencari post berdasarkan id

            if (!$post) {
                return response('Post not found', 404);
            }

            if($post->delete()){
                $xml = new \SimpleXMLElement('<message/>');
                $xml->addChild('message', 'deleted successfully');
                $xml->addChild('id', $id);
 
                return $xml->asXML();
            }else{
                return response('Internal Server Error', 500);
            }
        }else{
            return response('Not Acceptable!', 406);
        }   
    }
}
