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
                <div class="wrapper" id="album">
                    <div class="select-btn">
                        <span>Select Album</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>
                <div class="wrapper" id="artist">
                    <div class="select-btn">
                        <span>Select Artist</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>
                <div class="wrapper" id="genre">
                    <div class="select-btn">
                        <span>Select Genre</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
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
                <div class="wrapper" id="album">
                    <div class="select-btn">
                        <span data-field="album">Select Album</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>
                <div class="wrapper" id="artist">
                    <div class="select-btn">
                        <span data-field="artist">Select Artist</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>
                <div class="wrapper" id="genre">
                    <div class="select-btn">
                        <span data-field="genre">Select Genre</span>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class='bx bx-search'></i>
                            <input spellcheck="false" type="text" placeholder="Search" />
                        </div>
                        <ul class="options"></ul>
                    </div>
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
<script src="<?= URLROOT ?>/public/js/script.js"></script>
<script>
    var data;
    if (wrapper.id === "artist") {
        data = ["Afghanistan", "Algeria", "Argentina"];
    } else if (wrapper.id === "genre") {
        data = ["Pop", "Rock", "Rap"];
    } else if (wrapper.id === "status") {
        data = ["Active", "Passive", "Deactive"]
    } else {
        data = ["a", "b", "c"];
    }
</script>