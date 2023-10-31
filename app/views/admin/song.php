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
                            <th>Song title</th>
                            <th>Artist</th>
                            <th>Release date</th>
                            <th>Album</th>
                            <th>Genre</th>
                            <th>File path</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                anh khạc hay em khạc
                            </td>
                            <td>Erik</td>
                            <td>6/4/2002</td>
                            <td>ko có </td>
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
        <form id="data-form" action="" method="post">
            <div class="form_create formAd popup form_create_song">
                <h1>Create song</h1>
                <br>
                <div>
                    <input type="text" id="songname" name="" placeholder="Song title" required />
                </div>
                <div>
                    <select id="select-state" name="" placeholder="Artist">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>
                <div>
                    <select id="select-state" name="" placeholder="Album">

                        <option value=""></option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>
                <div>
                    <select id="select-state" name="" placeholder="Genre">

                        <option value=""></option>
                        <option value="2">1</option>
                        <option value="3">1</option>
                        <option value="4">1</option>
                    </select>
                </div>
                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" id="file" name="" accept=" .mp3, .wav, .ogg" size="14" required />
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
<?php // New array to hold just name strings
$artists = [];
foreach ($data['listArtist'] as $artist) {
    $artists[] = [
        'name' => $artist->name,
        'id' => $artist->artist_id
    ];
}
?>
<script>
    $(document).ready(function() {
        $('select').selectize({
            // sortField: 'text',
            maxOptions: 5
        });

    });

    const dataForArtist = <?= json_encode($artists) ?>;
    const dataForGenre = ["Not assign yet"];
    const dataForStatus = ["Not assign yet"];
    const dataForDefault = ["Not assign yet"];
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>