@extends('layouts.app') @section('content')

    <div class="container1" id="postCard" style="">
        <!-- 明信片总体选择-->
        <div class="letter_menu" id="postcard_category" v-show="postcard_step == 0">
            <!-- drop down button -->
            <div class="dropdown">
                <div class="dropdown-trigger">
                    <div class="dropdown is-active">
                        <div class="dropdown-trigger">
                            <button class="button postcard_button" aria-haspopup="true" aria-controls="dropdown-menu"
                                    onclick="show_category()"
                                    style="background-color:inherit;border:none;font-weight: 900;color:#ccc;padding-left:20px;margin-top:7px;width:166px">
                                <span id="postcard_button">不可编辑明信片</span>
                                &nbsp; &nbsp; &nbsp;
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        &nbsp; &nbsp;
                        <span style="font-size:28px;font-weight: 100">|</span> &nbsp; &nbsp; &nbsp;
                        <div class="dropdown-menu" id="dropdown-menu" style="display:none;z-index:100">
                            <div class="dropdown-content" style="background-color:#000;color:#ccc;">
                <span href="#" class="dropdown-item" onclick="show_postcard_content(1)">
                                    可编辑明信片
                                </span>
                                <hr class="dropdown-divider">

                                <span class="dropdown-item" onclick="show_postcard_content(2)">
                                    不可编辑明信片
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="letter_menu" v-show="postcard_step == 2">
            <div class='dropdown2 is-active'>
                <ul>
                    <li class="menu-item active">更换邮票图片 <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">邮票设置 <span class="fa fa-sort-desc"></span></li>
                </ul>
            </div>
        </div>

         <div class="letter_menu" v-show="postcard_step == 3">
            <div class='dropdown3 is-active'>
                <ul>
                    <li class="menu-item active">更换图片<span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">图片设置<span class="fa fa-sort-desc"></span></li>
                </ul>
            </div>
        </div>


        <!-- 上传邮票 -->
        <div class="modal" id="upLoadModal">
            <div class="modal-background"></div>
            <div class="modal-content" style="">
                <form action="" action="/uploadimg/stamp" id="UpLoadStampForm" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="file"  id="upload_stamp" name="file" style="margin-top : 50px;height :45px;widht:300px" ><br/>

                    <button type="submit" id="commitUpLoadForm"
                            style="width:200px;height : 45px; margin-top:20px;position:relative;cursor: pointer;background-color:#99CCFF;border:none;font-size:16px;color:#fff;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;">
                        上传
                    </button>
                </form>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <!-- 邮票设置 -->
        <div class="letter_img_lt2" id="changeStamps" v-show="postcard_step ==2">
            <div class="upLoadStamp" id="showUploadModal">上传本地图片</div>
            <div class="upLoadStamp" id="upLoadPhoneStamp">上传手机图片</div>
        </div>

        <div class="letter_img_lt2" id="zihao" style="flex-wrap : wrap" v-show="postcard_step ==2">
            <div id="slider_container" style="flex:4 7; min-width : 627px;padding : 40px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>透明</label> -
                <div id="stamp_opacity" class="slider"></div>
                +
                <input type="text" id='stamp_opacity_amount' class="amount" readonly style='display:inline-block'>
            </div>

            <!--
            <div id="slider_container" style="flex :3 7;min-width:470px">
                <label for="shunxu" style="color:#ccc">顺序</label>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
            </div>
            -->

            <div id="slider_container" style="flex:4 7; min-width : 627px;padding : 20px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>旋转</label> -
                <div id="stamp_xuanzhuan" class="slider" value="0 deg"></div>
                +
                <input type="text" class="amount" id='stamp_xuanzhuan_amount' class="amount" readonly
                       style='display:inline-block'>
            </div>
        </div>


        <!-- 图片设置 -->
        <div class="letter_img_lt3" id="changeStamps" v-show="postcard_step ==3">
            <div class="upLoadStamp" id="showUploadModal">上传本地图片</div>
            <div class="upLoadStamp" id="upLoadPhoneStamp">上传手机图片</div>
        </div>

        <div class="letter_img_lt3" id="zihao" style="flex-wrap : wrap" v-show="postcard_step ==3">
            <div id="slider_container" style="flex:1 2; width : 627px;padding : 40px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>透明</label> -
                <div id="background_opacity" class="slider"></div>
                +
                <input type="text" id='background_opacity_amount' class="amount" readonly style='display:inline-block'>
            </div>

            <!--
            <div id="slider_container" style="flex :3 7;min-width:470px">
                <label for="shunxu" style="color:#ccc">顺序</label>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
            </div>
            -->

            <div id="slider_container" style="flex:1 2; width : 627px;padding : 40px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>旋转</label> -
                <div id="background_xuanzhuan" class="slider" value="0 deg"></div>
                +
                <input type="text" class="amount" id='background_xuanzhuan_amount' class="amount" readonly
                       style='display:inline-block'>
            </div>

            <div id="slider_container" style="width : 627px;padding : 40px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>圆角</label> -
                <div id="background_radius" class="slider" value="0 deg"></div>
                +
                <input type="text" class="amount" id='background_radius_amount' class="amount" readonly
                       style='display:inline-block'>
            </div>
        </div>


        <!-- 这里是菜单区 -->
        <div class="letter_menu" id="postcard_text_menu" v-show="postcard_step==1">
            <!-- drop down button -->
            <div class='dropdown is-active'>
                <ul id="commen-font-style">
                    <li class="menu-item active">字体 <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">字号 <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">A <span class="fa fa-sort-desc"></span></li>
                    <li class="menu-item">文字设置 <span class="fa fa-sort-desc"></span></li>
                    
                </ul>
                <ul id="postcard-font-style">
                    <li class="menu-item font-style-menu" id="bold"><i class="fa fa-bold" aria-hidden="true"></i></li>
                    <li class="menu-item font-style-menu active" id="text-align-left" style="border-right : none"><i class="fa fa-align-left" aria-hidden="true"></i></li>
                    <li class="menu-item font-style-menu" id="text-align-center" style="border-right : none"><i class="fa fa-align-center" aria-hidden="true"></i></li>
                    <li class="menu-item font-style-menu" style="" id="text-align-right"><i class="fa fa-align-right" aria-hidden="true"></i></li>
                    <li style="width:40px;border-right : none;padding-top : 14px;color :#333"><i class="fa fa-forward" aria-hidden="true"></i></li> 
                </ul>
                <!--
                <div style="">
                    <ul style="margin-left: 360px; line-height: 38px;">
                        <li class="float_rt" style="padding-top: 8px;">
                            <img src="img/letter/letter_menu_13.png" alt="">
                        </li>
                        <li class="float_rt" style="padding-top: 8px;">
                            <img src="img/letter/letter_menu_11.png" alt="">
                        </li>
                        <li class="float_rt" style="padding-top: 8px;">
                            <img src="img/letter/letter_menu_09.png" alt="">
                        </li>
                        <li class="float_rt" style="padding-top: 8px;">
                            <img src="img/letter/letter_menu_07.png" alt="">
                        </li>
                    </ul>
                </div>
                -->
            </div>
        </div>
        <div>

            <!-- 菜单详情 -->
            <div class="letter_img_lt menu_active" id="ziti" v-show="postcard_step ==1">
                <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
                </div>
                @foreach($fonts as $f)
                    <div class="fonts">
                        @foreach($f as $font)
                            <div class="fonts_lt">
                                <img src="/img/fonts/{{$font['imgSrc']}}" alt="{{$font['fname']}}" class='font_img'
                                     onclick='changeFontFamily(event,"{{$font['fname']}}","{{$font['accesskey']}}","{{$font['lineHeight']}}");'>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="btn_rt slidesjs-next  slidesjs-navigation">
                </div>
            </div>
        </div>

        <div class="letter_img_lt" id="zihao" v-show="postcard_step ==1">
            <div id="slider_container">
                <label for="slider"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>字号</label> -
                <div id="slider" class="slider"></div>
                +
                <input type="text" id='amount' readonly style='display:inline-block'>
            </div>
        </div>

        <div class="letter_img_lt" id="A" v-show="postcard_step ==1">
            <div class="btn_lf">
                <span class='fa fa-chevron-left fa-5x'></span>
            </div>
            <div class="" id="colors">
                <div id="postcard_all_colors" style="background-image:url(/img/letter/all_colors_03.png)"></div>
                <div id="colorpickerHolder"></div>
                @foreach($fontColors as $color)
                    <div class="postcard_color" style="background-color: {{$color['value']}}"></div>
                @endforeach
            </div>
            <div class="btn_rt">
                <span class="fa fa-chevron-right fa-5x"></span>
            </div>
        </div>

        <div class="letter_img_lt" id="tianjia" v-show="postcard_step ==1">
            <div id="slider_container" style="flex:4 7; min-width : 627px;padding : 40px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>透明</label> -
                <div id="opacity" class="slider" value="100%"></div>
                +
                <input type="text" id='opacity_amount' class="amount" readonly style='display:inline-block'>
            </div>

            <div id="slider_container" style="flex :3 7;min-width:470px">
                <label for="shunxu" style="color:#ccc">顺序</label>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
                <div class="is-inline-block shunxu">置于顶层</div>
            </div>

            <div id="slider_container" style="flex:4 7; min-width : 627px;padding : 20px 0">
                <label for="opacity"
                       style=' display:inline-block;margin-right : 20px;color:#ccc;font-size : 16px;'>旋转</label> -
                <div id="xuanzhuan" class="slider" value="0 deg"></div>
                +
                <input type="text" class="amount" id='xuanzhuan_amount' class="amount" readonly
                       style='display:inline-block'>
            </div>

        </div>

        <div class="postcard_menu menu_active" id="cantpostcard">
            <div class='btn_lf slidesjs-previous  slidesjs-navigation'>
                <i class="fa fa-chevron-left fa-3x" aria-hidden="true"></i>
            </div>

            @foreach($cantPostCards as $p)
                <div class="postcard_menu_detail">
                    @foreach($p as $post)
                        <img class="postcard_tums" src="{{ asset($post['image_tum']) }}" alt=""
                             onclick="changePostCardBackground(event,{{ $post['id'] }})"/> @endforeach
                </div>
            @endforeach

            <div class="btn_rt slidesjs-next  slidesjs-navigation">
                <i class="fa fa-chevron-right fa-3x" aria-hidden="true"></i>
            </div>
        </div>


        <!-- 可编辑的明信片 属于这几种 -->
        <div class="postcard_content" id="postcard_content">
            <!-- 明信片分为两个区域 ， 第一个区域是明信片的图片部分 postcard_background_img -->
            <div class="postcard_background_img">
                1111
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
        <div class="postcard_content_cant postcard_content_active" id="postcard_content_cant">
            <div class="postcard_buke_background_img" id="postcard_buke_background_img"
                 onclick="show_postcard_background_img()"
                 style="background-image:url({{asset('img/cantpostcard/images/mxp_1.jpg')}})">
            </div>
            <div class="postcard_mask" @click="changeShowOrder"></div>
        <div class="postcard_buke_background_content" id="postcard_buke_background_content">
            <div class="buke_stamp" id="buke_stamp"  style="background-image: url({{asset('img/postcard/addstamp.png')}})
            "  >

        <img class="delete_icon1" src="{{ asset('img/postcard/delete.png') }}" alt="">
        <img class="expand1" src="{{ asset('img/postcard/expand.png') }}" alt="">
        </div>
        <div class="buke_postcard_text" id="buke_postcard_text" v-on:click="postCardShowEditFont">
            <div contenteditable="true">亲爱的__:</div>
            <img src="{{asset('img/postcard/expand.png')}}" class="expand" alt="">
            <img src="{{asset('img/postcard/delete.png')}}" class="delete_icon" alt="">
        </div>

        <div class="buke_code"></div>
    </div>
    </div>

    <div>
    </div>
    </div>
@endsection @push('javascript')
<script src="js/colorpicker.js"></script>
<script src="js/jquery.slides.min.js"></script>
<script src='js/jquery-ui.min.js'></script>
<script src="{{asset('js/postcard.js')}}"></script>
@endpush


@push('style')
<link rel="stylesheet" href="js/jquery-ui.min.css">
<link rel="stylesheet" href="css/colorpicker.css">
<link rel="stylesheet" href="css/jquery-ui.min.css">
@endpush
