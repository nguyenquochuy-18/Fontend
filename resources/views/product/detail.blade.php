@extends('layouts.app')
@section('content')
    <style>
        .product-tab-content
        {
            overflow: hidden;
        }
        .product-tab-content h2 {font-size: 24px !important;}
        .product-tab-content h3 {font-size: 20px !important;}
        .product-tab-content h4 {font-size: 18px !important;}
        .product-tab-content img
        {
            margin: 0 auto;
            text-align: center;
            max-width: 100%;
            display: block;
        }
        .list_start:hover
        {
            cursor: pointer;
        }
        .list_text
        {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }
        .list_text:after
        {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .list_start .rating_active , .pro-rating .active
        {
            color: #ff9705;
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
                            <li class="category3"><span>{{$productDetail->pro_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area" id="content_product" data-id="{{$productDetail->id}}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="/img/product-details/big-1-1.jpg" data-zoom-image="/img/product-details/ex-big-1-1.jpg"><img src="/img/product-details/th-1-1.jpg" alt="zo-th-1" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-1-2.jpg" data-zoom-image="/img/product-details/ex-big-1-2.jpg"><img src="/img/product-details/th-1-2.jpg" alt="zo-th-2"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-1-3.jpg" data-zoom-image="/img/product-details/ex-big-1-3.jpg"><img src="/img/product-details/th-1-3.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-4.jpg" data-zoom-image="/img/product-details/ex-big-4.jpg"><img src="/img/product-details/th-4.jpg" alt="zo-th-4"></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-5.jpg" data-zoom-image="/img/product-details/ex-big-5.jpg"><img src="/img/product-details/th-5.jpg" alt="zo-th-5" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-6.jpg" data-zoom-image="/img/product-details/ex-big-6.jpg"><img src="/img/product-details/th-6.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-7.jpg" data-zoom-image="/img/product-details/ex-big-7.jpg"><img src="/img/product-details/th-7.jpg" alt="ex-big-3" /></a>
                                </li>
                                <li class="">
                                    <a href="#" class="elevatezoom-gallery" data-image="/img/product-details/big-8.jpg" data-zoom-image="/img/product-details/ex-big-8.jpg"><img src="/img/product-details/th-8.jpg" alt="ex-big-3" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{$productDetail->pro_name}}</a></h1>
                                <div class="rating-price">
                                    <?php
                                    $age = 0;
                                    if ($productDetail->pro_total_rating)
                                    {
                                        $age = round($productDetail->pro_total_number / $productDetail->pro_total_rating,1);
                                    }

                                    ?>
                                    <div class="pro-rating">
                                        @for($i = 1 ; $i <= 5 ; $i ++)
                                        <a href="#"><i class="fa fa-star {{$i <= $age ? 'active' : ''}}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{number_format($productDetail->pro_price,0,',','.')}}đ</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{$productDetail->pro_description}}</p>
                                </div>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="add-to-cart">
                                            <a href="{{route('add.shopping.cart',$productDetail->id)}}">Thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="/img/single-share.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab"><h3>Chi tiết sản phẩm</h3></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {!!$productDetail->pro_content!!}
                            </div>
                        </div>
                        <!-- star -->

                        <div class="component_rating" style="margin-bottom: 20px">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="component_rating_content" style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede;padding: 5px">
                                <div class="col-sm-3">
                                    <div class="rating-block">
                                        <h2 class="bold padding-bottom-7">{{$age}} <small>/ 5</small></h2>
                                        <div class="pro-rating">
                                            @for($i = 1 ; $i <= 5 ; $i ++)
                                                <button type="button"><i class=" fa fa-star  {{$i <= $age ? 'active' : ''}}"></i>
                                                </button>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    @foreach($arrayRatings as $key=>$arrayRating)
                                    <div class="pull-left">
                                            <?php
                                            $itemAge = round(($arrayRating['total'] / $productDetail->pro_total_rating) * 100,0);
                                            ?>
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">{{$key}} <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{$itemAge}}%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;">{{$arrayRating['total']}} đánh giá ({{$itemAge}}%)</div>

                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-3" >
                                    <a href="#" class="js_rating_action" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px"> Gửi đánh giá của bạn</a>
                                </div>
                            </div>
                            <?php
                            $listRatingText = [
                                1 => 'Không thích',
                                2 => 'Tạm được',
                                3 => 'Bình thường',
                                4 => 'Rất tốt',
                                5 => 'tuyệt vời quá',
                            ];
                            ?>
                            <div class="form_rating hide" >
                                <div style="display: flex;margin-top: 15px;margin-bottom: 15px;font-size: 15px">
                                    <p style="margin-bottom: 0">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px" class="list_start">
                                @for($i = 1 ; $i <= 5 ;$i ++)
                                            <i class="fa fa-star" data-key="{{$i}}"></i>
                                        @endfor
                            </span>
                                    <span class="list_text">Tốt</span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-bottom: 15px">
                                    <textarea name="" id="ra_content" class="form-control" cols="30" rows="3"></textarea>
                                </div>
                                <div style="margin-bottom: 15px">
                                    <a class="js_rating_product" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px" href="{{route('post.rating.product',$productDetail->id)}}">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating">
                            @if(isset($ratings))
                                @foreach($ratings as $rating)
                                    <div class="rating_item" style="margin-bottom: 10px">
                                        <div>
                                            <span style="color: #333;font-weight: bold;text-transform: capitalize">{{isset($rating->user->name) ? $rating->user->name : ''}}</span>
                                            <a href="" style="color: #2ba832"><i class="fa fa-check-circle"></i>Đã mua hàng tại website</a>
                                        </div>
                                        <p style="margin-bottom: 0">
                                            <span class="pro-rating">
                                                @for($i = 1 ;$i <= 5 ;$i ++)
                                                    <i class="fa fa-star {{$i <= $rating->ra_number ? 'active' : ''}}"></i>
                                                @endfor
                                            </span>
                                            <span>{{$rating->ra_content}}</span>

                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock"></i> {{$rating->created_at}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            let listStar = $(".list_start .fa");
            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'tuyệt vời quá',
            }

            listStar.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key')
                listStar.removeClass('rating_active')

                $(".number_rating").val(number)
                $.each(listStar, function (key, value) {
                    if (key + 1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }

                })
                $(".list_text").text('').text(listRatingText[number]).show();
            });

            $(".js_rating_action").click(function (event) {
                event.preventDefault()
                if ($(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide')
                }else{$(".form_rating").addClass('hide').removeClass('active')}

            })

            $(".js_rating_product").click(function (event) {
                event.preventDefault()
                let content = $("#ra_content").val()
                let number = $(".number_rating").val()
                let url = $(this).attr('href')
                if (number)
                {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:{
                            number: number,
                            r_content: content
                        }
                    }).done(function(result) {
                       if (result.code == 1)
                       {
                           alert("Gửi đánh giá thành công")
                           location.reload()
                       }
                    });
                }

            })

            // luu id san pham vao storage
            let idProduct = $("#content_product").attr('data-id');

            //lấy giá trị storage
            let products = localStorage.getItem('products');

            // var arrayProduct;
            if (products == null) {
                arrayProduct = new Array();
                arrayProduct.push(idProduct)
                localStorage.setItem('products', JSON.stringify(arrayProduct))
            } else {
                // chuyển về mảng
                products = $.parseJSON(products)
                if (products.indexOf(idProduct) == -1) {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }
                console.log(products)
            }
        });
    </script>
@stop
