@extends('layouts.app')

@section('content')

	    <div id="app">
        <div class="container1">
            <div class="wrap-1">
                <div class="letter">
                    <img v-bind:src = 'letter' id="letter" v-bind:class="trans_class" v-on:mouseenter='turn_to($event,0)' >
                    <button class="btn1" onclick='window.location.href = "/letter/index"'>
                        写信
                    </button>
                </div>
                <div class="chuo">
                	<img src="{{asset('img/index/index_12.png')}}">
                </div>
                <div class="Postcard">
                <img v-bind:src = 'card' id="card" v-bind:class="trans_class1" v-on:mouseover='turn_to($event,1)' alt="" >
                    <button class="btn1" onclick='window.location.href="#"'>
                        寄明信片
                    </button>
                </div>
            </div>
        </div>
    <div class="kefu" onclick='showModal()'></div>
    <div class="modal" id='kefu'>
  <div class="modal-background" onclick='hideModal()'></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">联系客服</p>
      <button class="delete" onclick='hideModal()'></button>
    </header>
    <section class="modal-card-body">
            <form action="" method='post' class="form-kefu">
            <div class='content-left'>
                <label class="radio"><input type="radio" name="type" value='1' checked>信件问题</label>
                <label class='radio'><input type="radio" name="type" value='2'>意见建议</label>
                <label class='radio'><input type="radio" name="type" value='3'>其他</label>
            </div>
            <div class='modal-content-body'>
            <div class='column'>
                <div class='label'>姓名</div><input class='input form-control ' placeholder='你的称呼' name='name'></input>
            </div>
            <div class='column'>
            <div class='label'>Email或手机</div>
                <input class='form-control input ' placeholder='你的联系方式' name='email'></input>
            </div>
            <div class='column'>
            <div class='label'>内容</div>
                <textarea class='textarea form-control area' name='content' rows='3' cols='20' placeholder='告诉我们你遇到的问题或者意见建议，我会会在收到邮件的24小时之内反馈'></textarea>
            </div>
            </div>
            <div class="column-no-space">
              <button class="btn-cancel" onclick='hideModal();return false;'>取消</button>
              <input type="submit" class='btn-submit' value="确定"></input>
            </div>
            </form>
    </section>
  </div>
</div>
    </div>


@endsection