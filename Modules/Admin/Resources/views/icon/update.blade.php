@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.icon')}}">Icon</a></li>
            <li class="active">Cập nhật</li>
        </ol>

    </div>
    <div class="">
        @include("admin::icon.form")
    </div>
@stop
