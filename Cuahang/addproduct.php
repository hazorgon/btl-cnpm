<?php
	require_once("conn.php");
	
	$masp = $_POST["masp"];
	$tensp = $_POST["tensp"];
	$loaisp = $_POST["loaisp"];
	$soluong = $_POST["soluong"];
	$gia = $_POST["gia"];
	$size = $_POST["size"];
	$dvt = $_POST["dvt"];
	
	$target_dir = "uploads/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	$target_file = $target_dir . $file_name;
	
	if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        die("Sorry, there was an error uploading your file.");
    }
    if(empty($_POST["id"])){
	//ADD
		$sql = "INSERT INTO sanpham (masp, tensp, loaisp, soluong, gia, size, dvt, hinhanh)
				VALUES ('$masp', '$tensp', '$loaisp', $soluong,  '$gia', '$size', '$dvt', '$file_name')";
	}
	//Update
	else{
		$sql = "UPDATE  sanpham set ten='$ten', maloaloaisp=$loaisp, soluong='$soluong', gia='$gia', size=$size,  dvt=$dvt WHERE masp =" .$_POST["masp"] ;
	}
	
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: formadd.php");
	}
?>