<?php
	require_once("conn.php");
	
	$masp = $_POST["masp"];
	$tensp = $_POST["tensp"];
	$loaisp = $_POST["loaisp"];
	$soluong = $_POST["soluong"];
	$gia = $_POST["gia"];
	$size = $_POST["size"];
	$dvt = $_POST["dvt"];
	
	

	$sql = "UPDATE  sanpham set tensp= '$tensp', loaisp='$loaisp', soluong=$soluong, gia=$gia, size='$size',  dvt='$dvt' WHERE masp = '" .$_POST["masp"]. "'" ;
	
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: formadd.php");
	}
?>
