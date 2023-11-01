<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>console.log('$url')</script>";
    // Kiểm tra xem có biến 'userLoggedIn' đã được truyền hay chưa

} else {
    require APPROOT . '/views/include/header.php';
    require APPROOT . '/views/include/navbar.php';
    require APPROOT . '/views/include/footer.php';

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>console.log('$url')</script>";
}
