<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>
<div id="user-tab" class="tab-content active">
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
                            <th>album id</th>
                            <th>album name</th>
                            <th>Artist</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>aaaaaaaaaaaaaaaaaaaaaaa</td>
                            <td>bla</td>
                            <td>
                                <a href="#" class="delete-user" data-delete="aaaaaaaaaaaaaaaaaaaaaaa" data-delete-href="<?= URLROOT ?>/backend"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href="" class="edit-button btnpopup" data-form="form_update_album" data-albumname="aaaaaaaaaaaaaaaaaaaaaaa" data-artist="bla"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- create user form -->
        <form id="data-form" action="" method="post">
            <div class="form_create popup form_create_album">
                <h1>Create album</h1>
                <br>
                <div>
                    <input type="text" id="albumname" name="" placeholder="albumname" required />

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

                <div>

                    <button id="save-button">Create album</button>
                </div>
            </div>
        </form>
        <!-- update form -->
        <form action="" method="post">
            <div class="form_update popup form_update_album">
                <h1>Update album</h1>
                <br>
                <div>
                    <input type="text" id="" name="" data-field="albumname" placeholder="albumname" required />

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
                <div>
                    <button id="save-button">Update album</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>