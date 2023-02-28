@extends('user.layout')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="{{route('user.get.list')}}">Thông tin cá nhân</a></li>
            <li class="active">Cập nhật</li>
        </ol>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" disabled="" name="email" value="{{$users->email}}">
                </div>
                <div class="form-group">
                    <label for="pwd">Họ tên</label>
                    <input type="text" class="form-control"placeholder="Họ tên" name="name" value="{{$users->name}}">
                </div>
                <div class="form-group">
                    <label for="pwd">Điện thoại</label>
                    <input type="number" class="form-control"placeholder="Điện thoại" name="phone" value="{{$users->phone}}">
                </div>
                <div class="form-group">
                    <a id="out_img1"  href="/img/no_image.png" target="_blank">
                        <img id="out_img" src="/img/no_image.png" alt="" style="width: 25%;height: 200px">
                    </a>
                </div>
                <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" id="input_img" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pwd">Địa chỉ</label>
                    <input type="text" class="form-control"placeholder="Địa chỉ" name="address" value="{{$users->address}}">
                </div>
                <div class="form-group">
                    <label for="pwd">Giới thiệu bản thân</label>
                    <textarea name="about"  cols="30" rows="5" class="form-control" placeholder="Mô tả bản thân">{{$users->about}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Cập nhật thông tin</button>
            </form>
        </div>
    </div>
@stop

