<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class RegController extends Controller
{
    public function index(){
        return view('login');
    }
    public function doform(){
        dd(request()->post());
    }
    public function goods($goods_id){
        echo $goods_id;
    }
    public function dologin(){
        $post=request()->except('_token');
        if (Auth::attempt($post)) {
            // 认证通过...
            return redirect('/brand/index');
        }else{
            return redirect('/login')->with('msg','没有此用户');
        }
    }

    public function doReg(){
        $post=request()->except('_token');
        // dd($post);
        $post['password'] = bcrypt($post['password']);
        // dd($post);
        $res = User::create($post);
        dd($res);
    }
}
