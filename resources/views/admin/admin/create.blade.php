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
    <h2 align="center">管理员添加</h2>
    <form class="form-horizontal" role="form" action="{{url('/admin/store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="firstname" placeholder="请输入管理员名称">
            @if($errors->has('name'))<b style="color:red">{{$errors->first('name')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">管理员邮箱</label>
            <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="firstname" placeholder="请输入管理员邮箱">
            @if($errors->has('email'))<b style="color:red">{{$errors->first('email')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">手机号</label>
            <div class="col-sm-10">
            <input type="text" name="tel" class="form-control" id="lastname" placeholder="请输入手机号">
            @if($errors->has('tel'))<b style="color:red">{{$errors->first('tel')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
            <input type="password" name="pwd" class="form-control" id="lastname" placeholder="请输入密码">            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label" >性别</label>
            <div class="col-sm-10">
            <input type="radio" name="sex" value="1"  checked="checked">男
            <input type="radio" name="sex" value="2">女         
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