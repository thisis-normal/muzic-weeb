<?php
if (!empty($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
    $currentURL = $_SERVER['REQUEST_URI'];
    if (strpos($referer, $currentURL) !== false) {
        require APPROOT . '/views/include/header.php';
        require APPROOT . '/views/include/navbar.php';
        require APPROOT . '/views/include/footer.php';
    } elseif (strpos($referer, URLROOT . '/pages/playlist') !== false) {
    } elseif (strpos($referer, URLROOT . '/pages/index') !== false) {
    } else {
        require APPROOT . '/views/include/header.php';
        require APPROOT . '/views/include/navbar.php';
        require APPROOT . '/views/include/footer.php';
    }
} else {
    require APPROOT . '/views/include/header.php';
    require APPROOT . '/views/include/navbar.php';
    require APPROOT . '/views/include/footer.php';
    // Trang được mở trực tiếp trong trình duyệt
    // Thực hiện các xử lý khác tại đây
}
