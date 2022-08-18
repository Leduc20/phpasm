<?php
require_once "connection.php";
if (isset($_GET['productid'])) {
    $productid = $_GET['productid'];
    //sql delete
    $sql = "DELETE FROM products WHERE IDProduct=$productid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //Chuyển hướng
    setcookie("success","Xóa dữ liệu thành công!",time()+1);
    header("location:show_products.php");
    exit;
}
header("location:show_products.php");
exit;
