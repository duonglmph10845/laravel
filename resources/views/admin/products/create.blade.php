@extends('layout')
@section('title')
<h1>Cập nhật sản phẩm </h1>
@endsection
@section('contents')
<form action="{{ route('admin.products.store') }}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="mt-3">
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        @error('name')
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
            <input id="thumbnail" class="form-control" type="text" name="image" value="{{ old('image') }}">
        </div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Price</label>
        <input class="form-control" type="text" name="price"  value="{{ old('price') }}">
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Quantity</label>
        <input class="form-control" type="text" name="quantity"  value="{{ old('quantity') }}">
        @error('quantity')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Loại hàng</label>
        <select name="category_id" id="">
            @foreach ($data as $item)
            <option value="{{ $item->id}}">{{ $item->name}}</option>
            @endforeach
        </select>
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