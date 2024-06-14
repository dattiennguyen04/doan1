<?php
include("../config/config.php");
if (isset($_POST['update'])) {
    $category_id = $_POST['category_id'];
    $category_title = $_POST['category_title'];

    $sql_update = "UPDATE tbl_categories SET 
        category_title='" . mysqli_real_escape_string($connect, $category_title) . "'
        WHERE category_id='" . mysqli_real_escape_string($connect, $category_id) . "'";

    if (mysqli_query($connect, $sql_update)) {
        header('Location: insert_category_products.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Cập nhật danh mục</h1>
        <!-- form -->
        <form action="update_category.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET["update"])) {
                $id = $_GET["update"];
                $sql_select = "SELECT * from `tbl_categories` where category_id=" . $id;
                $result = mysqli_query($connect, $sql_select);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <input class='form-control' type='hidden' value='" . $row['category_id'] . "' name='category_id' id=''>
                        <br>";
                        echo "
                        Tiêu đề
                        <input class='form-control' type='text' value='" . $row['category_title'] . "' name='category_title' id=''>
                        <br>";
                    }
                }
            }
            ?>

            <input type="submit" name="update" id="" class="btn btn-success">
        </form>
    </div>
</body>

</html>