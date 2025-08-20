<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "bandienthoaimaytinh";
$con = mysqli_connect(, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
}