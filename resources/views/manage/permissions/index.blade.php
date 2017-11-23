@extends('layouts.dashboard')
@section('content')
<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>权限管理</h1>
			</div>
			<div class="column">
				<a href="{{ route('permissions.create') }} " class="button is-primary is-pulled-right m-r-20"><i class="fa fa-user-plus"></i>创建权限</a>
			</div>
		</div>
		<hr>

		<table class="table is-narrow" style="width: 100%">
			<thead>
				<tr>
					<td>权限名称</td>
					<td>Slug</td>
					<td>描述</td>
					<td style="width:20%">操作</td>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions as $p)
				<tr>
					<td class="is-bold">{{$p->name}}</td>
					<td>{{$p->display_name}}</td>
					<td>{{$p->description}}</td>
					<td>
						<a href="{{ route('permissions.edit',$p->id) }}" class="button is-outlined">编辑</a>
						<a href="{{route('permissions.show',$p->id)}}" class="button is-outlined">查看</a>
            <a href="{{ route('permissions.destroy',$p->id,'delete') }} " class="button is-outlined is-danger">删除</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection