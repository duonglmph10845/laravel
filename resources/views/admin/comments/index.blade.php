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
                <td>Hàng hóa</td>
                <td>Số bình luận</td>
                <td>Mới nhất</td>
                <td>Quản lý</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><img src="{{ $item->image }}" width="100px" height="100px" alt=""></td>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->ngay_bl }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.comments.ct_comment', [ 'comment' => $item->product_id ])}}">Chi tiết</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
    @endsection
</body>

</html>