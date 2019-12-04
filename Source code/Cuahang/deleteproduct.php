<?php
	require_once("conn.php");
	
	$masp = $_GET["masp"];
	$sql = "SELECT * FROM sanpham WHERE masp='$masp'";

	$result = $conn->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $hinhanh = $row["hinhanh"];
    }
    unlink("../uploads/$hinhanh");
	// sql to delete a record
	$sql = "DELETE FROM sanpham WHERE masp='$masp'";

	if ($conn->query($sql) == TRUE) {
		if ($SESSION["access"] == "admin")
			header('Location: indexadmin.php');
		else
			header('Location: indexquanly.php');
	} 
	else {
		die("Error deleting record: " . $conn->error);
	}
	$conn->close();
?>
