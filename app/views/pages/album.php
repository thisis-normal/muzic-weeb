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
                    <p class="playlistTitle"><?= $data['album'][0]->album_title; ?></p>
                    <!-- <p class="playlistArtist">
                        Artist 1, Artist 2, Artist 3, and more
                    </p> -->
                    <p class="playlistDetail">
                        <span><?= $data['totalSong'] ?> songs, </span>
                        <span>
                            about
                            <?php
                            //calculate total duration
                            $totalDuration = 0;
                            foreach ($data['album'] as $songList) {
                                $totalDuration += $songList->song_duration;
                            }
                            //seperate duration to hour, minute and second
                            $hour = substr(gmdate('H:i:s', $totalDuration), 0, 2);
                            $minute = substr(gmdate('H:i:s', $totalDuration), 3, 2);
                            $second = substr(gmdate('H:i:s', $totalDuration), 6, 2);
                            if ($hour != 0) {
                                echo $hour . ' hr ' . $minute . ' min ' . $second . ' sec';
                            } else {
                                echo $minute . ' min ' . $second . ' sec';
                            }
                            ?>
                        </span>
                    </p>
                </div>
            </div>
            <table class="tracklist">
                <thead>
                    <th style="max-width: 30px;">#</th>
                    <th>Title</th>
                    <th></th>
                    <th>Duration</th>
                </thead>

                <?php $index = 1;
                $songIds = array(); // Tạo một mảng mới để chứa các song_id

                ?>
                <?php foreach ($data['album'] as $songList) : ?>
                    <tbody>
                        <tr class='tracklistRow'>
                            <td class='' onclick="setTrack('<?= $songList->song_id ?>', tempPlaylist, true)">
                                <span class="itemnum"><?= $index++ ?></span>
                                <span class="itemplay"><i class="fa fas fa-play" style="color: #ffffff;"></i></span>
                            </td>
                            <td class='trackTitle'>
                                <img class='play' width="40px" height="40px" src='<?= URLROOT ?> /public/img/music-note.png'>
                                <div class="">
                                    <span class='trackName'><a href=""><?= $songList->song_title ?></a></span>
                                    <span class='artistName' onclick="openPage('<?php echo URLROOT ?>/artists/detail?id=<?php echo $songList->artist_id ?>')"><?= $songList->artist_name ?></span>

                                </div>
                            </td>
                            <td class='trackAlbum'>
                                <!-- <a href="" onclick="openPage('<?php echo URLROOT ?>/albums/detail?id=<?php echo $songList->album_id ?>')"><?= $songList->album_title ?></a> -->
                            </td>
                            <td class='trackDuration'>
                                <span class='duration'>
                                    <?php
                                    //seperate duration to minute and second
                                    $minute = substr(gmdate('H:i:s', $songList->song_duration), 3, 2);
                                    $second = substr(gmdate('H:i:s', $songList->song_duration), 6, 2);
                                    echo $minute . ':' . $second;
                                    ?>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $songIds[] = $songList->song_id;
                endforeach;
                unset($index); ?>
            </table>
        </div>
    </div>
    <script>
        var tempSongIds = '["1", "2", "3"]';
        tempPlaylist = JSON.parse(tempSongIds);
    </script>
</div>
</div>