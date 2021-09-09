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

        .input_size .c-item_choose--size .c-sold_out:hover {
            background: #ffffff;
            border-color: #e7e7e7;
            color: #e7e7e7;
            text-decoration: none;
        }

        .input_size .c-item_choose--size .c-sold_out:hover {
            color: #e7e7e7;
            text-decoration: none;
        }

        .input_size .c-item_choose--size .c-sold_out {
            color: #e7e7e7;
        }

        .c-box_product .input_size .c-item_choose--size .c-name_size--choose {
            min-width: 20px;
            height: 40px;
            display: grid;
            align-items: center;
            margin-right: 20px;
            padding: 0px 7px;
            position: relative;
            border: 1px solid #E3DDBB;
            background: #ffffff;
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
    <section style="background: #F6F3E4; padding-top: 15px;">
        <div class="container">
            <div class=" c-box_product">
                <div>
                    <nav class=" location-page" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li itemscope itemtype="http://product_list-vocabulary.org/Breadcrumb" class="breadcrumb-item">
                                <a style="text-decoration: none; color: #212121;" itemprop="url" title="Trang chủ" rel="nofollow" href="{{ route('index') }}" itemprop="title">Trang chủ</a>
                            </li>
                            <li itemscope itemtype="http://product_list-vocabulary.org/Breadcrumb" class="breadcrumb-item">
                                <a style="text-decoration: none; color: #212121;" itemprop="url" href="https://sixdo.vn/clothes-p17" title="Thời trang nữ" itemprop="title">Thời trang nữ</a>
                            </li>
                            <li itemscope itemtype="http://product_list-vocabulary.org/Breadcrumb" class="breadcrumb-item">
                                <a style="text-decoration: none;" itemprop="url" title="Brown Short Taffeta Pants" itemprop="title">{{ $product_list->name }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <div class="row c-row_head">
                        <h1 class="hide">

                        </h1>
                        <!--            -->
                        <div class="col-md-6 img-product my-gallery" id="col-img">
                            <div class="c-box_all--images ">
                                <div id="lightSlider0" class="dddd">
                                    <div class="c-item img-watch26" product_list-thumb="{{ $product_list->image }}">
                                        <!--                                    <a id="Zoomer" class="MagicZoomPlus" href="-->
                                        <!--"-->
                                        <a id="Zoomer" class="MagicZoomPlus" href="{{ $product_list->image }}" itemprop="contentUrl" product_list-options="zoomPosition: inner; zoomWidth:450px; zoomHeight:450px; rightClick: true;hint: on;zoomCaption: off;expand: true;">
                                            <img class="img-fluid" src="{{ $product_list->image }}" alt="Image description" />
                                        </a>
                                    </div>

                                </div>
                                <div class="thumb-pro1 hide hidden-xs">
                                    <ul id="thumb-pro1" class="owl-loaded owl-drag owl-carousel">
                                    </ul>
                                </div>
                                <div class="c-box--thumb_image hide">
                                    <div class="c-list--thumb_image">

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6 body-product">
                            <div id="body_fix_add_cart">
                                <div class="content_pro">

                                    <h2 class="c-title_module">
                                        {{ $product_list->name }}
                                    </h2>
                                    <p class="c-code">MSP:
                                        66210600501BS2611 </p>
                                    <p class="price price-product">
                                        <span product_list-price="996000" id="price-no-discount" class="price-no-discount ">
                                            {{ number_format($product_list->price) }}đ </span>

                                    </p>
                                    <p class="color c-show_color--name">
                                        Color :
                                        <span>
                                            Nâu </span>
                                    </p>
                                    <ul class="list_color" id="extend_colorProduct">

                                        <li class="c-item">
                                            <input type="radio" name="selection_color" id="selection_color-26" class="hide" value="26" checked>
                                            <label for="selection_color-26" class=" c-item_color  active" product_list-watch="img-watch26" product_list-show="lightSlider0" d-color="26" d-name="Nâu">
                                                <span class="c-color" style="background: #8B4219;  "></span>
                                            </label>
                                        </li>

                                    </ul>
                                    <p class="size" id="c-show_size--name">
                                        size :
                                        <span></span>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="items-option input_size ">
                                                <div class="  c-item_choose--first  c-item_choose--size item-radio-choose c-item_choose26">

                                                </div>
                                                <div class="hide items-center c-item_choose--size item-radio-choose">
                                                    <a style="text-decoration: none;" href="javascript:void(0)" class="c-name_size--choose c-size_1 " product_list-v="1" product_list-name="S" product_list-stock="1">
                                                        <span class="">
                                                            S </span>
                                                    </a>
                                                    <a style="text-decoration: none;" href="javascript:void(0)" class="c-name_size--choose c-size_2 " product_list-v="2" product_list-name="M" product_list-stock="1">
                                                        <span class="">
                                                            M </span>
                                                    </a>
                                                    <a style="text-decoration: none;" href="javascript:void(0)" class="c-name_size--choose c-size_3 " product_list-v="3" product_list-name="L" product_list-stock="1">
                                                        <span class="">
                                                            L </span>
                                                    </a>
                                                    <a style="text-decoration: none;" href="javascript:void(0)" class="c-name_size--choose c-size_4 last-size" product_list-v="4" product_list-name="XL" product_list-stock="1">
                                                        <span class="">
                                                            XL </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a style="text-decoration: none;" href="javascript:void(0)" class="c-btn_call--findsize" product_list-toggle="modal" product_list-target="#modalFindSize" title="Tìm đúng kích thước">
                                                Tìm đúng kích thước <span>&rightarrow;</span>
                                            </a>
                                            <div class="items-center item-radio-choose hide">
                                                <input type="hidden" id="extend_size" name="extend_size" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div></div>

                                <a product_list-id="3062" class="c-btn btn-add_cart add-cart detail-add-cart " style="max-width: 380px;width: 100%; height: 50px;  display: block; color: #fff; line-height: 50px; text-align: center; text-transform: uppercase; background: #212121; text-decoration: none;" title="Thêm vào giỏ hàng" href="{{ route('add-to-cart', [ 'cart' => $product_list->id ])}}">
                                    Thêm vào giỏ hàng </a>

                                <a href="javascript:void(0)" title="Yêu thích" class="c-btn c-btn_heart pull-right " onclick="save_post(3062)">
                                    <i class="fa fa-heart-o"></i>
                                    <i class="fa fa-heart"></i>
                                </a>

                            </div>
                            <div style="display: flex; align-items: center;justify-content: space-between;font-family: t-black, sans-serif;text-transform: uppercase;cursor: pointer;padding-bottom: 10px;padding: 25px 0;border-bottom: 1px solid #E3DDBB;" class="c-box_detail">
                                <a style="color: #212121; text-decoration: none;" href="#description" product_list-toggle="collapse" class="c-call_detail--box" title="Chi tiết">
                                    Chi tiết <i class="fa fa-minus"></i>
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div id="description" class="collapse c-content_detail in">
                                </div>
                            </div>
                            <div style="display: flex; align-items: center;justify-content: space-between; font-family: t-black, sans-serif; text-transform: uppercase; cursor: pointer; padding-bottom: 10px;padding: 25px 0; border-bottom: 1px solid #E3DDBB;" class="c-box_detail">
                                <a style="color: #212121; text-decoration: none;" href="#care_instration" product_list-toggle="collapse" class="c-call_detail--box collapsed" title="Hướng dẫn bảo quản">
                                    Hướng dẫn bảo quản <i class="fa fa-minus"></i>
                                    <i class="fa fa-plus"></i>
                                </a>
                                <div id="care_instration" class="collapse c-content_detail">
                                </div>
                            </div>

                            <div class="contact_pro" style="padding: 25px 0;">
                                <a style="margin-right: 40px; color: #212121; text-decoration: none;" href="tel:18006650" title="Hotline">
                                    <i class="fa fa-phone"></i> Hotline
                                </a>
                                <a style="margin-right: 40px; color: #212121; text-decoration: none;" href="https://www.facebook.com/messages/t/107198024283962" title=" Chat online " target="_blank">
                                    <i class="fa fa-comments"></i> Chat online </a>
                                <a style="margin-right: 40px; color: #212121; text-decoration: none;" href="#" title="Chia sẻ"><i class=" fa fa-share-alt"></i> Chia sẻ </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-modal_size modal fade" id="modalFindSize" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-body">

                            <div class=" c-row_calculator">
                                <button type="button" class="close" product_list-dismiss="modal">&times;</button>
                                <!--                            --> <img src="https://sixdo.vn/images/products/size/quan_1625902091.jpg" alt="kích thước sản phẩm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-product-same" id="list-product-same">
                <div class="header-product">
                    <h2 class="c-title">Có thể bạn cũng thích </h2>
                </div>
                <div class="row c-box_list">
                    <div class="swiper-container  c-swipper-relate">
                        <div class="swiper-wrapper row">
                            @foreach ($splq as $item => $value)
                            <div class="col-md-3 c-item swiper-slide">
                                <a href="{{ route('ctproduct', [ 'product' => $value->id ]) }}" title="Woven Trousers Pants" class="c-image">
                                    <img src="{{ $value->image }}" alt="Woven Trousers Pants" class="img-fluid">
                                </a>
                                <h3 class="c-name" style="font-size: 16px; font-family: t-light; padding-top: 9px;">
                                    <a style="color: #333333;text-decoration: none;background-color: transparent;-webkit-text-decoration-skip: objects;box-sizing: border-box;" href="{{ route('ctproduct', [ 'product' => $value->id ]) }}" title="Woven Trousers Pants" class="name">
                                        {{ $value->name }} </a>
                                </h3>
                                <p class="c-price" style="box-sizing: border-box; font-weight: bold;">
                                    {{ number_format($value->price) }} VND
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>


            <h3>Bình luận</h3>

            <form action="{{ route('add-comment', [ 'id' => $product_list->id ])}}" method="post">
                @csrf
                <textarea name="commentPro" id="inputcommentPro" class="form-control" rows="6" required="required"></textarea> <br>
                <button type="submit" class="btn btn-danger">Bình luận</button>
            </form>
            <div>
                @foreach ($listComments as $item)
                <b>{{ $item->name }}</b>
                <span style="float:right;font-size:10px">{{ $item->ngay_bl }}</span>
                <div class="row">
                    <div class="col-md-8">
                        <p>{{ $item->noi_dung }}</p>
                    </div>
                    <div class="col-md-4">
                        @if(Auth::check())
                        @if(auth()->user()->id == $item->id_cmt)
                        <form action="{{ route('remove-comment', [ 'id' => $item->cmt_id ])}}" method="POST">
                            @csrf

                            <button type="submit" style="float:right;font-size:10px">Xoa</button>

                            @elseif(auth()->user()->role == config('common.user.role.admin'))

                            <button type="submit" style="float:right;font-size:10px">Xoa</button>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
                @endforeach
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