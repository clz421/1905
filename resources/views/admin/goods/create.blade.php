<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 align="center">商品添加</h2>
    <form class="form-horizontal" role="form" action="{{url('/goods/store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-10">
            <input type="text" name="goods_name" class="form-control" id="firstname" placeholder="请输入商品名称">
            @if($errors->has('goods_name'))<b style="color:red">{{$errors->first('goods_name')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-10">
            <input type="file" name="goods_img" class="form-control" id="firstname" >
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-10">
            <input type="text" name="goods_price" class="form-control" id="firstname" placeholder="请输入商品价格">
            @if($errors->has('goods_price'))<b style="color:red">{{$errors->first('goods_price')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10">
            <select name="cate_id">
                    <option value="0">--请选择--</option>
                    @foreach($cateInfo as $v)
                    <option value="{{$v->cate_id}}">
                    
                         {{$v->cate_name}}
                    </option>
                    @endforeach                       
            </select>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">品牌</label>
            <div class="col-sm-10">
            <select name="brand_id">
                    <option value="0">--请选择--</option>
                    @foreach($brandInfo as $v)
                    <option value="{{$v->brand_id}}">
                    
                         {{$v->brand_name}}
                    </option>
                    @endforeach                       
            </select>
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品描述</label>
            <div class="col-sm-10">
            <textarea name="goods_desc" class="form-control" id="" cols="100" rows="5" placeholder="请输入商品描述"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">是否上架</label>
            <div class="col-sm-10">
                <input type="radio" value="1" name="is_up" checked>是
                <input type="radio" value="2" name="is_up">否
            
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
</body>
</html>