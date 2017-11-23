@extends('layouts.dashboard')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column">
                <h1 class='title'>信件字体</h1>
            </div>
            <div class="column">
                <a href="{{ route('ziti.index') }}" class="button is-pulled-right m-r-20 is-primary">返回字体列表</a>
            </div>
        </div>
        <hr>

        <form action="{{ route('ziti.store') }}" method="POST" class="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column" style="width:450px">
                    <div class="label">主字体代码(Accesskey):</div>
                    <input type="text" class="input" placeholder="有字库中生成的 AccessKey" required name="accesskey">
                    <div class="label">字体名称:</div>
                    <input type="text" class="input" name="fname">
                    <div class="label">主字体行高:</div>
                    <input type="text" class="input" name="lineHeight" placeholder="默认1.5倍行高,如需修改输入倍数" required>
                    <div class="label">主字体图片:</div>
                    <p class="message is-danger">
                        请使用.png格式透明图片
                    </p>
                    <input v-on:change="setImgSrc" type="file" class="input" required name="imgSrc">
                    <div class="m-t-20">
                       字体缩略图: <img :src="imgSrc" alt="缩略图" >
                    </div>
                </div>
                <div class="column m-r-20">
                    <div class="label">输入附属字体ID:</div>
                    <input type="text" class="input" required name="fszt_id">
                    <div class="label">附属字体行高:</div>
                    <input type="text" class="input" name="fszt_lh" placeholder="默认1.5倍行高,如需修改输入倍数" required>
                </div>
            </div>
            <hr>
            <button class="button is-primary" style="width:150px;">提交</button>
            <a href="{{ route('ziti.index') }}" class="button" style="width:150px">取消</a>
        </form>
    </div>

@endsection
@push('javascript')
<script>
    const vm = new Vue({
        el : '#app',
        data : {
            imgSrc : ''
        },
        methods : {
            setImgSrc : function(e) {
                var img = e.target.files[0];
                var reader = new FileReader();
                var vm = this;
                reader.readAsDataURL(img);
                reader.onload = function(e) {
                    vm.imgSrc = e.target.result;
                }
            }
        },
        computed : {
        },

    })
</script>
@endpush