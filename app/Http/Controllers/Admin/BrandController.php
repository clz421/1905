<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\brand;
use Validator;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Facades\Cache;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Cache::get('data');
        dump($data);
        // $user= \Auth::user();
        // $id= \Auth::id();        
        // dd($id);
        $pageSize=config('app.pageSize'); 
        // showMsg(1,'Hello World!');die;
        $where=[];
        //搜索品牌名称
        $word=request()->word;
        // dd($word);
        if($word){
            $where[]=['brand_name','like',"%$word%"];
        }
        //搜索品牌描述
        $desc=request()->desc;
        if($desc){
            $where[]=['brand_desc','like',"%$desc%"];
        }
        // DB::connection()->enableQueryLog();
        $data=brand::where($where)->Paginate($pageSize);
        //memcache缓存
        Cache::put('data',$data,1);
        // $logs = DB::getQueryLog();
        // dump($logs);       
        // dd($data);
        $query=request()->all();
        // dd($query);
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
        //验证一
        // $request->validate([
        //     'brand_name' => 'required|unique:brand',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填',
        //     'brand_url.required'=>'品牌网址必填',            
        // ]);
        //验证三
        $validator = Validator::make($request->all(), [
                'brand_name' => 'required|unique:brand|alpha_dash|min:2|max:12',
                'brand_url' => 'required',
            ],[
                'brand_name.required'=>'品牌名称必填！',
                'brand_name.alpha_dash'=>'品牌名称由字母数字下划线组成！',
                'brand_name.min'=>'品牌名称2-12位！',
                'brand_name.max'=>'品牌名称2-12位！',                
                'brand_name.unique'=>'品牌名称已存在！',                
                'brand_url.required'=>'品牌网址必填！',            
            ]);
            if ($validator->fails()) {
            return redirect('brand/create')
            ->withErrors($validator)
            ->withInput();
        }


        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
        //文件上传
        if(request()->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        // dd($post);
        $res=brand::insert($post);
        // dd($res);
        if($res){
            return redirect('brand/index');
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
        // echo $id;
        $data=brand::where('brand_id',$id)->first();
        // dd($data);
        return view('admin.brand.edit',['data'=>$data]);        
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
            //验证
            $request->validate([
                'brand_name' => 'required|unique:brand|alpha_dash|min:2|max:12',
                'brand_url' => 'required',
            ],[
                'brand_name.required'=>'品牌名称必填！',
                'brand_name.alpha_dash'=>'品牌名称由字母数字下划线组成！',
                'brand_name.min'=>'品牌名称2-12位！',
                'brand_name.max'=>'品牌名称2-12位！',                
                'brand_name.unique'=>'品牌名称已存在！',                
                'brand_url.required'=>'品牌网址必填！',             
            ]);
            $post=request()->except('_token');
            // $res=DB::table('brand')->insert($post);
            //文件上传
            if(request()->hasFile('brand_logo')){
                $post['brand_logo']=$this->upload('brand_logo');
            }
            $res= brand::where('brand_id',$id)->update($post);
            // dd($res);
            return redirect('brand/index');
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
        $res=brand::where('brand_id',$id)->delete();
        // dd($res);
        if($res){
            return redirect('brand/index');
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
        $brand_name = request()->brand_name;
        // echo $brand_name;
        $count=Brand::where('brand_name',$brand_name)->count();
        echo $count;
    }
}
