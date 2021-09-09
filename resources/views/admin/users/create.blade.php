@extends('layout')
@section('title')
<h1>Thêm mới users </h1>
@endsection
@section('contents')
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="mt-5">
        <label for="">Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-5">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-5">
        <label for="">Password</label>
        <input class="form-control" type="password" name="password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-5">
        <label for="">Address</label>
        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-5">
        <label for="">Gender</label>
        <select name="gender" id="">
            <option value="{{ config('common.user.gender.male') }}" {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male') ? "selected" : "" }}>
                Male
            </option>
            <option value="{{ config('common.user.gender.female') }}" {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female') ? "selected" : "" }}>Female</option>
        </select>
        @error('gender')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-5">
        <label for="">Role</label>
        <select name="role" id="">
            <option value="{{ config('common.user.role.user') }}" {{ old('role') == config('common.user.role.user') ? "selected" : "" }}>User</option>
            <option value="{{ config('common.user.role.admin') }}" {{ old('role') == config('common.user.role.admin') ? "selected" : "" }}>Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">Create</button>
</form>

@endsection