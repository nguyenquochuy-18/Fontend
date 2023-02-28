@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.contact')}}">Liên hệ</a></li>
            <li class="active">Danh sách</li>
        </ol>

    </div>
    <div class="table-responsive">
        <h2>Quản lý liên hệ</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->c_title}}</td>
                    <td>{{$contact->c_name}}</td>
                    <td>{{$contact->c_email}}</td>
                    <td>{{$contact->c_content}}</td>
                    <td>
                        @if($contact->c_status ==1)
                            <a href="" class="label-success label">Đã xử lý</a>
                        @else
                            <a href="" class="label-default label">Chờ xử lý</a>
                        @endif
                    </td>
                    <td>
                        <a  style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.update.contact',$contact->id)}}"><i class="fas fa-pen" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="shop-content-bottom">
        <div class="shop-toolbar btn-tlbr">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="pages">
                    {!! $contacts->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@stop
