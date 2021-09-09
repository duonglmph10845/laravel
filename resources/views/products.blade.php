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
    @include('header')
    <section style="background: #F6F3E4; padding-top: 15px;">
    <div class="container">
            <div class="block-heading" style="color: #212121;text-decoration: none;background-color: transparent; text-align: center; padding-top: 30px;padding-bottom: 15px; font-size: 35px">
                <a style="color: #212121;text-decoration: none;background-color: transparent; text-align: center;" href="" class="heading">{{ $name_cate->name }}</a>
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
                            href="{{ route('ctproduct', [ 'product' => $item->id ])}}" title="Brown Short Taffeta Pants" class="name">
                                Brown Short Taffeta Pants </a>
                        </h3>
                    </div>
                    @endforeach


                </div>
                <!--end: .row-->
            </div>
            <!--end: .block-content-->
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