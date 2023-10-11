<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{
    public function index()
    {
        return 'Halo ini adalah method index, dalam controller users.';
    }
    public function show($id)
    {
        return 'Anda sedang melihat user dengan id ' . $id;
    }
    public function edit($id)
    {
        return 'Anda sedang mengedit user dengan id ' . $id;
    }
    public function delete($id)
    {
        return 'Anda sedang menghapus user dengan id ' . $id;
    }

    public function getAllUser()
    {
        $users = [
            [
                'id' => 1, 
                'name' => 'Joko',
                'email' => 'joko@example.com',
                'address' => 'Bandung',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 2, 
                'name' => 'Anwar',
                'email' => 'anwar@example.com',
                'address' => 'Jakarta',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3, 
                'name' => 'Tini',
                'email' => 'tini@example.com',
                'address' => 'Cimahi',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 4, 
                'name' => 'Putri',
                'email' => 'putri@example.com',
                'address' => 'Bekasi',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 5, 
                'name' => 'Gunawan',
                'email' => 'gugun@example.com',
                'address' => 'Solo',
                'gender' => 'Laki-laki',
            ],
        ];

        return response()->json($users);
    }

    public function getUserById($userId)
    {

        $user = $this->findUserById($userId);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }
    }

    private function findUserById($userId)
    {
        $users = [
            [
                'id' => 1, 
                'name' => 'Joko',
                'email' => 'joko@example.com',
                'address' => 'Bandung',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 2, 
                'name' => 'Anwar',
                'email' => 'anwar@example.com',
                'address' => 'Jakarta',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3, 
                'name' => 'Tini',
                'email' => 'tini@example.com',
                'address' => 'Cimahi',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 4, 
                'name' => 'Putri',
                'email' => 'putri@example.com',
                'address' => 'Bekasi',
                'gender' => 'Perempuan',
            ],
            [
                'id' => 5, 
                'name' => 'Gunawan',
                'email' => 'gugun@example.com',
                'address' => 'Solo',
                'gender' => 'Laki-laki',
            ],
        ];

        foreach ($users as $key => $value) {
            if ($value['id'] == $userId) {
                return $value;
            }
        }

        return false;
    }

}