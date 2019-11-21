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
    <h2 align="center">分类展示</h2>
    <table class="table table-striped">
    <thead>
    <tr >
        <th>分类ID</th>
        <th>分类名称</th>                
        <th>是否显示</th>      
        <th>操作</th>        
    </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
        <tr>
            <td>{{$v->cate_id}}</td>
            <td>{{$v->cate_name}}</td>
            <td> @if ($v->cate_show===1)是 @else 否 @endif</td>            
            <td>
            <a href="{{url('/cate/edit/'.$v->cate_id)}}" class="btn btn-warning">编辑</a>
            <a href="{{url('/cate/destroy/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
            </td>                                    
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $data->links() }}
    </body>
    </html>