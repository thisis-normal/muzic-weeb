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
                    <p class="playlist">Playlist</p>
                    <p class="playlistTitle"><?= $data['playlist'][0]->playlist_title; ?></p>
                    <p class="playlistArtist">
                        <?php for ($i = 0; $i < 3; $i++) {
                            echo $data['playlist'][$i]->artist_name . ',';
                        } ?> and more
                    </p>
                    <p class="playlistDetail">
                        <span><?= $data['totalSong'] ?> songs</span>
                        <span>about 1 hr 45 min</span>
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
                    <td class=''>
                        <span class="itemnum">1</span>
                        <span class="itemplay"><i class="fa fas fa-play" style="color: #ffffff;"></i></span>
                    </td>
                    <td class='trackTitle'>
                        <img class='play' width="40px" height="40px"
                             src='https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0'>
                        <div class="">
                            <span class='trackName'><a href="">ANh khasc hay em khasc</a></span>
                            <span class='artistName'><a href="">abc</a>,<a href="">bcs</a></span>
                        </div>
                    </td>
                    <td class='trackAlbum'>
                        <a href="">album</a>
                    </td>
                    <td class='trackDuration'>
                        <span class='duration'>03:02</span>
                    </td>
                </tr>
                </tbody>
                <?= $i = 1; ?>
                <?php foreach ($data['playlist'] as $songList) : ?>
                    <tbody>
                    <tr class='tracklistRow'>
                        <td class=''>
                            <span class="itemnum"><?= $i++ ?></span>
                            <span class="itemplay"><i class="fa fas fa-play" style="color: #ffffff;"></i></span>
                        </td>
                        <td class='trackTitle'>
                            <img class='play' width="40px" height="40px"
                                 src='https://user-images.githubusercontent.com/73392859/280170359-da6bac70-46d3-4782-b4bf-5eb031e1818f.png'>
                            <div class="">
                                <span class='trackName'><a href=""><?= $songList->song_title ?></a></span>
                                <span class='artistName'><a href=""><?= $songList->artist_name ?></a></span>
                            </div>
                        </td>
                        <td class='trackAlbum'>
                            <a href=""><?= $songList->album_title ?></a>
                        </td>
                        <td class='trackDuration'>
                            <span class='duration'>03:02</span>
                        </td>
                    </tr>
                    </tbody>
                <?php endforeach;
                unset($i); ?>
            </table>
        </div>
    </div>
</div>

</div>