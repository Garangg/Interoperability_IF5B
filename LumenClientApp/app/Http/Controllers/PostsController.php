<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class PostsController extends Controller{
    public function getRequestJson(Request $request){
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept' === 'application/json'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $response = json_decode($result, true);
        // dd($result);
        return view ('posts/getRequestJson', compact('response'));
    }

    public function getRequestXml(Request $request){
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept' => 'application/xml'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);
        
        // dd($response);
        
        $parsedXml = new SimpleXMLElement($result);
        $response = [];
        foreach($parsedXml->children() as $item){
            array_push($response,array(
                'id' => $item->id,
                'user_id' => $item->user_id,
                'title' =>  $item->title,
                'content' => $item->content,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ));
        }
        return view ('posts/getRequestXml', compact('response'));
    }

    public function getRequestJsonById(Request $request, $id){
        $id = $request->id;
        $url = 'http://localhost:8000/public/posts/'.$id;
        $headers = ['Accept' => 'application/json'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);


        $response = json_decode($result, true);
        // dd($response);

        return view ('posts/getRequestJsonById', compact('response'));
    }

    public function postRequestXml(Request $request){
        $url = 'http://localhost:8000/public/posts/';
        $headers = ['Content-Type: application/xml', 'Accept: application/xml'];
        $data = array(
            'user_id' => $request->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status
        );

        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // set post data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $parsedXml = new SimpleXMLElement($result);
        $response = [];

        foreach($parsedXml->children() as $item){
            array_push($response, array(
                'id' => $item->id,
                'user_id' => $item->user_id,
                'title' =>  $item->title,
                'content' => $item->content,
                'status' => $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at
            ));
        }

        return view ('posts/postRequestXml', compact('response'));
    }
}