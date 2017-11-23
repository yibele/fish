<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/4
 * Time: 上午11:01
 */
?>

<!-- 登录modal部分 -->

<div id='footer'>
<div class="modal" id="loginModal">
    <div class="modal-background" onclick="closeModal('#loginModal')"></div>
    <div class="modal-content" style="background-image:url('{{asset('img/index/loginBack.png')}}');width:670px;height : 380px">
        <div class="tabs is-centered is-large">
            <ul style="margin-top:15px">
                <li><a id="loginTab" class="is-active">登录</a></li>
                |
                <li><a  id="registerTab">注册</a></li>
            </ul>
        </div>
        <!-- 登录表单 -->
        <div class="is-centered loginForm is-active" id="loginForm">
            <form action="{{url('/login')}}" method="post" style="margin-top:40px;width:420px" id="lForm" >
                {{csrf_field()}}
                <input type="text" placeholder="请输入手机号" id="phone" name="phone" class="input" required style="margin-bottom:20px;height: 45px;">
                <input type="password" placeholder="请输入密码" id="password" name="password" class="input" required style="height: 45px;">
                <p class="help is-danger" id="loginMes"></p>
                <a href="" style="position: absolute;right:45px;top:271px;text-decoration: underline;">忘记密码</a>
                <button type="submit" class="" value="" id="login_btn" style="width:420px;height : 45px; margin-top:20px;position:relative;cursor: pointer;background-color:rgb(228,92,53);border:none;font-size:16px;color:#fff;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;">登录</button>
            </form>
        </div>

        <!-- 注册表单 -->
        <div class="is-centered loginForm" id="registerForm">
            <form action="{{ url('/register') }}" method="post" style="margin-top:40px;width:420px" id="register-form">
                {{csrf_field()}}
                <input type="text" placeholder="请输入注册手机号" id="resphone" name="phone" class="input" required style="height: 45px;">

                <p class="help is-danger" style="display:none" id="confirmPhone">请输入正确的手机号</p>
                <div style="position:relative">

                <input type="text" placeholder="请输入验证码" name="code" class="input" required style="margin-bottom:20px;height: 45px;margin-top:20px;">

                    <span style="position: absolute;top:30px;right:10px" onclick="sendCode();return false;" id="J_getCode"><a href="" style="text-decoration: underline;z-index:30">发送验证码</a></span>
                    <p class="help is-success" id="J_resetCode" style="display:none;position: absolute;top:30px;right:10px"><span id="J_second"></span>秒后重发</p>
                </div>

                <input type="password" placeholder="请输入新密码" name="password" id="pass" class="input" required style="margin-bottom:20px;height: 45px;">

                <input type="password" placeholder="请再次输入密码" id="respass" class="input" required style="height: 45px;">

                <p class="help is-danger" style="display:none" id="confirmPass">两次输入密码不同</p>
                <p class="help is-danger" style="display:none" id="passBig">密码必须以字母开头并大于8位数</p>
                <input class="" value="注册" type="submit"  style=" margin-top:20px;width:420px;height : 45px; position:relative;cursor: pointer;background-color:rgb(228,92,53);border:none;font-size:16px;color:#fff;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;" >
            </form>
        </div>
    </div>
    <button class="modal-close is-large"  aria-label="close" onclick="closeModal('#loginModal')" data-target="#loginModal"></button>
</div>



<footer class="footer" style="padding-bottom : 45px;">
    <div style="display: inline-block;">
        Copyright © 2015-2017mandifish.com.蒙ICP备15003789
    </div>
    <div class="copyright"  >
        <a href="">版权声明</a>
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        <a href="">关于价格</a>
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        <a href="">常见问题</a>
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        <a href="">联系我们</a>
    </div>
</footer>
</div>


<script>
$(function () {
 // 注册
    $('#register-form').on('submit',function (e) {
        e.preventDefault();
        console.log($("#resphone").val())
        console.log($("#respass").val())
        $.post($(this).attr('action'),{phone : $('#resphone').val(),password: $("#respass").val()},function(res) {
            console.log(res);
        })
    })

    //登录
    $('#lForm').submit(function (e) {
        e.preventDefault();
        $('#login_btn').val('正在登录...');
        $.ajax({
            url : '/login',
            type :'post',
            timeout : 1500,
            data : {
                phone: $('#phone').val(),
                password : $("#password").val()
            },
            success : function(data) {
                $('#loginMes').html('');
                $('#loginModal').removeClass('is-active');
            },
            error : function (data) {
                $('#loginMes').html('账号或者密码错误')
            }
        })
    })
  const modal_content = $('.modal-content');
    $("#registerTab").click(function () {
        modal_content.height('500px').css('background-image','url(/img/index/registerBak.png)')
        $(this).addClass('active');
        $("#loginTab").removeClass('active')
        $('#registerForm').addClass('is-active');
        $('#loginForm').removeClass('is-active')
    })

    $("#loginTab").click(function () {
      modal_content.height('380px').css('background-image','url(/img/index/loginBack.png)')
      $(this).addClass('active');
      $("#registerTab").removeClass('active')
      $('#registerForm').removeClass('is-active');
      $('#loginForm').addClass('is-active')
    })
})
   
</script>