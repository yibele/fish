<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/9
 * Time: 上午11:11
 */
?>

    @extends('layouts.app') @section('content')

    <div class="container1">
        <div class="contact_container" v-if="contact_page ===1">
            <div class="contact_main" >
                <form action="">
                    <div style="margin-bottom:10px;">
                        <p style="margin-top:10px;">请选择寄信日期: &nbsp&nbsp</p>
                        <input type="text" class="contact_input contact_input1" id="yesr">年 &nbsp&nbsp&nbsp&nbsp&nbsp
                        <input style="width:100px" class=" contact_input1 contact_input" type="text" id="month"> 月&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="text" id="day" class="contact_input contact_input1" style="width : 90px;">日
                        <br>
                    </div>
                    <div>
                        <p style="margin-top:10px;">请填写收信信息: &nbsp&nbsp</p>
                        <div class="contact_detail_container" style="display: inline-block">
                            <input type="text" class="contact_detail contact_input" placeholder="收信人姓名" v-model="contactName">
                            <br>
                            <input type="text" placeholder="收信人电话" class="contact_detail contact_input" v-model="contactPhone">
                            <br>
                            <input class="contact_detail contact_input" type="text" placeholder="收信人所在省/市/区" v-model="contactCity">
                            <br>
                            <input type="text" class="contact_detail contact_input" placeholder="收信人地址" v-model="contactHome">
                            <div>
                                <button type="button" class="button is-white" v-on:click="addContact">添加联系人</button>
                                <p class="help is-danger" v-show="contactShow">请填写完整信息</p>
                            </div>
                        </div>
                        <hr>
                        <table class="table is-fullwidth ">
                            <thead>
                                <tr>
                                    <th>收件人编号</th>
                                    <th>寄信时间</th>
                                    <th>收件人姓名</th>
                                    <th>电话</th>
                                    <th>地址</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in contactDate">
                                    <td>${index+1}</td>
                                    <td>${item.time}</td>
                                    <td>${item.name}</td>
                                    <td>${item.phone}</td>
                                    <td>${item.address}</td>
                                    <td><button type="button" class="button is-link" @click="removeCon(index)">删除</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="button is-white" onclick="return false;">地址铺添加</button>
                        <button class="button is-white" onclick="return false;">由他人填写</button>
                        <nav class="pagination" role="navigation" aria-label="pagination" style="display:inline-block;width:400px;float:right;margin-top:10px">
                            <a href="#" class="pagination-previous pagination-border-reset">上一页</a>
                            <ul class="pagination-list" style="display:inline-block">
                                <li>
                                    <a href="" class="pagination-link pagination-border-reset">3</a>
                                    <a href="" class="pagination-link pagination-border-reset">
                                        <a href="" class="pagination-link pagination-border-reset">
                                        <a href="" class="pagination-link pagination-border-reset">...</a>
                                </li>
                            </ul>
                            <a href="" class='pagination-next pagination-border-reset'>下一页</a>
                        </nav>
                    </div>
                </form>
            </div>
            <a href="#" style="margin-top:10px;display:block;margin-left:5px;" class='reset_a'> <span>>></span> 保存到草稿箱</a>
            <div style="text-align:center">
                <a href="" class="button is-link" style="margin-top:65px;color:#ccc;font-size:15px;margin-right:30px;text-decoration: none;">上一步</a>
                <button class="btn1" style="display:inline-block;font-size:15px" @click="pay(2)">下一步：在线支付</button>
            </div>
        </div>

        <div class="contact_container" v-else="contact_page===2">
            <div>
                请选择支付方式
                    <input type="radio" name="pay">{{asset('img/public/zhifubao.png')}} <input  name="pay" type="radio">{{asset('img/public/weixin.png')}}
                应付金额 ￥${feiyong_all}
                使用代金券支付
            </div>
            <div style="margin:0 auto;width : 400px">
                <button type="button" class="button is-link is-centered" style="margin-top:65px;color:#ccc;font-size:15px;margin-right:30px;text-decoration: none; " @click="pay(1)">上一步</button>
                <button class="btn1" style="display:inline-block;font-size:15px" >下一步：确认支付</button>
            </div>
        </div>



    @push('style')
    <link rel="stylesheet" href="{{asset('css/contactUpdate.css')}}"> @endpush @push('javascript')
    @endpush
    @push('javascript')
        <script src="{{asset('js/jquery.slides.min.js')}}"></script>
        <script src="{{asset('js/updateContact.js')}}"></script>
    @endpush
        <script>
            $(function() {
                $('#slides').slidesjs({
                    width: 940,
                    height: 100,
                    navigation : {
                        active : true,
                        effect : "slide"
                    },
                    pagination : {
                        active : false,
                    }
                });
            });
        </script>
    @endsection

