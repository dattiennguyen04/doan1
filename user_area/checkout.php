<?php
session_start();
include("../config/config.php");
// nếu chưa tồn tại phiên có tên trong biến username thì mở file đăng nhập ngược lại đi đến file thanh toán
if (!isset($_SESSION['username'])) {
    include('user_login.php');
} else {
    include('payment.php');
}
