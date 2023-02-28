@extends('layouts.app')

@section('content')
    <!-- breadcrumbs area start -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng ký</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- account-details Area Start -->
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-md-offset-1">
                    <div class="customer-register my-account">
                        <form class="form-horizontal" action='' method="POST">
                            @csrf
                            <div id="legend">
                                <legend class="">Đăng ký</legend>
                            </div>
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label"  for="username">Họ tên<span class="required">*</span></label>
                                <div class="controls" style="margin: 10px 0">
                                    <input type="text" id="name" name="name" placeholder="Nguyễn Văn A" value="{{old('name')}}" class="input-xlarge form-control">
                                    @if($errors->has('name'))
                                        <div class="error-text">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- E-mail -->
                                <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                                <div class="controls" style="margin: 10px 0">
                                    <input type="text" id="email" name="email" placeholder="admin@gmail.com" value="{{old('email')}}" class="input-xlarge form-control">
                                    @if($errors->has('email'))
                                        <div class="error-text">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="control-group">
                                <!-- Password-->
                                <label class="control-label" for="password">Mật khẩu<span class="required">*</span></label>
                                <div class="controls" style="margin: 10px 0">
                                    <input type="password" id="password" name="password" placeholder="******" class="input-xlarge form-control">
                                    @if($errors->has('password'))
                                        <div class="error-text">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label"  for="username">Điện thoại<span class="required">*</span></label>
                                <div class="controls" style="margin: 10px 0">
                                    <input type="number" id="phone" name="phone" placeholder="0123456789" value="{{old('phone')}}" class="input-xlarge form-control">
                                    @if($errors->has('phone'))
                                        <div class="error-text">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group" style="margin-top: 10px">
                                <!-- Button -->
                                <div class="controls" style="margin: 10px 0">
                                    <button class="btn btn-success">Đăng ký</button>
                                    <p style="margin: 10px 0">Đã có tài khoản? <a style="color: blue" href="{{route('get.login')}}" target="_blank">Đăng nhập</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account-details Area end -->
@endsection
