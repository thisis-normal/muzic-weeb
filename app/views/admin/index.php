<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/admin/style.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
</head>

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
        <!-- <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label> -->
        <a href="#" class="notification">
            <i class="bx bxs-bell"></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png" />
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
    </div>
</section>

<script>
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach(item => {
        const li = item.parentElement;

        item.addEventListener('click', function() {
            allSideMenu.forEach(i => {
                i.parentElement.classList.remove('active');
            })
            li.classList.add('active');
        })
    });

    // TOGGLE SIDEBAR
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
    })
    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
    const searchForm = document.querySelector('#content nav form');
    searchButton.addEventListener('click', function(e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchButtonIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    })
    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    } else if (window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
    window.addEventListener('resize', function() {
        if (this.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    })
    // const switchMode = document.getElementById('switch-mode');

    // switchMode.addEventListener('change', function() {
    //     if (this.checked) {
    //         document.body.classList.add('dark');
    //     } else {
    //         document.body.classList.remove('dark');
    //     }
    // })
    // tab
    const tabContents = document.querySelectorAll(".tab-content");
    const tabLinks = document.querySelectorAll(".side-menu a");

    tabLinks.forEach((link) => {
        link.addEventListener("click", () => {
            // Loại bỏ lớp "active" từ tất cả các tab
            tabContents.forEach((content) => content.classList.remove("active"));

            // Lấy id hoặc data attribute của tab tương ứng
            const tabId = link.getAttribute("data-tab");

            // Tìm tab với id tương ứng và thêm lớp "active"
            const tab = document.getElementById(tabId);
            if (tab) {
                tab.classList.add("active");
            }
        });
    });
</script>