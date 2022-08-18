<?php
session_start();

require_once "connection.php";
//Kiêm tra người dùng đăng nhập chưa,nếu chưa quay lại login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}
//Viết câu lệnh SQL lấy ra người dùng
$sql = "select * from products";
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
    <title>Show_Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../asm/fontawesome-free-6.1.1-web/css/all.min.css">
</head>

<body>
    <section class="bg-sky-600 py-3 px-2">
        <p class="text-center text-white text-[30px]">Quản Trị WEB</p>
        <div class="flex justify-end">
            <form action="">
                <span class="text-white text-[21px]">Cửa Hàng</span>
                <select name="" id="" class="border-[1px] w-[160px] rounded-[5px]">
                    <option value="">Cửa Hàng</option>
                    <option value="">A</option>
                    <option value="">b</option>
                    <option value="">c</option>
                </select>
            </form>
            <div class="dropdown ml-9 w-[250px]">
                <span class="btn btn-secondary dropdown-toggle w-[250px]" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    Xin Chào,<?php if (isset($_SESSION['username'])) : ?>
                    <span>
                        <b><?= $_SESSION['username'] ?></b>
                    </span>
                <?php endif ?>
                </span>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i>Tài khoản</a></li>
                    <li><a class="dropdown-item" href="logout.php">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>Thoát</a></li>

                </ul>
            </div>
        </div>
    </section>
    <section class="flex px-2">
        <div class="w-[20%]">
            <ul>
                <li class="ml-[10px] py-3 ml-1 border-[1px] bg-slate-300 rounded-[3px] font-bold hover:bg-white"><a href=""><i class="fa-solid fa-store"></i>POS Bán Hàng</a></li>
                <li class="ml-[10px] py-3 ml-1 border-[1px] bg-slate-300 rounded-[3px] font-bold hover:bg-white"><a href=""><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
                <li class="ml-[10px] py-3 ml-1 border-[1px] bg-slate-300 rounded-[3px] font-bold hover:bg-white"><a href=""><i class="fa-solid fa-cart-shopping"></i>Tạo Đơn Hàng
                <li class="ml-[10px] py-3 ml-1 border-[1px] bg-slate-300 rounded-[3px] font-bold hover:bg-white"><a href=""><i class="fa-brands fa-product-hunt"></i>Sản Phẩm</a></li>
                <li class="ml-[10px] py-3 ml-1 border-[1px] bg-slate-300 rounded-[3px] font-bold hover:bg-white"><a href=""><i class="fa-solid fa-users"></i>Khách Hàng</a></li>
            </ul>
        </div>
        <div class="w-[80%]">
            <div class="p-4">
                <h2 class="text-[22px] font-bold text-center py-3">Danh sách sản phẩm</h2>
                <h2>
                    <?= isset($_COOKIE['success']) ? $_COOKIE['success'] : '' ?>
                </h2>
                <div class="flex">
                    <p class="mr-[20px] font-bold">Danh mục:</p>
                    <select class="border border-black p-2" name="danhmuc" id="" value="<?= isset($danhmuc) ? $danhmuc : '' ?>">
                        <option value="">Chọn</option>
                        <option value="Sam Sung">Sam Sung</option>
                        <option value="Apple">Iphone</option>
                        <option value="Xiaomi">Xiaomi</option>
                        <option value="Oppo">Oppo</option>
                        <option value="Vivo">Vivo</option>

                    </select>
                </div>
                <table class="table table table-bordered mt-[20px]">
                    <tr>
                        <th>IDProduct</th>
                        <th>image</th>
                        <th>typeProduct</th>
                        <th>NameProduct</th>
                        <th>Gia</th>
                        <th>GiaKM</th>
                        <th>ProductID</th>
                        <th>
                            <a class="btn btn-primary" href="add_products.php">ADD</a>
                        </th>
                    </tr>
                    <?php foreach ($resault as $product) : ?>
                        <tr>
                            <td><?= $product['IDProduct'] ?> </td>
                            <td>
                                <img src="image/<?= $product['image'] ?>" width="100px" alt="">
                            </td>
                            <td><?= $product['typeProduct'] ?> </td>
                            <td><?= $product['NameProduct'] ?> </td>
                            <td><?= $product['Gia'] ?> </td>
                            <td><?= $product['giakm'] ?> </td>
                            <td><?= $product['Productid'] ?> </td>
                            <td>
                                <a class="btn btn-primary" href="edit_products.php?productid=<?= $product['IDProduct'] ?>">edit</a>
                                <a onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-danger" href="delete.php?productid=<?= $product['IDProduct'] ?>">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>
</body>

</html>