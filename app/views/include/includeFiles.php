<?php
if (!empty($_SERVER['HTTP_REFERER'])) {
    // Trang được mở từ yêu cầu AJAX (client-side)
    // Thực hiện các xử lý tương ứng

    // $url = $_SERVER['REQUEST_URI'];
    // echo "<script>console.log('$url')</script>";
} else {
    require APPROOT . '/views/include/header.php';
    require APPROOT . '/views/include/navbar.php';
    require APPROOT . '/views/include/footer.php';
    // Trang được mở trực tiếp trong trình duyệt
    // Thực hiện các xử lý khác tại đây
}
