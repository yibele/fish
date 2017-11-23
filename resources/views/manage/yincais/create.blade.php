@extends('layouts.dashboard')
@section('content')

<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>添加印材</h1>
			</div>
			<div class="column">
				<a href="{{ route('manage.qx') }} " class="button is-primary is-pulled-right m-r-10"><i class="fa fa-archive m-r-10"></i>管理印材</a>
			</div>
		</div>
		<hr>
	  
	<form id='upload' action="{{ route('yincais.store') }}" class="form" method="POST" enctype="multipart/form-data" >
	  <div class="columns">
	  	<div class="column" style="width:min-width:450px;">
					{{ csrf_field() }}
					<div class="field">
						<div class="label" for="name">印材名称</div>
						<p class="control">
							<input type="text" class="input" name="name" id="name" required>
						</p>
					</div>

					<div class="field">
						<div class="label" for="image">印材正面图片</div>
						<p class="control">
							<input type="file" name="file1" ref = "file1" required=""  v-on:change="changeImg1" >
						</p>
					</div>

					<div class="field">
						<div class="label" for="image">印材背面图片</div>
						<p class="control">
							<input type="file" name="file2" ref="file2" v-on:change="changeImg2"> 
						</p>
					</div>
					
					<div class="field">
						<div class="label" for="desc">印材备注</div>
						<p class="control">
							<input type="text" class="input" name="desc" id="desc" required="">
						</p>
					</div>
	  	</div>
	  	<div class="column">
	  		<div class="label">浏览</div>
	  			<img :src="image1" alt="" class="yincai_review">
	  			<img :src="image2" alt="" class="yincai_review">
	  	</div>
	  </div>
	  <hr>
	  	<button  class="button is-primary is-pulled-right m-r-20" style='width:100px'>添加</button>
	</form>
</div>
@endsection

@push('javascript')
<script>
var vm = new Vue({
	el: "#app",
	data : {
		image1 :'',
		image2 : ''
	},
	methods : {
		changeImg1 : function (e) {
			var file = e.target.files[0];
			var reader = new FileReader();
			var vm = this;
			console.log(file);
			reader.readAsDataURL(file);
			reader.onload = function(e) {
				vm.image1 = e.target.result;
			}
		},
		changeImg2: function(e) {
			var file = e.target.files[0];
			var reader = new FileReader();
			var vm = this;
			reader.readAsDataURL(file);
			reader.onload = function(e) {
				vm.image2 = e.target.result;
			}
		},
		upload : function(e) {
			e.preventDefault();
			var form = document.getElementById('upload');
			var formdata = new FormData(form);
			$.ajax({
				url : '{{ route('yincais.store')}}',
				method : 'POST',
				data : formdata,
				success : function(e) {
					console.log (e);
				},
				fail : function(e) {
					alert('fail')
				}
			})
		}
	}
})
</script>
@endpush






