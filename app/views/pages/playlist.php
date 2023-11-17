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
                        <span><?= $data['totalSong'] ?> songs, </span>
                        <span>
                            about
                            <?php
                            //calculate total duration
                            $totalDuration = 0;
                            foreach ($data['playlist'] as $songList) {
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
                    <th>Album</th>
                    <th>Duration</th>
                </thead>

                <?= $index = 1;
                $songIds = array(); // Tạo một mảng mới để chứa các song_id

                ?>
                <?php foreach ($data['playlist'] as $songList) : ?>
                    <tbody>
                        <tr class='tracklistRow'>
                            <td class='' onclick="setTrack('<?= $songList->song_id ?>', tempPlaylist, true)">
                                <span class="itemnum"><?= $index++ ?></span>
                                <span class="itemplay"><i class="fa fas fa-play" style="color: #ffffff;"></i></span>
                            </td>
                            <td class='trackTitle'>
                                <img class='play' width="40px" height="40px" src='https://user-images.githubusercontent.com/73392859/280170359-da6bac70-46d3-4782-b4bf-5eb031e1818f.png'>
                                <div class="">
                                    <span class='trackName'><a href=""><?= $songList->song_title ?></a></span>
                                    <span class='artistName'><a href=""><?= $songList->artist_name ?></a></span>

                                </div>
                            </td>
                            <td class='trackAlbum'>
                                <a href=""><?= $songList->album_title ?></a>
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
        var tempSongIds = '<?php echo json_encode($songIds); ?>';
        // console.log(tempSongIds)
        tempPlaylist = JSON.parse(tempSongIds);
    </script>
</div>
</div>