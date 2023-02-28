@extends('layouts.app')
@section('content')
    <style>
        .article_content
        {
            overflow: hidden;
        }
        .article_content h2 {font-size: 24px !important;}
        .article_content h3 {font-size: 20px !important;}
        .article_content h4 {font-size: 18px !important;}
        .article_content img
        {
            margin: 0 auto;
            text-align: center;
            max-width: 100%;
            display: block;
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
                            <li class="home">
                                <a href="{{route('get.list.article')}}">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{$articleDetail->a_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="article_content">
                        <h1>{{$articleDetail->a_name}}</h1>
                        <p>{{$articleDetail->a_description}}</p>
                        <div>
                            {!!$articleDetail->a_content  !!}
                        </div>
                    </div>
                    <h4>Bài viết khác</h4>
                    @include('components.article')
                </div>
                <div class="col-sm-3">
                    <h5>Bài viết nổi bật</h5>
                    <div class="list_article_hot">
                        @include('components.article_hot')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-details end -->
@stop
