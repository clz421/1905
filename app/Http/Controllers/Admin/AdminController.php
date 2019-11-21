<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Admin;
use Validator;
use App\Http\Requests\StoreBrandPost;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config('app.pageSize');        
        $data=admin::Paginate($pageSize);
        // dd($data);
        // $query=request()->all();
        // dd($query);
        return view('admin.admin.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
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
            'name' => 'required|unique:admin|alpha_dash|min:2|max:12',
            'email' => 'required',
            'tel' => 'required',            
        ],[
            'name.required'=>'管理员名称必填！',
            'name.alpha_dash'=>'管理员名称由字母数字下划线组成！',
            'name.min'=>'管理员名称2-12位！',
            'name.max'=>'管理员名称2-12位！',                
            'name.unique'=>'管理员已存在！',                
            'email.required'=>'邮箱必填！',  
            'tel.required'=>'手机号必填！',                                    
        ]);
        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
        // //文件上传
        // if(request()->hasFile('brand_logo')){
        //     $post['brand_logo']=$this->upload('brand_logo');
        // }
        // dd($post);
        // $res=DB::table('admin')->insert($post);
        $res=Admin::insert($post);
        // dd($res);
        if($res){
            return redirect('admin/index');
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
        $data=admin::where('admin_id',$id)->first();
        // dd($data);
        return view('admin.admin.edit',['data'=>$data]);         
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
            'name' => 'required|unique:admin|alpha_dash|min:2|max:12',
            'email' => 'required',
            'tel' => 'required',            
        ],[
            'name.required'=>'管理员名称必填！',
            'name.alpha_dash'=>'管理员名称由字母数字下划线组成！',
            'name.min'=>'管理员名称2-12位！',
            'name.max'=>'管理员名称2-12位！',                
            'name.unique'=>'管理员已存在！',                
            'email.required'=>'邮箱必填！',  
            'tel.required'=>'手机号必填！',                                    
        ]);
        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
       
        $res= admin::where('admin_id',$id)->update($post);
        // dd($res);
        return redirect('admin/index');
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
        $res=admin::where('admin_id',$id)->delete();
        // dd($res);
        if($res){
            return redirect('admin/index');
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
