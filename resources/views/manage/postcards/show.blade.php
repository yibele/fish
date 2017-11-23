@extends('layouts.dashboard')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class='title'>新建明信片</h1>
            </div>
        </div>
        <hr>
        <div class="columns">
            <div class="column">
                <div class="label" for="name">明信片名称:</div>
                <pre>{{ $postcard->name }}</pre>
                <div class="label">印材ID：</div>
                <pre>{{ $postcard->yincai->id }}</pre>
                <div class="label">是否可编辑:</div>
                <pre> @if( $postcard->is_editable==1)可编辑明信片@else不可编辑明信片@endif</pre>
                <div class="label">横竖模板:</div>
                <pre>@if($postcard->icCol == 1)横模板@else竖模板@endif</pre>
            </div>
            <div class="column">
                <div class="label">明信片ID:</div>
                <pre>{{ $postcard->id }}</pre>
                <div class="label">印材名称:</div>
                <pre>{{ $postcard->yincai->name }}</pre>
            </div>
        </div>
        <hr>
        <div class="m-b-40">
            <div class="post_card_background_display"
                 @if($postcard->isCol == 1)style="height:770px;width:520px;display :inline-block;overflow:hidden;border : 1px #ccc solid;position: relative"
                 @else style="height : 520px;width:770px;display : inline-block;overflow:hidden;border :1px #ccc solid;position:relative"@endif>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <img src="/uploads/{{ $postcard->yincai->file1 }}" alt="">
            </div>
            <div class="post_card_background_display"
                 @if($postcard->isCol == 1)style="height:770px;width:520px;display :inline-block;overflow:hidden;border : 1px #ccc solid;position: relative;"
                 @else style="height : 520px;width:770px;display : inline-block;overflow:hidden;border :1px #ccc solid;position:relative;"@endif>
                <div id="stamp" style="{{ $postcard->stamp_style }}"></div>
                <div id="erweima" style="{{ $postcard->erweima_style }}"></div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <div class="postcard_backe_images">
                    <img>
                </div>
                <div class="postcard_backe_images">
                    <img alt="">
                </div>
                <img src="/uploads/{{ $postcard->yincai->file2 }}" alt="" class="background_image">
                <div id="postcard_content"
                     style="widtH:400px;height:300px;border:1px #ccc dashed;position:absolute;top:200px;left:80px;">
                    亲爱的__:
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
      const vm = new Vue({
        el: '#app',
        data: {
          style: '',
        }
      })
    </script>
@endpush