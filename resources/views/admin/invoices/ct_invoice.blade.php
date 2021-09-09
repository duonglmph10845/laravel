<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layout')
    @section('title')
    <h1>Quản lý hóa đơn </h1>
    @endsection
    @section('contents')
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <td>Id</td>
                <td>Sản phẩm</td>
                <td>Số điện thoại</td>
                <td>Địa chỉ</td>
                <td>
                    Trạng thái
                </td>
                <td>Giá</td>
                <td><a href="">
                        Thêm mới</a></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><img src="{{ $item->image }}" alt="" width="100px" height="100px"></td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    @if($item->status == config('common.invoice.status.dang_xu_ly'))
                    Đang xử lý
                    @elseif($item->status == config('common.invoice.status.cho_duyet'))
                    Chờ duyệt
                    @elseif($item->status == config('common.invoice.status.dang_giao_hang'))
                    Đang giao hàng
                    @elseif($item->status == config('common.invoice.status.da_giao_hang'))
                    Đã giao hàng
                    @elseif($item->status == config('common.invoice.status.da_huy'))
                    Đã hủy
                    @elseif($item->status == config('common.invoice.status.chuyen_hoan'))
                    Chuyển hoàn
                    @endif

                </td>
                <td>{{ $item->unit_price }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.invoices.edit', [ 'invoice' => $item->id ])}}">Update</a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>
                    <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Xóa bản ghi này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.invoices.delete', [ 'invoice' => $item->id ])}}" method="POST">
                                        @csrf
                                        <button tybe="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>

</html>