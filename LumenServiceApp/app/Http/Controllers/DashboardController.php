<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return '<h1>Selamat Datang</h1> <br> Ini Adalah Halaman Dashboard';
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

    public function getAllItem(){
        $items = [
            [
                'id' => 1, 
                'name' => 'Indomie',
                'price' => '3000',
                'description' => 'Makanan Ringan',
                'stock' => '10',
            ],
            [
                'id' => 2, 
                'name' => 'Pocari Sweat',
                'price' => '6000',
                'description' => 'Minuman Isotonik',
                'stock' => '20',
            ],
            [
                'id' => 3, 
                'name' => 'Silverqueen',
                'price' => '12000',
                'description' => 'Coklat',
                'stock' => '5',
            ],
            [
                'id' => 4, 
                'name' => 'Teh Pucuk',
                'price' => '4000',
                'description' => 'Minuman Teh',
                'stock' => '15',
            ],
            [
                'id' => 5, 
                'name' => 'Teh Kotak',
                'price' => '5000',
                'description' => 'Minuman Teh',
                'stock' => '10',
            ],
        ];
        return response()->json($items);

    }

    public function getItemById($itemId)
    {
        $item = $this->findItemById($itemId);

        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }
    }

    private function findItemById($itemId)
    {
        $items = [
            [
                'id' => 1, 
                'name' => 'Indomie',
                'price' => '3000',
                'description' => 'Makanan Ringan',
                'stock' => '10',
            ],
            [
                'id' => 2, 
                'name' => 'Pocari Sweat',
                'price' => '6000',
                'description' => 'Minuman Isotonik',
                'stock' => '20',
            ],
            [
                'id' => 3, 
                'name' => 'Silverqueen',
                'price' => '12000',
                'description' => 'Coklat',
                'stock' => '5',
            ],
            [
                'id' => 4, 
                'name' => 'Teh Pucuk',
                'price' => '4000',
                'description' => 'Minuman Teh',
                'stock' => '15',
            ],
            [
                'id' => 5, 
                'name' => 'Teh Kotak',
                'price' => '5000',
                'description' => 'Minuman Teh',
                'stock' => '10',
            ],
        ];

        foreach ($items as $key => $value) {
            if ($value['id'] == $itemId) {
                return $value;
            }
        }

        return false;
    }
}