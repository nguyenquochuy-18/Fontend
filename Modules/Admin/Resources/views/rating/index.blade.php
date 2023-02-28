@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.rating')}}">Đánh giá</a></li>
            <li class="active">Danh sách</li>
        </ol>

    </div>
    <div class="table-responsive">
        <h2>Quản lý đánh giá</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên thành viên</th>
                <th style="width: 30%">Sản phẩm</th>
                <th style="width: 30%">Nội dung</th>
                <th>Rating</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($ratings))
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{$rating->id}}</td>
                        <td>{{isset($rating->user->name) ? $rating->user->name : ''}}</td>
                        <td><a href="{{route('get.detail.product',[$rating->product->pro_slug,$rating->product->id])}}" target="_blank">{{isset($rating->product->pro_name) ? $rating->product->pro_name : ''}}</a></td>
                        <td>{{$rating->ra_content}}</td>
                        <td>{{$rating->ra_number}}</td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.delete.rating',$rating->id)}}"><i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="shop-content-bottom">
        <div class="shop-toolbar btn-tlbr">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="pages">

                </div>
            </div>
        </div>
    </div>
@stop
