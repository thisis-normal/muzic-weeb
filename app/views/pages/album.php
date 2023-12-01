<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>
</div>
<div class="main-container">
    <div id="mainContent">
        <div class="spotify-playlists">
            <div class="entityInfo">
                <div class="leftSection">
                    <div class="playlistImage">
                        <img src="https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0">
                    </div>
                </div>
                <div class="rightSection">
                    <p class="playlist">Album</p>
                    <p class="playlistTitle">Album name</p>
                    <!-- <p class="playlistArtist">
                        Artist 1, Artist 2, Artist 3, and more
                    </p> -->
                    <p class="playlistDetail">
                        <span>15 songs, </span>
                        <span>1 hr 15 min 30 sec</span>
                    </p>
                </div>
            </div>
            <table class="tracklist">
                <thead>
                    <th style="max-width: 30px;">#</th>
                    <th>Title</th>
                    <th>Album</th>
                    <th>Duration</th>
                </thead>
                <tbody>
                    <tr class='tracklistRow'>
                        <td class='' onclick="setTrack('1', tempPlaylist, true)">
                            <span class="itemnum">1</span>
                            <span class="itemplay"><i class="fa fas fa-play" style="color: #ffffff;"></i></span>
                        </td>
                        <td class='trackTitle'>
                            <img class='play' width="40px" height="40px" src='<?= URLROOT ?> /public/img/music-note.png'>
                            <div class="">
                                <span class='trackName'><a href="">Song Title 1</a></span>
                                <span class='artistName'><a href="">Artist 1</a></span>
                            </div>
                        </td>
                        <td class='trackAlbum'>
                            <a href="">Album Title 1</a>
                        </td>
                        <td class='trackDuration'>
                            <span class='duration'>03:30</span>
                        </td>
                    </tr>
                    <!-- ... -->
                    <!-- Add more rows with similar structure for other songs -->
                    <!-- ... -->
                </tbody>
            </table>
        </div>
    </div>
    <script>
        var tempSongIds = '["1", "2", "3"]';
        tempPlaylist = JSON.parse(tempSongIds);
    </script>
</div>
</div>