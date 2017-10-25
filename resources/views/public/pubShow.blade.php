@extends('layouts.app')
@push('javascript')
<script src="{{asset('js/jquery.cookie.js')}}"></script>
@endpush
@section('content')
    <div class="container1">
        <div class="pubShare"
             style="height : 63px;border:1px #464646 solid; line-height :2.5;border-bottom:none;padding-top : 16px;padding-bottom:5px;font-size : 13px;padding-left:30px; color:#ccc; -webkit-border-radius:5px ;-moz-border-radius:5px ;border-radius: 5px;background-color : black">
            <div style="display:inline-block ; line-height: 0.9;" class="public_share">
                分享信件到 ：<img src="{{asset('img/public_letter/weibo.png')}}" alt="weibo">
                <img src="{{asset('img/public_letter/weixin.png')}}" class="cursor-pointer" alt="">
                <img src="{{asset('img/public_letter/renren.png')}}" class="cursor-pointer" alt="">
                <img src="{{asset('img/public_letter/tengxun.png')}}" class="cursor-pointer" alt="">
                <img src="{{asset('img/public_letter/douban.png')}}" class="cursor-pointer" alt="">
                <img src="{{asset('img/public_letter/kongjian.png')}}" class="cursor-pointer" alt="">
            </div>
            <div class="gv-comment is-pulled-right " style="position:relative">
                <span class="comment-list cursor-pointer"><img src="{{asset('img/public_letter/view.png')}}" alt=""
                                                               style="vertical-align: middle;margin-right: 5px;">{{$letterConfig['view']}}</span>
                <span onclick="comment_likes()" class="comment-list cursor-pointer"><img v-bind:src="comment_like"
                                                                                         class="cursor-pointer" alt=""
                                                                                         style="vertical-align: middle;margin-right: 5px;"> {{$letterConfig['like']}}</span>
                <span class="comment-list cursor-pointer" @click="showCommentState"><img
                        :src="commentStateImg" class="cursor-pointer" alt=""
                        style="vertical-align: middle;margin-right: 5px;"> {{count($letterConfig->comment()->get()->toArray())}}</span>
                <?php $key = array_search($letterConfig['lid'],$publid)+1; $nextKey = $publid[$key%count($publid)]?>
                <a href="{{ route('public.pubShow',$nextKey) }} " style="color:#ccc"><button class="comment-list-button button">换一封</button></a>

                <!-- 评论区 -->

                <transition name="slide-fade">
                    <div class="comment_area" id="comment_area" v-show="comment_state">
                        <form method="post" action="{{url('/comment_public_letter/'.$letterConfig['lid'])}}"
                              style="margin-top : 20px;margin-bottom : 20px;">
                            {{csrf_field()}}

                            @if(Auth::user())
                                <input type="text" class="input" placeholder="请输入评论" name="content"
                                       style="width : 479px; background-color : #000;padding-left:20px;font-weight: bold; color:#ccc; height : 46px; border : 1px #333333 solid;">
                                <button class="button" type="submit"
                                        style="width : 77px; height : 46px; background-color : #000;border : 1px #333333 solid;color : #ccc; font-weight: bold;opacity:1;">
                                    回复
                                </button>
                            @else
                                <input type="text" class="input" placeholder="登录后才可评论" disabled name="content"
                                       style="width : 479px; background-color : #000;padding-left:20px;font-weight: bold; color:#ccc; height : 46px; border : 1px #333333 solid;">
                                <button title="Disabled button" disabled class="button" type="submit"
                                        style="width : 77px; height : 46px; background-color : #000;border : 1px #333333 solid;color : #ccc; font-weight: bold;opacity:1;">
                                    请先登录
                                </button>
                            @endif
                        </form>
                        @foreach($comments  as $comment)
                            <div>
                                <p style="font-size:12px">{{$comment->user_name}}<span
                                            class="is-pulled-right">{{$comment->created_at}}</span></p>
                                <p style="font-size:12px">{{$comment->content}}</p>
                                <div class="" id="hr"></div>
                            </div>
                        @endforeach
                        {{ $comments->links() }}
                    </div>
                </transition>
            </div>
        </div>

        <div id="letter_content" style="background-image:url({{$letterConfig['lt_back']}})" @click="hideComment">
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
                fontSize: "{{$letterConfig['lt_fontSize']}}" + "px",
                color: "{{$letterConfig['lt_color']}}",
                lineHeight: 1.5
            });
            //页面字体
            objchangefont(letter_neirong, "{{$letterConfig['lt_accesskey']}}");
            if ($.cookie('like' + '{{$letterConfig['lid']}}') != undefined) {
                vm.$data.comment_like = '/img/public_letter/like_active.png'
            }
        })
        function comment_likes() {
            if (vm.$data.comment_like != '/img/public_letter/like_active.png') {
                vm.$data.comment_like = '/img/public_letter/like_active.png'
                $.ajax({
                    url: '/addLike/' + '{{$letterConfig['lid']}}',
                    type: 'get',
                    success: function (data) {
                        console.log(data);
                    },
                    fail: function () {
                        alert('cookie fail')
                    }
                })
                console.log('fail')
            }
        }
    </script>
@endsection