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
                <div class="logo">
                    <a href="#">
                        <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png" alt="Logo" />
                    </a>
                </div>

                <div class="navigation">
                    <ul>
                        <li>
                            <a href="<?php echo URLROOT ?>/Premium/index">
                                <span class="fa fa-home"></span>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <p onclick="loadContent('<?php echo URLROOT ?>/Premium/index',event)">
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

                <div class="navigation">
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
                </div>

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