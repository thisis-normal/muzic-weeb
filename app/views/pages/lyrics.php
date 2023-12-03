<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>
</div>
<div class="main-container">
    <div id="mainContent">
        <div id="track_lyrics">

        </div>
    </div>
    <script>
        getLyrics(localStorage.getItem('trackTitle'), localStorage.getItem('artistName'));
    </script>
</div>
</div>