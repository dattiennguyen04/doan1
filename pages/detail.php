<?php
include("../function/common_function.php");
include("../config/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <h1>Đồ ăn nóng</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Giới thiệu</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="detailinfo">
            <?php
            get_product_detail();
            ?>
            <div class="sub-detail">
                <div class="next-btn">
                    <button onclick="myFunction()" class="in4">THÔNG TIN SẢN PHẨM</button>
                    <button class="in4">GIỚI THIỆU</button>
                    <button class="in4">TAGS</button>
                </div>
                <hr width="50%" size="4px" color="#bda87f" />

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