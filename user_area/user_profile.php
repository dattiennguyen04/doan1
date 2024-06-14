<?php
include("../function/common_function.php");
include("../config/config.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    ul {
        list-style: none;
    }

    .user_info li {
        margin: 8px 0;
    }
</style>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div class="banner-page-list">
            <div id="content">
                <div class="banner">
                    <h1>Trang Khách Hàng</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="../pages/index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Trang khách hàng</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="display: flex;" class="container user_info">
            <ul>
                <li>
                    <h2>Trang Tài Khoản</h2>
                </li>
                <li>Xin chào </li>
                <li><a href="user_profile.php">Thông tin tài khoản</a></li>
                <li><a href="user_order.php">Đơn hàng của bạn</a></li>
                <li><a href="address.php">Địa chỉ</a></li>
                <li><a href="user_order.php">Thông tin đặt hàng</a></li>
            </ul>
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                $select_query = "SELECT * FROM tbl_user WHERE user_name='$username'";
                $result = mysqli_query($connect, $select_query);

                if ($result) {
                    $rows = mysqli_fetch_assoc($result);

                    if ($rows) {
                        $user_name = $rows['user_name'];
                        $user_email = $rows['user_email'];

                        echo "
                            <ul style='margin-left: 50px;'>
                                <li>
                                    <h2>Thông Tin Tài Khoản</h2>
                                </li>
                                <li>Họ Tên: $user_name</li>
                                <li>Mail: $user_email</li>
                            </ul>
                        ";
                    }
                }
            }
            ?>
        </div>
        <div id=" footer">
            <?php
            include("../config/footer.php");
            ?>
        </div>
    </div>

</body>

</html>