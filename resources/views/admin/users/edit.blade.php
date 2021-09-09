@extends('layout')
@section('title')
<h1>Thêm mới users </h1>
@endsection
@section('contents')
<form action="{{ route('admin.users.update', [ 'user' => $data->id ]) }}" method="POST">
    @csrf
    <div class="mt-3">
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" value="{{ $data->name }}">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Email</label>
        <input class="form-control" type="text" name="email" value="{{ $data->email }}">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="">Address</label>
        <input class="form-control" type="text" name="address" value="{{ $data->address }}">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label class="mt-3" for="">Gender</label>
        <select class="form-control" name="gender" id="">
            <option {{ $data->gender ==1 ? "selected" : ""}} value="1">Male</option>
            <option {{ $data->gender ==0 ? "selected" : ""}} value="0">Female</option>
        </select>
    </div>
    <div>
        <label class="mt-3" for="">Role</label>
        <select class="form-control" name="role" id="">
            <option {{ $data->role ==1 ? "selected" : ""}} value="1">User</option>
            <option {{ $data->role ==2 ? "selected" : ""}} value="2">Admin</option>
        </select>
    </div>
    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection