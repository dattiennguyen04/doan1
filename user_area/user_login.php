<?php
include("../function/common_function.php");
include("../config/config.php");
@session_start();

if (isset($_POST['btn-login'])) {
    $user_name = $_POST['user_name'];
    // $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $select_query = " SELECT * from tbl_user where user_name='$user_name'";
    $result = mysqli_query($connect, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // giỏ hàng 
    $select_query_cart = "SELECT * FROm `tbl_cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($connect, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_name;

        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Đăng nhập thành công')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('../pages/index.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('../pages/cart.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Mật khẩu không chính xác')</script>";
        }
    } else {
        echo "<script>alert('Tài khoản không hợp lệ')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINKY</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php")
            ?>
        </div>

        <div class="banner-page-list">
            <div id="content">
                <div class="banner">
                    <h1>Đăng nhập tài khoản</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="../pages/index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Đăng nhập tài khoản</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="parent">
            <div class="child">
                <form action="" method="post">
                    <h1 style="text-align: center; font-weight: 100; margin-top: 80px;">ĐĂNG NHẬP TÀI KHOẢN</h1>
                    <input style="height: 50px; width: 700px; margin-left: 400px; padding-left: 20px; border: none;" type="text" name="user_name" placeholder="Tên Đăng Nhập*" required />
                    </br>
                    <input style="height: 50px; width: 700px; margin-left: 400px; margin-top: 10px; padding-left: 20px; border: none;" type="password" name="password" placeholder="Mật khẩu:*" required />
                    <ul class="checkpass">
                        <li><a href="forgotpw.php">Quên mật khẩu?</a></li>
                        <li><a href="user_registration.php">Đăng ký tài khoản mới?</a></li>
                    </ul>
                    </br>
                    <input name="btn-login" type="submit" value="Đăng nhập" style="cursor:pointer; height: 40px; width: 120px; color: white; background: #bda87f; border: none; font-weight: 600; margin-left: 400px;" />

                    <div class="fg">
                        <div>Hoặc đăng nhập bằng</div>
                        <ul class="fgbutton">
                            <li><button style="height: 35px; width: 130px; background: #337ab7; border: none;">
                                    <a href="https://www.facebook.com/">Facebook</a></button></li>
                            <li><button style="height: 35px; width: 130px; background: tomato; border: none;">
                                    <a href="https://www.google.com.vn/?hl=vi">Google</a></button></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>


        <div class="footer">
            <?php include("../config/footer.php") ?>
        </div>
    </div>
</body>

</html>