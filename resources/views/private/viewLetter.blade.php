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
        隐私保护开启&nbsp&nbsp
       <div class="Switch @if($letterConfig['isPublic']) On @else Off @endif">
            <div class="Toggle"></div>
            <span class="On">ON</span> <span class="Off">OFF</span>
        </div> &nbsp&nbsp&nbsp&nbsp该信件处于"隐私保护"状态，只有你登录后才能看到。若要分享给其他人，请放弃隐私保护状态。
    </div>
  <div id="letter_content"  style="background-image:url({{asset($letterConfig['lt_back'])}}) " >
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
            console.log($tag);
        });
    })
</script>
 
@endsection