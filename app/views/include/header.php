<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index/style.css">
    <script src="<?php echo URLROOT ?>/public/js/script.js"></script>

</head>

<body>
<?php flash('register_success') ?>

<div class="topbar">
    <div class="prev-next-buttons">
        <button type="button" class="fa fas fa-chevron-left"></button>
        <button type="button" class="fa fas fa-chevron-right"></button>
    </div>
    <i class="fas fa-magnifying-glass"></i>
    <i class="fa-magnifying-glass" style="color: #ffffff;"></i>
    <div class="search">
        <input type="text">
    </div>
    <div class="user">
<!--        <img src="--><?php //echo URLROOT ?><!--/public/img/avt.jpg" alt="Avatar">-->
<!--        <span class="username">--><?php //echo $_SESSION['username'] ?><!--</span>-->
        <i class="fas fa-chevron-down"></i>
    </div>
    <!--        check session-->
    <?php if (!isUserLoggedIn()) : ?>
        <div class="navbar">
            <ul>
                <li>
                    <a href="#">Premium</a>
                </li>
                <!-- <li>
              <a href="#">Support</a>
            </li>
            <li>
              <a href="#">Download</a>
            </li> -->
                <li class="divider">|</li>
                <li>
                    <a href="<?php echo URLROOT ?>/users/register">Sign Up</a>
                </li>
            </ul>
            <a href="<?php echo URLROOT ?>/users/login">
                <button type="button">Log In</button>
            </a>
        </div>
    <?php else : ?>
        <div class="navbar">
            <ul>
                <li>
                   <?php
                   if ($_SESSION['license'] == 1) {
                       echo '<a href="#">Premium Plan</a>';
                   } else {
                       echo '<a href="#">Explore Premium</a>';
                   }
                   ?>
                </li>
                <!-- <li>
              <a href="#">Support</a>
            </li>
            <li>
              <a href="#">Download</a>
            </li> -->
                <li class="divider">|</li>
                <li>
                    <?= $_SESSION['user_name'] ?>
                </li>
            </ul>
            <a href="<?php echo URLROOT ?>/users/logout">
                <button type="button">Log Out</button>
            </a>
        </div>
    <?php endif; ?>
<!--    end check session-->
</div>