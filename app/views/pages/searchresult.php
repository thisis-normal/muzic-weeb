<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="browseAll">
            <?php foreach ($data['albums'] as $songList) : ?>
                <p> <?= $songList->title ?></p>
            <?php

            endforeach;
            ?>
        </div>
    </div>
    <script>
        setRandomBackgroundColor();
        $("#searchBox").css("display", "block");
        const searchInput = document.getElementById("searchInput");

        // const searchResults = document.getElementById("searchResults");

        searchInput.addEventListener("keyup", function(event) {
            const searchTerm = event.target.value;
            if (searchTerm.length > 0) {
                openPage(`http://localhost:2002/muzic-weeb/search/result?search=${searchTerm}`)
            } else {
                openPage(`http://localhost:2002/muzic-weeb/pages/search/`)
            }
            localStorage.setItem("searchText", searchTerm)
        });
        window.onload = function() {
            console.log(localStorage.getItem("searchText"))
            searchInput.value = localStorage.getItem("searchText");

        };
    </script>
</div>

</div>