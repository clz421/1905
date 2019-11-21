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
    <h2 align="center">品牌展示</h2>
    <form action="">
        <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称">
        <input type="text" name="desc" value="{{$query['desc']??''}}" placeholder="请输入品牌备注">
        <button>搜索</button>
    </form>
    <table class="table table-striped">
    <thead>
    <tr >
        <th>品牌ID</th>
        <th>品牌LOGO</th>                
        <th>品牌名称</th>
        <th>品牌网址</th>
        <th>品牌备注</th>
        <th>操作</th>        
    </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
        <tr>
            <td>{{$v->brand_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" alt="" width="100"></td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->brand_url}}</td>
            <td>{{$v->brand_desc}}</td>
            <td>
                <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-warning">编辑</a>
                <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
            </td>                                    
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $data->appends($query)->links() }}
    </body>
    </html>