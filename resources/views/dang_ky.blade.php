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
    @include('header')
    <section style="background: #F6F3E4; padding-top: 15px;">
        <div class="container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="register-top-grid">
                    <br>
                    <h3>Tạo mới tài khoản ngay bây giờ</h3>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="">Họ và tên *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu *</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ *</label>
                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gender *</label>
                        <select name="gender" id="">
                            <option value="{{ config('common.user.gender.male') }}" {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male') ? "selected" : "" }}>
                                Male
                            </option>
                            <option value="{{ config('common.user.gender.female') }}" {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female') ? "selected" : "" }}>Female</option>
                        </select>
                    </div> <br>
                </div>
                <br>
                <button type="submit" class="btn" style="background-color:#00A4E1; color: white;">Đăng ký</button>
                <a href="{{ route('index') }}" class="btn btn-danger">Quay lại</a>
            </form>
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