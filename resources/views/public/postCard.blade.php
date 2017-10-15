<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/10/1
 * Time: 上午9:14
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container1" id="postCard" style="">
        <div class="letter_menu">
            <!-- drop down button -->
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <div class="dropdown is-active">
                        <div class="dropdown-trigger">
                            <button class="button postcard_button" aria-haspopup="true" aria-controls="dropdown-menu" onclick="show_category()" style="background-color:inherit;border:none;font-weight: 900;color:#ccc;padding-left:20px;margin-top:7px;width:166px">
                                <span>不可编辑明信片</span>
                                &nbsp; &nbsp; &nbsp;
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        &nbsp; &nbsp;
                        <span style="font-size:28px;font-weight: 100">|</span>
                        &nbsp; &nbsp; &nbsp;
                        <div class="dropdown-menu" id="dropdown-menu" style="display:none;">
                            <div class="dropdown-content" style="background-color:#000;color:#ccc;" >
                                <span href="#" class="dropdown-item">
                                    可编辑明信片
                                </span>
                                <hr class="dropdown-divider">

                                <span class="dropdown-item">
                                    不可编辑明信片
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 菜单 -->
        <!--
        <div class="letter_img_lt menu_active" id="ziti" >
            <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
            </div>
            @foreach($fonts as $f)
                <div class="fonts">
                    @foreach($f as $font)
                        <div class="fonts_lt">
                            <img src="/img/fonts/{{$font['imgSrc']}}" alt="{{$font['fname']}}" class='font_img' onclick='changeFontFamily(event,"{{$font['fname']}}","{{$font['accesskey']}}","{{$font['lineHeight']}}");'>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="btn_rt slidesjs-next  slidesjs-navigation">
            </div>
        </div>

        <div class="letter_img_lt" id="zihao">
            <div id="slider_container">
                <label for="slider" style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>字号</label> -
                <div id="slider"></div> +
                <input type="text" id='amount' readonly style='display:inline-block'>
            </div>
        </div>

        <div class="letter_img_lt" id="A">

            <div class="btn_lf">
                <span class='fa fa-chevron-left fa-5x'></span>
            </div>

            <div class="" id="colors">
                <div id="letter_all_colors" style="background-image:url(/img/letter/all_colors_03.png)"></div>
                <div id="colorpickerHolder"></div>
                @foreach($fontColors as $color)
                    <div class="letter_color" style="background-color: {{$color['value']}}"></div>
                @endforeach
            </div>
            <div class="btn_rt">
                <span class="fa fa-chevron-right fa-5x"></span>
            </div>
        </div>
        -->


        <div class="postcard_menu menu_active" id="cantpostcard">
            <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
                <i class="fa fa-chevron-left fa-3x" aria-hidden="true"></i>
            </div>
            @foreach($cantPostCards as $p)
            <div class="postcard_menu_detail">
                @foreach($p as $post)
                    <img class="postcard_tums"></img>
                    @endforeach
            </div>
            @endforeach
            <div class="btn_rt slidesjs-next  slidesjs-navigation">
                <i class="fa fa-chevron-right fa-3x" aria-hidden="true"></i>
            </div>
        </div>

        <!-- 可编辑的明信片 属于这几种 -->
        <div class="postcard_content">
            <!-- 明信片分为两个区域 ， 第一个区域是明信片的图片部分 postcard_background_img -->
            <div class="postcard_background_img">

            </div>
            <!-- 第二个区域为文字编辑区域 ， postcard_background_content -->
            <div class="postcard_background_content">
                <!-- 文字编辑区域 分为 邮戳， 文字， 邮票，二维码 -->
                <div class="stamp"></div>
                <div class="postcard_text"></div>
                <div class="postmark"></div>
                <div class="code"></div>
            </div>
        </div>



        <!-- 不可编辑的明信片 -->
        <div class="postcard_content">
            <div class="postcard_buke_background_img" id="postcard_buke_background_img" onclick="show_postcard_background_img()" style="background-image:url({{asset('img/cantpostcard/images/mxp1.jpg')}})">
            </div>
            <div class="postcard_mask" onclick="change_show_order()"></div>
            <div class="postcard_buke_background_content" id="postcard_buke_background_content" onclick="show_postcard_background_content()">
                <div class="buke_stamp" style="background-image:url({{asset('img/postcard/stamp1.png')}})">
                </div>
                <div class="buke_postcard_text" contenteditable="true" id="buke_postcard_text">
                    这里是写文字的地方。
                </div>
                <div class="buke_postmark"></div>
                <div class="buke_code"></div>
            </div>
        </div>

    <div>
    </div>
    </div>
@endsection
@push('javascript')
<script src="js/colorpicker.js"></script>
<script src="js/jquery.slides.min.js"></script>
<script src="{{asset('js/postcard.js')}}"></script>
@endpush
