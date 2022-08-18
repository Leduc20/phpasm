<?php
//Khi sử dụng session
 session_start();
 //huy session
 session_destroy();

 //chuyển hướng login.php
 header("location:login.php");
 exit;
 