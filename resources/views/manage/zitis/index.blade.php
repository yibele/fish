@extends('layouts.dashboard')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">

            <div class="column ">
                <h1 class='title '>字体列表</h1>
            </div>
            <div class="column m-r-20">
                <a href="{{ route('ziti.create') }} " class="button is-primary is-pulled-right"><i class="fa fa-user-plus"></i>新建字体</a>
            </div>
        </div>
        <hr>
        <table class="table is-narrow" style="width: 100%">
            <thead>
            <tr>
                <th>id</th>
                <th>字体名称</th>
                <th width="">创建日期</th>
                <th>详情</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($fonts as $font)
                    <tr>
                        <td>{{ $font->fid }}</td>
                        <td>{{ $font->fname }}</td>
                        <td>{{ $font->created_at }}</td>
                        <td><img src="{{ $font->imgSrc }}" alt=""></td>
                        <td>
                            <form action="{{ route('ziti.destroy',$font->fid) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="button">删除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection