<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/8
 * Time: 下午3:09
 */
?>
@extends('layouts.app')
@section('content')
    <div class='container1'>
        <div class='myletter_title'>
            <button style="color:#ffffff">我的慢递</button>
            &nbsp &nbsp| &nbsp &nbsp
            <button>我的明信片</button>
        </div>
        @foreach ($letters as $letter)
            <div class='myletter_content'>
            <div class='myletter_content_menu'>
                <div class='time' style="color: #bbbbbb;">
                    写信日期: {{ $letter->lt_date }}
                </div>
                <div class='menu'>
                    <button><a href="">修改收信人信息</a></button>
                    <button><a href="{{ route('private.editLetter',$letter->lid) }}">继续编辑</a></button>
                    <button><a href="">续单</a></button>
                    <button><a href="">下载信件</a></button>
                    <button><a href="">查看信件</a></button>
                </div>
            </div>
            <div class='myletter_content_detail'>

                <div class='img'></div>
                <div class='content'>
                    <p>物流单号:{{$letter->expressNum}}</p>
                    @if ($letter->status == 0)
                    <p>当前状态:草稿</p>
                    @elseif ($letter->status ==1)
                        <p>当前状态:未寄出</p>
                    @else
                        <p>当前状态:已寄出
                            @if($letter->isPublic == 1)
                                (此信未公开信)<a href="#">查看</a><a href="#">取消公开</a>
                            @else
                                (此信为私有信) <a href="">公开</a>
                            @endif
                        </p>
                    @endif
                    <p>寄信时间:{{$letter->date}}</p>
                    <p>收信人姓名:{{$letter->reciveName}}</p>
                    <p>收信人电话:{{$letter->recivePhone}}</p>
                    <p>收信人地址:{{$letter->adress}}</p>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    {{ $letters->links() }}
@endsection

