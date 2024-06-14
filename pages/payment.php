<?php
include("../function/common_function.php");
include("../config/config.php");


$user_ip = getIPAddress();
$get_user = "SELECT * from tbl_user where user_ip='$user_ip'";
$result = mysqli_query($connect, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fonts/fontawesome-free-6.4.0-web/css/all.css">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/base.css">
    <style>
    .paybill {
        display: flex;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
    }

    .paybill-input {
        border-radius: 4px;
        width: 100%;
        display: block;
        box-sizing: border-box;
        padding: 0.94em 0.8em;
        border: 1px #d9d9d9 solid;
        height: 44px;
        background-color: #fff;
        color: #333;
    }

    .textthin {
        font-weight: 500;
    }

    .color717171 {
        color: #717171;
    }

    .margintop20px {
        margin-top: 20px;
    }

    .spinner-label {
        text-decoration: none;
        color: #fff;
        padding: 16px 25px;
    }

    .paybill-product-thumbnail__image {
        width: 20%;
        margin-right: -200px;
    }

    .paybill-product-thumbnail__wrapper {
        margin-right: -324px;

    }
    </style>
</head>

<body>
    <!-- <div id="header">
        <?php
        // include("config/header.php");
        ?>
    </div> -->
    <div style="margin-top:20px;" class="paybill">
        <h1>PINKY</h1>
        <!-- <div class="paybill-info" style="width: 410px;">
            <div class="paybill-info-header" style="display: flex;">
                <h3>Thông tin nhận hàng</h3>
                <?php

                ?>
                <a href="user_login.php"
                    style="padding: 18.75px; margin-left: 88px; text-decoration: none;color: #349dcd"><i
                        class="fa-regular fa-circle-user"></i> Đăng nhập</a>
            </div>
            <div class="paybill-info-set" style="clear: both;">
                <div class="paybill-input-warpper paybill-input-email">
                    <input type="email" name="email" id="email" placeholder="Nhập email" class="paybill-input">
                </div>
                <br>
                <div class="paybill-input-warpper paybill-input-name">
                    <input type="text" name="billName" id="billName" placeholder="Nhập họ và tên" class="paybill-input">
                </div>
                <br>
                <div class="paybill-input-warpper paybill-input-phone">
                    <input type="text" name="billPhone" id="billPhone" placeholder="Số điện thoại (tuỳ chọn)"
                        class="paybill-input">
                </div>
                <br>
                <div class="paybill-input-warpper paybill-input-address">
                    <input type="text" name="billAddress" id="billAddress" placeholder="Địa chỉ" class="paybill-input">
                </div>
                <br>
                <div class="paybill-input-warpper paybill-input-province">
                    <input type="text" name="billProvince" id="billProvince" placeholder="Tỉnh thành"
                        class="paybill-input">
                </div>
                <br>
                <div class="paybill-input-warpper paybill-input-district">
                    <input type="text" name="billDistrict" id="billDistrict" placeholder="Quận huyện (tuỳ chọn)"
                        class="paybill-input">
                </div>
            </div>
            <br>
            <div class="paybill-note">
                <input type="text" name="billNote" id="billNote" placeholder="Ghi chú" class="paybill-input">
            </div>
        </div> -->
        <div class="paybill-transport" style="width: 410px; padding: 0 28px; margin-top: 80px;">
            <div class="paybill-input-warpper paybill-input-transport">
                <label for="transport" class="paybill-label">
                    <h3>Vận chuyển</h3>
                </label>
                <div class="paybill-btn-transport paybill-input" style="display: flex; align-items: center;">
                    <input type="checkbox" name="billTransport" id="billTransport"
                        style="margin-bottom: 4px; width: 15px; height: 15px;">
                    <label for="" style="font-size: 14px; margin-left: 10px; width: 280px;">Giao hàng tận nơi</label>
                    <label for="" style="font-size: 14px; margin-left: 10px;">Free ship</label>
                </div>
            </div>
            <div class="paybill-input-warpper paybill-input-bill">
                <label for="" class="paybill-label">
                    <h3>Thanh toán</h3>
                </label>
                <div class="paybill-btn-cod paybill-input" style="display: flex; align-items: center;">
                    <input type="checkbox" name="billCod" id="billCod"
                        style="margin-bottom: 4px; width: 15px; height: 15px;">
                    <label for="" style="font-size: 14px; margin-left: 10px; width: 280px;">Thanh toán khi giao hàng
                        (COD)</label>
                    <label for="" style="font-size: 14px; margin-left: 10px;"><i class="fa-solid fa-money-bill"
                            style="color: #349dcd; margin: 0 18px;"></i></label>
                </div>
            </div>
        </div>
        <div class="paybill-product" style="width: 410px; background-color: #fafafa;">
            <div class="paybill-product-header" style="padding-left: 28px;">
                <h3>Đơn hàng</h2>
            </div>
            <div class="paybill-product-content" style="padding-left: 28px;">
                <?php
                $get_ip_add = getIPAddress();
                // $total_price = 0;
                // $cart_query = "SELECT * FROM `tbl_cart_details` where ip_address='$get_ip_add'";
                // $result = mysqli_query($connect, $cart_query);
                // while ($row = mysqli_fetch_array($result)) {
                //     $product_id = $row['product_id'];
                //     $select_product = "SELECT * FROM `tbl_products` where product_id='$product_id'";
                //     $result_products = mysqli_query($connect, $select_product);
                //     while ($row_product_price = mysqli_fetch_array($result_products)) {
                //         $product_price = array($row_product_price['product_price_new']);
                //         $price_table = $row_product_price['product_price_new'];
                //         $product_price_new = number_format($row_product_price['product_price_new'], 0, ',', '.');

                //         $product_title = $row_product_price['product_title'];
                //         $product_image1 = $row_product_price['product_image1'];
                //         $product_values = array_sum($product_price);
                //         $total_price += $product_values;
                //         $total_price_in = number_format($total_price, 0, ',', '.');
                //         $ship_price = 40000;
                //         $total_end = $ship_price + $total_price;
                //         $total_end_in = number_format($total_end, 0, ',', '.');
                // $total_prices = number_format($total_price, 0, ',', '.');
                $total_price = 0;
                $cart_query = "SELECT * FROM `tbl_cart_details` where ip_address='$get_ip_add'";
                $result = mysqli_query($connect, $cart_query);
                while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $select_product = "SELECT * FROM `tbl_products` where product_id='$product_id'";
                    $result_products = mysqli_query($connect, $select_product);
                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                        $select_quantity = "SELECT * from `tbl_cart_details`";
                        $result_qan = mysqli_query($connect, $select_quantity);
                        $row = mysqli_fetch_array($result_qan);
                        $quantity = $row['quantity'];
                        $product_title = $row_product_price['product_title'];
                        $product_image1 = $row_product_price['product_image1'];
                        $product_price = array($row_product_price['product_price_new']);
                        $price_table = $row_product_price['product_price_new'];
                        $product_price_new = number_format($row_product_price['product_price_new'], 0, ',', '.');
                        $total = $price_table * $quantity;
                        $product_values = ($total);

                        $total_price += $product_values;
                        $total_price_in = number_format($total_price, 0, ',', '.');

                        echo "
                        <table class='paybill-product-table' style='border-top: 1px solid #e1e1e1; padding: 18px 0;'>
                            <tr class='paybill-product'>
                                <td class='paybill-product__image'>
                                    <div class='paybill-product-thumbnail'>
                                        <div class='paybill-product-thumbnail__wrapper' style='padding-top: 14px;'>
                                            <img src='../admin/product_images/$product_image1' alt='' class='paybill-product-thumbnail__image' />
                                        </div>
                                    </div>
                                </td>
                                <th class='paybill-product__description'>
                                    <span class='paybill-product__description__name textthin ' style='padding-left: 14px; font-size: 14px;'>
                                        $product_title
                                    </span>
                                <td class='paybill-product__price' style='padding-left: 15px; padding-top: 14px; font-size: 14px;'>
                                $product_price_new ₫
                                </td>
                            </tr>
                        </table>
                        ";
                    }
                }

                ?>

                <div class="paybill-discount"
                    style="display: flex; border-top: 1px solid #e1e1e1; border-bottom: 1px solid #e1e1e1; padding: 18px 0;">
                    <input type="text" name="billDiscount" id="billDiscount" placeholder="Nhập mã giảm giá"
                        class="paybill-input" style="width: 266px;">
                    <button
                        style="background-color: #357ebd; color: #fff; border-color: #357ebd;border-radius: 5px; width: 100px; margin-left: 16px; cursor: pointer;">Áp
                        dụng</button>
                </div>
                <div class="paybill-sum">
                    <table class="total-line-table margintop20px" style="width: 100%;">
                        <tbody class="total-line-table__tbody" style="font-size: 14px;">
                            <tr class="total-line total-line--subtotal color717171">
                                <th class="total-line__name textthin">
                                    Tạm tính
                                </th>

                                <td class="total-line__price"><?php echo $total_price_in ?>₫</td>
                            </tr>

                            <tr class="total-line total-line--shipping-fee color717171">
                                <th class="total-line__name textthin">
                                    Phí vận chuyển
                                </th>
                                <td class="total-line__price">Free ship
                                </td>
                            </tr>

                        </tbody>
                        <tfoot class="total-line-table__footer">
                            <tr class="total-line payment-due">
                                <th class="total-line__name" style="padding-top: 28px;">
                                    <span class="payment-due__label-total textthin color717171"
                                        style="font-size: 18px;">
                                        Tổng cộng
                                    </span>
                                </th>
                                <td class="total-line__price" style="padding-top: 28px;">
                                    <span class="payment-due__price" style="color: #349dcd;
                                    font-size: 24px;"><?php echo $total_price_in ?>₫</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="paybill-done margintop20px">
                    <a style="text-decoration: none;" href="cart.php" class="previous-link">
                        <i class="previous-link__arrow">❮</i>
                        <a href="../pages/cart.php" class="previous-link__content">Quay về giỏ hàng</a>
                    </a>
                    <button type="submit" class="btn btn-checkout spinner"
                        style="width: 122px; height: 46px; margin-left: 117px; background-color: #357ebd; color: #fff; border-color: #357ebd;border-radius: 5px; cursor: pointer;">
                        <a href="../user_area/order.php?user_id=<?php echo $user_id ?>" class="spinner-label">ĐẶT HÀNG</a>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>