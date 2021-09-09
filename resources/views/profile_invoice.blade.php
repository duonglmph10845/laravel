<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Document</title>
    <style>
        #sidebar {
            /* don't forget to add all the previously mentioned styles here too */
            background: #7386D5;
            color: #000000;
            transition: all 0.3s;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            color: #000000;
            text-decoration: none;
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        ul ul a {
            text-decoration: none;
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }
        }

        .wrapper {
            display: flex;
            align-items: stretch;
        }

        #sidebar {
            min-width: 350px;
            max-width: 350px;
        }

        #sidebar.active {
            margin-left: 250px;
        }

        #sidebar {
            min-width: 350px;
            max-width: 350px;
        }
    </style>
</head>

<body>
    @include('header')
    <section style="background: #F6F3E4; padding-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="wrapper">
                        <!-- Sidebar -->
                        <nav id="sidebar">
                            <ul class="list-unstyled components">

                                <li>
                                    <a href="{{ route('user-profile', [ 'id' => auth()->user()->id ]) }}">Thông tin tài khoản</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile-invoice', [ 'id' => auth()->user()->id ])}}">Đơn hàng</a>
                                </li>
                                <li>
                                    <a href="{{ route('index')}}">Thoát</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8">
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
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $item)
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
                                <td>{{ $item->total_price }}</td>
                                <td>
                                    <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Hủy</button>
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
                                                    Hủy đơn hàng này?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('invoice-delete', [ 'id' => $item->id ])}}" method="POST">
                                                        @csrf
                                                        <button tybe="submit" class="btn btn-danger">Hủy</button>
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
                </div>
            </div>
        </div>
    </section>
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>