<?php
session_start();
// unset dùng để xóa phiên làm việc
session_unset();
// destroy dùng để hủy toàn bộ phiên đó
session_destroy();
echo "<script>window.open('index.php','_self')</script>";
