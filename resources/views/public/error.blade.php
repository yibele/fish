<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/14
 * Time: 下午8:01
 */
?>

@extends('layouts.app')
@section('content')

    <div class="notification is-danger " style="width:400px;margin:0 auto;text-align: center;">
        {{$messages}}
    </div>

@endsection
