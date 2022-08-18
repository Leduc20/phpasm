<?php
session_start();
require_once "connection.php";
//Tiến hành login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT *FROM user where username='$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //nếu $user có dữ liệu
    if ($user) {
        //kiểm tra mật khẩu
        if ($password == $user['password']) {
            //tạo session username
            $_SESSION['username'] = $username;
            //chuyển hướng
            header("location:show_products.php");
            exit;
        } else {
            $error = "Tài khoản không chính xác";
        }
    } else {
        $error = "Tài khoản hoặc mật khẩu không chính xác";
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
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="a">
            <div class="form">
                <h2>Member Login</h2>
                <p>name: lequangduc</p>
                <p>password: 310302</p>
                <form class="form-field" action="" method="post">
                    <div class="account">
                        <input class="user" type="text" name="username" id="" placeholder=" ">
                        <label class="name"><i class="fa-solid fa-user"></i> Name</label>
                    </div>
                    <div class="Pass">
                        <input class="pass" type="password" name="password" id="" placeholder=" ">
                        <label class="matkhau"><i class="fa-solid fa-lock"></i> Password</label>
                    </div>

                    <button class="button" type="submit" name="submit">Login</button>
                    
                </form>
                <?php if (isset($error)) : ?>
                        <div class="error" style="color: red">
                            <?= $error ?>
                        </div>
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