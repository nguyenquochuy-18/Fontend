@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.icon')}}">Icon</a></li>
            <li class="active">Danh sách</li>
        </ol>

    </div>
    <div class="table-responsive">
        <h2>Quản lý logo</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên Logo</th>
                <th>Tên slug</th>
                <th>Logo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($icons))
            @foreach($icons as $icon)
            <tr>
                <td>{{$icon->id}}</td>
                <td>{{$icon->name}}</td>
                <td>{{$icon->slug}}</td>
                <td>{{$icon->avatar}}</td>
                <td>
                    <a href="{{route('admin.get.action.icon',['active',$icon->id])}}" class="label {{$icon->getStatus($icon->active)['class']}}">{{$icon->getStatus($icon->active)['name']}}</a>
                </td>
                <td>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.edit.icon',$icon->id)}}"><i class="fas fa-pen" style="font-size: 11px;margin-right: 3px"></i>Cập nhật</a>
                    <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" href="{{route('admin.get.action.icon',['delete',$icon->id])}}"><i class="fas fa-trash" style="font-size: 11px;margin-right: 3px"></i>Xóa</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function removeRow(id, url)
        {
            if(confirm('Bạn có chắc muốn xóa không?')){
                $.ajax({
                    type: 'DELETE',
                    datatype: 'JSON',
                    data: {id},
                    url: url,
                    success: function (result){
                        if (result.error == false)
                        {
                            alert(result.message);
                            location.reload();
                        }else {
                            alert('Xóa lỗi vui lòng thử lại')
                        }
                    }
                })
            }
        }

    </script>
@stop
