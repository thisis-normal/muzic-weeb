<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/index/abc.css">
    <script src="<?= URLROOT ?>/app/views/errors/404.js"></script>
</head>

<body class="bg-purple">

<div class="stars">
    <div class="custom-navbar">
        <div class="brand-logo">
            <img src="https://user-images.githubusercontent.com/73392859/275700777-0e4f5ba8-7ac9-4826-904a-06cade4a593b.png"
                 width="80px" alt="">
        </div>
        <div class="navbar-links">
            <ul>
                <li><a href="<?= URLROOT ?>" target="_blank">Home</a></li>
                <li><a href="https://www.facebook.com/ULSA.IT/" target="_blank">About</a></li>
                <li><a href="http://salehriaz.com/404Page/404.html" target="_blank">Artist</a></li>
                <li><a href="https://github.com/thisis-normal/muzic-weeb" class="btn-request" target="_blank">Request A
                        Demo</a></li>
            </ul>
        </div>
    </div>

    <div class="central-body">
        <img class="image-404" src="http://salehriaz.com/404Page/img/404.svg" width="300px">
        <?php if (!empty($data['errorURL'])) : ?>
            <h1 style="color: orange"><?= $data['errorURL'] ?></h1>
        <?php endif; ?>
        <a href="<?= URLROOT ?>" class="btn-go-home" target="_blank">GO BACK HOME</a>
    </div>
    <div class="objects">
        <img class="object_rocket" src="http://salehriaz.com/404Page/img/rocket.svg" width="40px">
        <div class="earth-moon">
            <img class="object_earth" src="http://salehriaz.com/404Page/img/earth.svg" width="100px">
            <img class="object_moon" src="http://salehriaz.com/404Page/img/moon.svg" width="80px">
        </div>
        <div class="box_astronaut">
            <img class="object_astronaut" src="http://salehriaz.com/404Page/img/astronaut.svg" width="140px">
        </div>
    </div>
    <div class="glowing_stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>

    </div>

</div>

</body>

</html>