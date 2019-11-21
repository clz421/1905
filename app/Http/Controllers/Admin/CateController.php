<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Cate;
use Validator;
use App\Http\Requests\StoreBrandPost;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(11);
        $pageSize=8;        
        $data=cate::Paginate($pageSize);
        // dd($data);
        // $query=request()->all();
        // dd($query);
        return view('admin.cate.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateInfo=cate::all();
        // dd($cateInfo);
        return view('admin.cate.create',['cateInfo'=>$cateInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(StoreBrandPost $request)
    {
        $request->validate([
            'cate_name' => 'required|unique:cate|alpha_dash',         
        ],[
            'cate_name.required'=>'分类名称必填！',
            'cate_name.alpha_dash'=>'分类名称由字母数字下划线组成！',              
            'cate_name.unique'=>'分类名称已存在！',                                                  
        ]);
        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
        // //文件上传
        // if(request()->hasFile('brand_logo')){
        //     $post['brand_logo']=$this->upload('brand_logo');
        // }
        // dd($post);
        // $res=DB::table('admin')->insert($post);
        $res=cate::insert($post);
        // dd($res);
        if($res){
            return redirect('cate/index');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *修改
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateInfo=cate::all();
        // dd($cateInfo);
        $data=cate::where('cate_id',$id)->first();
        // dd($data);
        return view('admin.cate.edit',['data'=>$data,'cateInfo'=>$cateInfo]);         
    }

    /**
     * Update the specified resource in storage.
     *执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo $id;
        // dd(123);
         //验证
        $request->validate([
            'cate_name' => 'required|unique:cate|alpha_dash',         
        ],[
            'cate_name.required'=>'分类名称必填！',
            'cate_name.alpha_dash'=>'分类名称由字母数字下划线组成！',              
            'cate_name.unique'=>'分类名称已存在！',                                                  
        ]);
        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
       
        $res= cate::where('cate_id',$id)->update($post);
        // dd($res);
        return redirect('cate/index');
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        if(!$id){
            return;
        }
        $res=cate::where('cate_id',$id)->delete();
        // dd($res);
        if($res){
            return redirect('cate/index');
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
}
