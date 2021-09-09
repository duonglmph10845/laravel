@extends('layout')
@section('title')
<h1>Thêm mới category </h1>
@endsection
@section('contents')
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="mt-3">
        <label for="">Name</label>
        <input class="form-control" type="text" name="name">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Thêm mới</button>
</form>
@endsection