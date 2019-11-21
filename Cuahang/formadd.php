<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Add product</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>
  <body class="bg-light">


  <style>
    body{
        padding-top: 50px;
    }
    table{

        text-align: center;
    }
    td{
        padding: 10px;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>


    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/logo2.png" alt=""  height="72">
        <h2>Add Product</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="addproduct.php" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" id="masp" name="masp" value="" required placeholder="Mã Sản Phẩm">
              </div>
            </div>

            <div class="mb-3">
              <div class="input-group">
                <input  type="text" class="form-control" id="tensp" name="tensp" value="" required placeholder="Tên Sản Phẩm">
              </div>
            </div>
			      <div class="form-inline" > 
        			<div class="mb-3">
                <div col-3 class="input-group">
                  <input col-3 type="text" class="form-control" id="soluong" name="soluong" value="" required placeholder="Số Lượng">
                </div>
              </div>
  			
        			<div class="mb-3">
                <div class="input-group">
                  <input class="form-control" id="gia" name="gia" value=""required placeholder="Giá"> </input>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group">
                  <input class="form-control" id="size" name="size" value=""required placeholder="Size"></input>
                </div>
              </div>
              <div class="mb-3">
                <div class="input-group">
                  <label for="loaisp">Loại sản phẩm:</label>
                  <select class="input-group" id="loaisp" name="loaisp">
                    <option value="Áo">Áo</option>
                    <option value="Quần">Quần</option>
                    <option value="Váy">Váy</option>
                    <option value="Túi">Túi</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                  <div class="input-group">
                    <label for="dvt">Đơn vị tính:</label>
                    <select class="input-group" id="dvt" name="dvt" >
                      <option value="Cái">Cái</option>
                      <option value="Bộ">Bộ</option>
                    </select>
                  </div>
                </div>
            </div>

			      <div class="mb-3">
              <label for="fileUpload">Hình ảnh</label>
              <div class="input-group">
                <input type="file" id="fileUpload" name="fileUpload" required>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg" type="submit">Add</button>
            <a class="btn btn-primary btn-lg" href="index.php">Về Trang Chính</a>
          </form>
        </div>
      </div>


  <br> <br>   <!--Table sản phẩm-->
  <h3>Product List</h3>
  <table cellpadding="10" cellspacing="0" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px"></tr>
      <?php 
        require_once("conn.php");
        $sql = "SELECT * FROM sanpham ";
        $result = $conn->query($sql);
      ?>
    <tr class="control" style="text-align: left; font-weight: bold; font-size: 17px">
      <td colspan="2">
          <p>Số lượng sản phẩm: <?php echo $result->num_rows ?></p>
      </td>
    </tr>
    <tr class="header">
      <td>Mã SP</td>
      <td>Hình Ảnh</td>
      <td>Tên SP</td>
      <td>Loại SP</td>
      <td>Số lượng</td>
      <td>Giá</td>
      <td>Size</td>
      <td>ĐVT</td>
      <td>Action</td>
    </tr>
        <!-- lấy từng sản phẩm đang có trong database -->
      <?php 
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
      
      ?>    
          <tr class="item">
            <td><?php echo $row["masp"]?></td>
            <td><img src="uploads/<?php echo $row["hinhanh"] ?>" style="max-height: 80px"></td>
            <td><?php echo $row["tensp"]?></td>
            <td><?php echo $row["loaisp"]?></td>
            <td><?php echo $row["soluong"]?></td>
            <td><?php echo $row["gia"]?></td>
            <td><?php echo $row["size"]?></td>
            <td><?php echo $row["dvt"]?></td>
            <td><a href="editproduct.php?masp=<?php echo $row["masp"] ?>">Edit</a></td>
          </tr>
      <?php 
        }
      }
      ?>
  </table>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 MOBILE WORLD</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer> 

  </body>
</html>
