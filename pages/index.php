<?php
include("../function/common_function.php");
include("../config/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINKY</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<style>
    .product-price p {
        margin-right: 10px;
    }

    .hover-btn .nut_2 a:first-child {
        cursor: pointer;
        margin-left: 7px;
    }

    .hover-btn .nut_2 a:last-child {
        margin-left: 170px;
        padding: 13px 35px;
    }
</style>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>


        <div id="slider container">
            <div class="w3-content">
                <img class="mySlides" src="../images/slider/sl2.webp" style="width:100%; max-height:600px;">
                <img class="mySlides" src="../images/slider/sl1.webp" style="width:100%; max-height:600px;">
            </div>

            <div class="w3-center">

                <button class="diamond-btn demo" onclick="currentDiv(1)">
                    <p>1</p>
                </button>
                <button class="diamond-btn demo" onclick="currentDiv(2)">
                    <p>2</p>
                </button>

            </div>

        </div>

        <div id="content">
            <div class="section">
                <div class="section-1">

                </div>

                <!----------------------- sản phẩm bán chạy ---------------------->
                <div class="section-2">
                    <div class="section-title">
                        <h2>Sản phẩm bán chạy</h2>
                    </div>
                    <div class="row container">
                        <?php
                        // lấy ra sản phẩm bán chạy
                        hot_product_index();
                        search_products();
                        ?>
                    </div>

                    <div class="item-more">
                        <a href="products.php" class="view-more">
                            <p>Xem thêm</p>
                        </a>
                    </div>
                </div>

                <div class="section-3">
                    <div class="container">
                        <div class="row about">
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>MIỄN PHÍ VẬN CHUYỂN</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Chúng tôi vận chuyển miễn phí với đơn hàng trên 1000.000 đ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>KHUYẾN MẠI CUỐI TUẦN</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Giảm giá tới 30% vào các ngày thứ 7 và chủ nhật hàng tuần</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-third about-item">
                                <div class="diamond-btn">
                                    <i class="fa-solid fa-shield-halved"></i>
                                </div>
                                <div class="about-text">
                                    <div class="about-help">
                                        <p>HỖ TRỢ ĐỔI TRẢ</p>
                                    </div>
                                    <div class="about-content">
                                        <p>Hỗ trợ miễn phí đổi trả sản phẩm trong 30 ngày đầu tiên từ khi mua hàng</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------- sản phẩm nổi bật ---------------------->
                <div class="section-4">
                    <div class="section-title">
                        <h2>SẢN PHẨM NỔI BẬT</h2>
                    </div>
                    <div class="row container">
                        <div class="col col-one-third card-product-OneThird">

                            <ul class="list-item">
                                <?php categories() ?>

                            </ul>
                        </div>
                        <div class="col col-two-third card-product-TwoThird">
                            <div class="row">
                                <?php
                                get_product();
                                ?>
                            </div>

                        </div>

                        <!-------------------------- comment----------------------- -->
                    </div>
                </div>
                <!-- ------------------slide bình luận -------------------- -->
                <div class="section-5">
                    <div class="bg-ngoai">
                        <div class="slider-cmt-phu">

                            <div id="prev"></div>
                            <div id="next"></div>

                        </div>
                    </div>
                </div>
                <!--------------------- sản phẩm khuyến mãi ---------------------------->
                <div class="section-6">
                    <div class="section-title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                    <div class="arrow-btn">
                        <div class="arrow-btn-left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="arrow-btn-right">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="row container flex-wrap">
                        <?php
                        promotion_product();
                        ?>
                    </div>
                </div>
            </div>
        </div>




        <!-- -------------------footer ----------- -->
        <div class="footer">
            <?php
            include("../config/footer.php");
            ?>
        </div>
    </div>

    <script src="../js/main.js">

    </script>

</body>

</html>