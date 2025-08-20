<!DOCTYPE html>
<html>

<head>
    <title>Đăng Ký</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .box-content {
            margin: 0 auto;
            width: 800px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 20px;
        }

        #user_register form {
            width: 200px;
            margin: 40px auto;
        }

        #user_register form input {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php
    include './connect_m27.php';
    include './function.php';
    $error = false;

    if (isset($_GET['action']) && $_GET['action'] == 'reg') {
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $fullname = $_POST['fullname'];
            $birthday = $_POST['birthday'];
            $check = validateDateTime($birthday);

            if ($check) {
                $birthday = strtotime($birthday);
                $query = "INSERT INTO `khachhang` (`username`, `password`, `fullname`, `ngaysinh`) VALUES ( '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'),'" . $_POST['fullname'] . "', '" . $birthday . "');";
                try {
                    mysqli_query($con, $query);
                } catch (Exception $e) {
                    echo ("Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.");
                    echo '<a href="./register.php"> Quay về trang đăng ký</a>';
                    goto ex;
                }
                mysqli_close($con);
            } else {
                $error = "Ngày tháng nhập chưa chính xác";
            }
        } else {
            $error = "Vui lòng nhập đủ thông tin để đăng ký tài khoản";
        }

        if ($error !== false) {
            // Hiển thị thông báo lỗi
            echo '<div id="error-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4>' . $error . '</h4>
                    <a href="./register.php">Quay lại</a>
                  </div>';
        } else {
            // Hiển thị thông báo đăng ký thành công
            echo '<div id="edit-notify" class="box-content">
                    <h1>Đăng ký tài khoản thành công</h1>
                    <a href="./dangnhap.php">Mời bạn đăng nhập</a>
                  </div>';
        }
    } else {
        // Hiển thị form đăng ký
        echo '<div id="user_register" class="box-content">
                <h1>Đăng ký tài khoản</h1>
                <form action="./dangky.php?action=reg" method="Post" autocomplete="off">
                    <label>Username</label><br/>
                    <input type="text" name="username" value=""><br/>
                    <label>Password</label><br/>
                    <input type="password" name="password" value="" /><br/>
                    <label>Họ tên</label><br/>
                    <input type="text" name="fullname" value="" /><br/>
                    <label>Ngày sinh (DD-MM-YYYY)</label><br/>
                    <input type="text" name="birthday" value="" /><br/><br/><br/>
                    <input type="submit" value="Đăng ký"/>
                </form>
              </div>';
    }
    ex:
    ?>

</body>

</html>