<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên Logo</label>
        <input type="text" class="form-control" placeholder="Tên logo" value="{{old('name',isset($icon->name) ? $icon->name : '')}}" name="name">
        @if($errors->has('name'))
            <div class="error-text">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="name">Tên slug</label>
        <input type="text" class="form-control" placeholder="Tên slug" value="{{old('slug',isset($icon->slug) ? $icon->slug : '')}}" name="slug">
        @if($errors->has('slug'))
            <div class="error-text">
                {{$errors->first('slug')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Logo</label>
        <input type="text" class="form-control" placeholder="logo" value="{{old('icon',isset($icon->icon) ? $icon->icon : '')}}" name="icon">
        @if($errors->has('icon'))
            <div class="error-text">
                {{$errors->first('icon')}}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>
