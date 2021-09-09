@extends('layout')
@section('title')
<h1>Cập nhật invoives </h1>
@endsection
@section('contents')
<form action="{{ route('admin.invoice_details.update', [ 'id' => $data->id ]) }}" method="POST">
@csrf
<div class="mt-3">
<label for="">id Hđ</label>
<input class="form-control" type="text" name="invoice_id" value="{{ $data->invoice_id }}">
</div>
<div class="mt-3">
<label for="">Id sp</label>
<input class="form-control" type="text" name="product_id" value="{{ $data->product_id }}">
</div>
<div class="mt-3">
<label for="">Giá</label>
<input class="form-control" type="text" name="unit_price" value="{{ $data->unit_price }}">
</div>
<div class="mt-3">
<label for="">Số lượng</label>
<input class="form-control" type="text" name="quantity" value="{{ $data->quantity }}">
</div>
<button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection