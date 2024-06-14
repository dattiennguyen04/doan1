<?php
include("../config/config.php");
// tồn tại bấm vào nút insert_product
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price_new = $_POST['product_price_new'];
    $product_price_old = $_POST['product_price_old'];
    $product_status = "true";
    // lưu ảnh bảo biến
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    // đuôi của ảnh
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    // nếu như mấy biến dưới đây mà trống thì thực hiển code bên trong
    if (
        $product_title == '' or
        $description == ''  or
        $product_category == '' or
        $product_price_new == '' or
        $product_price_old == '' or
        $product_image1 == '' or
        $product_image2 == ''
    ) {
        echo "<script>alert('Vui lòng điền hết chỗ trống')</script>";
        exit();
    } else {
        // hàm chuyển file ảnh vào folder
        move_uploaded_file($temp_image1, './product_images/' . $product_image1);
        move_uploaded_file($temp_image2, './product_images/' . $product_image2);

        //insert query
        // câu lệnh thêm insert into trong sql
        $insert_product = "INSERT INTO `tbl_products` (
            product_title,
            product_description,
            product_price_new,
            product_price_old,
            category_id,
            product_image1,
            product_image2,
            date,
            status
            ) VALUE(
            '$product_title',
            '$description',
            '$product_price_new',
            '$product_price_old',
            '$product_category',
            '$product_image1',
            '$product_image2',
            NOW(),
            '$product_status'

        )";
        $result_query = mysqli_query($connect, $insert_product);
        if ($result_query) {
            echo "<script>alert('Thêm sản phẩm thành công')</script>";
        }
    }
    // location đi đến file có tên là inset_products.php
    header('Location:insert_products.php');
}
//Xóa
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $id = $_GET["id"];
    $sql_delete = "delete from tbl_products where product_id=" . $id;
    if (mysqli_query($connect, $sql_delete)) {
        echo "Xóa thành công";
    } else {
        echo "Lỗi";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Thêm sản phẩm</h1>
            <!-- form -->
            <!-- enctype="multipart/form-data" dùng để chèn ảnh vào kh có k thể chèn -->
            <form action="insert_products.php" method="post" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Nhập tên sản phẩm" autocomplete="off" required="required">
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Mô tả sản phẩm</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Nhập mô tả sản phẩm" autocomplete="off" required="required">
                </div>


                <!-- cateogries -->
                <div class="form-outline mb-4 w-50 m-auto">
                    Chọn danh mục
                    <select name="product_category" id="" class="form-select">
                        <!-- <option value="">Chọn danh mục
                            <col> -->
                        </option>
                        <?php
                        $select_query = "SELECT * FROM `tbl_categories`";
                        $result_query = mysqli_query($connect, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>

                    </select>
                </div>

                <!-- image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Hình ảnh sản phẩm 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
                </div>
                <!-- image 2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Hình ảnh sản phẩm 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
                </div>

                <!-- Price new -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price_new" class="form-label">Giá mới</label>
                    <input type="text" name="product_price_new" id="product_price_new" class="form-control" placeholder="Nhập giá sản phẩm" autocomplete="off" required="required">
                </div>
                <!-- Price old-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price_old" class="form-label">Giá cũ</label>
                    <input type="text" name="product_price_old" id="product_price_old" class="form-control" placeholder="Nhập giá sản phẩm">
                </div>
                <!-- insert product -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" id="" class="btn btn-info mb-3 px-3" value="Thêm sản phẩm">
                </div>
            </form>
        </div>
        <div class="container">
            <h2 class="text-center my-3">Hiển thị sản phẩm</h2>
            <div class="col_12">
                <table class="table table-stripped">
                    <tr>
                        <!-- <th>Mã tin tức</th> -->
                        <th>Mã sản phẩm</th>
                        <th>Tiêu đề sản phẩm</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Ảnh 1</th>
                        <th>Ảnh 2</th>
                        <th>Giá tiền mới</th>
                        <th>Giá tiền cũ</th>
                        <th>Thao tác</th>
                    </tr>

                    <tr>
                        <?php
                        $sql_query = "SELECT * from tbl_products";
                        $result_query = mysqli_query($connect, $sql_query);
                        if (mysqli_num_rows($result_query) > 0) {
                            while ($row = mysqli_fetch_assoc($result_query)) {

                                echo "<tr>";
                                echo "<td>" . $row["product_id"] . "</td>";
                                echo "<td>" . $row["product_title"] . "</td>";
                                echo "<td>" . $row["product_description"] . "</td>";
                                echo "<td>" . $row["category_id"] . "</td>";
                                echo "<td><img style='width:100px;' src='product_images/" . $row['product_image1'] . "'></td>";
                                echo "<td><img style='width:100px;' src='product_images/" . $row['product_image2'] . "'></td>";
                                echo "<td>" . $row["product_price_new"] . "</td>";
                                echo "<td>" . $row["product_price_old"] . "</td>";
                                echo "<td>" . "<a href='insert_products.php?task=delete&id=" . $row['product_id']
                                    . "' class='btn btn-warning'>Xoá</a>" . "</td>";
                                echo "<td>" . "<a href='update_products.php?update=" . $row['product_id']
                                    . "' class='btn btn-info'>Sửa</a>" . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "Lỗi rồi nhé";
                        }

                        ?>
                    </tr>
                </table>
                <td></td>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>