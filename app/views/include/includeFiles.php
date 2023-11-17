<?php
if (!empty($_SERVER['HTTP_REFERER'])) {

    $referer = $_SERVER['HTTP_REFERER'];
    $currentURL = $_SERVER['REQUEST_URI'];
    if (strpos($referer, $currentURL) !== false) {
        require APPROOT . '/views/include/header.php';
        require APPROOT . '/views/include/navbar.php';
        require APPROOT . '/views/include/footer.php';
    } elseif (strpos($referer, URLROOT . '/users/register') !== false) {

        require APPROOT . '/views/include/header.php';
        require APPROOT . '/views/include/navbar.php';
        require APPROOT . '/views/include/footer.php';
    } elseif (strpos($referer, URLROOT . '/users/login') !== false) {

        require APPROOT . '/views/include/header.php';
        require APPROOT . '/views/include/navbar.php';
        require APPROOT . '/views/include/footer.php';
    } else {
    }
} else {
    require APPROOT . '/views/include/header.php';
    require APPROOT . '/views/include/navbar.php';
    require APPROOT . '/views/include/footer.php';
}
