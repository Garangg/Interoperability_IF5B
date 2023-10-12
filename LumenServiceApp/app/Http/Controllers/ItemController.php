<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return '<h1>Ini Halaman Item</h1>';
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