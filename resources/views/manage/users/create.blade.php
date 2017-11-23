@extends('layouts.dashboard')
@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">

			<div class="column">
				<h1 class='title'>创建管理员</h1>
			</div>
			<div class="column">
				<a href="{{ route('users.create') }} " class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>添加管理员</a>
			</div>
		</div>
		<hr>

		<form action="{{ route('users.store') }}" method="POST" class="form">
			{{ csrf_field() }}
			<div class="field">
				<div class="label" for="name">用户名:</div>
				<p class="control">
					<input type="text" class="input" name="name" id="name">
				</p>
			</div>

			<div class="field">
				<div class="label" for="email">邮箱:</div>
				<p class="control">
					<input type="text" class="input" name="email" id="email">
				</p>
			</div>

			<div class="field">
				<div class="label" for="password">密码：</div>
				<p class="control">
					<input type="password" class="input" name="password" id="password">
				</p>
			</div>

			<button class="button is-success">创建管理员</button>
		
		</form>

	</div>

@endsection