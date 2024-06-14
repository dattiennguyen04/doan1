<?php
include("../config/config.php");
// nếu tồn tại click vào đường dẫn có delte thì
if (isset($_GET['delete'])) {
    // lưu trữ id lấy được trong delete lưu vào beiens delete_id
    $delete_id = $_GET['delete'];
    // thực hiện câu lệnh xóa dl trong sql 
    $sql_delete = "DELETE from tbl_user where user_id=$delete_id";
    if (mysqli_query($connect, $sql_delete)) {
        echo "<script>alert('Xóa tài khoản thành công')</script>";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($connect);
    }
}
?>

<h2 class="text-center">Trang quản lý tài khoản</h2>
<table border='1' style=' border-collapse: collapse;width: 100%;'>

    <thead>
        <tr>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <?php

    $query = "SELECT * from tbl_user";
    $result = mysqli_query($connect, $query);
    while ($rows = mysqli_fetch_array($result)) {
        $user_name = $rows['user_name'];
        $user_email = $rows['user_email'];
        $user_password = $rows['user_password'];
        $user_phone_number = $rows['user_phone_number'];
        $user_id = $rows['user_id'];

        echo "
                <tbody>
                    <tr>
                        <td>$user_name</td>
                        <td>$user_email</td>
                        <td>$user_phone_number</td>
                        <td><a href='list_user.php?delete=$user_id'>Xóa</a></td>
                    </tr>
                </tbody>
            ";
    }


    ?>
</table>