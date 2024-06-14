<?php
include("../function/common_function.php");
include("../config/config.php");


if (isset($_POST['register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_phone_number = $_POST['user_phone_number'];
    $user_address = $_POST['user_address'];
    $user_ip = getIPAddress();



    $select_query = "SELECT * FROM tbl_user WHERE user_name='$user_name' OR user_email='$user_email'";
    $result = mysqli_query($connect, $select_query);
    if ($result) {
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0) {
            echo "<script>alert('Tên người dùng hoặc email đã được sử dụng')</script>";
        } else {
            // mã hóa mật khẩu
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

            $insert_query = "INSERT INTO tbl_user (
                user_name,
                user_email,
                user_password,
                user_phone_number,
                user_ip,
                user_address
            ) VALUES (
                '$user_name',
                '$user_email',
                '$hashed_password',
                '$user_phone_number',
                '$user_ip',
                '$user_address'
            )";
            $result_qu = mysqli_query($connect, $insert_query);
        }
        if ($result_qu) {
            echo "<script>alert('Đã đăng ký thành công')</script>";
        }
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
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>

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
                    <h1>Đăng ký tài khoản</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.html">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Đăng ký tài khoản</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="parent">
            <div class="child">
                <h1 style="text-align: center; font-weight: 100; margin-top: 80px;">ĐĂNG KÝ THÔNG TIN TÀI KHOẢN</h1>
                </br>
                <form action="" method="post">
                    <input style="height: 40px; width: 700px; margin-left: 400px; padding-left: 20px; border: none;" type="text" name="user_name" placeholder="Họ và Tên" required />
                    </br>
                    <input style="height: 40px; width: 700px; margin-left: 400px; margin-top: 20px; padding-left: 20px; border: none;" type="email" name="user_email" placeholder="Email:*" required />
                    </br>


                    <input style="height: 40px; width: 700px; margin-left: 400px; margin-top: 20px; padding-left: 20px; border: none;" type="password" name="user_password" placeholder="Mật khẩu:*" required />
                    </br>
                    <input style="height: 40px; width: 700px; margin-left: 400px; margin-top: 20px; padding-left: 20px; border: none;" type="text" name="user_phone_number" placeholder="Số điện thoại:*" required />
                    </br>
                    <input style="height: 40px; width: 700px; margin-left: 400px; margin-top: 20px; padding-left: 20px; border: none;" type="text" name="user_address" placeholder="Địa chỉ:*" required />
                    </br>
                    
                    <input style=" cursor:pointer; height: 40px; width: 120px; color: white; background: #bda87f; border: none; font-weight: 600; margin-top: 20px; margin-left: 400px;" value="Đăng Ký" type="submit" name="register">
                    </input>

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
            <?php
            include("../config/footer.php");
            ?>
        </div>

    </div>
</body>

</html>