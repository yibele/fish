@extends('layouts.app')
@section('content')
<div class="container1">
    <style>
        #letter_content {
            font-size : {{$letterConfig['lt_fontSize']}} !important;
            corlor: red;
        }
    </style>
    <div class="setPublic" style="height : 63px;border:1px #464646 solid; border-bottom:none;padding-top : 22px;padding-bottom:5px;font-size : 13px;padding-left:30px; color:#ccc; -webkit-border-radius:5px ;-moz-border-radius:5px ;border-radius: 5px;">
        <span id="yinsi">隐私保护开启</span>&nbsp&nbsp
       <div class="Switch @if($letterConfig['isPublic']) On @else Off @endif">
            <div class="Toggle"></div>
            <span class="On">ON</span> <span class="Off">OFF</span>
       </div> &nbsp&nbsp&nbsp&nbsp <span id="yinsi-yikaiqi">该信件处于"隐私保护"状态，只有你登录后才能看到。若要分享给其他人，请放弃隐私保护状态。</span>
    </div>

  <div id="letter_content"  style="background-image:url({{$letterConfig['lt_back']}}) " >
      <div id="letter_container">
          <div id="letter_neirong" name='letter_neirong'>
              {!! $letterConfig['lt_content'] !!}
          </div>
      </div>
  </div>
</div>

<script>
    $(function () {
        var letter_content = $("#letter_neirong");
        letter_content.css({
            fontSize : "{{$letterConfig['lt_fontSize']}}"+"px",
            color : "{{$letterConfig['lt_color']}}",
            lineHeight : 1.5
        });

        //页面字体
        objchangefont(letter_neirong, "{{$letterConfig['lt_accesskey']}}");

        $('.Switch').click(function() {
            $(this).toggleClass('On').toggleClass('Off');
            $class= $('.Switch').attr('class');
            $tag = $class.split(' ');
            $tag = $tag[1];
            if($tag =='On') {
                console.log('off');
                $.ajax({
                    url : '/setLetterPublic/'+'{{$letterConfig['lid']}}',
                    timeout :1500,
                    success : function (data) {
                        vm.$data.message = data;
                    },
                    fail : function () {
                    }
                });

                $("#yinsi").html('隐私保护关闭');
                $("#yinsi-yikaiqi").html('该信件关闭"隐私保护"状态，其他人可以通过公开信或者分享的方式看到此信件。');
            } else {
                console.log('on');
                $.ajax({
                    url : '/setLetterPrivate/'+'{{$letterConfig['lid']}}',
                    timeout:1500,
                    success : function (data){
                        vm.$data.message = data;
                    },
                    fail : function () {

                    }
                });
                $("#yinsi").html('隐私保护开启');
                $("#yinsi-yikaiqi").html('该信件处于"隐私保护"状态，只有你登录后才能看到。若要分享给其他人，请放弃隐私保护状态。');

            }
        });
    })
</script>
 
@endsection