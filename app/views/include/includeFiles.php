<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

    if (!isUserLoggedIn()) {
        echo "Username variable was not passed into page. Check the openPage JS function";
        exit();
    } else {
    }
} else {
    require APPROOT . '/views/include/header.php';
    require APPROOT . '/views/include/navbar.php';
    require APPROOT . '/views/include/footer.php';
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}
