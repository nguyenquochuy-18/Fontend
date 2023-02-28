@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.user')}}">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>

    </div>
    <div class="table-responsive">
        <h2>Quản lý thành viên</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên hiển thị</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><a href="{{ pare_url_file($user->avatar)}}" target="_blank">
                                    <img src="{{ pare_url_file($user->avatar)}}" alt="" class="img img-responsive" style="height: 80px;width: 80px">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('admin.get.action.user',['active',$user->id])}}" class="label {{$user->getStatus($user->lock)['class']}}">{{$user->getStatus($user->lock)['name']}}</a>
                            </td>
                            <td>
                                <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.user',['delete',$user->id])}}"><i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
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
                    {!! $users->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@stop
