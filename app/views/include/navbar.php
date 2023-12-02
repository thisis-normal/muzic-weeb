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
                    <?php if ($_SESSION['license'] == 0) {
                        ?>
                        <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png"
                             alt="Logo"/>
                    <?php } else { ?>
                        <img src="https://private-user-images.githubusercontent.com/73392859/287420700-b4f66037-be3e-4c6d-96e5-c896a9e3091c.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTEiLCJleHAiOjE3MDE1MjcxOTIsIm5iZiI6MTcwMTUyNjg5MiwicGF0aCI6Ii83MzM5Mjg1OS8yODc0MjA3MDAtYjRmNjYwMzctYmUzZS00YzZkLTk2ZTUtYzg5NmE5ZTMwOTFjLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFJV05KWUFYNENTVkVINTNBJTJGMjAyMzEyMDIlMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjMxMjAyVDE0MjEzMlomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTc5ODFkMjU2ZDUyZGMxZGNlMjk4ZWVkYzJlZWQ3MWE2OTU4M2U3OGIxNDIzOGJiZjE0ZmNkNGZlNGUyOTJiOTQmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.SDA7am8ZFyG7piU1tqOkfhVlpHJk7aCSNduf5hbLfdg"
                             alt="Logo"/>
                    <?php } ?>
                <?php else : ?>
                    <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png"
                         alt="Logo"/>
                <?php endif; ?>
            </div>

            <div class="navigation">
                <ul>
                    <!-- <li>
                        <a href="">
                            <span class="fa fa-home"></span>
                            <span>Home</span>
                        </a>
                    </li> -->
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