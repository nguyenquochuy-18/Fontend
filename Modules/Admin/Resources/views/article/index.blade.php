@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.article')}}">Bài viết</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tên bài viết ..." name="name" value="{{\Request::get('name')}}">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý bài viết<a href="{{route('admin.get.create.article')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 20%">Tên bài viết</th>
                <th style="width: 100px">Hình ảnh</th>
                <th style="width: 20%">Mô tả</th>
                <th>Nổi bật</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($articles))
            @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td><a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}" target="_blank">{{$article->a_name}}</a>
                </td>
                <td>
                    <img src="{{ pare_url_file($article->a_avatar)}}" alt="" class="img img-responsive" style="height: 80px;width: 80px">
                </td>
                <td>{{$article->a_description}}</td>
                <td>
                    <a href="{{route('admin.get.action.article',['hot',$article->id])}}" class="label {{$article->getHot($article->c_hot)['class']}}">{{$article->getHot($article->c_hot)['name']}}</a>
                </td>
                <td>
                    <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                </td>
                <td>
                    {{$article->created_at->format('d-m-Y')}}
                </td>
                <td>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pen" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash"  style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="shop-content-bottom">
        <div class="shop-toolbar btn-tlbr">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="pages">
                    {!! $articles->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@stop
