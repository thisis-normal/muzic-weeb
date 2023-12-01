<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="browseAll">
            <h2>Browse All</h2>
            <div class="browseItems">
                <div class="browseItem">
                    <p>Podcast</p>
                </div>
                <div class="browseItem">
                    <p>Podcast</p>
                </div>
                <div class="browseItem">
                    <p>Podcast</p>
                </div>
                <div class="browseItem">
                    <p>Podcast</p>
                </div>
                <div class="browseItem">
                    <p>Podcast</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        setRandomBackgroundColor();
        $("#searchBox").css("display", "block");
        const searchInput = document.getElementById("searchInput");
        // const searchResults = document.getElementById("searchResults");

        searchInput.addEventListener("keyup", function(event) {
            const searchTerm = event.target.value;
console.log(
    searchTerm
)
            if (searchTerm.length > 0) {
                openPage(`http://localhost:2002/muzic-weeb/search/result?search=${searchTerm}`)
            } else {
                // searchResults.innerHTML = '';
            }
        });
    </script>
</div>

</div>