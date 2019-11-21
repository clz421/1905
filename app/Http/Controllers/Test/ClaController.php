<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Cache;

class ClaController extends Controller
{
    public function list(){
        $data=Cache::get('data');
        dump($data);
        $data=DB::table('class')->Paginate(2);
        Cache::put('data',$data,2);
        // dd($data);
        return view('/test/list',['data'=>$data]);
    }
}
