@extends('layouts.dashboard')
@push('style')
<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
@endpush
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class='title'>新建明信片</h1>
            </div>
        </div>
        <hr>
        <form action="{{ route('postcard.store') }}" method="POST" class="form" enctype="multipart/form-data" id="upload">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column">
                    <div class="label" for="name">明信片名称:</div>
                    <input type="text" v-model="name" class="input" required >
                    <div class="label">添加印材</div>
                    <input type="text" name="yincai" class="input" required id="yincai" v-model="yincai" placeholder="请添加印材id">
                    <button class="button m-t-10" type="button" @click="addbackground" >添加印材</button>
                    <a href="" class="button m-t-10">查看印材</a>
                    <div class="label">是否可编辑:</div>
                    <b-radio v-model="isEditable" name="isEditable" native-value="1">可编辑</b-radio>
                    <b-radio name="isEditable" v-model="isEditable" native-value="0">不可编辑</b-radio>
                    <div class="label">横竖模板:</div>
                    <button type="button" @click="changeStyle1" class="button">竖版</button>
                    <input type="hidden" v-model="isCol" name="isCol">
                    <button type="button" @click="changeStyle2" class="button">横版</button>
                </div>
                <div class="column">
                    <div class="label" v-if="isEditable==1">上传正面图片</div>
                    <input type="file" multiple v-if="isEditable==1" name="img_fronts[]" v-on:change="addImages_front">
                    <div class="label">上传背面图片</div>
                    <input type="file" name="img_backs[]" multiple v-on:change="addImages">
                </div>
            </div>
            <button class="button is-pulled-right m-r-40 is-primary" style="width:150px" @click="save">保存</button>
        </form>
            <hr>
            <div class="m-b-40">
                <div class="post_card_background_display" :style="style" style="position: relative" >
                    <div class="postcard_backe_images">
                        <img :src="images_front[0]" alt="" v-on:dblclick="deletefrontimg(0)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images_front[1]" alt="" v-on:dblclick="deletefrontimg(1)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images_front[2]" alt="" v-on:dblclick="deletefrontimg(2)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images_front[3]" alt="" v-on:dblclick="deletefrontimg(3)">
                    </div>
                    <img :src="background1" alt="" >
                </div>
                <div class="post_card_background_display"  :style="style" style="position: relative;">
                    <div id="stamp" style="position: absolute; background-image:url('/images/postcard/addstamp.png');background-size:cover;width:80px;height:110px;z-index:20;left:395px;top:11px;"></div>
                    <div id="erweima" style="width:80px;height:80px;position: absolute;z-index: 20;top:670px;left:30px;background-image: url('/images/postcard/erweima.jpg');background-size: cover"></div>
                    <div class="postcard_backe_images">
                        <img :src="images[0]" alt="" v-on:dblclick="deleteimg(0)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images[1]" alt="" v-on:dblclick="deleteimg(1)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images[2]" v-on:dblclick="deleteimg(2)">
                    </div>
                    <div class="postcard_backe_images">
                        <img :src="images[3]" alt="" v-on:dblclick="deleteimg(3)">
                    </div>
                    <img :src="background2" alt="" class="background_image">
                    <div id="postcard_content" style="width:400px;height:300px;border:1px #ccc dashed;position:absolute;top:200px;left:80px;">
                        亲爱的__:
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('javascript')
<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script>
    $(function() {
      const stamp = $("#stamp");
      stamp.draggable().resizable();
      $("#erweima").draggable().resizable();
      $("#postcard_content").draggable().resizable();
      $(".postcard_backe_images").draggable();
    });
    const vm = new Vue({
      el : "#app",
      data : {
        name : '',
        yincai : '',
        isEditable : '1',
        background1 : '',
        background2 :'',
        style : 'height:770px;width:520px;display :inline-block;overflow:hidden;border : 1px #ccc solid;',
        isCol : 1,
        images : [],
        images_front : [],
        stamp:'',
        stamp_style :'',
        erweima_style:'',
        content_style : ''

      },
      delimiters: ["${","}"],
      methods : {
        addbackground : function() {
          var yincaiid = document.getElementById('yincai').value;
          var vm = this;
          axios.get('/admin/yincais/getpostcardyincai/'+yincaiid).then(res=>{
            this.background1 = res.data.file1;
            this.background2 = res.data.file2;
        }).catch(e=> {
            console.log(e);
            alert('没有找到印材，请输入正确印材id');
        })
        },
        changeStyle1 : function() {
          this.isCol = 1;
          this.style = "height:770px;width:520px;display :inline-block;overflow:hidden;border : 1px #ccc solid";
        },
        changeStyle2 : function () {
          this.isCol = 0;
          this.style = "height : 520px;width:770px;display : inline-block;overflow:hidden;border :1px #ccc solid"
        },
        save : function(e) {
          e.preventDefault();
          this.getposition();
          const data = {
            name: this.name,
            yincai_id : this.yincai,
            is_editable : this.isEditable,
            stamp_style  : this.stamp_style,
            erweima_style : this.erweima_style,
            content_style : this.content_style,
            isCol  : this.isCol,
          };
          /**
          axios.post('{{ route('postcard.store') }}',data).then(res=> {
            console.log(res.data)
          }).catch(error=> {
            alert('未保存成功，请检查填写项');
          })
           **/
        },
        addImages : function(e) {
          var files = e.target.files;
          var vm = this;
          for(k in files) {
            if(k <= files.length-1) {
              var reader = new FileReader();
              file = files[k];
              reader.readAsDataURL(file);
              reader.onload = function(res){
                vm.images.push(res.target.result)
              }
            }
          }
        },
        addImages_front: function(e) {
          var files = e.target.files;
          var vm = this;
          for(k in files) {
            if(k <= files.length-1) {
              var reader = new FileReader();
              file = files[k];
              reader.readAsDataURL(file);
              reader.onload = function(res){
                vm.images_front.push(res.target.result)
              }
            }
          }
        },
        deleteimg : function(e) {
          Vue.delete(this.images, e);
        },
        deletefrontimg : function(e) {
          Vue.delete(this.images_front,e);
        },
        getposition : function() {
          if(this.isEditable == 0) {
            const stamp = document.getElementById('stamp');
            const erweima = document.getElementById('erweima');
          }else {
          }
          this.stamp_style = stamp.style.cssText;
          this.erweima_style = erweima.style.cssText;
          this.content_style = document.getElementById('postcard_content').style.cssText;
        }
      },
      computed : {
        getBackground1 : function(){
          return 'background-image:url("'+this.background1+'");background-size:100% auto;'
        },
        getBackground2 : function() {
          return 'background-image:url("'+this.background2+'");background-size:cover;'
        },
      }
    })
</script>
@endpush