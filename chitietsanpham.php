<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <p> M27 Computer Gaming</p>
        <?php
  session_start();
  ?>
    </header> 
    <nav>
        <div class="container">
            <ul>
                <li><a href=""><img src=""></a></li>
                <li>
                <form >
          <input type="search" class="form-control form-control-dark" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" placeholder="Search..." aria-label="Search">
        </form>
                </li>
                <li><a href=""></a> <button><i class="fa-sharp fa-solid fa-cart-shopping"></i>Giỏ Hàng</button></li>
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
     <section class="menu">
        <div class="container">
            <div class="menu-content">
                <ul>
                    <li><a href="">Danh Mục Sản Phẩm</a>
                        <div class="submenu">
                            <ul>
                                <li><a href="a.html">Linh Kiện PC</a></li>
                                <li><a href="">Bàn Ghế</a></li>
                                <li><a href="">Màn Hình</a></li>
                                <li><a href="">Phụ Kiện</a></li>
                                <li><a href="">Gaming Gear</a></li>
                                <li><a href="">Thanh Lí</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">Tin Tức</a></li>
                    <li><a href="">Thanh Toán</a></li>
                    <li><a href="">Điện Thoại</a>
                        <div class="submenu2">
                            <ul>
                                <li><a href="">Iphone</a></li>
                                <li><a href="">SamSung</a></li>
                                <li><a href="">Oppo</a></li>
                                <li><a href="">Redmi</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="">Laptop</a></li> 
                    <li><a href="">Chính Sách Bảo Hành</a></li>
                </ul>
            </div>
        </div>
     </section>
</body>

  <?php 
  include './connect_m27.php';
  $result=mysqli_query($con,"SELECT * FROM `sanpham` WHERE `id`=".$_GET['id']);
  $product = mysqli_fetch_assoc($result); 
  //var_dump($product); exit;
  
  ?>
  
                <main class="container1">
        
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
                <img src="..<?= $product['hinhanh'] ?>" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <h1><?=$product['tensanpham']?></h1>
            <p><?=$product['noidungchitiet']?></p>
        </div>
 <div class="product-price">
                <h1>Giá:<?=$product['gia']?> đ</h1> 
                <br>
        </div>
        <!-- Product Configuration -->
        <div class="product-configuration">

          
            <div class="cable-config">
            
            <form class="quantity" action="cart.php?action=add" method="POST">
         </div>       
    <button type="button" onclick="decrement(event)">-</button>
    <input type="text" name="quantity[<?=$product['id']?>]" size="2" id="quantity" value="1">
    <button type="button" onclick="increment(event)">+</button>
    <input class="add-to-cart" type="submit" class="input-buy-product" name="" value="Thêm Vào Giỏ Hàng">
</form>
        </div>

        <!-- Product Pricing -->
       
        </div>
        </main> 
        <script src="script.js"></script>
        <script>
    function increment(event) {
        var input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
        event.preventDefault(); // Ngăn chuyển hướng mặc định
    }

    function decrement(event) {
        var input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
        event.preventDefault(); // Ngăn chuyển hướng mặc định
    }
</script>

<footer >
    <div class="main-content">
        <div class="left box">
            <h2>Thông Tin</h2>
            <div class="content-1">
                <p>Chuyên cung cấp các linh kiện điện tử thông minh như iphone , samsung,laptop, máy tính văn phòng, máy tính gaming.......</p>
                <div class="social">
                    <a href="#"><span class="fab fa-facebook"></span></a>
                    <a href="#"><span class="fab fa-twitter"></span></a>
                    <a href="#"><span class="fab fa-instagram"></span></a>
                    <a href="#"><span class="fab fa-youtube"></span></a>
                </div>
            </div>
        </div>
        <div class="center box">
            <h2>Địa Chỉ</h2>
            <div class="content-2">
                <div class="palce">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">204 ấp Bình Tạo , Xã Trung An, TP Mỹ Tho,Tiền Giang</span>
                </div>
                <div class="phone">
                    <span class="fas fa-phone-alt"></span>
                    <span class="text">0825444779</span>
                </div>
                <div class="email">
                    <span class="fas fa-envelope"></span>
                    <span class="text">mtran2587@gmail.com</span>
                </div>
            </div>
        </div>

        <div class="rightbox">
            <h2>Liên Hệ Với Chúng Tôi </h2>
            <div class="content-3">
                <from action="#">
                    <div class="email">
                        <div class="text">Email *</div>
                        <input type="email" required>
                    </div>
                    <div class="msg">
                        <div class="text">Message *</div>
                        <textarea name="name" id="" cols="80" required></textarea>
                    </div>
                </from>
                <div class="btn">
                    <button>Gửi</button>
                </div>
            </div>
        </div>
    </div>
</footer>
        </html>