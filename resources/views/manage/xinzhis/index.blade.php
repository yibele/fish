@extends('layouts.dashboard')
@section('content')
	<div class="flex-container">
		<div class="columns m-t-10">

			<div class="column">
				<h1 class='title'>模板列表</h1>
			</div>
			<div class="column">
				<a href="{{ route('xinjian.create') }} " class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>新建模板</a>
			</div>
		</div>
		<hr>
		<table class="table is-narrow" style="width: 100%">
			<thead>
				<tr>
					<th>id</th>
					<th>模板名称</th>
					<th>印材名称</th>
					<th width="">创建日期</th>
					<th>缩略图</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($xinzhis as $xinzhi)
				<tr>
					<td>{{ $xinzhi->id }}</td>
					<td>{{ $xinzhi->name }}</td>
					<td>{{ $xinzhi->yincai->name }}</td>
					<td>{{ $xinzhi->created_at }}</td>
                    <td><img src="{{ $xinzhi->yincai->tmb1 }}" alt="" style="width:150px">
					</td>
					<td class='has-text-right m-r-20'>
						<a href="{{ route('xinjian.show',$xinzhi->id) }}" class="button is-outlined">查看</a>
						<a href="{{ route('xinjian.edit',$xinzhi->id) }}" class="button">编辑</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection