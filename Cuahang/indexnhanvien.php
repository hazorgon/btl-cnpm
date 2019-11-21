<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ Quản lý</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


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


<?php 
    require_once("conn.php");
        $username = $_SESSION["username"];
        $sql = "SELECT * FROM nhanvien,account WHERE username = '$username' and nhanvien.manv = account.manv";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $houser = $row["ho"];
        $tenuser = $row["ten"];
        $hotenedit = $houser.' '.$tenuser;
        $sql = "SELECT * FROM sanpham";
        $result = $conn->query($sql);
?>
<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="control" style="text-align: left; font-weight: bold; font-size: 15px">
        <td colspan="5">
            <div>Xin chào:  <?php echo $hotenedit ?></div>
        </td>
    </tr>

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="5">
            <a href="doimatkhau.php" class="btn btn-dark">Đổi mật khẩu</a>
            <a href="logout.php"  class="btn btn-dark">Logout</a>
        </td>
    </tr>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
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
          </tr>
      <?php 
        }
      }
      ?>
    </table>


<!-- Delete Confirm Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
