<?php
// kết nối db
$connect = new mysqli("localhost", "root", "", "pinky");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
