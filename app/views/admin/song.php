<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>

<style>
</style>
<div id="song-tab" class="tab-content active">
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>
                        <a class="activenav" href="#">Song</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create user btnpopup" data-form="form_create_song">
                <i class='bx bx-plus'></i>
                <span class="text">Song Create</span>
            </a>
        </div>


        <div class="table-data">
            <div class="order">
                <!-- <div class="head">
                <h3>Recent Orders</h3>
                <i class="bx bx-search"></i>
                <i class="bx bx-filter"></i>
            </div> -->
                <table>
                    <thead>
                        <tr>
<!--                            <th>Ordinal</th>-->
                            <th>Song title</th>
                            <th>Artist</th>
                            <th>Release date</th>
                            <th>Album</th>
                            <th>Genre</th>
                            <th>File path</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($data['listSong'] as $song) : ?>
                        <tbody>
                            <tr>
<!--                                <td>--><?php //= $song->id ?><!--</td>-->
                                <td><?= $song->title ?></td>
                                <td><?= $song->artist_name ?></td>
                                <td><?= $song->release_date ?></td>
                                <td><?= $song->album_title ?></td>
                                <td><?= $song->genre_name ?></td>
                                <td class="truncate-text"><?= $song->file_path ?></td>
                                <td>
                                    <a href="#" class="delete-user" data-delete="<?= $song->title ?>" data-delete-href="<?= URLROOT ?>/song-management/delete-song/?id=<?= $song->song_id ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                    <a href="" class="edit-button btnpopup" data-form="form_update_song" data-songtitle="<?= $song->title ?>" data-album="<?= $song->title ?>" data-artist="<?= $song->name ?>" data-genre="<?= $song->name ?>" data-file="<?= $song->file_path ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                    <tbody>
                        <tr>
                            <td>
                                anh khạc hay em khạc
                            </td>
                            <td>Erik</td>
                            <td>6/4/2002</td>
                            <td>ko có</td>
                            <td>Nhạc trẻ</td>
                            <td class="truncate-text">http://cvcvbnvcxcvbcvxbnvbvzvxbcxvzcvxbc</td>

                            <td>
                                <a href="#" class="delete-user" data-delete="anh khạc hay em khạc" data-delete-href="<?= URLROOT ?>/backend ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href="" class="edit-button btnpopup" data-form="form_update_song" data-songtitle="anh khạc hay em khạc" data-album="ko có" data-artist="Erik" data-genre="Nhạc trẻ" data-file="http://cvcvbnvcxcvbcvxbnvbvzvxbcxvzcvxbc"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- create -->
        <form id="data-form" action="<?= URLROOT ?>/song-management/create-song" method="post" enctype="multipart/form-data">
            <div class="form_create formAd popup form_create_song">
                <h1>Create song</h1>
                <br>
                <div>
                    <input type="text" id="songname" name="song_name" placeholder="Song title" required />
                </div>
                <div>
                    <select id="select-state" name="artist_id" placeholder="Artist">
                        <option value=""></option>
                        <?php foreach ($data['listArtist'] as $artist) : ?>
                            <option value="<?= $artist->artist_id ?>"><?= $artist->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <select id="select-state" name="album_id" placeholder="Album">
                        <option value=""></option>
                        <?php foreach ($data['listAlbum'] as $album) : ?>
                            <option value="<?= $album->album_id ?>"><?= $album->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <select multiple id="select-state" name="genre_id[]" placeholder="Genre">
                        <option value=""></option>
                        <?php foreach ($data['listGenre'] as $genre) : ?>
                            <option value="<?= $genre->genre_id ?>"><?= $genre->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <br>
                <br>
                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" id="file" name="song" accept=" .mp3, .wav, .ogg" size="14" />
                        <span class="form-input--file-button">File</span>
                        <input type="text" class="form-input--file-text" value="Choose file...">
                    </label>
                </div>
                <div>
                    <button id="save-button">Create Song</button>
                </div>
            </div>
        </form>
        <!-- update form -->
        <form action="" method="post">
            <div class="form_update popup form_update_song">
                <h1>Update Song</h1>
                <br>
                <div>
                    <input type="text" id="songname" name="" data-field="songtitle" placeholder="Song title" required />

                </div>

                <div>
                    <select id="select-state" data-field="album" name="">
                        <option value="1">1</option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>
                <div>
                    <select id="select-state" data-field="artist" name="">

                        <option value="1">1</option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>
                <div>
                    <select id="select-state" data-field="genre" name="">
                        <option value="">genre</option>
                        <option value="1">1</option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>

                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" id="file" name="" accept=" .mp3, .wav, .ogg" size="14" required />
                        <span class="form-input--file-button">File</span>
                        <input type="text" class="form-input--file-text" data-field="file" value="Choose file...">
                    </label>
                </div>
                <div>
                    <button id="save-button">Update Song</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script>
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text',
            maxOptions: 5
        });
        $('#select-tools').selectize({
            maxItems: null,
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            options: [
                <?php foreach ($data['listGenre'] as $genre) : ?>
                {
                    id: <?= $genre->genre_id ?>, title: '<?= $genre->name ?>'
                },
                <?php endforeach; ?>
                { id: 0, title: 'Add new genre'}
            ],
            create: false
        });
    });
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>