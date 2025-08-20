<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style_admin.css">
</head>
<body>
<?php
include './connect_m27.php';
include './function.php';
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $hinhanh= '';
    $loaisanpham = $_POST['loaisanpham'];
    $noidungchinh=$_POST['contentMain'];

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $uploadedFiles = $_FILES['image'];
        $result = uploadFiles($uploadedFiles);
        if (!empty($result['errors'])) {
            $error = $result['errors'];
        } else {
            $hinhanh = $result['path']; // Assign the path to $hinhanh
        }
    }


    $result = mysqli_query($con,"INSERT INTO sanpham (tensanpham,mota,gia,hinhanh,loaisanpham,noidungchitiet) VALUES ('".$name. "', '".$content. "', '".$price. "', '".$hinhanh. "', '".$loaisanpham. "','".$noidungchinh. "')");
    if ($result) {
        echo 'Thêm dữ liệu thành công';
    } else {
        echo 'Thêm dữ liệu thất bại';
    }
} else {
    ?>
    <div class="main-content">
        <form id="product-form" action="?action=add" method="POST" enctype="multipart/form-data">
            <div class="clear-both"></div>
    <div class="wrap-field">
        <label>Tên sản phẩm: </label>
        <input type="text" name="name">
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Giá : </label>
        <input type="text" name="price">
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>Ảnh: </label>
        <input type="file" name="image">
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>nội dung: </label>
        <textarea name="content" id="product-content"></textarea>
        <div class="clear-both"></div>
    </div>
    <div class="wrap-field">
        <label>loại sản phẩm : </label>
        <input type="text" name="loaisanpham">
        <div class="clear-both"></div>
    </div>
    <label>Nội dung chi tiết : </label>
    <textarea name="contentMain" id="" cols="30" rows="10"></textarea>
    </div>
            <input type="submit" class="btn-add" value="Thêm sản phẩm">
        </form>
    </div>
    <?php
}
?>

</body>
</html>