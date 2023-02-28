@extends('layouts.app')
@section('content')
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i =1 ?>
                @foreach($products as $key => $product)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="" class=" name="{{$key}}"" >{{$product->name}}</a></td>
                        <td><img style="width: 80px;height: 60px" src="{{pare_url_file($product->options->avatar)}}" alt=""></td>
                        <td>{{number_format($product->price,0,',','.')}}đ</td>
                        <td>
                            <a style="margin-right: 10px;color: green" href="?id={{$product->id}}&decrease=1" class="{{Request::get('id') == "decrease=1" ? "active" : ""}}"><i class="fas fa-minus-circle"></i></a>
                            {{$product->qty}}
                            <a style="margin-left: 10px;color: green"  href="?id={{$product->id}}&increment=1" class="{{Request::get('id') == "increment=1" ? "active" : ""}}"><i class="fas fa-plus-circle"></i></a>
                        </td>
                        <td>{{number_format($product->qty * $product->price,0,',','.')}}đ</td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('delete.shopping.cart',$key)}}"><i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>

            <h5 class="pull-right">Tổng tiền cần thanh toán {{\Cart::subtotal()}} <a href="{{route('get.form.pay')}}" class=" btn btn-success">Thanh toán</a></h5>

        </div>
    </div>

@stop
