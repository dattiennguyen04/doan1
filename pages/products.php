<?php
include("../function/common_function.php");
include("../config/config.php");
?>

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.product-price p {

    margin-right: -7px;

}

.hover-btn .nut_2 a:first-child {
    cursor: pointer;
    margin-left: 5px;
    padding: 10px 12px;
}

.hover-btn .nut_2 a:last-child {
    margin-left: 121px;
    padding: 10px 14px;
}

ul.sapxep-muangay li {
    list-style: none;
    padding: 10px;
}


.sapxep-muangay li a:hover {
    background-color: #bda87f;
    color: #fff;

}



ul.sapxep-muangay li a {

    padding: 10px 15px;
    background: #bda87f;
    color: #fff;
    /* float: left; */
    width: 100%;
    border: 2px solid #bda87f;
    text-transform: uppercase;
    text-decoration: none;

}
</style>
<script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

<body>
    <div class="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div class="banner-page-list">
            <div id="content">
                <div class="banner">
                    <h1>Sản phẩm</h1>
                </div>
            </div>
            <div class="bread">
                <div class="container container_bread">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <strong>Sản phẩm</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="result" style="margin-bottom: 20px;" class="menu-product">
            <div class="row container">
                <div style="padding-left: 0;" class="col col-one-four card-product-OneFour">
                    <ul class="list-item-product">
                        <li style="background-color: #363533; color: #fff; display: flex;">
                            <i style=" margin-right: 2px; margin-top: 3px;" class="fa-solid fa-bars"></i>
                            <h3>Danh mục sản phẩm</h3>
                        </li>
                        <?php
                        // in ra danh mục sản phẩm
                        categories();
                        ?>
                    </ul>
                    <h3 style="margin: 25px 0;">Sản phẩm bán chạy</h3>
                    <div style="margin-top: 10px; " class="row">
                        <?php
                        // in ra sản phẩm bán chạy
                        hot_product();
                        ?>
                    </div>
                    <div class="row">
                        <img src="images/section/" alt="">
                    </div>
                </div>
                <div class="col col-third-four">
                    <div style="margin-bottom: 50px;" class="row all-product-area">
                        <ul class="box-tool">
                            <li>
                                <p>Sắp xếp: </p>
                            </li>
                            <li>
                                <select style="" class="form-control" name="sapxep" id="sapxep"
                                    onchange="showUser(this.value)">
                                    <a href="index.php">
                                        <option value="mac-dinh">Mặc định</option>
                                    </a>
                                    <a href="index.php">

                                        <option value="">Từ A -> Z</option>
                                    </a>
                                    <option value="">Từ X -> Z</option>
                                    <option value="">Giá tăng dần</option>
                                    <option value="">Giá giảm dần</option>
                                    <option value="">Hàng mới nhất</option>
                                    <option value="">Hàng cũ nhất</option>
                                </select>
                            </li>
                        </ul>
                        <ul class="view-mode">
                            <form action="" method="post">
                                <li>
                                    <button id="grid"><i class="fa-solid fa-bars"></i></button>
                                </li>
                                <li>
                                    <button id="list"><i class="fa-solid fa-grip"></i>
                                    </button>
                                </li>

                            </form>
                        </ul>
                    </div>
                    <div class="row" id="txtHint">

                        <?php
                        // in ra tất cả sản phẩm có phân trang
                        get_all_product();
                        // gọi hàm nhấn vào danh mục sản phẩm thì ra danh mục đó
                        get_unique_categories();
                        ?>
                    </div>
                </div>

                <div class="row trang">
                    <ul>
                        <?php

                        $sql_page = mysqli_query($connect, "SELECT * from tbl_products");
                        $row_count = mysqli_num_rows($sql_page);
                        $page = ceil($row_count / 9);
                        for ($i = 1; $i <= $page; $i++) {
                            echo "
                                <li style='margin-top:40px;'>
                                    <a id='result' href='Products.php?page=$i'>$i

                                    </a>
                                </li>
                                ";
                        }
                        ?>

                    </ul>
                </div>


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