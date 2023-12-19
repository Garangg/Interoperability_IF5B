<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller{
    public function getRequestJson(Request $request){
        $url = 'http://localhost:8000/public/posts';
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

        return view ('posts/getRequestJson', compact('response'));
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
}