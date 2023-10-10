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


}