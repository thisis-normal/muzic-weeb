<section id="sidebar">
    <a href="#" class="brand">
        <i class="bx bxs-smile"></i>
        <span class="text">
            Hello <?= $_SESSION['admin_name'] ?>
            <br>
            <p class="admin_role hidden"><?= $_SESSION['admin_role'] ?></p>
        </span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="<?= URLROOT ?>/admins/index" data-tab="dashboard-tab">
                <i class="bx bxs-dashboard"></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/genre" data-tab="genre-tab">
                <i class="bx bxs-category"></i>
                <span class="text">Genre</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/album" data-tab="album-tab">
                <i class="bx bxs-category"></i>
                <span class="text">Album</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/playlist" data-tab="playlist-tab">
                <i class='bx bx-slideshow'></i>
                <span class="text">Playlist</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/premium" data-tab="premium-tab">
                <i class='bx bxs-diamond'></i>
                <span class="text">Premium</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/song" data-tab="song-tab">
                <i class="bx bxs-music"></i>
                <span class="text">Song</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/songrequest" data-tab="songrequest-tab">
                <i class="bx bx-music"></i>
                <span class="text">Song request</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/artist" data-tab="artists-tab">
                <i class="bx bx-user-pin"></i>
                <span class="text">Artists</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/admins/user" data-tab="user-tab">
                <i class="bx bxs-group"></i>
                <span class="text">Users</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class="bx bxs-cog"></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="<?= URLROOT ?>/backend/logout" class="logout">
                <i class="bx bxs-log-out-circle"></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<script>
    if (document.querySelector('.admin_role').textContent.trim() === "artist") {
        // Lấy tất cả các thẻ li
        var listItems = document.querySelectorAll('.side-menu.top li');
        listItems.forEach(function(li, index) {
            if (index !== 2 && index !== 5 && index !== 7) {
                li.style.display = 'none';
            }
        });
        listItems.forEach(function(li, index) {
            if (index === 0) {
                li.click();
            }
        });


    }
</script>