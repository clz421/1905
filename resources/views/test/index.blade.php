<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <script src={{asset('/js/jquery.js')}}></script>        
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 align="center">文章展示</h2>
    <form action="">
        <input type="text" name="title" value="{{$query['title']??''}}" placeholder="请输入文章标题">
        <button>搜索</button>
    </form>
    <table class="table table-striped">
    <thead>
    <tr >
        <th>文章ID</th>
        <th>文章图片</th>                        
        <th>文章标题</th>  
        <th>文章分类</th>                
        <th>文章重要性</th>                
        <th>是否显示</th>                                           
        <th>操作</th>        
    </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
        <tr  t_id="{{$v->t_id}}">
            <td>{{$v->t_id}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->t_img}}" alt="" width="100"></td>
            <td>{{$v->t_title}}</td>
            <td> @if ($v->t_cate==1)php @else html @endif</td>
            <td> @if ($v->is_zy===1)普通 @else 置顶 @endif</td>                        
            <td> @if ($v->is_up===1)√ @else × @endif</td>                                   
            <td>
            <a href="{{url('/test/edit/'.$v->t_id)}}" class="btn btn-warning">编辑</a>
            <a href="{{url('/test/destroy/'.$v->t_id)}}" id="del" class="btn btn-danger">删除</a>
            <!-- <button id="del" class="btn btn-danger">删除</button> -->
            </td>                                    
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $data->appends($query)->links() }}
    </body>
    </html>
    <!-- <script>
        $(document).on("click","#del",function(){
            var _this=$(this);
            var t_id=_this.parents("tr").attr('t_id');
            // console.log(t_id);
            if(window.confirm('是否确认删除？')){
                location.href="{{url('/test/destroy')}}?id="+t_id;
            }
        })
    </script> -->