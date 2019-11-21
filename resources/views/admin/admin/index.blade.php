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
    <h2 align="center">管理员展示</h2>
    <table class="table table-striped">
    <thead>
    <tr >
        <th>管理员ID</th>
        <th>管理员名称</th>                
        <th>管理员邮箱</th>
        <th>管理员手机号</th>
        <th>性别</th>        
        <th>操作</th>        
    </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
        <tr>
            <td>{{$v->admin_id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->email}}</td>
            <td>{{$v->tel}}</td>
            <td> @if ($v->sex===1)男 @else 女 @endif</td>            
            <td>
            <a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-warning">编辑</a>
            <a href="{{url('/admin/destroy/'.$v->admin_id)}}" class="btn btn-danger">删除</a>
            </td>                                    
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $data->links() }}
    </body>
    </html>