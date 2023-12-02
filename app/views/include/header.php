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
            <i class="fa fas fa-search"></i>
            <input class="searchInput" id="searchInput" type="search" name="" placeholder="What do you want to listen to?">
        </div>
        <!--        check user session-->
        <?php if (!isUserLoggedIn()) : ?>
            <div class="navbar">
                <ul>
                    <li>
                        <a href="<?= URLROOT  ?>/premium/index">Premium</a>
                    </li>

                    <li class="divider">|</li>
                    <li>
                        <a href="<?= URLROOT ?>/users/register">Sign Up</a>
                    </li>
                </ul>
                <a href="<?= URLROOT ?>/users/login">
                    <button type="button">Log In</button>
                </a>
            </div>
        <?php else : ?>
            <div class="navbar">
                <?php
                if ($_SESSION['license'] != 0) {
                    ?>
                    <span style="color: #1db954">Welcome back, <?= $_SESSION['user_name'] ?></span>
                <?php } else {
                    echo '<a href="' . URLROOT . '/premium/index"><button type="button">Explore premium</button></a>';
                }
                ?>
                <div class="home_info">
                    <input type="checkbox" id="popupToggle">
                    <label for="popupToggle">
                        <div class="home_user" id="home_user" title="<?= $_SESSION['user_name'] ?>">
                            <i class="fa fa-user" style="color: #ffffff"></i>
                        </div>
                    </label>
                    <div class="home_info-popup">
                        <ul>
                            <li>Account</li>
                            <li><a href="<?= URLROOT ?>/premium/index">Upgrade to Premium</a></li>
                            <li class="borderli"><a href="<?= URLROOT ?>/users/logout">
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