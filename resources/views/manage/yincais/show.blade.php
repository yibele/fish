@extends('layouts.dashboard')
@section('content')
<div class="flex-container">
	<div class="columns m-t-10">
		<div class="column">
			<h1 class='title'>印材详情</h1>
		</div>
		<div class="column">
			<a href="{{ route('yincais.edit',$yincai->id) }}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>编辑印材</a>
		</div>
	</div>
	<div class="columns">
		<div class="column">
			<div class="field">
				<label for="name" class="label">印材名称</label>
			<pre>{{$yincai->name}}</pre>
		</div>
		<div class="columns">
			<div class="column">
				<div class="field">
					<div class="field">
						<label for="email" class="label">图片1</label>
						<img src="{{ $yincai->file1 }}" alt="">
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="field">
						<label for="email" class="label">图片2</label>
						<img src="{{ $yincai->file2 }}" alt="">
					</div>
				</div>
			</div>
			</div><!-- end of columns-->
		</div>
	</div>
	<div class="columns m-b-30">
		<div class="column">
			<div class="field">
				<label for="kucun" class="label">印材库存</label>
			<pre>{{ $yincai->kucun }}</pre>
		</div>
	</div>
	<div class="column">
		<div class="field">
			<label for="cunliang" class="label">印材存量</label>
		<pre>{{ $yincai->cunliang }}</pre>
	</div>
</div>
<div class="column">
	<div class="field">
		<label for="cunliang" class="label">印材描述</label>
	<pre>{{ $yincai->desc }}</pre>
</div>
</div>
</div>
</div>
@endsection