<?php
require_once "connection.php";
if (isset($_POST['submit'])) {
    $id = $_POST['productid'];
    $image = $_POST['image']; //ảnh cũ
    $nameproduct = $_POST['nameproduct'];
    $gia = $_POST['gia'];
    $typeproduct = $_POST['typeproduct'];
    $giaKM = $_POST['giaKM'];
    $danhmuc = $_POST['danhmuc'];
    // $idproduct=$_POST['idproduct'];

    $file = $_FILES['image'];
    // //Lấy ảnh ra
    // $image = $file['name'];
    // $thumuc= "image/";
    if ($file['size'] > 0) {
        //Lấy ra tên ảnh mới
        $image = $file['name'];
    }
    $sql = "UPDATE products SET image='$image',typeProduct='$typeproduct',NameProduct='$nameproduct',Gia='$gia',giakm='$giaKM',Productid='$danhmuc' WHERE IDProduct =$id";
    // echo $sql;
    // exit;
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
        move_uploaded_file($file['tmp_name'], 'image/' . $image);
    }

    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //thực thi
    $stmt->execute();

    //CHuyển hướng sang trang show_user.php
    setcookie("success", "Cập nhật dữ liệu thành công", time() + 1);
        header("location: show_products.php");
        exit;
}
//Lấy dữ liệu để cập nhật
$stmt = $conn->prepare("Select * From categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Lay du lieu
$id = $_GET['productid'];
//SQL select
$sql = "SELECT * FROM products where IDProduct=$id";
//chuan bi
$stmt = $conn->prepare($sql);
//thực thi
$stmt->execute();
$products = $stmt->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../ASM/asm/css/edit.css">
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.min.css">

</head>
<style>
    body {
        background: -webkit-linear-gradient(135deg, #c850c0, #4158d0);
    }
</style>

<body>
    <section>
        <div class="border bg-white w-[700px] mx-auto rounded-[15px] mt-[80px] ">
            <h2 class="text-[30px] text-center mt-5 font-bold">EDIT Sản phẩm</h2>

            <div class="flex justify-center">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="border p-2 w-[135px] hover:border-orange-600">
                        <span>
                            <i class="fa-solid fa-list-ul"></i>
                        </span>
                        <a href="show_products.php">Danh sách</a>
                    </div>
                    <!-- product_id: <input type="text" name="productid" id="">
        <br> -->
                    <!-- IDProduct: <input type="text" name="idproduct" id="">
        <br> -->
                    <!-- Đưa vào ID -->
                    <div class="">
                        <input type="hidden" name="productid" id="" value="<?= $products['IDProduct'] ?>">
                        <br>
                        <img class="items-center" src="image/<?= $products['image'] ?>" alt="" width="190px">
                        <!-- lưu lại ảnh -->
                        <input type="hidden" name="image" id="" value="<?= $products['image'] ?>">
                        <br>
                        <div class="flex justify-between border p-2 font-bold">
                            <p>Image:</p>
                            <input type="file" name="image" id="">
                        </div>
                        <br>
                        <div class="flex justify-between">
                            <p class="font-bold">TypeProduct:</p>
                            <input class="p-2 border hover:border-orange-600" type="text" name="typeproduct" id="" value="<?= $products['typeProduct'] ?>">
                        </div>
                        <br>
                        <div class="flex justify-between">
                            <p class="font-bold">NameProduct:</p>
                            <input class="p-2 border" type="text" name="nameproduct" id="" value="<?= $products['NameProduct'] ?>">
                        </div>
                        <br>
                        <div class="flex justify-between">
                            <p class="font-bold">Gia:</p>
                            <input class="p-2 border" type="text" name="gia" id="" value="<?= $products['Gia'] ?>">
                        </div>
                        <br>
                        <div class="flex justify-between">
                            <p class="font-bold">GiaKM:</p>
                            <input class="p-2 border" type="text" name="giaKM" id="" value="<?= $products['giakm'] ?>">
                        </div>
                        <br>
                        <div class="flex justify-between">
                        <p class="font-bold">Danh mục:</p>
                        <select class="p-2 border"  name="danhmuc">
                            <?php foreach($categories as $id) :?>
                                <option value="<?=$id['Productid'] ?>" <?=$id['Productid']==$products['Productid'] ? 'selected':'' ?>
                                >
                                <?=$id['Productname']?>
                                </option>
                                <?php endforeach ?>
                        </select>
                        </div>
                        <br>
                    </div>
                    <button class="border border-gray-500 p-2 rounded bg-[#57b846] hover:bg-green-600 px-4" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>