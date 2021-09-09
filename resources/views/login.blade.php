<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url(/images/admin/products/background-login-2.png) no-repeat;
            background-size: cover;
        }

        .login-box {
            width: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .login-box h1 {
            float: left;
            font-size: 40px;
            border-bottom: 6px solid #4ff74f;
            margin-bottom: 50px;
            padding: 5px 0;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #4ff74f;
        }

        .textbox i {
            width: 26px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
            width: 80%;
            float: left;
            margin: 0 10px;
        }

        .btn {
            width: 100%;
            background: none;
            border: 2px solid #4ff74f;
            color: white;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h1>Login</h1><br><br><br>
        
        <form action="" id="login" method="POST">
            @csrf
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="email" id="" placeholder="Username" required>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="" placeholder="Password">
            </div>
            <br>
            <input type="checkbox" name="remember_me" id="" style="width:20px;height:15px"> Ghi nhớ tài khoản
            <button type="submit" name="login" class="btn btn-danger">Đăng nhập</button>
            <a class="forgot" href="#">Quên mật khẩu ?</a>
            <p>Nếu bạn chưa có tài khoản. Vui lòng đăng ký <a href="dang_ki.php">Tại đây?</a></p>
        </form>
    </div>
</body>

</html>