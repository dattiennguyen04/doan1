<?php
include("../function/common_function.php");
include("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .input_search {
        width: 16%;
        height: 42px;
        margin-left: 85px;
    }

    .btn_search {
        width: 6%;
        height: 42px;
        color: white;
        background-color: black;
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-list {
        display: inline-block;
        width: 1300px;
        margin: 50px;
    }

    .search-single-product {
        display: flex;
        margin-bottom: 60px;
    }

    .product-img_search a img {
        width: 240px;
        height: 180px;
        padding: 0 15px;
    }

    .info-product_search {
        padding: 0 15px;
    }

    .info-product_search h3 a {
        font-size: 21px;
        color: black;
        text-decoration: none;
        font-weight: 500;
    }

    .price-product_search {
        margin-top: 10px;
    }

    .price-product_search small {
        font-size: 21px;
        color: red;
    }

    .desc-product_search {
        margin: 10px 0;
    }

    .desc-product_search p {
        font-size: 18px;
    }
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
                    <h1>Tìm kiếm</h1>
                </div>
            </div>
        </div>

        <div class="container">

            <form action="" method="POST">
                <div class="ip_search" style="text-align:center;">
                    <h2 style="margin-bottom: 10px">Tìm kiếm</h2>
                    <input class="input_search" type="text" value="" name="tukhoa">
                    <input class="btn_search" type="submit" value="Tìm kiếm" name="timkiem">
                </div>
            </form>

            <div class="search-container">

                <div class="search-list">
                    <?php
                    search_products();
                    ?>
                </div>

            </div>

        </div>

    </div>

    <div class="footer">
        <?php
        include("../config/footer.php");
        ?>
    </div>
</body>

</html>