@extends('layouts.app')
@section('content')
    <style>
        .sidebar-content .active {
            color: #288ad6;
        }
    </style>
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
                            @if(isset($cateProduct->c_name))
                                <li class="category3"><span>{{$cateProduct->c_name}}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <section>
        <div class="lst-quickfilter q-manu " style="text-align: center">
            @if(isset($icon))
                @foreach($icon as $icons)
                    @if($icons->avatar !=null)
                        <a href="{{$icons->slug}}" data-href="{{$icons->slug}}" data-index="0"
                           class="box-quicklink__item bd-radius quicklink-logo">
                            <img style="border: 1px solid #999;border-radius: 50px;margin-bottom: 10px;height: 40px"
                                 src="{{$icons->avatar}}" class="no-text">
                        </a>
                    @endif
                @endforeach
            @endif
        </div>
    </section>

    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="/img/bar-ping.png" alt=""></div>
                                <h2>Lọc điều kiện</h2>
                            </div>
                        </aside>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a class="{{Request::get('price') == 1 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 1])}}">Dưới 2 triệu</a></li>
                                <li><a class="{{Request::get('price') == 2 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 2])}}">Từ 2 - 4 triệu</a></li>
                                <li><a class="{{Request::get('price') == 3 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 3])}}">Từ 4 - 7 triệu</a></li>
                                <li><a class="{{Request::get('price') == 4 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 4])}}">Từ 7 - 13 triệu</a></li>
                                <li><a class="{{Request::get('price') == 5 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 5])}}">Từ 13 - 20 triệu</a></li>
                                <li><a class="{{Request::get('price') == 6 ? 'active' : ''}}"
                                       href="{{request()->fullUrlWithQuery(['price'=> 6])}}">Trên 20 triệu</a></li>
                            </ul>
                        </aside>
{{--                        <aside class="widge-topbar">--}}
{{--                            <div class="bar-title">--}}
{{--                                <div class="bar-ping"><img src="/img/bar-ping.png" alt=""></div>--}}
{{--                                <h2>Tags</h2>--}}
{{--                            </div>--}}
{{--                            <div class="exp-tags">--}}
{{--                                <div class="tags">--}}
{{--                                    <a href="#">camera</a>--}}
{{--                                    <a href="#">mobile</a>--}}
{{--                                    <a href="#">electronic</a>--}}
{{--                                    <a href="#">destop</a>--}}
{{--                                    <a href="#">tablet</a>--}}
{{--                                    <a href="#">accessories</a>--}}
{{--                                    <a href="#">camcorder</a>--}}
{{--                                    <a href="#">laptop</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left">
                                <form class="tree-most" id="form_order" method="get">
                                    <div class="orderby-wrapper pull-right">
                                        <label>Sắp xếp</label>
                                        <select name="orderby" class="orderby">
                                            <option
                                                {{Request::get('orderby') == "md" || !Request::get('orderby') ? "selected = 'selected'" : ""}} value="md"
                                                selected="selected">Mậc định
                                            </option>
                                            <option
                                                {{Request::get('orderby') == "desc" ? "selected = 'selected'" : ""}} value="desc">
                                                Mới nhất
                                            </option>
                                            <option
                                                {{Request::get('orderby') == "asc" ? "selected = 'selected'" : ""}} value="asc">
                                                Sản phẩm cũ
                                            </option>
                                            <option
                                                {{Request::get('orderby') == "price-max" ? "selected = 'selected'" : ""}} value="price-max">
                                                Giá tăng dần
                                            </option>
                                            <option
                                                {{Request::get('orderby') == "price-min" ? "selected = 'selected'" : ""}} value="price-min">
                                                Giá giảm dần
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="two-product">
                                                <!-- single-product start -->
                                                <div class="single-product">
                                                    {{--                                                <span class="sale-text">Sale</span>--}}
                                                    @if($product->pro_number ==0)
                                                        <span
                                                            style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px">Tạm hết hàng</span>
                                                    @endif
                                                    @if($product->pro_sale)
                                                        <span
                                                            style="position: absolute;font-size: 10px;background: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;right: 0">{{$product->pro_sale }}%</span>
                                                    @endif
                                                    <div class="product-img">
                                                        <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"
                                                           target="_blank">
                                                            <img class="primary-image"
                                                                 src="{{pare_url_file($product->pro_avatar)}}" alt=""/>
                                                            <img class="secondary-image"
                                                                 src="{{pare_url_file($product->pro_avatar)}}" alt=""/>
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="{{pare_url_file($product->pro_avatar)}}"
                                                                   target="_blank" title="Phóng to"><i
                                                                        class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="compare-button">
                                                                        <a href="{{route('add.shopping.cart',$product->id)}}"
                                                                           title="Add to Cart"><i class="icon-bag"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{number_format($product->pro_price,0,',','.')}}đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a
                                                                href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a>
                                                        </h2>
                                                        <p>{{$product->pro_description}}</p>
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- shop toolbar start -->
                            <div class="shop-content-bottom">
                                <div class="shop-toolbar btn-tlbr">
                                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                        <div class="pages">
                                            {!! $products->appends($query)->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop toolbar end -->
                        </div>
                    </div>
                    <!-- right sidebar end -->
                </div>
            </div>
        </div>
        <!-- shop-with-sidebar end -->
        <!-- Brand Logo Area Start -->
        <div class="brand-area">
            <div class="container">
                <div class="row">
                    <div class="brand-carousel">
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg1-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg2-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg3-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg4-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg5-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg2-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg3-brand.jpg" alt=""/></a></div>
                        <div class="brand-item"><a href="#"><img src="/img/brand/bg4-brand.jpg" alt=""/></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Logo Area End -->
        @stop

        @section('script')
            <script>
                $(function () {
                    $('.orderby').change(function () {
                        $("#form_order").submit();

                    })
                })
            </script>
@stop
