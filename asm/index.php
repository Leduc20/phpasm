<?php
require_once "../PHP/connection.php";
$sql = "SELECT * FROM products";
//Viết câu lệnh SQL lấy ra người dùng
$sql = "SELECT * from products";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực hiện câu lệnh
$stmt->execute();
//Lấy dữ liệu
$resault = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/style1.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto Slab', serif;
        }

        .header {
            background-image: linear-gradient(to bottom, #bdc3c7, #d7e8f8)
        }

        .cart:hover {
            background-image: linear-gradient(to right, #c471ed, #f64f59)
        }

        .hoverproduct {
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: 1px solid black;
            background-image: linear-gradient(to bottom right, #fafafa, rgb(241, 37, 37));
            padding: 15px;
            border-radius: 4px;
            opacity: 0;
            text-align: center;
            margin-left: 55px;
            position: absolute;
            bottom: 0;
            transition: all 0.2s linear;
        }

        .Myhover:hover .hoverproduct {
            opacity: 1;
            border: none;
        }
    </style>
</head>

<body onload="loadAnh()" class="px-2">
    <section class="max-w">
        <div class="header mx-auto bg-slate-300">
            <div class="text-center md:flex justify-between md:max-w-[1200px] mx-auto leading-[45px]">
                <div>
                    <a href="">
                        <p class="">
                            WEBSITE ĐIỆN TỬ ĐIỆN MÁY
                        </p>
                    </a>
                </div>
                <div class="flex justify-between hidden md:block">
                    <p class="mr-8">
                        KHUYẾN MẠI HOT
                    </p>
                    <div class="flex">
                        <a href="" class="px-2"><i class="fa-brands fa-facebook-square"></i></a>
                        <a href="" class="px-2"><i class="fa-regular fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex justify-between mx-auto max-w-[1200px] mt-5 items-center">
            <div class="">
                <a href="index.html"><img src="image/logo-topweb2.png" alt=""></a>
            </div>
            <div class="">
                <form action="">
                    <select name="" id="" class="border-[1px] w-[80px]">
                        <option value="">Tất cả</option>
                        <option value="">A</option>
                        <option value="">b</option>
                        <option value="">c</option>
                    </select>
                    <input class="border-[1px] w-[295px]" type="text" name="" id="">
                    <button class="border-[1px] w-[45px] bg-orange-300" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <!-- Login/Cart -->
            <div class="hidden md:block">
                <form action="">
                    <a class="px-2 hover:bg-red-400 hover:border-[2px]" href="loginform.php">ĐĂNG NHẬP</a>
                    <a class="px-2 hover:bg-red-400 hover:border-[2px]" href="">GIỎ HÀNG</a>
                    <a class="px-2 hover:bg-red-400 hover:border-[2px]" href="../PHP/show_products.php">ADMIN</a>
                </form>
            </div>
        </div>
        <!-- nav -->
        <!-- max-w-[1200px] mx-auto py-2 -->
        
        <div class="mx-auto max-w bg-[#0088CC] mt-2">
            <div id="main-menu" class="max-w-[1200px] mx-auto py-2">
                
            <ul class="flex justify-start text-white">
                    <li class="ml-4 mt-2"><a class="hover:text-[#EEEE22]" href="index.html">TRANG CHỦ</a></li>
                    <li class="ml-4 mt-2"><a class="hover:text-[#EEEE22]" href="">GIỚI THIỆU</a></li>
                    <li class="group ml-4 mt-2"><a class="hover:text-[#EEEE22] block mb-5" href="">DANH MỤC SẢN PHẨM</a>
                    <div class="absolute top-[240px] w-[180px] opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:mt-0 trasition-all duration-500">
                    <ul class="text-white bg-black">
                        <li><a class="block p-2 hover:bg-red-500  cursor-pointer" href="">Sam Sung</a></li>
                        <li><a class="block p-2 hover:bg-red-500   cursor-pointer" href="">Apple</a></li>
                        <li><a class="block p-2 hover:bg-red-500   cursor-pointer" href="">Xiaomi</a></li>
                    </ul>
                    </div>
                </li>

                    <!-- <li class="ml-4"><a class="hover:text-[#EEEE22]" href="">HƯỚNG DẪN MUA HÀNG</a></li> -->
                    <li class="ml-4 mt-2"><a class="hover:text-[#EEEE22]" href="tintuc.html">TIN TỨC</a></li>
                    <li class="ml-4 mt-2"><a class="hover:text-[#EEEE22]" href="lienhe.html">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="max-w-full">
        <div class="max-w-[1200px] mx-auto py-2">
            <div>
                <img class="w-[1200px] rounded-[10px]" id="mySlide" src="image/imageslide/slide1.jpg" alt="">
            </div>
            <div class="flex justify-between">

                <div class="mt-[-250px]">
                    <a class="hover:border-[2px] hover:bg-slate-300 p-4" onclick="back()">❮</a>
                </div>
                <div class="mt-[-250px]">
                    <a class="hover:border-[2px] hover:bg-slate-300 p-4" onclick="next()">❯</a>
                </div>
            </div>
        </div>
    </div>
    <section class="max-w-full">
        <div class="md:block mx-auto md:w-[1200px]">
            <div class="md:flex justify-between mt-3 md:border-b-2 font-bold">
                <p class="text-[20px]">
                    SẢN PHẨM BÁN CHẠY
                </p>
                <p class="hidden md:block">
                    <a class="text-[#0088CC]" href="">XEM TẤT CẢ</a>
                </p>
            </div>
            <!-- Product -->
            <div class="flex justify-between grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-6 mt-5">
                <?php foreach ($resault as $show) : ?>

                    <div class="Myhover border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                        <img class="w-full md:w-[260px]" src="image/<?= $show['image'] ?>" alt="">
                        <p class="text-[15px] mt-3">
                            <?= $show['typeProduct'] ?>
                        </p>
                        <p class="text-[20px] font-bold">
                            <?= $show['NameProduct'] ?>
                        </p>
                        <div class="text-[16px] font-bold">
                            <label class="line-through text-slate-500"><?= $show['Gia'] ?>VNĐ</label><label class=" text-red-600" for=""><?= $show['giakm'] ?>VNĐ</label>
                        </div>
                        <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                            <a class="" href="detail.php?id=<?= $show['IDProduct'] ?>">Mua Ngay</a>
                        </div>
                        <div class="hoverproduct">
                            <a href="">Xem nhanh</a>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
        <div class="mx-auto md:w-[1200px] mt-[55px]">
            <div class="flex justify-between mt-3 md:border-b-2 font-bold">
                <p class="text-[20px]">
                    ĐANG GIẢM GIÁ
                </p>
                <p class="hidden md:block">
                    <a class="text-[#0088CC]" href="">XEM TẤT CẢ</a>
                </p>
            </div>

            <div class="flex justify-between grid grid-cols-1 gap-4 md:grid-cols-4 gap-8 mt-6">
                <div class="Myhover border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone 13 pro.jpeg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone 13 Pro
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">14.000.000 VNĐ</label><label class=" text-red-600" for="">13.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="detail.html">Mua Ngay</a>
                    </div>
                    <div class="hoverproduct">
                        <a href="">Xem nhanh</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone 8 plus.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone 8 Plus
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">8.000.000 VNĐ</label><label class=" text-red-600" for="">6.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="">Mua Ngay</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone xsmax.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone XS Max
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">16.000.000 VNĐ</label><label class="text-red-600" for="">15.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="">Mua Ngay</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px] h-[241px]" src="image/rog phone 5 pro.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Rog Phone 5 Pro
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">16.000.000 VNĐ</label><label class=" text-red-600" for="">15.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-full bg-gradient-to-bl from-cyan-500 to-blue-500 mt-10 py-[70px]">
            <div class="max-w-[1200px] mx-auto">
                <div class="text-center text-white font-bold">
                    <div class="">
                        <p class="text-[55px]">GIỜ VÀNG GIÁ SỐC</p>
                        <p class="text-[30px]">
                            GIẢM TỚI 50% TẤT CẢ CÁC SẢN PHẨM ĐIỆN THOẠI
                        </p>
                        <div class="mt-[25px]">
                            <a class="cart border-[1px] p-3 border-sky-500 hover:bg-sky-800" href=""><i class="fa-regular fa-heart"></i>MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto md:w-[1200px]">
            <div class="flex justify-between mt-3 md:border-b-2 font-bold">
                <p class="text-[20px]">
                    CÁC SẢN PHẨM LIÊN QUAN
                </p>
                <p class="hidden md:block">
                    <a class="text-[#0088CC]" href="">XEM TẤT CẢ</a>
                </p>
            </div>

            <div class="md:flex justify-between grid grid-cols-1gap-4md:grid-cols-4 gap-8 mt-6">
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone 13 pro.jpeg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone 13 Pro
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">14.000.000 VNĐ</label><label class=" text-red-600" for="">13.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="detail.html">Mua Ngay</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone 8 plus.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone 8 Plus
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">8.000.000 VNĐ</label><label class=" text-red-600" for="">6.000.000 VNĐ</label>
                    </div>
                    <div class="border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="detail.html">Mua Ngay</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px]" src="image/iphone xsmax.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Iphone XS Max
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">16.000.000 VNĐ</label><label class="text-red-600" for="">15.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="">Mua Ngay</a>
                    </div>
                </div>
                <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                    <img class="w-full md:w-[260px] h-[241px]" src="image/rog phone 5 pro.jpg" alt="">
                    <p class="text-[15px] mt-3">
                        Điện Thoại
                    </p>
                    <p class="text-[20px] font-bold">
                        Rog Phone 5 Pro
                    </p>
                    <div class="text-[16px] font-bold">
                        <label class="line-through text-slate-500">16.000.000 VNĐ</label><label class="text-red-600" for="">15.000.000 VNĐ</label>
                    </div>
                    <div class="cart border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                        <a class="" href="">Mua Ngay</a>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- footer -->
        <!-- bg-gradient-to-tr from-cyan-500 to-blue-500 -->
        <div class="mt-[55px]">
            <div class="overflow-hidden h-[490px]">
                <img class="max-w-none" src="wave-haikei.svg" width="2500" height="0" alt="">

            </div>
            <div class="flex grid grid-cols-4 gap-4 max-w-[1200px] mx-auto mt-[40px] text-white mt-[-475px]">
                <div class="mt-8">
                    <p>HOTLINE</p>
                    <div>
                        <p class="py-6">Gọi mua hàng 1800.1060 (7:30 - 22:00)</p>
                        <p class="py-6">Gọi khiếu nại 1800.1062 (8:00 - 21:30)</p>
                        <p class="py-6">Gọi bảo hành 1800.1064 (8:00 - 21:00)</p>
                    </div>
                </div>
                <div class="mt-8">
                    <p>THÔNG TIN</p>
                    <div>
                        <p class="py-4  border-b-[1px]"><a href="">Trang chủ</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Giới thiệu</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Sản phẩm</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Hướng dẫn mua hàng</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Tin tức</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Liên hệ</a></p>
                    </div>
                </div>
                <div class="mt-8">
                    <p>SẢN PHẨN</p>
                    <div>
                        <p class="py-4  border-b-[1px]"><a href="">Trang chủ</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Giới thiệu</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Sản phẩm</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Hướng dẫn mua hàng</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Tin tức</a></p>
                        <p class="py-4  border-b-[1px]"><a href="">Liên hệ</a></p>
                    </div>
                </div>
                <div class="mt-8">
                    <p>FACEBOOK</p>
                </div>

            </div>
            <div class="flex justify-between max-w-[1200px] mx-auto text-white mt-8">
                <p>Copyright 2022 © Thiết kế website Hà Nội</p>
                <div class="text-[35px]">
                    <a href=""><i class="fa-brands fa-cc-visa"></i></a>
                    <a href=""><i class="fa-brands fa-cc-paypal"></i></a>
                </div>
            </div>

        </div>


    </section>

</body>

</html>
<script src="js/js.js"></script>