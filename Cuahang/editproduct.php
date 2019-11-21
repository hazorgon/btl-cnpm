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
          <form action="runeditproduct.php" method="POST" enctype="multipart/form-data"> 
            <?php
               if(isset($_GET["masp"])){
                $masp = $_GET["masp"];
                require_once("conn.php");
                $sql = "SELECT * FROM sanpham WHERE masp = '$masp' ";
                $result = $conn->query($sql);
                if ($result->num_rows>0){
                  $row = $result->fetch_assoc();
                  $tensp = $row["tensp"];
                  $soluong = $row["soluong"];
                  $gia = $row["gia"];
                  $size = $row["size"];
                  $loaisp = $row["loaisp"];
                  $dvt = $row["dvt"];
                }
              }
            ?> 
              <div class="mb-3">
                <div class="input-group">
                  <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $masp ?>" required placeholder="Mã Sản Phẩm">
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <input  type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $tensp ?>" required placeholder="Tên Sản Phẩm">
                </div>
              </div>

            
            <div class="form-inline" > 
              <div class="mb-3">
                <div col-3 class="input-group">
                  <input col-3 type="text" class="form-control" id="soluong" name="soluong" value="<?php echo $soluong ?>" required placeholder="Số Lượng">
                </div>
              </div>
        
              <div class="mb-3">
                <div class="input-group">
                  <input class="form-control" id="gia" name="gia" value="<?php echo $gia ?>" required placeholder="Giá"> </input>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <input class="form-control" id="size" name="size" value="<?php echo $size ?>" required placeholder="Size"></input>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <label for="loaisp">Loại sản phẩm:</label>
                  <select class="input-group" id="loaisp" name="loaisp">
                    <option value="Áo" <?php if($loaisp=="Áo") echo "selected" ?>>Áo</option>
                    <option value="Quần" <?php if($loaisp=="Quần") echo "selected" ?>>Quần</option>
                    <option value="Váy" <?php if($loaisp=="Váy") echo "selected" ?>>Váy</option>
                    <option value="Túi" <?php if($loaisp=="Túi") echo "selected" ?>>Túi</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <div class="input-group">
                  <label for="loaisp">Đơn vị tính:</label>
                  <select class="input-group" id="dvt" name="dvt" >
                    <option value="Cái" <?php if($dvt=="Cái") echo "selected" ?>>Cái</option>
                    <option value="Bộ" <?php if($dvt=="Bộ") echo "selected" ?>>Bộ</option>
                  </select>
                </div>
              </div>
            </div>
            <input type="hidden" name="masp" value="<?php echo $masp ?>">
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg" type="submit">Edit</button>
            <a class="btn btn-primary btn-lg" href="index.php">Về trang chính</a>
          </form>
        </div>
      </div>
   
  </body>
</html>
