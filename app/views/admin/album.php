<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>

<div id="user-tab" class="tab-content active">
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <h2 style="color: green; text-align: center "><?php flash('register_success'); ?></h2>
                <h2 style="color: red; text-align: center "><?php flash('register_fail'); ?></h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>
                        <a class="activenav" href="#">Album</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create user btnpopup" data-form="form_create_album">
                <i class='bx bx-plus'></i>
                <span class="text">Album Create</span>
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
                            <th>Album id</th>
                            <th>Album name</th>
                            <th>Artist</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($data['listAlbum'] as $album) : ?>
                        <tbody>
                            <tr>
                                <td><?= $album->album_id ?></td>
                                <td><?= $album->title ?></td>
                                <td><?= $album->name ?></td>
                                <td>
                                    <a href="#" class="delete-user" data-delete="<?= $album->title ?>" data-delete-href="<?= URLROOT ?>/album-management/delete-album?album_id=<?= $album->album_id ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                    <a href="" class="edit-button btnpopup" data-form="form_update_album" data-albumname="<?= $album->title ?>" data-albumid="<?= $album->album_id ?>" data-artistid="<?= $album->artist_id ?>" data-artistn="<?= $album->name ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
        <!-- create album form -->
        <form id="data-form" action="<?= URLROOT ?>/album-management/create-album" method="post">
            <div class="form_create popup form_create_album">
                <h1>Create album</h1>
                <br>
                <div>
                    <input type="text" id="albumname" name="album_name" placeholder="Album's Name" required />
                </div>
                <div>
                    <select id="select-state" name="artist_id" placeholder="Artist">
                        <option value=""></option>
                        <?php foreach ($data['listArtist'] as $artist) : ?>
                            <option value="<?= $artist->artist_id ?>"><?= $artist->name ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" id="artistId" name="artist_id" hidden>
                <input type="hidden" id="artistName" name="selected_artist" hidden="hidden">
                <div>
                    <button id="save-button">Create album</button>
                </div>
            </div>
        </form>


        <!-- update form -->
        <form action="<?= URLROOT ?>/album-management/update-album" method="post">
            <div class="form_update popup form_update_album">
                <h1>Update album</h1>
                <br>
                <div>
                    <input type="text" id="" name="album_name" data-field="albumname" placeholder="albumname" required />
                </div>



                <div>
                    <select id="select-state" data-field="artistid" name="artist_id" placeholder="Pick a state...">

                        <?php foreach ($data['listArtist'] as $artist) : ?>
                            <option value="<?= $artist->artist_id ?>"><?= $artist->name ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- <input type="text" name="album_id" data-field="albumid" id=""> -->
                <!--                    <input type="text" name="artist_name" data-field="artistn" id="artist"> -->
                <div>
                    <button id="save-button">Update album</button>
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
    const dataForArtist = <?= json_encode($artists) ?> //;
</script>
<script>
    $(document).ready(function() {
        $('select').selectize({
            // sortField: 'text',
            maxOptions: 5
        });

    });
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>