<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;

class IndexController extends Controller
{
    public function index(){
        $data=Goods::select();
        // dd($data);
        return view('index.index.index',['data'=>$data]);
    }
   
}
