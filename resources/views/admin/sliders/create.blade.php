@extends('layout')
@section('title')
<h1>Cập nhật sản phẩm </h1>
@endsection
@section('contents')
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="mt-3">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="">Description</label>
                <input class="form-control" type="text" name="description">
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="image">
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
    <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('my-editor', options);
    </script>
    <button class="mt-3 btn btn-primary">Thêm mới</button>
</form>

@endsection
@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endsection