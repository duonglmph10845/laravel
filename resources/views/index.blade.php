<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .column {
            margin: 15px 15px 0;
            padding: 0;
        }

        .column:last-child {
            padding-bottom: 60px;
        }

        .column::after {
            content: '';
            clear: both;
            display: block;
        }

        .column div {
            position: relative;
            float: left;
            margin: 0 0 0 25px;
            padding: 0;
        }

        .column div:first-child {
            margin-left: 0;
        }

        .column div span {
            position: absolute;
            bottom: -20px;
            left: 0;
            z-index: -1;
            display: block;
            width: 300px;
            margin: 0;
            padding: 0;
            color: #444;
            font-size: 18px;
            text-decoration: none;
            text-align: center;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
            opacity: 0;
        }

        figure {
            margin: 0;
            padding: 0;
            background: #fff;
            overflow: hidden;
        }

        figure:hover+span {
            bottom: -36px;
            opacity: 1;
        }


        .hover06 figure img {
            -webkit-transform: rotate(15deg) scale(1.4);
            transform: rotate(15deg) scale(1.4);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .hover06 figure:hover img {
            -webkit-transform: rotate(0) scale(1);
            transform: rotate(0) scale(1);
        }

        .price .c-price .c-real_price {
            font-family: t-black, sans-serif;
        }
    </style>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @include('header')
    <section style="background: #F6F3E4;">
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
                            <img src="/images/admin/products/slider1.jpg" class="d-block w-100" alt="...">
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
        <div class="container">
            <div class="block-heading" style="color: #212121;text-decoration: none;background-color: transparent; text-align: center; padding-top: 30px;padding-bottom: 15px; font-size: 35px">
                <a style="color: #212121;text-decoration: none;background-color: transparent; text-align: center;" href="" class="heading">New Arrival</a>
            </div>
            <!--end: .block-heading-->

            <div class="block-content">
                <div class="row pro-box-list box-home">
                    @foreach ($data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 c-item col-xs-6">
                        <div class="hover06">
                            <a href="{{ route('ctproduct', [ 'product' => $item->id ])}}" title="Brown Short Taffeta Pants" class="c-image">
                                <figure><img src="{{ $item->image }}" alt="" style="max-width: 100%; height: 520px;"></figure>
                            </a>
                        </div>
                        <div class="price" style="font-family: t-black, sans-serif; padding-top: 14px;">
                            <p class="c-price">
                                <span class="c-real_price" style="box-sizing: border-box; font-weight: bold;">
                                    {{ number_format($item->price) }}đ </span>
                            </p>
                        </div>

                        <h3 class="c-name" style="font-size: 16px;line-height: 5px;font-family: t-light; padding-bottom: 35px;">
                            <a style="color: #333333;text-decoration: none;background-color: transparent;-webkit-text-decoration-skip: objects;box-sizing: border-box;" 
                            href="{{ route('ctproduct', [ 'product' => $item->id ]) }}" title="Brown Short Taffeta Pants" class="name">
                            {{ $item->name }}
                         </a>
                        </h3>
                    </div>
                    @endforeach


                </div>
                <!--end: .row-->
            </div>
            <!--end: .block-content-->
            <a href="{{ route('xem-them') }}" class="show-more" style="width: 220px; height: 50px; background: rgba(255, 255, 255, 0); border: 2px solid #212121; margin-top: 15px; display: flex; align-items: center; justify-content: center; margin-left: auto;  margin-right: auto; font-family: t-black; font-size: 14px; color: #212121; text-transform: uppercase;">Xem thêm</a>
            <div id="block-23" class="block-border-top block-banner block-banner-list_4" style="float:none; padding-top: 15px;">
        <div class="block-heading" style="border-top: 1px solid #E3DDBB; padding-bottom: 15px; padding-top: 15px;">
           
        </div><!--end: .block-heading-->
        <div class="row row-insta" style="display: flex; flex-wrap: wrap; margin-right: -10px; margin-left: -10px; padding-bottom: 15px;">
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 4">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/1-05-1624348369.jpg" width="420px" alt="Instagram 4" class="img-responsive">
                    </a>
                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 5">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/1-04-1624348393.jpg" width="420px" alt="Instagram 5" class="img-responsive">
                    </a>
                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 6">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/1-12-1624348419.png" width="420px" alt="Instagram 6" class="img-responsive">
                    </a>
                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 7">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/no1-1624348886.jpg" width="420px" alt="Instagram 7" class="img-responsive">
                    </a>
                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 8">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/no2-1624348921.jpg" width="420px" alt="Instagram 8" class="img-responsive">
                    </a>
                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-item" style="margin-bottom: 20px;">
                    <a href="" title="Instagram 9">
                        <img style="display: inline-block;" src="https://sixdo.vn/images/banners/original/no3-1624348939.jpg" width="420px" alt="Instagram 9" class="img-responsive">
                    </a>
                </div>
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