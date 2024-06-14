<?php
include("../config/config.php");
if (isset($_POST['update'])) {

    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price_new = $_POST['product_price_new'];
    $product_price_old = $_POST['product_price_old'];
    $category_id = $_POST['category_id'];
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];

    // Lấy value -> truy cập folder chứa nó 
    // Unlink ảnh cũ 
    // Chèn value file mới vào folder đó

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];

    move_uploaded_file($temp_image1, './product_images/' . $product_image1);
    move_uploaded_file($temp_image2, './product_images/' . $product_image2);

    $sql_update = "UPDATE tbl_products SET 
    product_title='" . $product_title . "', 
    product_description='" . $product_description . "', 
    product_image1='" . $product_image1 . "', 
    product_image2='" . $product_image2 . "', 
    product_price_new='" . $product_price_new . "', 
    product_price_old='" . $product_price_old . "'
    WHERE product_id='" . $product_id . "'";

    if (mysqli_query($connect, $sql_update)) {
        header('Location: insert_products.php');
    } else {
        echo "loi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Cập nhật sản phẩm</h1>
        <!-- form -->
        <!-- enctype="multipart/form-data" dùng để chèn ảnh vào kh có k thể chèn -->
        <form action="update_products.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET["update"])) {
                $id = $_GET["update"];
                $sql_select = "SELECT * from `tbl_products` where product_id=" . $id;
                $result = mysqli_query($connect, $sql_select);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "
                        <input class='form-control' type='hidden' value='" . $row['product_id'] . "' name='product_id' id=''>
                        <br>";
                        echo "
                        Tên sản phẩm
                        <input class='form-control' type='text' value='" . $row['product_title'] . "' name='product_title' id=''>
                        <br>";
                        echo "
                        Mô tả
                        <input class='form-control' type='text' value='" . $row['product_description'] . "' name='product_description' id=''>
                        <br>";
                        echo "
                        Ảnh 1
                        <input class='form-control' type='file' value='" . $row['product_image1'] . "' name='product_image1' id=''>
                        <br>";
                        echo "
                        Ảnh 2
                        <input class='form-control' type='file' value='" . $row['product_image2'] . "' name='product_image2' id=''>
                        <br>";
                        echo "
                        Giá tiền mới
                        <input class='form-control' type='text' value='" . $row['product_price_new'] . "' name='product_price_new' id=''>
                        <br>";

                        echo "
                        Giá tiền cũ
                        <input class='form-control' type='text' value='" . $row['product_price_old'] . "' name='product_price_old' id=''>
                        <br>";

                        echo "<input type='hidden' name='category_id' value='" . $row['category_id'] . "'>";

            ?>
                        <label for="category_id">Danh mục:</label>
                        <select name="category_id" class="form-select">
                            <?php
                            $select_query = "SELECT * FROM `tbl_categories`";
                            $result_query = mysqli_query($connect, $select_query);

                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $category_id = $row['category_id'];
                                $category_title = $row['category_title'];
                                echo "<option value ='$category_id'>$category_title</option>";
                            }
                            ?>
                        </select>
            <?php                     }
                }
            } ?>
            <input type="submit" name="update" id="" class="btn btn-success">
        </form>
    </div>
</body>

</html>