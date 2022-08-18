<?php
//kết nối cơ sở dữ liệu
//khai bao host nơi lưu trữ dữ liệu
$host="localhost";

//Tên CSDL
$dbname="asm";

//Thông tin
$username="root";
$password="";
// $connect=mysqli_connect($host,$dbname,$username,$password);
// if(!$connect){
//     echo "Kết nối thất bại".mysqli_connect_error();
//     exit();
// }else{
//     echo "Kết nối thành công";
// }

try{
    //try cố gắng làm gì đó sau đó bật sang get
    $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Lỗi kết nối dữ liệu".$e->getMessage();
    throw $e;
}
