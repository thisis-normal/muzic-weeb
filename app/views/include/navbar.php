<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index/style.css">
</head>

<body>

<div class="navbar">
    <div class="nav">
        <div class="sidebar">
            <div class="logo" onclick="openPage('<?php echo URLROOT ?>')">
                <?php if (isUserLoggedIn()) : ?>
                    <?php if ($_SESSION['license'] == 1) {
                        ?>
                        <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png"
                             alt="Logo"/>
                    <?php } else { ?>
                        <img src="https://user-images.githubusercontent.com/73392859/287420700-b4f66037-be3e-4c6d-96e5-c896a9e3091c.png"
                             alt="Logo"/>
                    <?php } ?>
                <?php else : ?>
                    <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png"
                         alt="Logo"/>
                <?php endif; ?>
            </div>

            <div class="navigation">
                <ul>
                    <li>
                        <p onclick="openPage('<?php echo URLROOT ?>')">
                            <span class="fa fa-home"></span>
                            <span>Home</span>
                        </p>
                    </li>

                    <li>
                        <p onclick="openPage('<?php echo URLROOT ?>/pages/search')">
                            <span class="fa fa-search"></span>
                            <span>Search</span>
                        </p>
                    </li>

                    <li>
                        <p href="#">
                            <span class="fa fas fa-book"></span>
                            <span>Your Library</span>
                        </p>
                    </li>
                </ul>
            </div>

            <!-- <div class="navigation">
                <ul>
                    <li>
                        <p href="#">
                            <span class="fa fas fa-plus-square"></span>
                            <span>Create Playlist</span>
                        </p>
                    </li>

                    <li>
                        <p href="#">
                            <span class="fa fas fa-heart"></span>
                            <span>Liked Songs</span>
                        </p>
                    </li>
                </ul>
            </div> -->

            <div class="policies">
                <ul>
                    <li>
                        <p href="https://www.spotify.com/vn-en/legal/cookies-policy/">Cookies</p>
                    </li>
                    <li>
                        <p href="https://www.spotify.com/vn-en/legal/privacy-policy/">Privacy</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>