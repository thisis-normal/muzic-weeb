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
                        <a class="activenav" href="#">Genre</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create user btnpopup" data-form="form_create_genre">
                <i class='bx bx-plus'></i>
                <span class="text">Genre Create</span>
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
                            <th>Genre id</th>
                            <th>Genre name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>aaaaaaaaaaaaaaaaaaaaaaa</td>
                            <td>
                                <a href="#" class="delete-user" data-delete="aaaaaaaaaaaaaaaaaaaaaaa" data-delete-href="<?= URLROOT ?>/backend"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href="" class="edit-button btnpopup" data-form="form_update_genre" data-genrename="aaaaaaaaaaaaaaaaaaaaaaa"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- create user form -->
        <form id="data-form" action="" method="post">
            <div class="form_create popup form_create_genre">
                <h1>Create genre</h1>
                <br>
                <div>
                    <input type="text" id="genrename" name="" placeholder="genrename" required />

                </div>


                <div>

                    <button id="save-button">Create genre</button>
                </div>
            </div>
        </form>
        <!-- update form -->
        <form action="" method="post">
            <div class="form_update popup form_update_genre">
                <h1>Update genre</h1>
                <br>
                <div>
                    <input type="text" id="" name="" data-field="genrename" placeholder="Genrename" required />

                </div>

                <div>
                    <button id="save-button">Update Genre</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>