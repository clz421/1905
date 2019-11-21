<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.css">
    <script src={{asset('/js/jquery.js')}}></script>    
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 align="center">文章添加</h2>
    <form class="form-horizontal" role="form" action="{{url('/test/store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">文章标题</label>
            <div class="col-sm-10">
            <input type="text" name="t_title" class="form-control" id="firstname" placeholder="请输入文章标题">
            @if($errors->has('t_title'))<b style="color:red" >{{$errors->first('t_title')}}</b>@endif
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">文章分类</label>
            <div class="col-sm-10">
            <select name="t_cate">
                    <option value="1">php</option>                    
                    <option value="2">html</option>                                                            
            </select>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
            <div class="col-sm-10">
                <input type="radio" value="1" name="is_zy" checked>普通
                <input type="radio" value="2" name="is_zy">置顶
            
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">是否显示</label>
            <div class="col-sm-10">
                <input type="radio" value="1" name="is_up" checked>显示
                <input type="radio" value="2" name="is_up">不显示
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">文章作者</label>
            <div class="col-sm-10">
            <input type="text" name="zuozhe" class="form-control" id="firstname1" placeholder="请输入文章作者">
           
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">作者email</label>
            <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="firstname2" placeholder="请输入邮箱">
           
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">关键字</label>
            <div class="col-sm-10">
            <input type="text" name="gjz" class="form-control" id="firstname3" placeholder="请输入关键字">
       
            
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">上传文件</label>
            <div class="col-sm-10">
            <input type="file" name="t_img" class="form-control" id="firstname" >
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">网页描述</label>
            <div class="col-sm-10">
            <textarea name="desc" class="form-control" id="" cols="100" rows="5" placeholder="请输入文章描述"></textarea>
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default"  value="提交">
       </div>
        </div>
    </form>
</body>
</html>
<script>
    //令牌
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#firstname').blur(function(){
        // alert(111);
        var t_title=$(this).val();
        var reg=/^[\w]{2,12}$/;
        if(!reg.test(t_title)){
            $(this).parent().addClass('has-error');
            alert('标题为数字字母下划线2-12位');
            // console.log($(this));
            // $(this).next().text('标题为数字字母下划线2-12位');
            return;
        }
        // $('form').submit();
        //唯一性
        $.ajax({
            method:"POST",
            url: "{{url('/test/checkOnly')}}",
            data: {t_title:t_title}
        }).done(function(msg){
            if( msg > 0 ){
                $('#firstname').parent().addClass('has-error');
                alert('标题已存在');                
                // $('#firstname').next().text('标题已存在');
            }
        });

        // $('form').submit();
    });
</script>