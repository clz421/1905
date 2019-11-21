<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\test;
use Validator;
use App\Http\Requests\StoreBrandPost;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize'); 
        $where=[];
        //搜索标题
        $title=request()->title;
        // dd($title);
        if($title){
            $where[]=['t_title','like',"%$title%"];
        }
        //搜索文章分类
        $data=test::where($where)->Paginate($pageSize);
        $query=request()->all();        
        // dd($query);
        return view('test.index',['data'=>$data,'query'=>$query]);        
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            't_title' => 'required|unique:test|alpha_dash',
        ],[
            't_title.required'=>'文章标题必填！',
            't_title.alpha_dash'=>'文章标题由字母数字下划线组成！',
            't_title.unique'=>'文章标题已存在！',                           
        ]);
       

        $post=request()->except('_token');
        //文件上传
        // dd($post);
        if(request()->hasFile('t_img')){
            $post['t_img']=$this->upload('t_img');
        }
        // dd($post);
        $res=test::insert($post);
        // dd($res);
        if($res){
            return redirect('test/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=test::where('t_id',$id)->first();
        // dd($data);
        return view('test.edit',['data'=>$data]);         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            't_title' => 'required|unique:test|alpha_dash',
        ],[
            't_title.required'=>'文章标题必填！',
            't_title.alpha_dash'=>'文章标题由字母数字下划线组成！',
            't_title.unique'=>'文章标题已存在！',                           
        ]);
        $post=request()->except('_token');
        //文件上传
        if(request()->hasFile('t_img')){
            $post['t_img']=$this->upload('t_img');
        }
        $res= test::where('t_id',$id)->update($post);
        // dd($res);
        return redirect('test/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    dd($id); 
    if(!$id){
        return;
    }
    $res=test::where('t_id',$id)->delete();
    // dd($res);
    if($res){
        return redirect('test/index');
    }
    }
        //文件上传
        public function upload($file){
            if (request()->file($file)->isValid()) {
                $photo = request()->file($file);
                $store_result = $photo->store('upload');
                return $store_result;
            }
            exit('未获取到上传文件或上传过程出错');
        }
        public function checkOnly(){
            $t_title = request()->t_title;
            // echo $t_title;
            $count=Test::where('t_title',$t_title)->count();
            echo $count;
        }
}
