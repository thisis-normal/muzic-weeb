<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link class="logo" rel="shortcut icon" href="https://user-images.githubusercontent.com/73392859/275700777-0e4f5ba8-7ac9-4826-904a-06cade4a593b.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/23cecef777.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index/style.css">
    <script src="<?php echo URLROOT ?>/public/js/script.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://tracking.musixmatch.com/t1.0/AMa6hJCIEzn1v8RuOP"></script>

</head>

</div>

<div class="header">
    <?php flash('register_success') ?>

    <div class="topbar">
        <div class="prev-next-buttons">
            <button type="button" class="fa fas fa-chevron-left"></button>
            <button type="button" class="fa fas fa-chevron-right"></button>
        </div>
        <div class="searchBox" id="searchBox">
            <form action="">
                <i class="fa fas fa-search"></i>
                <input class="searchInput" id="searchInput" type="search" name="" placeholder="What do you want to listen to?">

            </form>
        </div>
        <!-- <i class="fas fa-magnifying-glass"></i>
    <i class="fa-magnifying-glass" style="color: #ffffff;"></i> -->
        <!-- <div class="search">
        <input type="text">
    </div> -->
        <div class="user">
            <!--        <img src="--><?php //echo URLROOT 
                                        ?><!--/public/img/avt.jpg" alt="Avatar">-->
            <!--        <span class="username">--><?php //echo $_SESSION['username'] 
                                                    ?><!--</span>-->
            <!-- <i class="fas fa-chevron-down"></i> -->
        </div>
        <!--        check session-->
        <?php if (!isUserLoggedIn()) : ?>
            <div class="navbar">
                <ul>
                    <li>
                        <a href="#">Premium</a>
                    </li>

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
                <?php
                if ($_SESSION['license'] == 1) {
                    echo '<a href="#">Premium Plan</a>';
                } else {
                    echo '<a href="' . URLROOT . '/Premium/index"><button type="button">Explore premium</button></a>';
                }
                ?>
                <!-- <li class="divider">|</li> -->
                <div class="home_info">
                    <input type="checkbox" id="popupToggle">
                    <label for="popupToggle">
                        <div class="home_user" id="home_user" title="<?= $_SESSION['user_name'] ?>">
                            <i class="fa fa-user" style="color: #ffffff"></i>
                        </div>
                        <!-- <div class="home_username"></div> -->
                    </label>

                    <div class="home_info-popup">
                        <ul>
                            <li>Account</li>
                            <li><a href="<?= URLROOT ?>/Premium/index">Upgrade to Premium</a></li>
                            <li class="borderli"><a href="<?php echo URLROOT ?>/users/logout">
                                    Log Out
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--    end check session-->
    </div>
</div>