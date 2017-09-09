<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/9
 * Time: 上午11:11
 */
?>

@extends('layouts.app')
@section('content')

    <div class="container1">
        <div class="contact_container">
            <div class="contact_main">
                <form action="">
                    请选择寄信日期: <input type="text" id="yesr"> <input type="text">
                    请填写收信信息:
                    <div>
                        <input type="text" placeholder="收信人姓名">
                        <input type="text" placeholder="收信人电话">
                        <input type="text" placeholder="收信人所在省/市/区">
                        <input type="text" placeholder="收信人地址">
                        <hr>
                        <input type="text" placeholder="添加收信人">
                    </div>
                </form>
        </div>
    </div>


    @push('style')
    <link rel="stylesheet" href="{{asset('css/contactUpdate.css')}}">
        <link rel="stylesheet" href="{{asset('css/layDate.css')}}">
    @endpush

    @push('javascript')
        <script src="{{asset('js/layDate.js')}}"></script>
        <script src="{{asset('js/contactUpdate.js')}}"></script>
    @endpush
@endsection
