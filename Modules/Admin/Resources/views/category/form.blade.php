<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" value="{{old('name',isset($category->c_name) ? $category->c_name : '')}}" name="c_name">
        @if($errors->has('c_name'))
            <div class="error-text">
                {{$errors->first('c_name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label>Danh Mục</label>
        <select class="form-control" name ="c_parent_id">
            <option value="0" {{$category->c_parent_id == 0 ? 'selected' : ''}}> Danh mục cha </option>
            @foreach($menus as $menuParent)
                <option value="{{$menuParent->id}}"
                    {{$category->c_parent_id == $menuParent->id ? 'selected' : ''}}>
                    {{$menuParent->c_name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Icon</label>
        <input type="text" class="form-control" placeholder="fa fa-home" value="{{old('icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="c_icon">
        @if($errors->has('c_icon'))
            <div class="error-text">
                {{$errors->first('c_icon')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta Title</label>
        <input type="text" class="form-control" placeholder="Meta title" value="{{old('c_title_seo', isset($category->c_title_seo) ? $category->c_title_seo : '')}}" name="c_title_seo">
    </div>
    <div class="form-group">
        <label for="name">Meta Description</label>
        <input type="text" class="form-control" placeholder="Meta Description" value="{{old('c_description_seo', isset($category->c_description_seo) ? $category->c_description_seo : '')}}" name="c_description_seo">
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
