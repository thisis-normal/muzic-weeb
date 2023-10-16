<?php
if (!isset($_SESSION['admin_id'])) {
    header('location: ' . URLROOT . '/backend/login');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/admin/style.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body class="dark">
    <?php require APPROOT . '/views/admin/navbar.php'; ?>
    <section id="content">
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden checked />
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class="bx bxs-bell"></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="https://scontent.fhan5-11.fna.fbcdn.net/v/t39.30808-6/278388751_364053495635225_4185505353589371366_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=AETREXeIbQIAX8hfEAS&_nc_oc=AQkdERpmXocxc0IYAFYawk_eiyZm8tj4QzMHZgFNdl0tMOKoMXcNl9KWgQ7YHVCBsgw&_nc_ht=scontent.fhan5-11.fna&oh=00_AfBgMhpMh0tH28mpvzyYIcPCTQNW4p2MRQn-A_IFnWSmlg&oe=652FD720" />
            </a>
        </nav>
        <div id="dashboard-tab" class="tab-content active">
            <?php require APPROOT . '/views/admin/dashboard.php'; ?>
        </div>
        <div id="genre-tab" class="tab-content">
            <?php require APPROOT . '/views/admin/genre.php'; ?>
        </div>
        <div id="songrequest-tab" class="tab-content">
            <?php require APPROOT . '/views/admin/songrequest.php'; ?>
        </div>
        <div id="song-tab" class="tab-content">
            <?php require APPROOT . '/views/admin/song.php'; ?>
        </div>
        <div id="artists-tab" class="tab-content">
            <?php require APPROOT . '/views/admin/artists.php'; ?>
        </div>
        <div id="user-tab" class="tab-content">
            <?php require APPROOT . '/views/admin/user.php'; ?>
<!--            request to user-management controller with listUser method -->
        </div>
    </section>
</body>

<script src="<?= URLROOT ?>/public/js/script.js"></script>