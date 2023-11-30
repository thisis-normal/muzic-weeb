<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>
<!--print flash alert message if exists-->
<div id="user-tab" class="tab-content active">
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <h2 style="color: red; text-align: center "><?php flash('genre_name_err'); ?></h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>
                        <a class="activenav" href="#">Playlist</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create user btnpopup" data-form="form_create_playlist">
                <i class='bx bx-plus'></i>
                <span class="text">Create Playlist</span>
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
                            <th>ID</th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Duration (Days)</th>
                            <th>Benefits</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Silver Package</td>
                            <td>$19.99</td>
                            <td>30</td>
                            <td>
                                Benefit 1
                            </td>
                            <td>
                                <!-- <a href="#" class="delete-package" data-delete="Silver Package" data-delete-href="<?= URLROOT ?>/premium-packages/delete-package?id=1"><i class='bx bx-trash' style='color:#fb0004'></i></a> -->
                                <a href="" class="edit-button btnpopup" data-form="form_update_pre" data-id="1" data-prename="Silver Package" data-price="19.99" data-day="30" data-benefits="benefits"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>
                        <!-- Add similar rows for other packages -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- create user form -->
        <!-- <form id="data-form" action="<?= URLROOT ?>/genre-management/create-genre" method="post">
            <div class="form_create popup form_create_genre">
                <h1>Create genre</h1>
                <br>
                <div>
                    <input type="text" id="genrename" name="genre_name" placeholder="Enter genre's name" required />
                    <?php if (!empty($data['genre_name_err'])) : ?>
                        <script>
                            alert("<?= $data['genre_name_err'] ?>")
                        </script>
                    <?php endif; ?>
                </div>
                <div>
                    <button id="save-button">Create genre</button>
                </div>
            </div>
        </form> -->
        <!-- update form -->
        <form method="post">
            <div class="form_update popup form_update_pre">
                <h1>Update pre</h1>
                <br>
                <div>
                    <input type="text" id="" name="" data-field="prename" placeholder="Package Name" required />
                </div>
                <div>
                    <input type="text" id="" name="" data-field="price" placeholder="Price" required />
                </div>
                <div>
                    <input type="text" id="" name="" data-field="day" placeholder="Duration (Day)" required />
                </div>
                <div>
                    <input type="text" id="" name="" data-field="benefits" placeholder="Benefits" required />
                </div>
                <input type="text" name="id" hidden data-field="id">
                <div>
                    <button id="save-button">Update pre</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>