<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    if (empty($name)) {
        $name_err = "Trống họ tên";
    } else {
        $name_err = "";
    }
    if (empty($pass)) {
        $pass_err = "Trống mật khẩu";
    } else {
        $pass_err = "";
    }
    if(empty($submit)){
        $submit_err="Đăng nhập không thành công";
    }else{
        $submit_err="";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/loginform.css">
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="a">
            <div class="form">
                <h2>Member Login</h2>
                <form class="form-field" action="loginform.php" method="post">
                    <div class="account">
                        <input class="user" type="text" name="name" id="" placeholder=" ">
                        <label class="name"><i class="fa-solid fa-user"></i> Name</label>
                    </div>
                    <?php if (isset($name_err)) : ?>
                        <p style="color: red; margin-top: 10px;"><?=$name_err ?></p>
                    <?php endif ?>
                    <div class="Pass">
                        <input class="pass" type="text" name="pass" id="" placeholder=" ">
                        <label class="matkhau"><i class="fa-solid fa-lock"></i> Password</label>
                    </div>
                    <?php if (isset($pass_err)) : ?>
                        <p style="color: red; margin-top: 10px;"><?=$pass_err ?></p>
                    <?php endif ?>
                    <div class="button">
                        <button type="submit" name="submit">SIGN IN</button>
                    </div>
                </form>
                <?php if (isset($submit_err)) : ?>
                        <p style="color: red; margin-top: 10px;text-align: center;"><?=$submit_err ?></p>
                    <?php endif ?>
                <div class="logo">
                    <a class="logo-a" href=""><i id="logo-i" class="fa-brands fa-facebook-f"></i></a>
                    <a class="logo-a" href=""><i id="logo-i" class="fa-brands fa-twitter"></i></a>
                    <a class="logo-a" href=""><i id="logo-i" class="fa-brands fa-linkedin"></i></a>
                    <a class="logo-a" href=""><i id="logo-i" class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>