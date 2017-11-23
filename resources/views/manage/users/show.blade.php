@extends('layouts.dashboard')

@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>查看管理员</h1>
			</div>
			<div class="column">
				<a href="{{ route('manager.edit',$user->id) }} " class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>編輯管理員</a>
			</div>
		</div>

		<div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">Name</label>
          <pre>{{$user->name}}</pre>
        </div>

          <div class="field">
            <label for="email" class="label">Email</label>
            <pre>{{$user->email}}</pre>
          </div>
          <div class="field">
              <div class="label">管理员级别</div>
              <pre>{{ $user->role }}</pre>
              说明：级别 1 ： 超级管理员 -- 可以做任何事情
              <br>
              级别 2 ： 普通管理员 -- 除了添加删除管理员，修改权限，可进行任意操作
          </div>
      </div>
    </div>
	</div>
@endsection