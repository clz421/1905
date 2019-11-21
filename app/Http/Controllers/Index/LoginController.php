<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;
class LoginController extends Controller
{
    public function send(){
        $email = 'chelize@163.com';
        $code = rand(100000,999999);
        // $message = "您正在注册全国最大的珠宝商会员，验证码是：".$code;

        //发送邮件
        $this->sendemail($email,$code);
    }
    public function sendemail($email,$code){
        \Mail::send('index.login.email' , ['code'=>$code] ,function($message)use($email){
        //设置主题
            $message->subject("欢迎注册滕浩有限公司");
        //设置接收方
            $message->to($email);
        });
    }
    // public function sendemail($email,$message){
    //     \Mail::raw($message,function($message)use($email){
    //         //设置主题
    //         $message->subject("欢迎注册");
    //         //设置接收方
    //         $message->to($email);
    //     });
    // }

    //注册
    public function regDo(){
        $post=request()->except('_token');
        dd($post);
    }
}




  