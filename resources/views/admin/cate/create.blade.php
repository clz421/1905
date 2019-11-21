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
    <h2 align="center">分类添加</h2>
    <form class="form-horizontal" role="form" action="{{url('/cate/store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
            <input type="text" name="cate_name" class="form-control" id="firstname" placeholder="请输入分类名称">
            @if($errors->has('cate_name'))<b style="color:red">{{$errors->first('cate_name')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">是否展示</label>
            <div class="col-sm-10">
                <input type="radio" value="1" name="cate_show" checked>是
                <input type="radio" value="2" name="cate_show">否
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">父级分类</label>
            <div class="col-sm-10">
            <select name="parent_id">
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
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </div>
    </form>
</body>
</html>