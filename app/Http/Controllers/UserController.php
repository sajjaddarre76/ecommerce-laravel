<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where('email', $req->email)->first();
        if($user || Hash::check($req->password, $user->password)){
            $req->session()->put('user', $user);
            return redirect('/');
        }else{
            return 'Username or password not matched';
        }
    }
}
