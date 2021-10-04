@extends('layout')
@section('title')
<h1>Thêm mới category </h1>
@endsection
@section('contents')
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mt-3">
        <label for="">Tên danh mục</label>
        <input class="form-control" type="text" name="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group mt-3">
                        <label for="">Thêm danh mục cha</label><br>
                        <select class="" name="parent_id">
                            <option value="0" {{ old('parent_id') == 0 ? 'selected' : '' }}>Select Parent Category
                            </option>
                            {!! $htmlOptions !!}
                        </select>
                    </div>
    <button class="mt-3 btn btn-primary">Thêm mới</button>
</form>
@endsection