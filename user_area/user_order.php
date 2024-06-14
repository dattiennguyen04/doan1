<?php
include("../config/config.php");
include("../function/common_function.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    ul {
        list-style: none;
    }

    .user_info li {
        margin: 8px 0;
    }

    th {
        border: 1px solid #c1cdcd;
        background-color: #bda87f;
        color: #ffff;
        text-align: center;

    }

    td {
        padding: 0 30px;
        border: 1px solid #c1cdcd;
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
            <?php

            ?>
            <div class="row">

                <div class="col-3">
                    <ul>
                        <li>
                            <h2>Trang Tài Khoản</h2>
                        </li>
                        <li>Xin chào </li>
                        <li><a href="user_profile.php">Thông tin tài khoản</a></li>
                        <li><a href="user_order.php">Đơn hàng của bạn</a></li>
                        <li><a href="address.php">Địa chỉ</a></li>

                    </ul>
                </div>

                <div class="col-9">
                    <ul style="margin-left: 50px;">
                        <li>
                            <h2>Thông Tin Đặt Hàng</h2>
                        </li>
                        <div class="thongtin_taikhoan">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn hàng</th>
                                        <th>Ngày</th>
                                        <th>Địa chỉ</th>
                                        <th>Giá trị đơn hàng</th>
                                        <th>Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // nếu tồn tại phiên người dùng (tức là đã đăng nhập vào rồi thì thực hiện code bên dưới)
                                    if (isset($_SESSION['username'])) {
                                        $username = $_SESSION['username'];

                                        $select_query = "SELECT * FROM tbl_user WHERE user_name='$username'";
                                        $result = mysqli_query($connect, $select_query);
                                        $row = mysqli_fetch_array($result);
                                        $user_address = $row['user_address'];
                                        if ($result) {
                                            $select_user_order = "SELECT * from tbl_user_orders";
                                            $result_user_order = mysqli_query($connect, $select_user_order);
                                            while ($rows = mysqli_fetch_array($result_user_order)) {
                                                $amount_due = $rows['amount_due'];
                                                $invoice_number = $rows['invoice_number'];
                                                $total_products = $rows['total_products'];
                                                $order_date = $rows['order_date'];
                                                $order_status = $rows['order_status'];
                                                $total_price_in = number_format($amount_due, 0, ',', '.');
                                                if ($order_status == 0) {
                                                    $status = "Đang giao";
                                                }
                                                echo "
                                                <tr>
                                                    <td>$invoice_number</td>
                                                    <td>$order_date</td>
                                                    <td>$user_address</td>
                                                    <td>$total_price_in</td>
                                                    <td>$status</td>
                                                </tr>
                                                ";
                                            }
                                        }
                                    }

                                    ?>
                                </tbody>

                            </table>
                        </div>

                    </ul>
                </div>

            </div>

        </div>
        <div id=" footer">
            <?php
            include("../config/footer.php");

            ?>
        </div>
    </div>

</body>

</html>