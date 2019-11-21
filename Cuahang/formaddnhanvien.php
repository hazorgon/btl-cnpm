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
      <h2>Add Employees</h2>
    </div>

    <div class="row">
      <div class="col-md order-md-1">
        <form action="runaddnhanvien.php" method="POST" enctype="multipart/form-data">
        <!-- Lấy thông tin nhân viên khi chỉnh sửa -->
        <?php
          $manv = $ho = $ten = $sdt = $diachi = $luong = $ngaysinh = $thangsinh = $namsinh = $ngaybd = $thangbd = $nambd = $access = $username =  "";
           if(isset($_GET["manv"])){
            $manv = $_GET["manv"];
            require_once("conn.php");
            $sql = "SELECT * FROM nhanvien,account WHERE nhanvien.manv = $manv AND nhanvien.manv = account.manv";
            $result = $conn->query($sql) or die($conn->error);
            if ($result->num_rows>0){
              $row = $result->fetch_assoc();
              $manv = $row["manv"];
              $ho = $row["ho"];
              $ten = $row["ten"];
              $sdt = $row["sdt"];
              $diachi = $row["diachi"];
              $luong = $row["luong"];
              $sinh = explode('-', $row["ngaysinh"]);
              $ngaybatdau = explode('-', $row["ngaybatdau"]);
              $namsinh =  $sinh[0];
              $thangsinh =  $sinh[1];
              $ngaysinh =  $sinh[2];
              $nambd = $ngaybatdau[0];
              $thangbd = $ngaybatdau[1];
              $ngaybd = $ngaybatdau[2];
              $access = $row["access"];
              $username = $row["username"];
            }
          }
        ?> 
          <div class="form-inline" >
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" id="ho" name="ho" value="<?php echo $ho ?>" required placeholder="Họ">
              </div>
            </div>

            <div class="mb-3">
              <div class="input-group">
                <input  type="text" class="form-control" id="ten" name="ten" value="<?php echo $ten ?>" required placeholder="Tên">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <input  type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $sdt ?>" required placeholder="Số điện thoại">
              </div>
            </div>
          </div>
          <!-- end off line 1 -->

          <div class="form-inline" >
            <div class="mb-3">
              <div class="input-group">
                <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $diachi ?>" required placeholder="Địa chỉ">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <input  type="text" class="form-control" id="luong" name="luong" value="<?php echo $luong ?>" required placeholder="Lương">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <input  type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" required placeholder="Username">
              </div>
            </div>
          </div>
          <!-- end off line 2 -->

		      <div class="form-inline" >
            <div class="mb-3 form-control">
              <label for="name">Ngày sinh</label>  
              <div class="input-group"> 
                <select class="input-group" id="ngaysinh" name="ngaysinh">
                  <?php for($i=1;$i<=31;$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($ngaysinh == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
                <select class="input-group" id="thangsinh" name="thangsinh">
                  <?php for($i=1;$i<=12;$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($thangsinh == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
                <select class="input-group" id="namsinh" name="namsinh">
                  <?php for($i=1975;$i<=date("Y");$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($namsinh == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
              </div>
            </div>

            <div class="mb-3 form-control">
              <label for="ngaybatdau">Ngày bắt đầu</label>  
              <div class="input-group ">
                <select class="input-group" id="ngaybd" name="ngaybd">
                  <?php for($i=1;$i<=31;$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($ngaybd == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
                <select class="input-group" id="thangbd" name="thangbd">
                  <?php for($i=1;$i<=12;$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($thangbd == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
                <select class="input-group" id="nambd" name="nambd">
                  <?php for($i=2010;$i<=date("Y");$i++) { ?>
                    <option value = "<?php echo $i ?>" <?php if ($nambd == $i) echo "selected" ?>><?php echo $i ?></option> 
                  <?php } ?>                 
                </select>
              </div>
            </div>

            <div class="mb-3 form-control">
              <label for="ngaybatdau">Chức vụ</label>  
              <div class="input-group ">
                <select class="input-group" id="access" name="access">
                  <option value = "quanly" <?php if ($access == "quanly") echo "selected" ?> >Quản lý</option> 
                  <option value = "nhanvien" <?php if ($thangbd == "nhanvien") echo "selected" ?> >Nhân viên</option> 
                </select>
              </div>
            </div> 
          </div> 

        <!-- end off line 3 -->

            <input type="hidden" name="manv" id="manv" value="<?php echo $manv ?>">
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg" type="submit">Add</button>
            <a class="btn btn-primary btn-lg" href="nhanvien.php">Về Trang Nhân Viên</a> 
        </form>
      </div>
    </div>
  </div>
      <!-- Kết thúc form nhập nhân viên -->

    <!-- xem nhân viên vừa được nhập thành công -->
  <?php
      require_once("conn.php");
      $sql = $sql = "SELECT * FROM nhanvien,account WHERE nhanvien.manv = account.manv AND access != 'admin'";;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
  ?>
        <table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
          <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
            <td colspan="5">
                <p>Số lượng nhân viên: <?php echo $result->num_rows ?></p>
            </td>
          </tr>
          <tr class="header">
            <td>Mã NV</td>
            <td>Họ</td>
            <td>Tên</td>
            <td>Ngày sinh</td>
            <td>Địa chỉ</td>
            <td>SĐT</td>
            <td>Ngày bắt đầu</td>
            <td>Lương</td>
            <td>Username</td>
            <td>Action</td>
          </tr>
   <?php 
      if ($result->num_rows > 0) {
        // output data of each row
        //chuyển đổi từ ngày tháng định dạng sang ngày tháng thường dùng
        while($row = $result->fetch_assoc()) {
            $ngaysinh = explode('-', $row["ngaysinh"]);
            $ngaybatdau = explode('-', $row["ngaybatdau"]);
            $ngaysinhedit = $ngaysinh[2].'/'.$ngaysinh[1].'/'.$ngaysinh[0];
            $ngaybatdauedit = $ngaybatdau[2].'/'.$ngaybatdau[1].'/'.$ngaybatdau[0];
      
      ?>    
          <tr class="item">
            <td><?php echo $row["manv"]?></td>
            <td><?php echo $row["ho"]?></td>
            <td><?php echo $row["ten"]?></td>
            <td><?php echo $ngaysinhedit?></td>
            <td><?php echo $row["diachi"]?></td>
            <td><?php echo $row["sdt"]?></td>
            <td><?php echo $ngaybatdauedit?></td>
            <td><?php echo $row["luong"]?></td>
            <td><?php echo $row["username"]?></td>
            <td><a href="formaddnhanvien.php?manv=<?php echo $row["manv"] ?>">Edit</a> | <a href="rundeletenhanvien.php?manv=<?php echo $row["manv"] ?>" class="delete">Delete</a></td>
          </tr>
  <?php 
        }
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
