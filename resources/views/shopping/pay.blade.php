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
                            <li class="home">
                                <a href="/">Giỏ hàng</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Danh sách đơn hàng <div class="pull-right"><a class="afix-1" href="{{route('get.list.shopping.cart')}}">Cập nhật giỏ hàng</a></div>
                            </div>
                            <div class="panel-body">
                                @foreach($products as $product)
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img style="width: 90px;height: 80px" class="img-responsive" src="{{pare_url_file($product->options->avatar)}}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{$product->name}}</div>
                                        <div class="col-xs-12"><small>Số lượng x <span>{{$product->qty}}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>{{number_format($product->price,0,',','.')}} đ</h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                                @endforeach
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng tiền</strong>
                                        <div class="pull-right"> <h6>{{\Cart::subtotal()}} VNĐ</h6></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin thanh toán</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ</strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" value="" />
                                        @if($errors->has('address'))
                                            <div class="error-text">
                                                {{$errors->first('address')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Email</strong></div>
                                    <div class="col-md-12">
                                        <input type="email" name="email" class="form-control" value="{{get_data_user('web','email')}}" />
                                        @if($errors->has('email'))
                                            <div class="error-text">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Điện thoại</strong></div>
                                    <div class="col-md-12"><input type="number" name="phone" class="form-control" value="{{get_data_user('web','phone')}}" />
                                        @if($errors->has('phone'))
                                            <div class="error-text">
                                                {{$errors->first('phone')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú</strong></div>
                                    <div class="col-md-12">
                                        <textarea name="note" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Xác nhận thông tin</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->
                    </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>
    <!-- contact-details end -->
@stop
