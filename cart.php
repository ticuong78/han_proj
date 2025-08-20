<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    ?>
<nav>
        <div class="container">
            <ul>
                <li><a href=""><img src=""></a></li>
                <li>
                <form >
          <input type="search" class="form-control form-control-dark" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" placeholder="Search..." aria-label="Search">
        </form>
                </li>
                <li><a href="./giohang.php"><button><i class="fa-sharp fa-solid fa-cart-shopping"></i>Giỏ Hàng</button></li></a> 
                <li> <a href="./lichsumuahang.php"> Lịch sử <br>mua hàng</a></li>
                <li> <a href=""> <i class="fa-brands fa-facebook"></i></a></li>
                <li> <a href=""> <i class="fa-brands fa-youtube"></i></a></li>
                <li><a href=""> <i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href=""> <i class="fa-brands fa-instagram"></i></a></li>
                <li id="address-from"><a href="#">Tiền Giang<i class="fa-solid fa-sort-down"></i></a></li>
                <?php
          if (isset($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
            echo '<div>Xin chào ' . $currentUser['fullname'] . '</div>';
            echo '<a class="input-logOut" href="./logout.php">Đăng xuất</a>';
          } else {
            echo '<li><a href="./dangky.php">Đăng Ký</a></li>
            <li><a href="./dangnhap.php">Đăng Nhập</a></li>';
          }
          ?>
                <div class="address-from">
                    <div class="address-from-content">
                        <h2>Chọn địa chỉ nhận hàng <span id="address-close"> X Đóng</span></h2>
                        <form action="">
                            <p>Quý khách vui lòng nhập đầy đủ thông tin!</p>
                            <select name="" >
                                <option value="#">Chọn khu vực</option>
                                <option value="#">Cần Thơ</option>
                                <option value="#">Hồ Chí Minh</option>
                            </select>
                            <select name="" >
                                <option value="#">Quận/Huyện</option>
                                <option value="#">Cần Thơ</option>
                                <option value="#">Hồ Chí Minh</option>
                            </select>
                            <select name=""><option value="#">Chọn Phường/Xã</option>
                                <option value="#">Cần Thơ</option>
                                <option value="#">Hồ Chí Minh</option>
                            </select>
                            <input type="text" placeholder=" Số Nhà , Tên Đường">
                            <button>Xác Nhận</button>
                        </form>
                    </div>
                </div>
            </ul>
         </div>
     </nav>
     <div class="content-main">
        <h1>Giỏ Hàng</h1>
     </div>
     <?php
    include './connect_m27.php';
   
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    $error = false;
    
    if (isset($_GET['action'])) {
        function update_cart($add = false)
        {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                    //tat phien dat hang
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                        //congn so luong
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                        // them sl vao san pham 
                    }
                }
            }
        }
    }
    
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "add":
                update_cart(true);
                header('Location: ./cart.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('Location: ./cart.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) {
                    update_cart();
                    header('Location: ./cart.php');
                } elseif (isset($_POST['order_click'])) {
                    if (empty($_POST['name'])) {
                        $error = "Bạn chưa nhập tên của người nhận";
                    } elseif (empty($_POST['phone'])) {
                        $error = "Bạn chưa nhập số điện thoại người nhận";
                    } elseif (empty($_POST['address'])) {
                        $error = "Bạn chưa nhập địa chỉ người nhận";
                    } elseif (empty($_SESSION['cart'])) {
                        $error = "Giỏ hàng rỗng";
                    }
                    if ($error == false && !empty($_SESSION['cart'])) {
                        $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_SESSION['cart'])) . ")");
                        $total = 0;
                        $tongtien=0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $orderProducts[] = $row;
                            $rowidproduct=$row['id'];
                            //var_dump($rowidproduct); exit;
                            $sl = $_SESSION['cart'][$row['id']];
                            $tongtien += $row['gia']*$_SESSION['cart'][$row['id']];
                            $insertOrder = mysqli_query($con, "INSERT INTO `dathang` (`id`, `id_sanpham`, `userId`, `name`, `phone`, `address`, `total`, `sl`,`tongtien`) VALUES (NULL, '$rowidproduct', '" . $currentUser['id'] . "', '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $row['gia'] . "', '" . $sl . "','" . $tongtien . "');");
                            $success = "Đặt hàng thành công";
                            
                        }
                        unset($_SESSION['cart']);
                    }
                }
                break;
        }
    }
    
    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
    
    ?>
        <div class="container cart-container">
            <?php if (!empty($error)) { ?>
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a></i>
                </div>
            <?php } else { ?>
                <a class="buy-again" href="index.php">Quay Về</a>
                <h1 class="giohang">Giỏ hàng</h1>
                <div id="content-cart">
                <div class="infor-cart">
                    <form id="cart-form" action="cart.php?action=submit" method="POST">
                        <table>
                            <tr class="css">
                                <th class="product-number">STT</th>
                                <th class="product-names">Tên sản phẩm</th>
                                <th class="product-img">Ảnh sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="total-money">Thành tiền</th>
                            </tr>
                            <?php
                            if (!empty($products)) {
                                $total = 0;
                                $num = 1;
                                while ($row = mysqli_fetch_array($products)) {
                            ?>
                    <tr class="table-product">
                                        <td class="product-number"><?= $num++; ?></td>
                                        <td class="product-name-buy"><?= $row['tensanpham'] ?></td>
                                        <td class="product-img-buy"><img src="../<?= $row['hinhanh'] ?>" /></td>
                                        <td class="product-price"><?= number_format($row['gia'], 0, ",", ".") ?></td>
                                        <td class="product-quantity"><?= $_SESSION["cart"][$row['id']] ?></td>
                                        <td class="total-money"><?= number_format($row['gia'] * $_SESSION["cart"][$row['id']], 0, ",", ".") ?></td>
                                        <td class="product-delete"><a href="cart.php?action=delete&id=<?= $row['id'] ?>">Xóa</a></td>
                                    </tr>
                                <?php
                                    //var_dump($row['id']); exit;
                                    $total += $row['gia'] * $_SESSION["cart"][$row['id']];
                                    $num++;
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </table>
                    </form>
                    <a href="./trangthaidonhang.php">Xem trạng thái đơn hàng</a>
                </div>
                <div class="col-lg-5">
                    <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0">Chi Tiết Giao Hàng</h5>
                            </div> 
                            <form class="mt-4" action="cart.php?action=submit" method="POST">
                                <div class="input-field">
                                    <input type="text" name="name" id="typeName" class="form-control form-control-lg">
                                    <label class="form-label" for="typeName">Vui lòng nhập Tên Của Bạn</label>
                                </div>
    
                                <div class="input-field">
                                <input type="text" name="phone" id="typeText" class="form-control form-control-lg">
                                    <label class="form-label" for="typeText">Vui lòng nhập đúng số điện thoại</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="address" id="typeText" class="form-control form-control-lg">
                                    <label class="form-label" for="typeText">Vui lòng nhập đúng địa chỉ</label>
                                </div>
    
                                <div class="form-outline">
                                    <div class="col-mb-4">
                                        <div class="form-outline form-white">
                                        </div>
                                    </div>
                                   <input class="dathang" type="submit" name="order_click" value="Đặt Hàng" class="btn btn-info btn-block btn-lg">
                            </form> 
                            
                            <br>
                            <hr class="my-4">
    
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Tổng Phụ</p>
                                <p class=><?= number_format($total, 0, ",", ".") ?>đ</p>
                            </div>

    
                            <div class="d-flex justify-content-between mb-4">
                                <p class="mb-2">Số Tiền Để Nhận Hàng</p>
                                <p class=><?= number_format($total, 0, ",", ".") ?>đ</p>
                            </div>
    
                            
                            </input>
    
                        </div>
                    </div>
                </div>
                </div>
        </div>
    <?php } ?>
</body>
</html>