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

    <title>Signin</title>

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
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      
	  <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      
	  <label for="inputPassword" class="sr-only">Password</label>
      
	  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];
			$sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";
			require_once("conn.php");
			$result = $conn->query($sql);
			$rows = $result->fetch_assoc();
			$access = $rows["access"];
			$username = $rows["username"];
			if ($result->num_rows <= 0) {								
				echo "Login Failed";
			}
			else{
				$_SESSION["username"] = $username;
				$_SESSION["access"] = $access;
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
			}
		}
		?>
    </form>
	
  </body>
</html>
