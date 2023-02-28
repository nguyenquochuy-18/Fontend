<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm vừa xem</h2>
        </div>
        <!-- our-product area start -->
        @if(isset($products))
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($products as $proHot)
                            <div class="col-lg-3 col-md-3">
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
                                            <img class="secondary-image" src="{{pare_url_file($proHot->pro_avatar)}}" alt="" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{pare_url_file($proHot->pro_avatar)}}" title="Phóng to"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{route('add.shopping.cart',$proHot->id)}}" title="Thêm giỏ hàng"><i class="icon-bag"></i></a>
                                                    </div>
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
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
    @endif
    <!-- our-product area end -->
    </div>
</div>
