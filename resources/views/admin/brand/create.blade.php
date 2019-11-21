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
    <h2 align="center">品牌添加</h2>
    <form class="form-horizontal" role="form" action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data">
    @csrf
   
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
            <div class="col-sm-10">
            <input type="text" name="brand_name" class="form-control" id="firstname" placeholder="请输入品牌名称">
            <b style="color:red">@php echo $errors->first('brand_name'); @endphp</b>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">品牌LOGO</label>
            <div class="col-sm-10">
            <input type="file" name="brand_logo" class="form-control" id="lastname" placeholder="请输入品牌LOGO">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
            <div class="col-sm-10">
            <input type="text" name="brand_url" class="form-control" id="brand_url" placeholder="请输入品牌网址">
            <b style="color:red">@php echo $errors->first('brand_url'); @endphp</b>
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">品牌备注</label>
            <div class="col-sm-10">
            <textarea name="brand_desc" class="form-control" id="" cols="100" rows="5" placeholder="请输入品牌描述"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <input type="button" class="btn btn-default"  value="提交">
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
//品牌名称失去焦点
    $('#firstname').blur(function(){
        // alert(111);
        var brand_name=$(this).val();
        var reg=/^[\u4e00-\u9fa5\w]{2,12}$/;
        if(!reg.test(brand_name)){
            $(this).parent().addClass('has-error');
            // alert('品牌名称不符合规范');
            $(this).next().text('品牌名称不符合规范');
            return;
        }
//唯一性验证
    $.ajax({
        method:"POST",
        url: "{{url('/brand/checkOnly')}}",
        data: {brand_name:brand_name}
    }).done(function(msg){
        if( msg > 0 ){
            $('#firstname').parent().addClass('has-error');
            $('#firstname').next('b').text('品牌名称已存在');
        }
    });
    });
//品牌Url失去焦点
    $('#brand_url').blur(function(){
        var brand_url=$(this).val();
        var reg = /^https?:\/\/?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/ ;
        // alert(reg.test(brand_url));
        if(!reg.test(brand_url)){
            $(this).parent().addClass('has-error');
            $(this).next('b').text('品牌网址不符合规范');
            return;
        }
    });
    $('.btn-default').click(function(){
        //名称验证
        var brand_name=$('#firstname').val();
        var reg=/^[\u4e00-\u9fa5\w]{2,12}$/;
        if(!reg.test(brand_name)){
            $('#firstname').parent().addClass('has-error');
            $('#firstname').next().text('品牌名称不符合规范');
            return;
        }
        var flag = true;
        //唯一性验证
    $.ajax({
        method:"POST",
        url: "{{url('/brand/checkOnly')}}",
        async:false,
        data: {brand_name:brand_name}
    }).done(function(msg){
        if( msg > 0 ){
            $('#firstname').parent().addClass('has-error');
            $('#firstname').next('b').text('品牌名称已存在');
            flag = false;
        }
    });
        if(!flag){
            return;
        }

        var brand_url=$('#brand_url').val();
        var reg = /^https?:\/\/?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/ ;
        // alert(reg.test(brand_url));
        if(!reg.test(brand_url)){
            $('#brand_url').parent().addClass('has-error');
            $('#brand_url').next('b').text('品牌网址不符合规范');
            return;
        }
        $('form').submit();
    });
</script>