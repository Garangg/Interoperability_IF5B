<?php

namespace App\Http\Controllers;

Use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::OrderBy("id","DESC")->paginate(10);

        $output = [
            "message" => "users",
            "result" => $users
        ];

        return response()->json($users,200);
    }

    // public function getAllUser()
    // {
    //     $users = [
    //         [
    //             'id' => 1, 
    //             'name' => 'Joko',
    //             'email' => 'joko@example.com',
    //             'address' => 'Bandung',
    //             'gender' => 'Laki-laki',
    //         ],
    //         [
    //             'id' => 2, 
    //             'name' => 'Anwar',
    //             'email' => 'anwar@example.com',
    //             'address' => 'Jakarta',
    //             'gender' => 'Laki-laki',
    //         ],
    //         [
    //             'id' => 3, 
    //             'name' => 'Tini',
    //             'email' => 'tini@example.com',
    //             'address' => 'Cimahi',
    //             'gender' => 'Perempuan',
    //         ],
    //         [
    //             'id' => 4, 
    //             'name' => 'Putri',
    //             'email' => 'putri@example.com',
    //             'address' => 'Bekasi',
    //             'gender' => 'Perempuan',
    //         ],
    //         [
    //             'id' => 5, 
    //             'name' => 'Gunawan',
    //             'email' => 'gugun@example.com',
    //             'address' => 'Solo',
    //             'gender' => 'Laki-laki',
    //         ],
    //     ];

    //     return response()->json($users);
    // }

    // public function getUserById($userId)
    // {

    //     $user = $this->findUserById($userId);

    //     if ($user) {
    //         return response()->json($user);
    //     } else {
    //         return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
    //     }
    // }

    // private function findUserById($userId)
    // {
    //     $users = [
    //         [
    //             'id' => 1, 
    //             'name' => 'Joko',
    //             'email' => 'joko@example.com',
    //             'address' => 'Bandung',
    //             'gender' => 'Laki-laki',
    //         ],
    //         [
    //             'id' => 2, 
    //             'name' => 'Anwar',
    //             'email' => 'anwar@example.com',
    //             'address' => 'Jakarta',
    //             'gender' => 'Laki-laki',
    //         ],
    //         [
    //             'id' => 3, 
    //             'name' => 'Tini',
    //             'email' => 'tini@example.com',
    //             'address' => 'Cimahi',
    //             'gender' => 'Perempuan',
    //         ],
    //         [
    //             'id' => 4, 
    //             'name' => 'Putri',
    //             'email' => 'putri@example.com',
    //             'address' => 'Bekasi',
    //             'gender' => 'Perempuan',
    //         ],
    //         [
    //             'id' => 5, 
    //             'name' => 'Gunawan',
    //             'email' => 'gugun@example.com',
    //             'address' => 'Solo',
    //             'gender' => 'Laki-laki',
    //         ],
    //     ];

    //     foreach ($users as $key => $value) {
    //         if ($value['id'] == $userId) {
    //             return $value;
    //         }
    //     }

    //     return false;
    // }

}