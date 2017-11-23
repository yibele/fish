@extends('layouts.dashboard')
@section('content')
<div class="flex-container">
		<div class="columns m-t-10">
			<div class="column">
				<h1 class='title'>管理印材</h1>
			</div>
			<div class="column">
			</div>
		</div>
		<hr>

		<table class="table is-narrow" style="width: 100%">
			<thead>
				<tr>
					<th>id</th>
					<th>印材名称</th>
					<th>库存</th>
					<th>存量</th>
					<th>缩略图</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($yincais as $yincai)
				<tr class="yincai_tr">
					<td>{{ $yincai->id }}</td>
					<td>{{ $yincai->name }}</td>
					<td>{{ $yincai->库存 }}</td>
					<td>{{ $yincai->存量 }}</td>
					<td style="width:350px"><img style="width:150px" src="{{ $yincai->tmb1 }}" alt="">
						<img style="width:150px" src="{{ $yincai->tmb2 }}" alt="">
					</td>
					<td class='has-text-right m-r-20'>
						<a href="{{ route('yincais.show',$yincai->id) }}" class="button is-outlined">详细</a>
						<a href="{{ route('yincais.edit',$yincai->id) }}" class="button">编辑</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection