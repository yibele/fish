<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/4
 * Time: 上午10:59
 */
?>

<div class="nav1">
    <div class="logo">
        <a href="/">
            <img src="{{asset('img/index/logo_li.png')}}">
        </a>
    </div>
    <div class="index_menu">
        <ul>
            <li><a href="/writeLetter">写信</a></li>
            <li><a href="">寄明信片</a></li>
            <li><a href="/publetter/index">看公开信</a></li>
            <li><a href="/shaidan/index">晒单</a></li>
            <li><a href="/my_manfish">我的慢递</a></li>
            <li><a href="/public/charges">资费及帮助</a></li>
        </ul>
    </div>
    <div class="index_menu nav_login" style="width:200px">
        <ul id="nav_login">
            <li>
                <img src="{{asset('img/index/head.png')}}">
                @if(Auth::guest())
                <li onclick="showLoginModal(1)">登录&nbsp&nbsp&nbsp|</li>
                <li onclick="showLoginModal(2)">注册</li>
                @else
                    <a href="/my_manfish" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                       {{(Auth::user()->phone)}} <span class="caret"></span>
                    </a>

                        <li>
                            <a
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                退出
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                @endif
            </li>
        </ul>
    </div>
</div>
