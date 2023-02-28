@extends('layouts.app')
@section('content')
    <style>
        .pro-rating .active
        {
            color: #ff9705;
        }
    </style>
    <!-- start home slider -->
    @include('components.slide')
    <!-- banner-area start -->

    <!-- Hot product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <!-- our-product area start -->
            @if(isset($productHot))
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            <!-- single-product start -->
                            @foreach($productHot as $proHot)
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        @if($proHot->pro_number ==0)
                                        <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px">Tạm hết hàng</span>
                                        @endif
                                        @if($proHot->pro_sale)
                                        <span style="position: absolute;font-size: 10px;background: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">{{$proHot->pro_sale }}%</span>
                                         @endif
                                            <a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}" target="_blank">

                                            <img class="primary-image" src="{{pare_url_file($proHot->pro_avatar)}}" alt="" />
{{--                                            <img class="secondary-image" src="{{pare_url_file($proHot->pro_avatar)}}" alt="" />--}}
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{pare_url_file($proHot->pro_avatar)}}" target="_blank" title="Phóng to"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="compare-button">
                                                        <a href="{{route('add.shopping.cart',$proHot->id)}}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($proHot->pro_price,0,',','.') }} đ</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name"><a href="{{route('get.detail.product',[$proHot->pro_slug,$proHot->id])}}">{{$proHot->pro_name}}</a></h2>
                                        <p>{{$proHot->pro_description}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product end -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- our-product area end -->
        </div>
    </div>
    <!-- Hot product section end -->

    <!-- New product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm mới nhất</h2>
            </div>
            <!-- our-product area start -->
            @if(isset($productNews))
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">
                                <!-- single-product start -->
                                @foreach($productNews as $proNew)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">
                                            <div class="product-img">
                                                @if($proNew->pro_number ==0)
                                                    <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px">Tạm hết hàng</span>
                                                @endif
                                                @if($proNew->pro_sale)
                                                    <span style="position: absolute;font-size: 10px;background: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">{{$proNew->pro_sale }}%</span>
                                                @endif
                                                <a href="{{route('get.detail.product',[$proNew->pro_slug,$proNew->id])}}" target="_blank">

                                                    <img class="primary-image" src="{{pare_url_file($proNew->pro_avatar)}}" alt="" />
{{--                                                    <img class="secondary-image" src="{{pare_url_file($proNew->pro_avatar)}}" alt="" />--}}
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{pare_url_file($proNew->pro_avatar)}}" target="_blank" title="Phóng to"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="compare-button">
                                                                <a href="{{route('add.shopping.cart',$proNew->id)}}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($proNew->pro_price,0,',','.') }} đ</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="{{route('get.detail.product',[$proNew->pro_slug,$proNew->id])}}">{{$proNew->pro_name}}</a></h2>
                                                <p>{{$proNew->pro_description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product end -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!-- our-product area end -->
        </div>
    </div>
    <!-- New product section end -->

    <!-- View product section start -->
    <div id="product_view"></div>
    <!-- View product section end -->

    <!-- Related products purchased section start -->
    @include('components.product_suggest')
    <!-- Related products purchased section end -->

    <!-- News section start -->
    @if (isset($articleNews))
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Bài viết mới</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach($articleNews as $arNew)
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-post" style="margin-bottom: 40px">
                                    <div class="post-thumb">
                                        <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">
                                            <img src="{{asset(pare_url_file($arNew->a_avatar))}}" alt="" style="width: 370px;height: 280px" />
                                        </a>
                                    </div>
                                    <div class="post-thumb-info">
                                        <div class="postexcerpt">
                                            <p style="height: 40px;">{{$arNew->a_name}}</p>
                                            <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- single latestpost end -->
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- News section end -->

    <!-- Brand Logo Area start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel" style="display: flex">

                    <div style="margin-right: 10px" class="brand-item"><a href="#"><img src="/img/logo/logo-dmcl.png" alt="" /></a></div>
                    <div style="margin-right: 10px" class="brand-item"><a href="#"><img src="/img/logo/logo-hoangkien.png" alt="" /></a></div>
                    <div style="margin-right: 10px" class="brand-item"><a href="#"><img src="/img/logo/lazada.png" alt="" /></a></div>
                    <div style="margin-right: 10px" class="brand-item"><a href="#"><img src="/img/logo/logo-vienthong.png" alt="" /></a></div>
                    <div style="margin-right: 10px" class="brand-item"><a href="#"><img src="/img/logo/logo-hoangha.png" alt="" /></a></div>

                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            let routerRenderProduct = '{{route('post.product.view')}}'
            checkRenderProduct = false;
            $(document).on('scroll', function () {

                if ($(window).scrollTop() > 150 && checkRenderProduct == false) {
                    checkRenderProduct = true;
                    let products = localStorage.getItem('products')
                    products = $.parseJSON(products)
                    if(products.length >0)
                    {
                        $.ajax({
                            url : routerRenderProduct,
                            method: "POST",
                            data: {id :products},
                            success: function (result) {
                                console.log(result)
                                $("#product_view").html('').append(result.data)
                            }
                        })
                    }
                }
            })
        })
    </script>
@stop
