<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cate;
use App\Brand;
use Validator;
use App\Http\Requests\StoreBrandPost;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=8;        
        $data=goods::join('cate','goods.cate_id','=','cate.cate_id')
        ->join('brand','goods.brand_id','=','brand.brand_id')
        ->Paginate($pageSize);
        // dd($data);
        // $query=request()->all();
        // dd($query);
        return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateInfo=cate::all();
        // dd($cateInfo);
        $brandInfo=brand::all();
        // dd($brandInfo);
        return view('admin.goods.create',['cateInfo'=>$cateInfo,'brandInfo'=>$brandInfo]);
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
            'goods_name' => 'required|unique:goods|alpha_dash',  
            'goods_price' => 'required',       
        ],[
            'goods_name.required'=>'商品名称必填！',
            'goods_name.alpha_dash'=>'商品名称由字母数字下划线组成！',              
            'goods_name.unique'=>'商品名称已存在！',  
            'goods_price.required'=>'商品价格必填！',                                                            
        ]);
        $post=request()->except('_token');
        // dd($post);
        // $res=DB::table('brand')->insert($post);
        // //文件上传
        if(request()->hasFile('goods_img')){
            $post['goods_img']=$this->upload('goods_img');
        }
        // dd($post);
        // $res=DB::table('admin')->insert($post);
        $res=goods::insert($post);
        // dd($res);
        if($res){
            return redirect('goods/index');
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
        $cateInfo=cate::all();
        // dd($cateInfo);
        $brandInfo=brand::all();
        $data=goods::where('goods_id',$id)->first();
        // dd($brandInfo);
        return view('admin.goods.edit',['data'=>$data,'cateInfo'=>$cateInfo,'brandInfo'=>$brandInfo]);
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
            'goods_name' => 'required|unique:goods|alpha_dash',  
            'goods_price' => 'required',       
        ],[
            'goods_name.required'=>'商品名称必填！',
            'goods_name.alpha_dash'=>'商品名称由字母数字下划线组成！',              
            'goods_name.unique'=>'商品名称已存在！',  
            'goods_price.required'=>'商品价格必填！',                                                            
        ]);
        $post=request()->except('_token');
        // $res=DB::table('brand')->insert($post);
       
        $res= goods::where('goods_id',$id)->update($post);
        // dd($res);
        return redirect('goods/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$id){
            return;
        }
        $res=goods::where('goods_id',$id)->delete();
        // dd($res);
        if($res){
            return redirect('goods/index');
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
