@extends('master')
@section('content')
@php
    $count = count($aryProduct);
@endphp
<div class="container" style="margin: 30px;">
    <div class="row">

@if($aryProduct)
    <h1 class="count">Tìm thấy {{ $count }} sản phẩm</h1>
    @foreach ($aryProduct as $prd)

                <div class="col-md-4 col-sm-4">
                    <div class="single-item">
                        <div class="single-item-header">
                            <a href="{{route('chitietsanpham',$prd->id)}}">
                                <img src="source/image/product/{{$prd->image}}" alt="" height="250px">
                            </a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$prd->name}}</p>
                            <p class="single-item-price" style="font-size: 15px">
                                @php
                                $del = '';
                                if($prd->promotion_price != 0) {
                                    $del = 'flash-del';
                                }

                                @endphp
                                
                                    <span class="{{ $del }}">{{number_format($prd->unit_price)}} đồng</span>
                                @if($prd->promotion_price != 0)   
                                    <span class="flash-sale">{{number_format($prd->promotion_price)}} đồng</span>
                                @endif
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$prd->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

    @endforeach

@endif
    </div>
</div>
<style>
    .count {
        margin: 15px 60px;
        text-align: left;
    }
</style>
@endsection
