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
    <h1>Quản lý hóa đơn ct </h1>
    @endsection
    @section('contents')
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <td>Id</td>
                <td>Id hóa đơn</td>
                <td>Id sản phẩm</td>
                <td>Đơn giá</td>
                <td>
                   Số lượng
                </td>
                <td><a href="">
                        Thêm mới</a></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->invoice_id }}</td>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.invoice_details.edit', [ 'id' => $item->id ])}}">Update</a>
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
                                    <form action="{{ route('admin.invoice_details.delete', [ 'id' => $item->id ])}}" method="POST">
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
    {{$data->links()}}
    @endsection
</body>

</html>