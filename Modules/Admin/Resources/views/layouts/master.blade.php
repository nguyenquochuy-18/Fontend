<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/favicon.ico">

    <title>Admin System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('theme_admin/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="image" style="padding: 5px">
                <img style="width: 50px" src="{{pare_url_file(get_data_user('admins','avatar'))}}" class="img-circle elevation-2" alt="User Image">
                <a style="color: white;margin-left: 10px"  class="" href="{{route('admin.get.list.admin')}}">Xin chào: {{get_data_user('admins','name')}}</a>
            </div>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li><a href="{{route('get.logout.admin')}}">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{\Request::route()->getName() == 'admin.home' ? 'active': ''}}">
                    <a href="{{route('admin.home')}}">Trang tổng quan</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.category' ? 'active': ''}}"><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.icon' ? 'active': ''}}"><a href="{{route('admin.get.list.icon')}}">Logo</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.slider' ? 'active': ''}}"><a href="{{route('admin.get.list.slider')}}">Slider</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.product' ? 'active': ''}}"><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.rating' ? 'active': ''}}"><a href="{{route('admin.get.list.rating')}}">Đánh giá</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.article' ? 'active': ''}}"><a href="{{route('admin.get.list.article')}}">Tin tức</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.transaction' ? 'active': ''}}"><a href="{{route('admin.get.list.transaction')}}">Đơn hàng</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.warehouse.list' ? 'active': ''}}"><a href="{{route('admin.get.warehouse.list')}}">Kho</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.user' ? 'active': ''}}"><a href="{{route('admin.get.list.user')}}">Thành viên</a></li>
                <li class="{{\Request::route()->getName() == 'admin.get.list.contact' ? 'active': ''}}"><a href="{{route('admin.get.list.contact')}}">Liên hệ</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thành công!</strong> {{\Session::get('success')}}
                </div>
            @endif
            @if(\Session::has('danger'))
                 <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thất bại!</strong> {{\Session::get('danger')}}
                </div>
             @endif

            @yield('content')

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>


<script>
    function readURL(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e){
                $('#out_img').attr('src',e.target.result);
                $('#out_img1').attr('href',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input_img").change(function (){
        readURL(this);
    })
</script>



@yield('script')
</body>
</html>
