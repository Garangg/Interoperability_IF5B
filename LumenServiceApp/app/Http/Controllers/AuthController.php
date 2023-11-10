<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller{

    public function register(Request $request){
        // $this->validate($request, [
        //     'name' => 'required|varchar',
        //     'email' => 'required|email|unique:users|varchar',
        //     'gender' => 'required|in:male,female',
        //     'phone_number' => 'required|int',
        //     'password' => 'required|varchar|confirmed',
        //     'role' => 'required|in:admin,user'
        // ]);
        $input = $request->all();

        // Validasi input
        // $validationRules = [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'gender' => 'required|in:male,female',
        //     'phone_number' => 'required',
        //     'password' => 'required',
        //     'role' => 'required|in:admin,user'
        // ];
        
   
        // $validator = Validator::make($input, $validationRules);

        // if($validator->fails()){
        //     return response()->json($validator->errors(), 400);
        // }

        // Buat user baru
        $user = new User;
        $user->name = $request->input('name');
        $user->email= $request->input('email');
        $user->gender = $request->input('gender');
        $user->phone_number = $request->input('phone_number');
        $user->password = app('hash')->make($request->input('password'));
        $user->role = $request->input('role');

        // print_r($user);
        // die();

        $user->save();
        
        
        return response()->json($user, 200);

    }
}