@extends('layouts.dashboard')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>编辑权限</h1>
			</div>
			<div class="column">
				<a href="{{ route('users.create') }} " class="button is-primary is-pulled-right m-r-20"><i class="fa fa-user-plus"></i>添加管理员</a>
			</div>
		</div><!-- end of the columns -->
		<hr>
		<form action="{{ route('users.update',$user->id) }}" method="post" class="form">
			{{ method_field('PUT')}}
			{{ csrf_field() }}
			<div class="columns">
				<div class="column">
				<div class="field">
				<div class="label" for="name">用户名:</div>
				<p class="control">
					<input type="text" class="input" name="name" id="name" value="{{$user->name }}">
				</p>
			</div>

			<div class="field">
				<div class="label" for="email">邮箱:</div>
				<p class="control">
					<input type="text" class="input" name="email" id="email" value="{{$user->email }}">
				</p>
			</div>

			<div class="field">
				<div class="label" for="password">更新密码:</div>
				<p class="control">
					<input type="password" class="input" name="password" id="password">
				</p>
			</div>	
				</div>
				<div class="column">
				<label for="roles" class="label">Roles:</label>
          <input type="hidden" name="roles" :value="rolesSelected" />
            @foreach ($roles as $role)
              <div class="field">
                <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
              </div>
            @endforeach
			</div>
			</div>
			<hr>
			<button class="button is-primary is-pulled-right m-r-20" style="width:200px">确定更改</button>
		</form>
	</div>
@endsection
@push('javascript')

  <script>

    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });

  </script>
@endpush