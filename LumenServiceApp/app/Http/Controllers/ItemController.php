<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return '<h1>Ini Halaman Item</h1>';
    }

    public function show($id)
    {
        return '<h1>Item '.$id.'</h1>';
    }

    public function store(Request $request)
    {
        return '<h1>Item berhasil ditambahkan</h1>';
    }

    public function update(Request $request, $id)
    {
        return '<h1>Item '.$id.' berhasil diupdate</h1>';
    }

    public function delete($id)
    {
        return '<h1>Item '.$id.' berhasil dihapus</h1>';
    }
}