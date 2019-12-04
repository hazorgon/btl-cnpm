<?php 
 	require_once("conn.php");
 	$manv = $_GET["manv"];
 	$sql = "DELETE FROM nhanvien WHERE manv='$manv'";

	if ($conn->query($sql) == TRUE) 
			header('Location: nhanvien.php');
	else {
		die("Error deleting record: " . $conn->error);
	}
	$conn->close();
 ?>
