<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        #menu li {
            color: #212121;
            float: left;
            height: 50px;
            padding-top: 15px;
            padding-right: 15px;
            line-height: 50px;
            font-family: t-medium;
            text-transform: uppercase;

        }

        #menu ul {
            list-style-type: none;
            overflow: hidden;
            width: 100%;
        }

        #menu ul a:hover {
            -webkit-transition: 0.3s ease;
            transition: 0.3s ease;
            border-bottom: 1px solid #212121;
            width: 30px;
            margin-right: 9px;
        }

        form.example input[type=text] {
            border: none;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: while;
        }

        form.example button {
            float: left;
            width: 20%;
            background: #444444;
            color: while;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <header style="background: #F6F3E4;  border-top: 1px solid #E3DDBB;   border-bottom: 1px solid #E3DDBB; padding-bottom: 15px;">
        <div class="container">
            <div class="top-header">
                <div class="row">
                    <div class="col-md-4" style="color: rgb(204, 204, 204); padding-top: 7px; padding-left: 50px;">
                        <span style="font-size: 18px; padding-top: 15px;">307 Đê La Thành - Đống Đa - Hà Nội</span>
                    </div>
                    <div class="col-md-3" style="color: rgb(204, 204, 204); padding-top: 7px; padding-left: 80px;">
                        <i class=""></i>
                        <i class="fas fa-clock" style="font-size:16px;"></i> <span>08:00 - 17:00</span>
                    </div>
                    <div class="col-md-5" style="color: #212121; padding-top: 7px;">

                        @if(!Auth::check())
                        <a style="text-transform: uppercase;color: #212121; padding-left: 10px;padding-right: 10px; text-decoration: none;" href="{{ route('dang_ky') }}"><img src="/images/admin/products/account.png" alt=""> &nbsp;Đăng kí</a>&nbsp;&nbsp;&nbsp;
                        <a style="text-transform: uppercase;color: #212121;padding-right: 10px;border-left: 1px solid #E3DDBB; text-decoration: none;" href="{{ route('auth.getLoginForm') }}">
                            <img src="/images/admin/products/account.png" alt=""> &nbsp;Đăng nhập</a>

                        @else
                        <a style="text-transform: uppercase;color: #212121; padding-left: 10px;padding-right: 10px; text-decoration: none;" href="{{ route('user-profile', [ 'id' => auth()->user()->id ]) }}"><img src="/images/admin/products/account.png" alt=""> &nbsp;{{ Auth::user()->name}}</a>&nbsp;&nbsp;&nbsp;
                        <a style="text-transform: uppercase;color: #212121; padding-left: px;padding-right: 10px; text-decoration: none;" href="{{ route('auth.logout') }}"> &nbsp;Đăng xuất</a>&nbsp;&nbsp;&nbsp;
                        @if(auth()->user()->role == config('common.user.role.admin'))
                        <a style="text-transform: uppercase;color: #212121; text-decoration: none;" href="{{ route('admin.users.index') }}"> &nbsp;Quản trị</a>&nbsp;&nbsp;&nbsp;

                        @endif
                        @endif

                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="/images/admin/products/Summer-1846x523-1.png" width="398px" height="100px" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="menu">
                            <ul>
                                <li>
                                    <a href="" style="color: #212121; text-decoration: none;">Trang Chủ</a>
                                </li>
                                @foreach ($category as $cate)
                                <li>
                                    <a href="{{ route('product.detail', [ 'category' => $cate->id ])}}" style=" text-decoration: none;color: #212121; ">
                                        {{ $cate->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom" style="padding-bottom: 7px;">
                <div class="row">
                    <div class="col-md-8" style="padding-left: 250px;">
                        <form action="{{ route('index') }}" method="GET" class="example" style="margin:auto;max-width:600px">
                            <input type="text" placeholder="Search.." name="keyword" value="{{ old('keyword') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4" style="padding-left: 100px;">
                        <a style="text-decoration: none;" href="{{ route('cart') }}" title="Giỏ hàng" class="header-cart-link is-small">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span style="color: #FF0000" class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>


                        </a>
                    </div>
                </div>
            </div>
        </div>

    </header>
</body>

</html>