<?php 
session_start(); 
$access = $_SESSION["access"];
switch ($access) {
    case "admin":
       header("Location: indexadmin.php");
       break;
    case "quanly":
        header("Location: indexquanly.php");
        break;
    default:
        header("Location: indexnhanvien.php");
        break;
}

 ?>