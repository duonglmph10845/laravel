@extends('layout')
@section('title')
<h1>Cập nhật category </h1>
@endsection
@section('contents')
<form class="form-horizontal registration-form" novalidate action="{{ route('admin.categories.update', [ 'id' => $data->id ]) }}" method="POST">
@csrf
<div class="mt-3">
<label for="">Name</label>
<input class="form-control" type="text" name="name" value="{{ $data->name }}">
</div>
<button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection