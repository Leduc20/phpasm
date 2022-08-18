<?php
require_once "../PHP/connection.php";
$id = $_GET['id'];
$sql= "SELECT * FROM products where IDProduct=$id";
//Viết câu lệnh SQL lấy ra người dùng
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
    <title>Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto Slab', serif;
        }
    </style>
</head>

<body onload="loadAnh()">
    <section class="max-w">
        <div class="mx-auto bg-slate-300">
            <div class="flex justify-between max-w-[1200px] mx-auto leading-[45px]">
                <div>
                    <a href="">
                        <p>
                            WEBSITE ĐIỆN TỬ ĐIỆN MÁY
                        </p>
                    </a>
                </div>
                <div class="flex justify-between">
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
        <div class="flex justify-between mx-auto max-w-[1200px] mt-5 items-center">
            <div>
                <a href="index.html"><img src="image/logo-topweb2.png" alt=""></a>
            </div>
            <div>
                <form action="">
                    <select name="" id="" class="border-[1px] w-[80px]">
                        <option value="">Tất cả</option>
                        <option value="">A</option>
                        <option value="">b</option>
                        <option value="">c</option>
                    </select>
                    <input class="border-[1px] w-[295px]" type="text" name="" id="">
                    <button class="border-[1px] w-[45px] bg-orange-300" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <!-- Login/Cart -->
            <div>
                <form action="">
                    <a class="px-2 hover:bg-red-400 hover:border-[2px]" href="../loginform.html">ĐĂNG NHẬP</a>
                    <a class="px-2 hover:bg-red-400 hover:border-[2px]" href="">GIỎ HÀNG</a>
                </form>
            </div>
        </div>
        <!-- nav -->
        <div class="mx-auto max-w bg-[#0088CC] mt-2">
            <div class="max-w-[1200px] mx-auto py-2">
                <ul class="flex justify-start text-white ">
                    <li class="ml-4"><a class="hover:text-[#EEEE22]" href="index.php">TRANG CHỦ</a></li>
                    <li class="ml-4"><a class="hover:text-[#EEEE22]" href="">GIỚI THIỆU</a></li>
                    <li class="ml-4"><a class="hover:text-[#EEEE22]" href="">SẢN PHẨM</a></li>
                    <!-- <li class="ml-4"><a class="hover:text-[#EEEE22]" href="">HƯỚNG DẪN MUA HÀNG</a></li> -->
                    <li class="ml-4"><a class="hover:text-[#EEEE22]" href="tintuc.html">TIN TỨC</a></li>
                    <li class="ml-4"><a class="hover:text-[#EEEE22]" href="lienhe.html">LIÊN HỆ</a></li>
                </ul>
            </div>
        </div>
    </section>

    </div>
    <section class="max-w-full">
        <div class="max-w-[1200px] mx-auto">
            <!-- img product -->
            <!-- <div class="flex grid grid-cols-2 ">
                <div>
                    <img class="w-[100%] p-4" src="image/iphone 12 pro max.jpg" alt="">
                </div>
                <div class="mt-[60px]">
                    <p class="text-[25px] font-bold">IPHONE 13 PRO</p>
                    <div class="py-5 text-[25px]">
                        <label class="line-through">16.000.000 VNĐ </label><label class="text-red-700 ml-3">15.000.000
                            VNĐ</label>
                    </div>
                    <div class="">
                        <div class="w-[199px] items-center">
                            <input class="border-[1px] w-[30px] p-1" type="button" name="" id="" value="-">
                            <input class="border-[1px] text-center p-1" type="number" name="" id="" step="1" min="1"
                                max="100" value="1" pattern="[0-9]*">
                            <input class="border-[1px] w-[30px] p-1" type="button" name="" id="" value="+">
                        </div>
    
                    </div>
                    <div class="border-[1px] mt-4 w-[190px] text-center  bg-[#FF9200] hover:bg-orange-700">
                        <button class="h-[45px] w-[160px] font-bold text-white">Thêm Vào Giỏ Hàng</button>
                    </div>
            </div> -->
            <?php foreach($resault as $show) :?>
                <input type="hidden" name="productid" id="" value="<?= $products['IDProduct'] ?>">
            <div class="flex grid grid-cols-2 ">
                <div>
                    <img class="w-[100%] p-4" src="image/<?=$show['image'] ?>" alt="">
                </div>
                <div class="mt-[60px]">
                    <p class="text-[25px] font-bold"><?=$show['NameProduct'] ?></p>
                    <div class="py-5 text-[25px]">
                        <label class="line-through"><?= $show['Gia']?> VNĐ </label><label class="text-red-700 ml-3"><?= $show['giakm']?>
                            VNĐ</label>
                    </div>
                    <div class="">
                        <div class="w-[199px] items-center">
                            <input class="border-[1px] w-[30px] p-1" type="button" name="" id="" value="-">
                            <input class="border-[1px] text-center p-1" type="number" name="" id="" step="1" min="1"
                                max="100" value="1" pattern="[0-9]*">
                            <input class="border-[1px] w-[30px] p-1" type="button" name="" id="" value="+">
                        </div>
    
                    </div>
                    <div class="border-[1px] mt-4 w-[190px] text-center  bg-[#FF9200] hover:bg-orange-700">
                        <button class="h-[45px] w-[160px] font-bold text-white">Thêm Vào Giỏ Hàng</button>
                    </div>
            </div>
            <?php endforeach ?>
            </div>
            <div class="flex">
                <div class="mr-[50px] max-w-[60%]">
                    <div>
                        <img class="w-[1200px] rounded-[10px]" id="mySlide" src="image1/index1.jpg" alt="">
                    </div>
                    <div class="flex justify-between">
        
                        <div class="mt-[-150px]">
                            <a class="hover:border-[2px] hover:bg-slate-300 p-2" onclick="back()">❮</a>
                        </div>
                        <div class="mt-[-150px]">
                            <a class="hover:border-[2px] hover:bg-slate-300 p-2" onclick="next()">❯</a>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-100 p-5">
                    <h2 class="text-[20px] font-bold text-center mb-2">Thông Số Kỹ Thuật</h2>
                    <div class="bg-white border">
                        <table class="table table-bordered">
                            <!-- <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead> -->
                            <tbody>
                              <tr>
                                <th scope="row">Màn Hình</th>
                                <td>6.7 inch, OLED, Super Retina XDR, 2778 x 1284 Pixels</td>
                              </tr>
                              <tr>
                                <th scope="row">Camera sau</th>
                                <td>12.0 MP + 12.0 MP + 12.0 MP</td>
                              </tr>
                              <tr>
                                <th scope="row">Camera Selfie</th>
                                <td>12.0 MP</td>
                              </tr>
                              <tr>
                                <th scope="row">RAM</th>
                                <td>6 GB</td>
                              </tr>
                              <tr>
                                <th scope="row">Bộ nhớ trong</th>
                                <td>128 GB</td>
                              </tr>
                              <tr>
                                <th scope="row">CPU</th>
                                <td>Aplle A15 Bionic</td>
                              </tr>
                              <tr>
                                <th scope="row">GPU</th>
                                <td>Apple GPU 5 Nhân</td>
                              </tr>
                              <tr>
                                <th scope="row">Dung lượng pin</th>
                                <td>4352 mAh</td>
                              </tr>
                              <tr>
                                <th scope="row">Thẻ Sim</th>
                                <td>1 - 1 eSIM, 1 Nano SIM</td>
                              </tr>
                              <tr>
                                <th scope="row">Hệ điều hành</th>
                                <td>iOS 15</td>
                              </tr>
                              <tr>
                                <th scope="row">Xuất xứ</th>
                                <td>Trung Quốc</td>
                              </tr>
                              <tr>
                                <th scope="row">Thời gian ra mắt</th>
                                <td>09/2021</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            <div>
                <p>ĐÁNH GIÁ(0)</p>
                <p class="text-[21px] py-4">ĐÁNH GIÁ</p>
                <p class="text-slate-300 py-2">Chưa có đánh giá nào</p>
                <div class="border-[4px] p-[30px] border-[#0088CC]">
                    <p class="font-bold text-[25px]">
                        Be the first to review “Apple Iphone 12 pro max”
                    </p>
                    <p class="text-[19px] py-4">Đánh giá của bạn</p>
                    <textarea class="border-[1px]" name="" id="" cols="119" rows="7"></textarea>
                    <div class="grid grid-cols-2 mt-4">
                        <div>
                            <p for="">Tên:</p>
                            <input class="border-[1px] w-[520px] h-[35px]" type="text" name="" id="">
                        </div>
                        <div>
                            <p for="">Email:</p>
                            <input class="border-[1px] w-[520px] h-[35px]" type="text" name="" id="">
                        </div>
                        <button class="font-bold border-[1px] w-[100px] p-2 mt-4 text-white bg-[#0088CC] hover:bg-cyan-400" type="submit">GỦI ĐI</button>
                    </div>
                </div>
            </div>
            <div class="mx-auto w-[1200px]">
                <div class="flex justify-between border-b-2 font-bold  mt-[50px]">
                    <p class="text-[20px]">
                        CÁC SẢN PHẨM LIÊN QUAN
                    </p>
                    <p>
                        <a class="text-[#0088CC]" href="">XEM TẤT CẢ</a>
                    </p>
                </div>
                <!-- Product -->
                <div class="flex justify-between grid grid-cols-4 gap-8 mt-6">
                    <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                        <img class="w-[260px]" src="image/iphone 13 pro.jpeg" alt="">
                        <p class="text-[15px] mt-3">
                            Điện Thoại
                        </p>
                        <p class="text-[20px] font-bold">
                            Iphone 13 Pro
                        </p>
                        <div class="text-[16px] font-bold">
                            <label class="line-through text-slate-500">14.000.000 VNĐ</label><label
                                class="line-through text-red-600" for="">13.000.000 VNĐ</label>
                        </div>
                        <div class="border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                            <a class="" href="">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                        <img class="w-[260px]" src="image/iphone 8 plus.jpg" alt="">
                        <p class="text-[15px] mt-3">
                            Điện Thoại
                        </p>
                        <p class="text-[20px] font-bold">
                            Iphone 8 Plus
                        </p>
                        <div class="text-[16px] font-bold">
                            <label class="line-through text-slate-500">8.000.000 VNĐ</label><label
                                class="line-through text-red-600" for="">6.000.000 VNĐ</label>
                        </div>
                        <div class="border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                            <a class="" href="">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                        <img class="w-[260px]" src="image/iphone xsmax.jpg" alt="">
                        <p class="text-[15px] mt-3">
                            Điện Thoại
                        </p>
                        <p class="text-[20px] font-bold">
                            Iphone XS Max
                        </p>
                        <div class="text-[16px] font-bold">
                            <label class="line-through text-slate-500">16.000.000 VNĐ</label><label
                                class="line-through text-red-600" for="">15.000.000 VNĐ</label>
                        </div>
                        <div class="border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                            <a class="" href="">Mua Ngay</a>
                        </div>
                    </div>
                    <div class="border-[1px] hover:border-[1px] hover:border-orange-600 rounded-[5px] p-4">
                        <img class="w-[260px] h-[241px]" src="image/rog phone 5 pro.jpg" alt="">
                        <p class="text-[15px] mt-3">
                            Điện Thoại
                        </p>
                        <p class="text-[20px] font-bold">
                            Rog Phone 5 Pro
                        </p>
                        <div class="text-[16px] font-bold">
                            <label class="line-through text-slate-500">16.000.000 VNĐ</label><label
                                class="line-through text-red-600" for="">15.000.000 VNĐ</label>
                        </div>
                        <div class="border-[2px] border-black hover:bg-red-400 hover:text-white text-center mt-3 ">
                            <a class="" href="">Mua Ngay</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="bg-sky-600">
            <div class="flex grid grid-cols-4 gap-4 max-w-[1200px] mx-auto mt-[40px] text-white">
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
                <p>Copyright 2022 © Thiết kế website Hà Nội bởi Topweb.com.vn</p>
                <div class="text-[35px]">
                    <a href=""><i class="fa-brands fa-cc-visa"></i></a>
                    <a href=""><i class="fa-brands fa-cc-paypal"></i></a>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>
<script src="js/jsdetail.js"></script>