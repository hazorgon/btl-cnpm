<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

	<style>
	html,
	body {
	  height: 100%;
	}

	body {
	  display: -ms-flexbox;
	  display: -webkit-box;
	  display: flex;
	  -ms-flex-align: center;
	  -ms-flex-pack: center;
	  -webkit-box-align: center;
	  align-items: center;
	  -webkit-box-pack: center;
	  justify-content: center;
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #f5f5f5;
	}

	.form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .checkbox {
	  font-weight: 400;
	}
	.form-signin .form-control {
	  position: relative;
	  box-sizing: border-box;
	  height: auto;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>
  </head>

  <body class="text-center">
    <form action="" method="POST" class="form-signin">
	  <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	  <h1 class="h3 mb-3 font-weight-normal">Đổi mật khẩu</h1>

	  <label for="oldpass" class="sr-only">Mật khẩu cũ</label>
	  
	  <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Nhập mật khẩu cũ" required> 

	  <label for="newpass1" class="sr-only">nhập mật khẩu mới</label>
	  
	  <input type="password" name="newpass1" id="newpass1" class="form-control" placeholder="Nhập mật khẩu mới" required autofocus>
	  
	  <label for="newpass2" class="sr-only">Nhập lại mật khẩu mới</label>
	  
	  <input type="password" name="newpass2" id="newpass2" class="form-control" placeholder="Nhập lại mật khẩu mới" required>

	  <button class="btn btn-lg btn-primary btn-block" type="submit">Đổi mật khẩu</button>
<?php
	
	if (isset($_POST["oldpass"]) && isset($_POST["newpass1"]) && isset($_POST["newpass2"])) {
		$username = $_SESSION["username"];
		$oldpass = $_POST["oldpass"];
		$newpass1 = $_POST["newpass1"];
		$newpass2 = $_POST["newpass2"];
		$sql = "SELECT * FROM account WHERE username = '$username' and password = '$oldpass'";
		require_once("conn.php");
		$result = $conn->query($sql) or die("Error: " . $sql . $conn->error);
		if ($result->num_rows <= 0) {								
			echo "Sai mật khẩu";
		}
		elseif($newpass1 != $newpass2){
			echo "Mật khẩu mới không trùng khớp";
		}
		else{
			$row = $result->fetch_assoc();
			$access = $row["access"];
			$id = $row["id"];
			$sql = "UPDATE account set password = '$newpass1' WHERE id = $id";
			if ($conn->query($sql) === FALSE) 
				die("Error: " . $sql . $conn->error);
			else{
				echo "Successfull";
				
			}
		}
	}

?>
	<a href="index.php" class="btn btn-dark btn-block">Về Trang Chính</a> 
    </form>
    
	
  </body>
</html>
