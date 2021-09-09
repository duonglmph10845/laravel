@extends('layout')
@section('title')
<h1>Cập nhật invoives </h1>
@endsection
@section('contents')
<form action="{{ route('admin.invoices.update', [ 'invoice' => $data->id ]) }}" method="POST">
@csrf
<div class="mt-3">
<label for="">Name</label>
<input class="form-control" type="text" name="name" value="{{ $data->user_id }}">
</div>
<div class="mt-3">
<label for="">Email</label>
<input class="form-control" type="text" name="email" value="{{ $data->number }}">
</div>
<div class="mt-3">
<label for="">Address</label>
<input class="form-control" type="text" name="" value="{{ $data->address }}">
</div>
<div class="mt-3">
<label for="">total price</label>
<input class="form-control" type="text" name="" value="{{ $data->total_price }}">
</div>
<div class="mt-3">
<label for="">status</label>
<select class="form-control" name="status" id="">
            <option {{ $data->status ==1 ? "selected" : ""}} value="1">Chờ duyệt </option>
            <option {{ $data->status ==2 ? "selected" : ""}} value="2">Đang xử lý</option>
            <option {{ $data->status ==3 ? "selected" : ""}} value="3">Đang giao hàng</option>
            <option {{ $data->status ==4 ? "selected" : ""}} value="4">Đã giao hàng</option>
            <option {{ $data->status ==5 ? "selected" : ""}} value="5">Đã huy</option>
            <option {{ $data->status ==6 ? "selected" : ""}} value="6">Chuển hoàn</option>
        </select>
</div>
<button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection