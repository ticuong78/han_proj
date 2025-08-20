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
    <header>
        <p> M27 Computer Gaming</p>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href=""><img src=""></a></li>
                <li>
                    <form>
                        <input type="search" class="form-control form-control-dark" value="<?= isset($_GET['name']) ? $_GET['name'] : "" ?>" name="name" placeholder="Search..." aria-label="Search">
                    </form>
                </li>
                <li><a href="./cart.php"><button><i class="fa-sharp fa-solid fa-cart-shopping"></i>Giỏ Hàng</button></li></a>
                <li> <a href=""> Lịch sử <br>mua hàng</a></li>
                <li> <a href=""> <i class="fa-brands fa-facebook"></i></a></li>
                <li> <a href=""> <i class="fa-brands fa-youtube"></i></a></li>
                <li><a href=""> <i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href=""> <i class="fa-brands fa-instagram"></i></a></li>
                <li id="address-from"><a href="#">Tiền Giang<i class="fa-solid fa-sort-down"></i></a></li>
                <?php
                if (isset($_SESSION['current_user'])) {
                    $currentUser = $_SESSION['current_user'];
                    echo '<div>Xin chào ' . $currentUser['fullname'] . '</div>';
                    echo '<a class="input-logOut" href="./dangxuat.php">Đăng xuất</a>';
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
                            <select name="">
                                <option value="#">Chọn khu vực</option>
                                <option value="#">Cần Thơ</option>
                                <option value="#">Hồ Chí Minh</option>
                            </select>
                            <select name="">
                                <option value="#">Quận/Huyện</option>
                                <option value="#">Cần Thơ</option>
                                <option value="#">Hồ Chí Minh</option>
                            </select>
                            <select name="">
                                <option value="#">Chọn Phường/Xã</option>
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
    <div class="main-content-2">
        <?php
        include './connect_m27.php';
        $result = mysqli_query($con, "SELECT dh.id,dh.id_sanpham,dh.userId,dh.name,dh.phone,dh.address,dh.total,sp.tensanpham
         ,sp.gia,sp.hinhanh,	sp.loaisanpham
          FROM `dathang` dh,`sanpham` sp
          WHERE dh.id_sanpham=sp.id and userId='" . $currentUser['id'] . "';");
        ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product-ls">
                <div class="container-ls">
                    <div class="product-itemss">
                        <div class="protuct-item-ls">
                           <h1><?= $row['tensanpham'] ?></h1> 
                            <img src="..<?= $row['hinhanh'] ?>" alt="">
                            <div class="product-item-text-ls">
                                <p><span> Giá Sản Phẩm :</span><?= $row['gia'] ?></p>
                                <p> <span> Tên Sản Phẩm :</span><?= $row['loaisanpham'] ?></p>
                                <p> <span> Họ Và Tên :</span><?= $row['name'] ?></p>
                                <p> <span> Số điện thoại :</span><?= $row['phone'] ?></p>
                                <p> <span> Địa chỉ:</span><?= $row['address'] ?></p>

                            </div>
                            <div class="xoalichsugiaohang">
                            <a href='./xoadonhang.php?id=<?= $row['id'] ?>'>Xóa</a></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>