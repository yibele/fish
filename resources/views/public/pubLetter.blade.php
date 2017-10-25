<?php
/**
 * Created by PhpStorm.
 * User: yibele
 * Date: 2017/9/16
 * Time: 下午12:24
 */
?>

@extends('layouts.app')
@section('content')
    <div class="container1" id="container1">
        <div class="publetter" id="publetter">
            @foreach($letters as $k=>$letter)
                @if($k != 4)
                <a style="color : #000 ;font-size : 18px;line-height: 1.45;" href="{{url("/publetter/".$letter['lid'])}}" ><div class="publetter_lt" id="{{$letter['lid']}}" style="background-image:url({{asset('img/public_letter/publetter_03.png')}}); padding :20px;">
                        <div style="overflow: hidden; height : 180px;">{!! $letter['lt_content'] !!}</div>
                    </div></a>
                    @else
                    <div class="publetter_lt" style="background-size:contain;background-image:url({{asset('img/public_letter/public_letter_03.png')}});"></div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@push('javascript')
<script>
    $(function () {
        var letter_neirong = $("#container1");
        objchangefont(letter_neirong, "a28d6bc9a592429e93378a6001f9e547")
        console.log('test');
    })
</script>
@endpush
