<?php
include("../function/common_function.php");
include("../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta info="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="main">
        <div id="header">
            <?php
            include("../config/header.php");
            ?>
        </div>
        <div id="content">
            <div class="banner">
                <h1>Liên hệ</h1>
            </div>
        </div>
        <div class="bread">
            <div class="container container_bread">
                <ul>
                    <li>
                        <a href="">Trang chủ</a>
                    </li>
                    <li>
                        <strong>Liên hệ</strong>
                    </li>
                </ul>
            </div>
        </div>
        <center class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14890.7660517024!2d105.79853279785492!3d21.08497976042275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aa944c030a83%3A0xfefdd4610d971ff4!2zUGjDuiBUaMaw4bujbmcsIFTDonkgSOG7kywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1692892537019!5m2!1svi!2s"
                width="100%" height="450" style="border:0; " allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </center>
        <div class="form container">
            <div class="left-column">
                <div class="headform">LIÊN HỆ VỚI CHÚNG TÔI</div>
                </br>
                <div class="formcontext" style="margin-top: 20px;">
                    Họ và tên*
                    </br>
                    <input style="margin-top: 15px; margin-bottom: 15px; height: 50px; width: 670px;" type="text"
                        name="hovaten" required />
                    </br>
                    Địa chỉ email*
                    </br>
                    <input style="margin-top: 15px; margin-bottom: 15px; height: 50px; width: 670px;" type="email"
                        name="email" required />
                    </br>
                    Viết bình luận*
                    </br>
                    <input style="margin-top: 15px; margin-bottom: 15px; height: 50px; width: 670px;" type="text"
                        name="comment" required />
                    </br>
                    <button
                        style="margin-top: 10px; margin-bottom: 15px; background-color: #bda87f; color: white; height: 45px; width: 120px; border: none;">
                        GỬI LIÊN HỆ</button>
                </div>
            </div>

            <div class="right-column">
                <img src="/img/header/logo.png" alt="">
                <div class="righttext">PINKY là một trong những Công ty cung cấp đồ ăn và uy
                    tín nhất tại Hà Nội với hơn 10 năm kinh nghiệm trong lĩnh vực.</div>
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