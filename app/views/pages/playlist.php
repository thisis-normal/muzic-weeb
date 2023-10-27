<?php require APPROOT . '/views/include/header.php';
require APPROOT . '/views/include/navbar.php';
require APPROOT . '/views/include/footer.php';
?>
<?php
if (isUserLoggedIn()) {
    // $userLoggedIn = new User($con, $_GET['userLoggedIn']);
} else {
    echo "Username variable was not passed into page. Check the openPage JS function";
    exit();
}
$currentPage = 'playlist'; // Đánh dấu trang hiện tại là 'index'
var_dump($currentPage);
exit
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="entityInfo">

            <div class="leftSection">
                <div class="playlistImage">
                    <img src="https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0">
                </div>
            </div>

            <div class="rightSection">
                <h2>a</h2>
                <p>By a</p>
                <p> songs</p>
                <button class="button">DELETE PLAYLIST</button>

            </div>

        </div>
        <div class="tracklistContainer">
            <ul class="tracklist">

                <li class='tracklistRow'>
                    <div class='trackCount'>
                        <img class='play' src='https://scontent.fhan5-9.fna.fbcdn.net/v/t1.6435-1/132339848_1082217975562826_8163229432639064333_n.jpg?stp=dst-jpg_p100x100&_nc_cat=109&ccb=1-7&_nc_sid=2b6aad&_nc_ohc=xoNptGZIC2kAX8p40Jt&_nc_oc=AQnEi9zY-vjcAMOusj9WcmyuCIULOcvLOP1TzidLm7fa7z37gWtwmygau20qIPi7yHE&_nc_ad=z-m&_nc_cid=1229&_nc_ht=scontent.fhan5-9.fna&oh=00_AfB2mH7ekxI0XHFrgHPwtpQf5v76wC9DJa4UCddqK2tApA&oe=65489C2D'>
                        <span class='trackNumber'></span>
                    </div>


                    <div class='trackInfo'>
                        <span class='trackName'>ANh khasc hay em khasc</span>
                        <span class='artistName'>abc</span>
                    </div>

                    <div class='trackOptions'>
                        <input type='hidden' class='songId' value='ssssss'>
                        <img class='optionsButton' src='assets/images/icons/more.png'>
                    </div>

                    <div class='trackDuration'>
                        <span class='duration'>cccc</span>
                    </div>


                </li>

                <script>
                    var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
                    tempPlaylist = JSON.parse(tempSongIds);
                </script>

            </ul>
        </div>
    </div>
</div>

</div>