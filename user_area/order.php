<?php
include("../function/common_function.php");
include("../config/config.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// lấy tổng số mặt hàng và tổng giá của tất cả các mặt hàng
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * from tbl_cart_details where ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($connect, $cart_query_price);


// hàm lấy ra số ngẫu nhiên để ra mã hóa đơn
$invoice_number = mt_rand();
$status = "pending";
$count_product = mysqli_num_rows($result_cart_price);


while ($row_price = mysqli_fetch_assoc($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * from `tbl_products` where product_id=$product_id";
    $run_price = mysqli_query($connect, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        // lấy ra bảng giỏ hàng 
        $select_quantity = "SELECT * from `tbl_cart_details`";
        $result_qan = mysqli_query($connect, $select_quantity);
        $row = mysqli_fetch_array($result_qan);
        $quantity_a = $row['quantity'];

        $product_price = array($row_product_price['product_price_new']);
        $price_table = $row_product_price['product_price_new'];
        $total = $price_table * $quantity_a;
        $product_values = ($total);
        $total_price += $product_values;
        $total_price_in = number_format($total_price, 0, ',', '.');
    }
}

// lấy số lượg
$get_cart = "SELECT * from tbl_cart_details";
$run_cart = mysqli_query($connect, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price_in;
}
$quantity = $quantity;


$insert_order = "INSERT into tbl_user_orders (
    user_id,
    amount_due,
    invoice_number,
    total_products,
    order_date,
    order_status
    )
    values (
        $user_id ,
        $product_values,
        $invoice_number,
        $count_product,
        NOW(),
        '$status'
    )";
$result_query = mysqli_query($connect, $insert_order);
if ($result_query) {
    echo "<script>alert('Đơn hàng đã được gửi thành công')</script>";
    echo "<script>window.open('user_order.php','_self')</script>";
} else {
    echo "Lỗi";
}



// đơn hàng chờ xử lý
$insert_pending_order = "INSERT into `tbl_orders_pending` (
    user_id,
    invoice_number,
    product_id,
    quantity,
    order_status
    )
    values (
        $user_id ,
        $invoice_number,
        $product_id,
        $quantity,
        '$status'
    )";
$result_pending_order = mysqli_query($connect, $insert_pending_order);

// xóa các sản phẩm trong giỏ hàng khi người dùng đã đặt hàng rồi 
$empty_cart = "DELETE from tbl_cart_details where ip_address='$get_ip_address'";
$result_delete = mysqli_query($connect, $empty_cart);
