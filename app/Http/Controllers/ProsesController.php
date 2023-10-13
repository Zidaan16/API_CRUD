<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProsesController extends Controller
{
    public function proses(Request $request){
        $user = $request->input('username');
        $pass = $request->input('password');
        $db = DB::select("select * from users where username='$user' and password='$pass'");
        if (!$db){
            $var = 0;
            return view('index', ['var' => $var]);
        }
        else{
            return view('index', ['var' => [$db[0]->username, $db[0]->password]]);
        }
    }
}
