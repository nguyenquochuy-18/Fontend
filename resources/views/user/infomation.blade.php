@extends('user.layout')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li class="active">Thông tin cá nhân</li>
        </ol>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên hiển thị</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th>Giới thiệu</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($users))
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->about}}</td>
                        <td><a href="{{ pare_url_file($user->avatar)}}" target="_blank">
                                <img src="{{ pare_url_file($user->avatar)}}" alt="" class="img img-responsive" style="height: 80px;width: 80px">
                            </a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('user.update.info',$user->id)}}"><i class="fas fa-edit" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop
