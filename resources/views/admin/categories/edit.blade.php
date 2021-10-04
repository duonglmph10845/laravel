@extends('layout')
@section('title')
<h1>Cập nhật category </h1>
@endsection
@section('contents')
<form class="form-horizontal registration-form" novalidate action="{{ route('admin.categories.update', [ 'id' => $data->id ]) }}" method="POST">
@csrf
<div class="mt-3">
<label for="">Danh mục</label>
<input class="form-control" type="text" name="name" value="{{ $data->name }}">
</div>
<div class="form-group mt-3">
                        <label for="">Thêm danh mục cha</label><br>
                        <select class="" name="parent_id">
                            <option value="0" {{ old('parent_id') == 0 ? 'selected' : '' }}>Select Parent Category
                            </option>
                            {!! $htmlOptions !!}
                        </select>
                    </div>
<button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection