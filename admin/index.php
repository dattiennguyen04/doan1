<?php
include("../config/config.php");
// session dùng để lưu trữ phiên
session_start();
// nếu như phiên chưa hoạt động  thì đi đến trang đăng nhập
if (!$_SESSION["user"]) {
    header("location:./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a href="" class="nav-link">Chào mừng quản trị viên</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">Quản trị viên</h3>

        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                <div class="p-3">
                    <a href="#"><img src="../images/product1.png" class="admin-image" alt=""></a>
                    <p class="text-light text-center">PINKY</p>
                </div>
                <div class="button text-center">
                    <button><a href="index.php?insert_category_products" class="nav-link text-light bg-info my-1">Thêm
                            danh mục sản phẩm</a></button>
                    <button><a href="index.php?insert_products" class="nav-link text-light bg-info my-1">Thêm sản phẩm</a></button>
                    </a></button>
                    <button><a href="index.php?list_user" class="nav-link text-light bg-info my-1">Danh sách người dùng</a></button>
                    <button><a href="logout.php" class="nav-link text-light bg-info my-1">Đăng xuất</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            // nếu tồn tại click lấy đường dẫn insert_category_products thì ... thực hiện iclude(mở file)
            if (isset($_GET['insert_category_products'])) {
                include('insert_category_products.php');
            }
            if (isset($_GET['insert_products'])) {
                include('insert_products.php');
            }
            if (isset($_GET['insert_news'])) {
                include('insert_news.php');
            }
            if (isset($_GET['insert_news_product'])) {
                include('insert_news_product.php');
            }
            if (isset($_GET['list_user'])) {
                include('list_user.php');
            }
            ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>