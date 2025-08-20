<?php

                $error = false;
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    include './connect_m27.php';
                    $result = mysqli_query($con, "DELETE FROM dathang WHERE id=" . $_GET['id'] );
                    if (!$result) {
                        $error = "Không thể xóa sản phẩm.";
                    }
                    echo'Xóa sản phẩm thành công';
                    mysqli_close($con);
                }
            ?>