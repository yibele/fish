@extends('layouts.app')
@section('content')
    <div id='letter' class="container1">
        <div class="letter_menu">
            <!-- drop down button -->
            <div class='dropdown is-active'>
                <ul>
                    <li class="active menu-item" aria-haspopup="true" aria-controls="dropdown-menu">信纸 <span class='fa fa-sort-desc'></span></li>
                    <li class="menu-item">字体 <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">字号 <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">A <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">添加图片 <span class="fa fa-sort-desc"></span></li>
                </ul>
                <ul style="margin-left: 360px; line-height: 38px;">
                    <li class="float_rt" style="padding-top: 8px;">
                        <img src="{{asset('img/letter/letter_menu_13.png')}}" alt="">
                    </li>
                    <li class="float_rt" style="padding-top: 8px;">
                        <img src="{{asset('img/letter/letter_menu_11.png')}}" alt="">
                    </li>
                    <li class="float_rt" style="padding-top: 8px;">
                        <img src="{{asset('img/letter/letter_menu_09.png')}}" alt="">
                    </li>
                    <li class="float_rt" style="padding-top: 8px;">
                        <img src="{{asset('img/letter/letter_menu_07.png')}}" alt="">
                    </li>
                </ul>
            </div>
        </div>

        @include('public.letterMenu')

        <div id="letter_content" >
            <div id="letter_container" :style="letter_content_background" >
                <div id="letter_neirong" contenteditable="true" name='letter_neirong'>
                    {!! $letters->lt_content !!}
                </div>
            </div>
        </div>
    </div>
    <button class="btn1" onclick='editLetter({{$letters->lid}})'>下一步：设置收信信息</button>


    @push('javascript')
    <script src='{{asset("js/colorpicker.js")}}'></script>
    <script src='{{asset("js/letter.js")}}'></script>
    <script src='{{asset("js/jquery-ui.min.js")}}'></script>
    <script src='{{asset("js/jquery.slides.min.js")}}'></script>
    @endpush

    @push('style')
    <link rel="stylesheet" href="{{asset("js/jquery-ui.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/colorpicker.css")}}">

    @endpush

    <script>

        $(function () {
            $("#letter_container").style('background-image','{{asset($letters->lt_back)}}')
        })


        function editLetter(lid) {
            $letter_neirong = $('#letter_neirong')[0];
            $letter_container = $('#letter_container')[0];
            $lt_back = $letter_container.style.backgroundImage.slice(4, -1);
            $lt_content = $letter_neirong.innerHTML;
            $lt_fontSize = $letter_container.style.fontSize.slice(0, -2);
            $lt_fontFamily = [$letter_neirong.getAttribute('fontid'), $letter_neirong.getAttribute('accesskey')];
            $lt_color = $letter_container.style.color ? $letter_container.style.color : '#ffffff';

            letter_data = {
                'lid':lid,
                'lt_back':$lt_back,
                'lt_content':$lt_content,
                'lt_fontSize':$lt_fontSize,
                'lt_fontFamily':$lt_fontFamily,
                'lt_color':$lt_color
            }

            $.ajax({
                method:'post',
                url : '{{route("private.updateLetter")}}',
                data : letter_data,
                timeout : 15000,
                success : function (data,status) {
                    document.location.href = '/createContact/'+'{{ $letters->lid }}'
                },
                error : function (){
                    vm.$data.message = '信件更新有误，请稍微重试';
                }
            })
        }

    </script>

@endsection