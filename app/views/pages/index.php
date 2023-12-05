<?php require APPROOT . '/views/include/includeFiles.php';
?>

</div>
<div class="main-container">
    <div id="mainContent">
        <div class="spotify-playlists">
            <div class="showall">
                <a href="">
                    <h2>Spotify Playlists</h2>
                </a>
                <a href="">
                    <p>Show all</p>
                </a>
            </div>

            <div class="list">
                <?php foreach ($data['playlist'] as $playlist) : ?>
                    <div class="item" onclick="openPage('<?php echo URLROOT ?>/playlists/detail?id=<?= $playlist->playlist_id ?>')">
                        <img src="https://memberdata.s3.amazonaws.com/hi/hitsdd/photos/hitsdd_photo_gal__photo_975344211.jpg" />
                        <div class="play">
                            <span class="fa fa-play"></span>
                        </div>
                        <h4><?= $playlist->title ?></h4>
                        <p><?= $playlist->description ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="spotify-playlists">
            <h2>Spotify artist</h2>
            <div class="list">
                <?php foreach ($data['artist'] as $artist) : ?>
                    <div class="item" onclick="openPage('<?php echo URLROOT ?>/artists/detail?id=<?= $artist->artist_id ?>')">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVdOUBb0Mt5ndnNk05p1Qzzh4s1_r9GPkuwBBQWQvRUYJ3ZG7NygoXHP8ctyuriW7DKFQ&usqp=CAU" />
                        <div class="play">
                            <span class="fa fa-play"></span>
                        </div>
                        <h4><?= $artist->name ?> </h4>
                        <p>Artist</p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="spotify-playlists">
            <h2>Spotify album</h2>
            <div class="list">
                <?php foreach ($data['album'] as $album) : ?>
                    <div class="item" onclick="openPage('<?php echo URLROOT ?>/albums/detail?id=<?= $album->album_id ?>')">
                        <img src="https://memberdata.s3.amazonaws.com/hi/hitsdd/photos/hitsdd_photo_gal__photo_975344211.jpg" />
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