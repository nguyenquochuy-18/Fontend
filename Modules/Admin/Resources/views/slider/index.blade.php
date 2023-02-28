@extends('admin::layouts.master')
@section('content')

    <style>
        .rating .active{
            color: #ff9705 !important;
        }
    </style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.slider')}}">Slider</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý slider<a href="{{route('admin.get.create.slider')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên slider</th>
                <th>Đường dẫn</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @if(isset($sliders))
            @foreach($sliders as $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td>
                    <a href="{{ pare_url_file($slider->avatar)}}" target="_blank">
                        <img src="{{ pare_url_file($slider->avatar)}}" alt="" class="img img-responsive" style="height: 80px;width: 80px">
                    </a>
                </td>
                <td>
                    <a href="{{route('admin.get.action.slider',['active',$slider->id])}}" class="label {{$slider->getStatus($slider->active)['class']}}">{{$slider->getStatus($slider->active)['name']}}</a>
                </td>
                <td>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.edit.slider',$slider->id)}}"><i class="fas fa-pen" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.slider',['delete',$slider->id])}}"><i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
