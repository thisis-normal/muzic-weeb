<?php require APPROOT . '/views/include/includeFiles.php';
/** @var array $data */
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="browseAll">
            <div style="display: flex">
                <?php if (!empty($data['artists'][0])) : ?>
                    <div style="width: 30%">
                        <div class="spotify-playlists">
                            <h2>Search top results</h2>
                            <div class="topresults" onclick="openPage('<?php echo URLROOT ?>/artists/detail?id=<?= $data['artists'][0]->artist_id ?>')">
                                <img src="<?= URLROOT . '/public/img/' . $data['artists'][0]->image ?>" alt="artist">

                                <div class="play">
                                    <span class="fa fa-play"></span>
                                </div>
                                <h4><?= $data['artists'][0]->name ?></h4>
                                <p>Artist</p>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="spotify-playlists" style="width: 70%; margin-left: 24px;">
                    <h2>Song</h2>
                    <table class="tracklist">
                        <!--                <thead>-->
                        <!---->
                        <!--                <th>Title</th>-->
                        <!--                <th>Album</th>-->
                        <!--                <th>Duration</th>-->
                        <!--                </thead>-->

                        <!--                --><?php //= $index = 1;
                                                //                $songIds = array(); // Tạo một mảng mới để chứa các song_id
                                                //
                                                //                
                                                ?>
                        <?php foreach ($data['playlists'] as $playlist) : ?>
                            <tbody>
                                <tr class='tracklistRow'>

                                    <td class='trackTitle' onclick="setTrack('<?= $playlist->song_id ?>', tempPlaylist, true)">
                                        <img class='play' width="40px" height="40px" src='<?= URLROOT ?> /public/img/music-note.png'>
                                        <div class="">
                                            <span class='trackName'><a href=""><?= $playlist->song_title ?></a></span>
                                            <span class='artistName'><a href=""><?= $playlist->artist_name ?></a></span>

                                        </div>
                                    </td>
                                    <!--                        <td class='trackAlbum'>-->
                                    <!--                            <a href="">--><?php //= $songList->album_title 
                                                                                    ?><!--</a>-->
                                    <!--                        </td>-->
                                    <td class='trackDuration'>
                                        <span class='duration'>
                                            <?php
                                            //seperate duration to minute and second
                                            $minute = substr(gmdate('H:i:s', $playlist->song_duration), 3, 2);
                                            $second = substr(gmdate('H:i:s', $playlist->song_duration), 6, 2);
                                            echo $minute . ':' . $second;
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                            $songIds[] = $playlist->song_id;
                        endforeach;
                        //                unset($index);
                        ?>
                    </table>
                </div>
            </div>
            <div>

                <div class="spotify-playlists">
                    <h2>Playlist</h2>
                    <div class="list">
                        <?php foreach ($data['playlists'] as $playlist) : ?>
                            <div class="item" onclick="openPage('<?php echo URLROOT ?>/playlists/detail?id=<?php echo $playlist->id ?>')">
                                <img src="https://th.bing.com/th/id/R.169e29309b53f7873e35844892b3aa64?rik=f4yPfstrpv6L4Q&pid=ImgRaw&r=0" />
                                <div class="play">
                                    <span class="fa fa-play"></span>
                                </div>
                                <h4><?= $playlist->playlist_title ?>></h4>
                                <p><?= $playlist->playlist_description ?>></p>
                            </div><?php endforeach; ?>

                    </div>
                </div>


            </div>
            <div>

                <div class="spotify-playlists">
                    <h2>Artist</h2>
                    <div class="list">
                        <?php foreach ($data['artists'] as $artist) : ?>

                            <div class="item" onclick="openPage('<?php echo URLROOT ?>/artists/detail?id=<?php echo $artist->artist_id ?>')">
                                <img src="<?= URLROOT . '/public/img/' . $artist->image ?>" style="border-radius:100px  " />
                                <div class="play">
                                    <span class="fa fa-play"></span>
                                </div>
                                <h4><?= $artist->name ?></h4>
                                <p>Artist</p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>


            </div>
            <div>

                <div class="spotify-playlists">
                    <h2>Album</h2>
                    <div class="list">
                        <?php foreach ($data['albums'] as $album) : ?>
                            <div class="item" onclick="openPage('<?php echo URLROOT ?>/albums/detail?id=<?php echo $album->album_id ?>')">
                                <img src="<?= URLROOT . '/public/img/' . $album->cover_image ?>" />
                                <div class="play">
                                    <span class="fa fa-play"></span>
                                </div>
                                <h4><?= $album->title ?></h4>
                                <p>Album</p>
                            </div>
                        <?php endforeach; ?>

                    </div>
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
            if (searchTerm.length > 0) {
                openPage(`http://localhost:2002/muzic-weeb/search/result?search=${searchText}`);
            } else {
                openPage(`http://localhost:2002/muzic-weeb/pages/search/`);
            }

            // localStorage.clear("searchText")
            localStorage.setItem("searchText", searchTerm);
        });
        // searchInput.addEventListener("keydown", function(event) {
        //     if (event.key === "Enter") {
        //         event.preventDefault();
        //         // Xử lý logic tại đây nếu cần
        //     }
        // });
        window.onload = function() {

            // openPage(`http://localhost:2002/muzic-weeb/search/result?search=${localStorage.getItem("searchText")}`);
            searchInput.value = localStorage.getItem("searchText");
            searchInput.focus();
            handleSearchInput();


        };
    </script>
</div>

</div>