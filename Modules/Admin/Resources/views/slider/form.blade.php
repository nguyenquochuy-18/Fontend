
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="pro_name">Tên slider</label>
                <input type="text" class="form-control" Tên slider="minimal bags" value="{{old('name',isset($sliders->name) ? $sliders->name : '')}}" name="name">
                @if($errors->has('name'))
                    <div class="error-text">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_name">Đường link</label>
                <input type="text" class="form-control" placeholder="Đường link" value="{{old('url',isset($sliders->url) ? $sliders->url : '')}}" name="url">
                @if($errors->has('url'))
                    <div class="error-text">
                        {{$errors->first('url')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="form-group">
                    <a id="out_img1"  href="/img/no_image.png">
                        <img id="out_img" src="/img/no_image.png" alt="" style="width: 25%;height: 200px">
                    </a>
                </div>
                <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" id="input_img" name="avatar" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
