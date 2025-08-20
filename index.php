<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>M27</title>
<head>
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
                <form >
          <input type="search" class="form-control form-control-dark" value="<?=isset($_GET['name']) ? $_GET['name'] : ""?>" name="name" placeholder="Search..." aria-label="Search">
        </form>
                </li>
                <li><a href="./cart.php"><button><i class="fa-sharp fa-solid fa-cart-shopping"></i>Giỏ Hàng</button></li></a> 
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
     <section class="slider">
        <div class="container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <div class="slider-content-top-contaitner">
                        <div class="slider-content-top">
                            <a href=""><img src="./img/maytinh2.jpg"></a>
                            <a href=""><img src="./img/laptop.jpg"></a>
                            <a href=""><img src="./img/iphone.jpg"></a>
                            <a href=""><img src="./img/pcmsi.jpg"></a>
                            <a href=""><img src="./img/iphone15.jpg"></a>
                        </div>
                        <div class="slider-content-btn">
                            <i class="fa-solid fa-chevron-left"></i>
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="slider-content-bottom">
                        <li class="active">PC</li>
                        <li>Điện Thoại</li>
                        <li>Bảo Hành</li>
                        <li>1</li>
                        <li>2</li>
                    </div>
                </div>
                <div class="slider-content-right">
                    <li><a href=""><img src="./img/right10.jpg"></a></li>
                    <li><a href=""><img src="./img/right6.jpg"></a></li>
                    <li><a href=""><img src="./img/right9.jpg"></a></li>
                    <li><a href=""><img src="./img/right8.jpg"></a></li>
                </div>
            </div>
        </div>
     </section>
   

     <?php
  ?>
    <!-- phan trang -->
    <?php
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if ($search) {
      $where = "WHERE `tensanpham` LIKE '%" . $search . "%'";
    }
    include './connect_m27.php';
    $quantity_item = !empty($_GET['per_page']) ? $_GET['per_page'] : 20;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $quantity_item;
    if ($search) {
      $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `tensanpham` LIKE '%" . $search . "%' ORDER BY `id` ASC  LIMIT " . $quantity_item . " OFFSET " . $offset);
     //tim kiem san pham roi phan trang
      $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `tensanpham` LIKE '%" . $search . "%'");
      //tim kiem san pham
    } else {
      $products = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY `id` DESC  LIMIT " . $quantity_item . " OFFSET " . $offset);
      $totalRecords = mysqli_query($con, "SELECT * FROM `sanpham`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords /  $quantity_item);
    ?>
    
    <h1  class="c">Top sản phẩm bán chạy</h1>
    <section class="product">
        <div class="gallery">  
            <!-- lap tat ca phan tu trong bien product luu bang bien row -->
    <?php while ($row = mysqli_fetch_array($products)) { //var_dump($row); exit; ?>
            
            <div class="content">                    
                <img src="..<?= $row['hinhanh'] ?>" alt="">
                <h3><?= $row['tensanpham'] ?></h3>
                <p><?= $row['mota'] ?></p>
                <h6><?= number_format($row['gia'], 0, ",", ".") ?> đ</h6>
                <ul>
                    <li><i class="fa fa-star checked"></i></li>
                    <li><i class="fa fa-star checked"></i></li>
                    <li><i class="fa fa-star checked"></i></li>
                    <li><i class="fa fa-star checked"></i></li>
                    <li><i class="fa fa-star checked"></i></li>
                </ul>
                <button class="buy-1">
                    <div class="btn-buy">
                        <a href="chitietsanpham.php?id=<?= $row['id'] ?>">Mua sản phẩm</a>
                    </div>
                </button>
            </div>
        
    <?php } ?>
</div>
</section>

    <?php
    include './phantrang.php';
    ?>



    <section id="feature" class="section-p1">

    </section>
    <section id="product1" lass="section-p1">
            <h2><i class="fa-brands fa-apple"></i>Iphone</h2>
            <div class="pro-container">
                <div class="pro">
                    <img src="./img/14pm.png">
                    <div class="des">
                        <span>Iphone 14 Pro Max</span>
                        <h5>Sản Phẩm Chính Hãng VNA</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>26.190.000₫</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
                </div>
                <div class="pro">
                    <img src="./img/13ip.jpg">
                    <div class="des">
                        <span>Iphone 13 128GB</span>
                        <h5>Sản Phẩm Chính Hãng VNA</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>16.490.000₫</h4>                        
                    </div>
                    <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
                </div>
                <div class="pro">
                    <img src="./img/12ip.png">
                    <div class="des">
                        <span>Iphone 12 64GB</span>
                        <h5>Sản Phẩm Chính Hãng VNA</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>13.590.000₫</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
                </div>
                <div class="pro">
                    <img src="./img/11.png">
                    <div class="des">
                        <span>Iphone 11 Glod</span>
                        <h5>Sản Phẩm Chính Hãng VNA</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>10.290.000₫                        </h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
                </div>
                <div class="pro">
                    <img src="./img/14plus.jpg">
                    <div class="des">
                        <span>Iphone 14 Plus</span>
                        <h5>Sản Phẩm Chính Hãng VNA</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>21.590.000₫</h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
                </div>                       
            </div>
    </section>
    <section id="product2" lass="section-p1">
        <img class="image" src="./img/samsunglogo.png"> 
        <div class="pro-container">
            <div class="pro">
                <img src="./img/galaxt zlip 256GB.jpeg">
                <div class="des">
                    <span>Galaxy Z Flip5</span>                    
                    <h5>Sản Phẩm Chính Hãng VNA</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>25.989.700 ₫</h4>
                </div>
                <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="./img/galaxy a24 6gb.jpg">
                <div class="des">
                    <span>Galaxy A24</span>
                    <h5>Sản Phẩm Chính Hãng VNA</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>6.190.000₫</h4>                        
                </div>
                <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="./img/galaxy a14.jpg">
                <div class="des">
                    <span>Galaxy A14</span>
                    <h5>Sản Phẩm Chính Hãng VNA</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>4.490.000₫</h4>
                </div>
                <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="./img/samsung-galaxy-zfold5.jpg">
                <div class="des">
                    <span>Galaxy Z Fold5 5G 256GB</span>
                    <h5>Sản Phẩm Chính Hãng VNA</h5>
                    <div class="star">
                        <p>40.990.000₫ (-17%)</p>
                    </div>
                    <h4>33.990.000₫</h4>                       
                </div>
                <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="./img/sam-sung-galaxy-zflip4.jpg">
                <div class="des">
                    <span>Galaxy Z Flip4 5G 128GB</span>
                    <h5>Sản Phẩm Chính Hãng VNA</h5>
                    <div class="star">
                        <p>23.990.000₫ (-42%)</p>
                    </div>
                    <h4>13.790.000₫</h4>
                </div>
                <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
            </div>                       
        </div>
</section>
<section id="product3" lass="section-p1">
    <h2><i class="fa-solid fa-desktop"></i>Máy Tính</h2>
    <div class="pro-container">
        <div class="pro">
            <img src="./img/PCTITANPlu i4070Ti.jpg">
            <div class="des">
                <span>PC TITAN Plus i9 4070Ti</span>
                <div class="star">
                  <div class="pk">
                    <span> <i class="fa-solid fa-desktop"></i>RTX 4070ti</span>
                    <span> i9 13900K</span>
                    <span> Z790</span>
                    <span><i class="fa-solid fa-hard-drive"></i> 500GB</span>
                  </div>
                </div>
                <h4>77.000.000₫</h4>
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>
        <div class="pro">
            <img src="./img/PC Gaming Singed.png">
            <div class="des">
                <span>Full Bộ PC Gaming Singed - Core i7 10700F / B460M / 16GB / GTX 1660 / 24 inch CONG</span>
                <div class="star">
                    <div class="pk">
                        <p>17,650,000 ₫</p>
                    </div>
                </div>
                <h4>14.260.000₫</h4>                        
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>
        <div class="pro">
            <img src="./img/PC GVN VIPER Plus i4070.jpg">
            <div class="des">
                <span>PC  VIPER Plus i4070</span>
                <div class="star">
                    <div class="pk">
                        <span> VGA RTX 4070ti  Ram 16Gb</span><br>
                        <span> CPU i3 13600KF</span><br>
                        <span> Main Z790</span><br>
                        <span>SSD 500GB</span><br>
                      </div>
                </div>
                <h4>47.620.000₫</h4>
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>
        <div class="pro">
            <img src="./img/pcasusrogstrixg35dx.jpg">
            <div class="des">
                <span>PC ASUS ROG STRIX G35DX</span>
                <div class="star">
                    <div class="pk">
                        <span> VGA RTX 4070ti  Ram 16Gb</span><br>
                        <span> CPU i3 13600KF</span><br>
                        <span> Main Z790</span><br>
                        <span>SSD 500GB</span><br>
                        <p>51.999.000₫ </p>
                      </div>
                </div>
                <h4>26.999.000₫</h4>
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>
        <div class="pro">
            <img src="./img/PCGamingĐoHoaChuyenNghiepKV.jpg">
            <div class="des">
                <span>PC Gaming, Đồ Họa Chuyên Nghiệp KV</span>
                <div class="star">
                    <div class="pk">
                        <span> CPU  i5-12400F</span><br>
                        <span> 16GB RAM </span><br>
                        <span> SSD 250GB Nvme </span><br>
                        <span> GTX 1660 6GB</span><br> 
                    </div>
                </div>
                <h4>16.450.000₫</h4>
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>   
        <div class="pro">
            <img src="./img/PC ADOBE(2023).jpg">
            <div class="des">
                <span>PC ADOBE (2023)</span>
                <div class="star">
                    <div class="pk">
                        <span> CCore i9-13900K </span><br>
                        <span> RTX 4090 </span><br>
                        <span>  Z690 </span><br>
                        <span>  64GB RAM </span><br>
                        <span>  500GB SSD </span><br>
                      </div>
                </div>
                <h4>89.000.000₫</h4>
            </div>
            <a href="#"><i class="fa-solid fa-bag-shopping cart"></i></a>
        </div>                    
    </div>
</section>
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
  <script src="script.js"></script>
    </body>
</html>