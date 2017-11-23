@extends('layouts.dashboard')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class='title'>权限管理</h1>
            </div>
            <div class="column">
                <a href="{{ route('users.create') }} " class="button is-primary is-pulled-right m-r-10"><i class="fa fa-user-plus"></i>添加管理员</a>
                <a href="{{ route('manage.qx') }} " class="button is-primary is-pulled-right m-r-10"><i class="fa fa-user-plus"></i>修改权限</a>
            </div>
        </div>
        <hr>

        <table class="table is-narrow" style="width: 100%">
            <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>邮箱</th>
                <th>创建日期</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class='has-text-right m-r-20'>
                        <a href="{{ route('users.show',$user->id) }}" class="button is-outlined">查看</a>
                        <a href="{{ route('users.edit',$user->id) }}" class="button">编辑</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection