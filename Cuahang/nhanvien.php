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
            $sql = "SELECT * FROM nhanvien,account WHERE nhanvien.manv = account.manv AND access != 'admin'";
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
                <a href="index.php" class="btn btn-primary">Về Trang Chính</a>
                <a href="formaddnhanvien.php" class="btn btn-primary">Thêm Nhân Viên</a> 
                <a href="doimatkhau.php" class="btn btn-dark">Đổi mật khẩu</a>
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </td>
        </tr>
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
          <td>Action</td>
        </tr>
            <!-- lấy từng sản phẩm đang có trong database -->
        <?php 
            if ($result->num_rows > 0) {
                // output data of each row
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
                        <td><a href="formaddnhanvien.php?manv=<?php echo $row["manv"] ?>">Edit</a> | <a href="rundeletenhanvien.php?manv=<?php echo $row["manv"] ?>" class="delete">Delete</a></td>
                    </tr>
        <?php 
                }
             }
        ?>
        </table>

</body>
</html>
