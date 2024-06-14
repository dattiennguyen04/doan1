<?php
include("../config/config.php");
session_start();
if (isset($_POST["login"])) {
    $user_name = $_POST["txt_username"];
    $password = $_POST["txt_password"];
    $sql = "SELECT * FROM `tbl_admin` where username = '" . $user_name . "'  and password = '" . $password . "'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        // echo "xin chào ", $user_name;
        $_SESSION["user"] = $user_name;
        header("location:./index.php");
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu";
    }
}
?>


<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Trang đăng nhập</h1>
        <form action="login.php" method="post">
            Nhập vào tên đăng nhập:
            <input class="form-control" type="text" name="txt_username" id="">
            Nhập vào mật khẩu:
            <input class="form-control" type="password" name="txt_password" id="">
            <br>
            <input type="submit" value="Đăng nhập" name="login" class="btn btn-primary">
        </form>
    </div>

</body>

</html>