<?php
	require_once("conn.php");
	
	$ho = $_POST["ho"];
	$ten = $_POST["ten"];
	$sdt = $_POST["sdt"];
	$diachi = $_POST["diachi"];
	$luong = $_POST["luong"];
	$ngaysinh = $_POST["ngaysinh"];
	$thangsinh = $_POST["thangsinh"];
	$namsinh = $_POST["namsinh"];
	$ngaybd = $_POST["ngaybd"];
	$thangbd = $_POST["thangbd"];
	$nambd = $_POST["nambd"];
	$sinh = $namsinh.'/'.$thangsinh.'/'.$ngaysinh;
	$nambatdau = $_POST["nambd"].'/'.$_POST["thangbd"].'/'.$_POST["ngaybd"];
	$access = $_POST["access"];
	$username = $_POST["username"];

    if(empty($_POST["manv"])){
	//ADD
		$sql = "INSERT INTO nhanvien (ho, ten, ngaysinh, diachi, sdt, ngaybatdau, luong)
					VALUES ('$ho', '$ten', '$sinh', '$diachi', '$sdt', '$nambatdau' ,$luong)";
		if ($conn->query($sql) === FALSE) {
			die("Error: " . $sql . $conn->error);
		}else{
			$sql = "SELECT max(manv) from nhanvien";
			$result = $conn->query($sql) or die($conn->error);
			$row = $result->fetch_assoc();
			$manv = $row["max(manv)"];
			$sql = "INSERT INTO account (manv,username, password, access)
						VALUES($manv,'$username','$username','$access')";
				if ($conn->query($sql) === FALSE) {
					die("Error: " . $sql . $conn->error);
				}else header("Location: formaddnhanvien.php");
			}
	}
	//Update
	else{
		$sql = "UPDATE  nhanvien set ho='$ho', ten='$ten', ngaysinh='$sinh', diachi='$diachi',sdt = '$sdt', ngaybatdau='$nambatdau',luong=$luong WHERE manv =" .$_POST["manv"] ;
		if ($conn->query($sql) === FALSE) {
			die("Error: " . $sql . $conn->error);
		}else{
			$sql = "UPDATE account set username = '$username', password = '$username', access = '$access' WHERE manv =".$_POST["manv"];
				if ($conn->query($sql) === FALSE) {
					die("Error: " . $sql . $conn->error);
				}else header("Location: formaddnhanvien.php");
		}
	}
	
?>
