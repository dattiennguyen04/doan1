<?php
include("../function/common_function.php");
include("../config/config.php");

// update query
if (isset($_POST['update_quantity'])) {
    $update_value = $_POST['quantity'];
    $update_id = $_POST['update_qty_id'];
    $sql_update = "update `tbl_cart_details` set quantity = '$update_value' where product_id = $update_id";
    if (mysqli_query($connect, $sql_update)) {
        echo "<script>alert('Cập nhật số lượng thành công')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql_update . "</br>" . mysqli_error($connect);
    }
}

// xóa sản phẩm
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql_delete = "DELETE from tbl_cart_details WHERE product_id=$product_id";
    if (mysqli_query($connect, $sql_delete)) {
        echo "<script>window.open('cart.php','_self')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Giỏ hàng</title>
</head>


<body>
    <div style="display: flow-root;" class="head_body">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div class="cart-body">
            <div class="banner-page-list">
                <div id="content">
                    <div class="banner">
                        <h1>Giỏ hàng</h1>
                    </div>
                </div>
                <div class="bread">
                    <div class="container container_bread">
                        <ul>
                            <li>
                                <a href="index.html">Trang chủ</a>
                            </li>
                            <li>
                                <strong>Giỏ hàng</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="cart-main">
                <div class="cart-main__hidden">
                    <div class="cart-main_product">
                        <div class="cart-main_head">
                            <div style="width: 17% ;">Hình ảnh</div>
                            <div style="width: 48% ;">
                                <span>Thông tin sản phẩm</span>
                            </div>
                            <div style="width: 15% ;" class="a-center">
                                <span>Đơn giá</span>
                            </div>
                            <div style="width: 14% ;" class="a-center">Số lượng</div>
                            <div style="width: 6% ;" class="a-center">Xoá</div>
                        </div>
                        <div class="cart-main_body">
                            <div class="cart-item">
                                <?php
                                $get_ip_add = getIPAddress();
                                $total_price = 0;
                                $cart_query = "SELECT * FROM `tbl_cart_details` WHERE ip_address = '$get_ip_add'";
                                $result = mysqli_query($connect, $cart_query);
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<h2>Không có sản phẩm nào!</h2>";
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $product_id = $row['product_id'];
                                        $select_product = "SELECT * FROM `tbl_products` WHERE product_id = '$product_id'";
                                        $result_product = mysqli_query($connect, $select_product);
                                        while ($row_prd_price = mysqli_fetch_array($result_product)) {
                                            $product_img = $row_prd_price['product_image1'];
                                            $product_name = $row_prd_price['product_title'];
                                            $prd_pr = $row_prd_price['product_price_new'];
                                            $product_price = number_format($row_prd_price['product_price_new'], 0, ',', '.');

                                            // lấy số lượng ra
                                            $sql = "SELECT * FROM `tbl_cart_details` WHERE product_id = '$product_id'";
                                            $result_qty = mysqli_query($connect, $sql);
                                            while ($row_cart = mysqli_fetch_array($result_qty)) {
                                                $quantity = $row_cart['quantity'];
                                                $prd_qty_price = $prd_pr * $quantity;
                                                $prd_qty_price = number_format($prd_qty_price, 0, ',', '.');
                                                $prd_price = array(($prd_pr * $row_cart['quantity']));
                                                $product_value = array_sum($prd_price);
                                                $total_price = $total_price + $product_value;
                                                $total_price_in = number_format($total_price, 0, ',', '.');
                                                echo "
                                                <div style='width: 17% ;' class='imgage'>
                                                    <a href='' class='product-img' >
                                                        <img width='75px' height='auto' alt=''
                                                            src='../admin/product_images/$product_img' alt=''>
                                                    </a>
                                                </div>
                                                <div style='width: 48% ;'>
                                                    <h2 class='product-name'>
                                                        <a href='#'>$product_name</a>
                                                    </h2>
                                                    <span class='variant-title' style='display: none;'>Default Title</span>
                                                </div>
                                                <div style='width: 15% ;' class='a-center'>
                                                    <span class='item-price'>
                                                        <span class='price'>$prd_pr</span>
                                                    </span>
                                                </div>
                                                <div style='width: 14% ;     justify-content: normal;' class='a-center'>
                                                    <div class='input-number-pr'>
                                                        <form action='cart.php' method='post'>
                                                        <input type='hidden' value = '$product_id' class='qty' name='update_qty_id'>
                                                            <input style='width: 50px; border: 1px solid #bababa; border-radius: 7px'
                                                                type='number' placeholder='Nhập sl' value='$quantity' class='num-pro'
                                                                name='quantity'>
                                                            <input type='submit' value='update'
                                                                style='cursor: pointer; width: 50px; text-decoration: none;border: solid 2px #bababa; border-radius: 7px; background: #bababa;'
                                                                class='cart-btn-plus' name='update_quantity'>
                                                            <a href='cart.php' style='color: white;text-decoration: none;'>
                                                                Cập nhật số lượng
                                                            </a>
                                                            </input>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div style='width: 6% ;' class='a-center'>
                                                    <a href='cart.php?product_id=$product_id' class='cart-remove-pr'>
                                                        <i class='fa-solid fa-trash-can'></i>
                                                    </a>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="cart-main_pay">
                        <div class="cart-total">
                            <div class="cart-inner">
                                <div class="pay-price">
                                    <h1 class="pay-a">Tổng tiền thanh toán</h1>
                                    <h1 class="pay-num">
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        $total_price = 0;

                                        $cart_query = "SELECT * FROM `tbl_cart_details` where ip_address='$get_ip_add'";
                                        $result = mysqli_query($connect, $cart_query);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $product_id = $row['product_id'];
                                            $select_product = "SELECT * FROM `tbl_products` where product_id='$product_id'";
                                            $result_products = mysqli_query($connect, $select_product);

                                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                                $quantity = $row['quantity'];
                                                $price_table = $row_product_price['product_price_new'];

                                                // Tính toán tổng giá trị cho từng sản phẩm
                                                $total_product_price = $price_table * $quantity;

                                                // Hiển thị thông tin sản phẩm
                                                $product_title = $row_product_price['product_title'];
                                                $product_image1 = $row_product_price['product_image1'];
                                                $product_price_new = number_format($price_table, 0, ',', '.');

                                                $total_price += $total_product_price;
                                            }
                                        }

                                        // Hiển thị tổng giá trị của tất cả các sản phẩm
                                        $total_price_in = number_format($total_price, 0, ',', '.');
                                        echo  $total_price_in;

                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="pay-checkout">
                            <div class="pay-btn">
                                <button>
                                    <a href="payment.php" style="text-decoration: none; color: #fff">Thanh toán</a>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php
        include("../config/footer.php");
        ?>

    </footer>

</body>

</html>