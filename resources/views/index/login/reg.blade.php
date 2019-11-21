@extends('layouts.shop')
@section('title', '全国最大珠宝商-注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('regDo')}}" method="post" class="reg-login">
     @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{asset('index/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" name="email" id="email" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="user_code" id="email_code" placeholder="输入验证验证码" /> <span id="regcode"><button >获取验证码</button></span></div>
       <div class="lrList"><input type="text" name="pwd" id="pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="pwd1" id="pwd1" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <div class="height1"></div>
     @include('index.public.footer');
     <script>
          $(function(){
               $(document).on('click',"#regcode",function(){
                    // alert(11);
                    var email=$("#email").val();
                    console.log(email);
                    return false;
               })
               
          })
     </script>

     @endsection


   
  