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
    <h2 align="center">商品展示</h2>
    <table class="table table-striped">
    <thead>
    <tr >
        <th>商品ID</th>
        <th>商品图片</th>                        
        <th>商品名称</th>  
        <th>商品价格</th>                
        <th>商品分类</th>                
        <th>商品品牌</th>                                     
        <th>是否上架</th>      
        <th>操作</th>        
    </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
        <tr>
            <td>{{$v->goods_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" alt="" width="100"></td>
            <td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
            <td>{{$v->cate_name}}</td>
            <td>{{$v->brand_name}}</td>            
            <td> @if ($v->is_up===1)是 @else 否 @endif</td>            
            <td>
            <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-warning">编辑</a>
            <a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
            </td>                                    
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $data->links() }}
    </body>
    </html>