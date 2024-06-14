<?php
@session_start();
// include("../function/common_function.php");
?>

<div id="header">
    <div class="header-menu">
        <div class="container">
            <ul class="list-account">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li>
                            <a href='../user_area\user_login.php'>Đăng nhập</a>
                        </li>";
                } else {
                    echo "<li>
                            <a href='../user_area/user_profile.php'>Tài khoản của tôi</a>
                        </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li>
                            <a href='../user_area/user_registration.php'>Đăng ký</a>
                        </li>";
                } else {
                    echo "<li>
                            <a href='../user_area/logout.php'>Thoát</a>
                        </li>";
                }
                ?>

            </ul>
            <ul class="list-search">
                <li>
                    <form action="../pages/search_products.php" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa" style="border-radius: 5px; height: 30px; padding:5px; background: #333; color:#fff">


                        <button name="timkiem" type="submit" style="background: #252525; border: none; cursor: pointer;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-suitcase"></i>
                    </a>
                </li>

                <li>
                    <a href="../pages/cart.php">
                        <p>Giỏ hàng: </p>
                    </a>
                </li>
                <li>
                    <p>(<?php cart_item();
                        cart();
                        ?>)Sản phẩm</p>
                </li>

            </ul>
        </div>
    </div>
    <!-- logo -->
    <div class="navbar container">
        <div class="nav-logo">
            <a href="../pages/index.php">
                <!-- thay ảnh duoi day -->
                <img style="width: 85px;
    margin-top: -20px;" src="https://scontent.fhan14-4.fna.fbcdn.net/v/t39.30808-6/340405791_180659294396658_2500145595334893265_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=efb6e6&_nc_eui2=AeGOLDWt9QT0iX2LKEcqdqrmped6NTNAR_il53o1M0BH-MejX-1J1RnDxysBHgf_Q2lCUO-qUuMf_E2sX4JA0I5L&_nc_ohc=Vmd4Sxg0OP0AX-KIIkf&_nc_ht=scontent.fhan14-4.fna&oh=00_AfD-k9gaLLW6P8ioSeVgL8En0dBbHm9CW0mhf8Q2lQwFTg&oe=65A5CE99" alt="">
            </a>
        </div>
        <div class="nav-menu">
            <ul class="nav-menu-text">
                <li>
                    <a href="../pages/index.php">
                        <i class="fa-solid fa-house"></i>
                        Trang chủ
                    </a>
                </li>
                <li><a href="../pages/introduce.php">Giới thiệu</a></li>
                <li>
                    <a href="../pages/products.php">
                        Sản phẩm
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="subnav-menu">
                        <?php
                        // hiển thị danh mục trong list menu
                        categories()
                        ?>
                    </ul>
                </li>

                <li><a href="../pages/contact.php">Liên hệ</a></li>

            </ul>
        </div>
    </div>
</div>