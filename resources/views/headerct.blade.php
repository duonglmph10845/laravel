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
    <header style="background: #F6F3E4;  border-bottom: 1px solid #E3DDBB; padding-bottom: 15px;">
        <div class="container">
            <div class="top-header">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4" style="color: #212121;">
                        <a style="text-transform: uppercase;color: #212121; padding-left: 10px;padding-right: 10px; text-decoration: none;" href=""><img src="/images/admin/products/account.png" alt=""> &nbsp;Đăng kí</a>&nbsp;&nbsp;&nbsp;
                        <a style="text-transform: uppercase;color: #212121;padding-right: 10px;border-left: 1px solid #E3DDBB; text-decoration: none;" href="">
                            <img src="/images/admin/products/account.png" alt=""> &nbsp;Đăng nhập</a>

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
                                @foreach ($datat as $cate)
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
                        <form class="example" action="" style="margin:auto;max-width:600px">
                            <input type="text" placeholder="Search.." name="search2">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-4" style="padding-left: 100px;">
                        <a style="text-decoration: none;" href="http://thoitrang3.giaodienwebmau.com/gio-hang/" title="Giỏ hàng" class="header-cart-link is-small">


                            <span class="header-cart-title">
                                Giỏ hàng / <span class="cart-price"><span class="woocommerce-Price-amount amount">0<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            </span>

                            <i class="icon-shopping-bag" data-icon-label="0">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </header>
</body>

</html>
@foreach ($datattt as $item)
                    <b>{{ $item->name }}</b>
                    <span style="float:right;font-size:10px">{{ $item->ngay_bl }}</span>
                    <p class="m_text">{{ $item->noi_dung }}</p>
                    @endforeach
<!-- 
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .container {
        margin: 0px auto;
    }

    .menu ul{
    background-color: #232323;
    height: 40px;
}
.menu ul li{
    font-size: 18px;
   list-style: none; 
   display: inline-block;
   padding-left: 30px;
   padding-right: 30px;
   border: 1px solid #3a3a3a;
}
.menu ul li:hover{
    background-color: #383838;
}
.menu ul li a{
    text-decoration: none;
    color: #ffffff;
    line-height: 40px;
}
</style>
<div class="containe" style="background-color: #232323; height: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="color: rgb(204, 204, 204); padding-top: 7px;">
                <span style="font-size: 18px; padding-top: 15px;">307 Đê La Thành - Đống Đa - Hà Nội</span>
            </div>
            <div class="col-md-2" style="color: rgb(204, 204, 204); padding-top: 7px;">
                <i class=""></i>
                <i class="fas fa-clock" style="font-size:16px;"></i> <span>08:00 - 17:00</span>
            </div>
            <div class="col-md-2" style="color: rgb(204, 204, 204); padding-top: 7px;">
                <i class="fas fa-phone-alt" style="font-size:16px;"></i> <span>0972.939.830</span>
            </div>
            <div class="col-md-4" style="padding-left: 60px; padding-top: 7px;">
                
                    <a style="color: #fff;" href=""><i class="fas fa-sign-out-alt"></i> &nbsp;Đăng kí</a>&nbsp;&nbsp;&nbsp;
                    <a style="color: #fff;" href=""><i class="fas fa-sign-in-alt"></i> &nbsp;Đăng nhập</a>
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="">
                <i class="fas fa-search" style="padding: 10px; margin-top: 20px; background-color: #383838; width: 50px; border-radius: 0 20px 20px 0; height: 40px; font-size: 25px; color:rgb(204, 204, 204);"></i>
                <input type="text" placeholder="Nhập tên sản phẩm..." style="border: none; margin-top: 20px;">
            </form>
        </div>
        <div class="col-md-4">
            <img src="/images/admin/products/Summer-1846x523-1.png" width="398px" height="100px" alt="">
        </div>
        <div class="col-md-4" style="padding-top: 35px;">
            <a href="http://thoitrang3.giaodienwebmau.com/gio-hang/" title="Giỏ hàng" class="header-cart-link is-small">


                <span class="header-cart-title">
                    Giỏ hàng / <span class="cart-price"><span class="woocommerce-Price-amount amount">0<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                </span>

                <i class="icon-shopping-bag" data-icon-label="0">
                </i>
            </a>
        </div>
    </div>
</div>
<div class="containe" style="background-color: #232323; height: 40px;">
    <div class="container">
        <div class="row">
            <div class="menu">
                <ul>
                    <li>
                        <a href="?page=id" style="color: white;">Trang Chủ</a>
                    </li>
                    @foreach ($datat as $cate)
                    <li>
                        
                        <a href="">
                            {{ $cate->name }}
                        </a>
                        
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="padding: 0px;">
                <div class="carousel-item active" style="padding: 0px;">
                    <img src="/images/admin/products/slider1.jpg" class="d-block w-100" alt="..." >
                </div>
                <div class="carousel-item">
                    <img src="/images/admin/products/slider2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/admin/products/slider3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>
</div> -->