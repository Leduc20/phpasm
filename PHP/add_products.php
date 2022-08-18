<?php
require_once "connection.php";
if (isset($_POST['submit'])) {
    $nameproduct = $_POST['nameproduct'];
    $gia = $_POST['gia'];
    $typeproduct = $_POST['typeproduct'];
    $giaKM = $_POST['giaKM'];
    $proID = $_POST['Productid'];
    // $danhmuc = $_POST['danhmuc'];

    $file = $_FILES['image'];
    //Lấy ảnh ra
    $image = $file['name'];
    $thumuc = "image/";
    if ($file['size'] <= 0) {
        $file_err = "Bạn chưa nhập file";
    } else if ($file['size'] > 0 && $file['size'] <= 2048) {
        //;lấy định dạng file
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
            $file_err = "Không đúng định dạng ảnh";
        }
    }
    if ($file['size'] > 0) {
        move_uploaded_file($file['tmp_name'], $thumuc . $image);
    }
    if (empty($typeproduct)) {
        $typeproduct_err = "type trống";
    } else {
        $typeproduct_err = "";
    }
    if (empty($nameproduct)) {
        $nameproduct_err = "name trống";
    } else {
        $nameproduct_err = "";
    }
    if (empty($gia)) {
        $gia_err = "Trống gia";
    } elseif (!is_numeric($gia)) {
        $gia_err = "Hãy nhập số";
    } else {
        $gia_err = "";
    }
    if (empty($giaKM)) {
        $giaKM_err = "Trống giaKM";
    } elseif (!is_numeric($giaKM)) {
        $giaKM_err = "Hãy nhập số";
    } else {
        $giaKM_err = "";
    }
    if (empty($proID)) {
        $proID_err = "Trống ProID";
    } else {
        $proID_err = "";
    }
    if (empty($danhmuc)) {
        $danhmuc_err = "Trống danh mục";
    } else {
        $danhmuc_err = "";
    }

    if (!isset($file_err) || !isset($typeproduct_err) || !isset($nameproduct_err) || !isset($gia_err) || !isset($giaKM_err) || !isset($proID_err) || !isset($danhmuc_err)) {

        $sql = "INSERT INTO products(image,typeProduct,NameProduct,Gia,giakm,Productid) values ('$image','$typeproduct','$nameproduct','$gia','$giaKM','$proID')";
        //Chuẩn bị
        $stmt = $conn->prepare($sql);
        //thực thi
        $stmt->execute();
        //Product name

        //CHuyển hướng sang trang show_user.php
        $msg = "Thêm dữ liệu thành công";
        header("location: show_products.php?msg=$msg");
        exit;
    } else {
        $submit_err = "Thêm sản phẩm không thành công !";
    }

    // echo '<pre>';
    // print_r($error);
    // echo'</pre>';

    // echo $sql;
    // exit;

}
    //lấy dữ liệu của bảng categories
    $stmt = $conn->prepare("Select * From categories");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../asm/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="../PHP/css/addproduct.css">
</head>
<style>

</style>

<body>
    <section class="max-w-full">
        <div class="max-w-[700px] mx-auto mt-[50px] border border-white hover:border-red-500  bg-white p-[50px] rounded-[15px]">
            <h2 class="font-bold text-[32px] text-center py-6">Thêm Sản phẩm</h2>
            <div class="border p-2 w-[135px] hover:border-orange-600 py-3">
                <span>
                    <i class="fa-solid fa-list-ul"></i>
                </span>
                <a href="show_products.php">Danh sách</a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- product_id: <input type="text" name="productid" id="">
        <br> -->
                <!-- IDProduct: <input type="text" name="idproduct" id="">
        <br> -->
                <div class="flex justify-between">
                    <p>Image:</p> <input class="border border-black p-2" type="file" name="image" id="" value="<?= isset($file) ? $file : '' ?>">
                </div>
                <?php
                if (isset($file_err)) : ?> <br>
                    <p class="flex justify-end text-red-500"><?= $file_err ?></p>
                <?php endif ?>
                <br>
                <div class="flex justify-between">
                    <p>TypeProduct:</p>
                    <input class="border border-black p-2" type="text" name="typeproduct" id="" value="<?= isset($typeproduct) ? $typeproduct : '' ?>">
                </div>
                <?php
                if (isset($typeproduct_err)) : ?>
                    <p class="flex justify-end text-red-500"><?= $typeproduct_err ?></p>
                <?php endif ?>
                <br>
                <div class="flex justify-between">
                    <p>NameProduct:</p>
                    <input class="border border-black p-2" type="text" name="nameproduct" id="" value="<?= isset($nameproduct) ? $nameproduct : '' ?>">
                </div>
                <?php
                if (isset($nameproduct_err)) : ?>
                    <p class="flex justify-end text-red-500"><?= $nameproduct_err ?></p>
                <?php endif ?>
                <br>
                <div class="flex justify-between">
                    <p>Danh mục:</p>
                    <select class="p-2 border" name="Productid">
                        <?php foreach ($categories as $id) : ?>
                            <option value="<?= $id['Productid'] ?>">
                                <?= $id['Productname'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <br>
                </div>
                <?php
                if (isset($danhmuc_err)) : ?>
                    <p class="flex justify-end text-red-500"><?= $danhmuc_err ?></p>
                <?php endif ?>

                <br>
                <div class="flex justify-between">
                    <p>Gia:</p>
                    <input class="border border-black p-2" type="text" name="gia" id="" value="<?= isset($gia) ? $gia : '' ?>">
                </div>
                <?php
                if (isset($gia_err)) : ?>
                    <p class="flex justify-end text-red-500"><?= $gia_err ?></p>
                <?php endif ?>

                <br>
                <div class="flex justify-between">
                    <p>GiaKM:</p>
                    <input class="border border-black p-2" type="text" name="giaKM" id="" value="<?= isset($giaKM) ? $giaKM : '' ?>">
                </div>
                <?php
                if (isset($giaKM_err)) : ?>
                    <p class="flex justify-end text-red-500"><?= $giaKM_err ?></p>
                <?php endif ?>
                <br>

                <button class="border border-gray-500 p-2 rounded bg-[#57b846] hover:bg-green-600 px-4" type="submit" name="submit">Submit</button>
                <?php
                if (isset($submit_err)) : ?>
                    <p class=" text-red-500"><?= $submit_err ?></p>
                <?php endif ?>
            </form>
        </div>
    </section>
</body>

</html>