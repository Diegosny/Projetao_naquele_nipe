<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $usuarios = User::get();
        return view('usuarios.index')->with('usuarios',$usuarios);
    }
}
