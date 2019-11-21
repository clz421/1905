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
    <h2 align="center">注册</h2>
    {{session('msg')}}
    <form class="form-horizontal" role="form" action="{{url('/doReg')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="firstname" placeholder="请输入用户名">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="firstname" placeholder="请输入邮箱">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="lastname" placeholder="请输入密码">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
            <input type="password" name="repassword" class="form-control" id="lastname" placeholder="请确认密码">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">注册</button>
            </div>
        </div>
    </form>
</body>
</html>