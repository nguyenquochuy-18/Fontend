<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    .error-text, .required
    {
        color: red !important;
    }
</style>
@if(\Session::has('danger'))
    <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px;top: 20px;left: 50%;transform: translateX(-50%);z-index: 99999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Thất bại!</strong> {{\Session::get('danger')}}
    </div>
@endif
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top: 200px">

    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

        <div class="panel panel-default" >
            <div class="panel-body" >

{{--                <form action="" class="form-horizontal" enctype="multipart/form-data" method="POST">--}}
{{--                @csrf--}}
{{--                    <div class="input-group">--}}
{{--                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>--}}
{{--                        <input id="user" required type="email" class="form-control" name="email" value="" placeholder="Email">--}}
{{--                    </div>--}}

{{--                    <div class="input-group" style="margin: 15px 0">--}}
{{--                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>--}}
{{--                        <input id="password" required type="password" class="form-control" name="password" placeholder="Password">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <!-- Button -->--}}
{{--                        <div class="col-sm-12 controls">--}}
{{--                            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Đăng nhập</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </form>--}}

                <form class="form-horizontal" action='' method="POST">
                    @csrf
                    <div id="legend" style="text-align: center">
                        <legend style="font-size: 20px" class="form-control"> Đăng nhập hệ thống</legend>
                    </div>
                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                        <div class="controls" style="margin: 10px 0">
                            <input type="text" id="email" name="email" placeholder="admin@gmail.com" value="{{old('email')}}" class="input-xlarge form-control">
                            @if($errors->has('email'))
                                <div class="error-text">
                                    {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Mật khẩu<span class="required">*</span></label>
                        <div class="controls" style="margin: 10px 0">
                            <input type="password" id="password" name="password" placeholder="******" class="input-xlarge form-control">
                            @if($errors->has('password'))
                                <div class="error-text">
                                    {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="control-group" style="margin-top: 10px">
                        <!-- Button -->
                        <div class="controls" style="margin: 10px 0">
                            <button class="btn btn-success">Đăng nhập</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div id="particles"></div>
