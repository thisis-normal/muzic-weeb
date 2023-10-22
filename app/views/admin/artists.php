<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>
<style>
    .truncate-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        /* Điều chỉnh độ rộng tối đa bạn muốn hiển thị */
    }
</style>
<div id="artists-tab" class="tab-content active">
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
                        <a class="activenav" href="#">Artists</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create btnpopup" data-form="form_create_artist">
                <i class='bx bx-plus'></i>
                <span class="text">Artist Create</span>
            </a>
        </div>


        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                    <tr>
                        <th>Ordinal</th>
                        <th>Artist name</th>
                        <th>Biography</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php foreach ($data['listArtist'] as $artist) : ?>
                    <tbody>
                    <tr>
                        <td><?= $artist->artist_id ?></td>
                        <td><?= $artist->name ?></td>
                        <td><?= $artist->biography ?></td>
                        <td><img src="<?= IMGROOT ?>/<?= $artist->image ?>" alt="" width="200px"></td>
                        <td>
                            <a href="#" class="delete-user" data-delete="<?= $artist->name ?>"
                               data-delete-href="<?= URLROOT ?>/artist-management/delete-artist/?id=<?= $artist->artist_id ?>"><i
                                        class='bx bx-trash' style='color:#fb0004'></i></a>
                            <a href="" class="edit-button btnpopup" data-form="form_update_artist" data-id="<?= $artist->artist_id ?>"
                               data-artistname="<?= $artist->name ?>" data-biography="<?= $artist->biography ?>"
                               data-image="<?= $artist->image ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                        </td>
                    </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- form create -->
        <form action="<?= URLROOT ?>/artist-management/create-artist" method="post" enctype="multipart/form-data">
            <div class="form_create formAd popup form_create_artist">
                <h1>Create artist</h1>
                <br>
                <div>
                    <input type="text" id="artistname" name="artist_name" placeholder="Artist Name" required>
                </div>
                <div>
                    <textarea name="biography" id="biography" placeholder="Your bio here!" cols="30" rows="10"
                              required></textarea>
                </div>
                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" id="file" name="image" accept="image/*" size="14"
                               required/>
                        <span class="form-input--file-button">Image</span>
                        <input type="text" class="form-input--file-text" data-field="image" value="Choose file...">
                    </label>
                </div>
                <div>
                    <button id="save-button">Create Artist</button>
                </div>
            </div>
        </form>
        <!-- update form -->
        <form action="<?= URLROOT ?>/artist-management/update-artist" method="post" enctype="multipart/form-data">
            <div class="form_update formAd popup form_update_artist">
                <h1>Update artist</h1>
                <br>
                <div>
                    <input type="text" id="artistname" data-field="artistname" name="artist_name"
                           placeholder="Artist's Name">
                </div>
                <div>
                    <textarea name="biography" id="biography" data-field="biography" placeholder="Biography" cols="30"
                              rows="10"></textarea>
                </div>
                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" name="image" id="file" accept="image/*" size="14"/>
                        <span class="form-input--file-button">Image</span>
                        <input type="text" class="form-input--file-text" data-field="image">
                    </label>
                    <input type="text" name="id" hidden data-field="id">
                </div>
                <div>
                    <button id="save-button">Update artist</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>