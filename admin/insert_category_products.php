<?php
include("../config/config.php");
// nếu tồn tại nhấn vào nút insert_category dòng 55
if (isset($_POST['insert_category'])) {
    // lưu dữ liệu nhập vào biến
    $category_title = $_POST['cate_title'];
    //lấy dữ liệu từ database
    $select_query = "SELECT * FROM `tbl_categories` WHERE category_title='$category_title'";
    $result_select = mysqli_query($connect, $select_query);
    // hàm num_rows trả về số lượng 
    $number = mysqli_num_rows($result_select);
    // nếu bản ghi đó đã có trong db tức lớn hơn 0 thì thực hiện bên dưới
    if ($number > 0) {
        echo "<script>alert('Danh mục này đã có trong dữ liệu')</script>";
    } else {
        $insert_query = "INSERT INTO `tbl_categories` (category_title) VALUE ('$category_title')";
        $result = mysqli_query($connect, $insert_query);
        if ($result) {
            // alert hiển thị hộp thoại thông báo
            echo "<script>alert('Đã thêm danh mục thành công')</script>";
        }
    }
}

//Xóa
// nếu tồn tại lấy đường dẫn task và task=delete thì thực hiện code bên trong 
if (isset($_GET["task"]) && $_GET["task"] == "delete") {
    $id = $_GET["cate_id"];
    // xóa trong sql where là điều kiện
    $sql_delete = "delete from tbl_categories where category_id=" . $id;
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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>


    <h2 class="text-center">Thêm danh mục</h2>
    <form action="" method="post" class="mb-2">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cate_title" placeholder="Thêm danh mục" aria-label="Categories" aria-describedby="basic-addon1" autofocus>
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_category" value="Thêm danh mục">
        </div>
    </form>


    <h2>Hiển thị danh mục</h2>
    <div class="view_category">
        <div class="row">
            <div class="col-12">
                <table class="table table-stripped">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Thao tác</th>
                        <th></th>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <?php
                            // lấy dữ liệu trong db
                            $sql = "SELECT * FROM `tbl_categories` ";
                            $result_category = mysqli_query($connect, $sql);
                            if (mysqli_num_rows($result_category) > 0) {
                                // lưu trữ kết quả truy vấn trong biến row bằng hàm featch_assoc
                                while ($row = mysqli_fetch_assoc($result_category)) {
                                    // echo hiển thị ra
                                    echo "<tr>";
                                    echo "<td>" . $row["category_id"] . "</td>";
                                    echo "<td>" . $row["category_title"] . "</td>";

                                    echo "<td>" . "<a href='update_category.php?update=" . $row['category_id'] . "' class='btn btn-success'>Sửa</a>" . "</td>";
                                    echo "<td>" . "<a href='insert_category_products.php?task=delete&cate_id=" . $row['category_id']
                                        . "' class='btn btn-primary'>xoá</a>" . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Lỗi rồi nhé!";
                            } ?>

                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>