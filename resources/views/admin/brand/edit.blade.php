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
    <h2 align="center">品牌编辑</h2>
    <form class="form-horizontal" role="form" action="{{url('/brand/update/'.$data->brand_id)}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
            <div class="col-sm-10">
            <input type="text" name="brand_name" value="{{$data->brand_name}}" class="form-control" id="firstname" placeholder="请输入品牌名称">
            @if($errors->has('brand_name'))<b style="color:red">{{$errors->first('brand_name')}}</b>@endif
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
            <div class="col-sm-10">
            <img src="{{env('UPLOAD_URL')}}{{$data->brand_logo}}" alt="" width="100">
            <input type="file" name="brand_logo" class="form-control" id="lastname" placeholder="请输入品牌LOGO">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
            <div class="col-sm-10">
            <input type="text" name="brand_url" value="{{$data->brand_url}}" class="form-control" id="lastname" placeholder="请输入品牌网址">
            @if($errors->has('brand_url'))<b style="color:red">{{$errors->first('brand_url')}}</b>@endif
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">品牌备注</label>
            <div class="col-sm-10">
            <textarea name="brand_desc"  class="form-control" id="" cols="100" rows="5" placeholder="请输入品牌描述">{{$data->brand_desc}}</textarea>
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