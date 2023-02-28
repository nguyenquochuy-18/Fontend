@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
            <li class="active">Thêm mới</li>
        </ol>

    </div>
    <div class="">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" placeholder="Tên danh mục" value="" name="c_name">
                @if($errors->has('c_name'))
                    <div class="error-text">
                        {{$errors->first('c_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="c_parent_id" >
                    <option value="0"> Danh mục cha </option>
                    @foreach($categories as $categorie)
                        <option value={{$categorie->id}}> {{$categorie->c_name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Icon</label>
                <input type="text" class="form-control" placeholder="fa fa-home" value="" name="c_icon">
            </div>
            <div class="form-group">
                <label for="name">Meta Title</label>
                <input type="text" class="form-control" placeholder="Meta title" value="" name="c_title_seo">
            </div>
            <div class="form-group">
                <label for="name">Meta Description</label>
                <input type="text" class="form-control" placeholder="Meta Description" value="" name="c_description_seo">
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </form>
    </div>
@stop
