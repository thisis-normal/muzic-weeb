<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="browseAll">
            <h2>Browse All</h2>
            <div class="browseItems">
                <?php foreach ($data as $genre) : ?>
                    <div class="browseItem" onclick="openPage('<?php echo URLROOT ?>/genres/detail')">
                        <p><?= $genre->name ?></p>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <script>
        setRandomBackgroundColor();
        $("#searchBox").css("display", "block");

        // Gọi hàm handleSearchInput để thực thi
        handleSearchInput();
    </script>
</div>

</div>