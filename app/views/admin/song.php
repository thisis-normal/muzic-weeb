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
                            <td> </td>
                            <td>Nhạc trẻ</td>
                            <td class="truncate-text">http://cvcvbnvcxcvbcvxbnvbvzvxbcxvzcvxbc</td>

                            <td>
                                <a href="#" class="delete-user" data-delete="anh khạc hay em khạc" data-delete-href="<?= URLROOT ?>/backend ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href=""><i class='bx bxs-edit' style='color:#0042fb'></i></a>
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
                    <input type="text" id="songname" name="" placeholder="Songname" required />

                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required />

                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password" required />
                    <?php if (!empty($data['password_error'])) : ?>
                        <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <select name="role" id="">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div>

                    <button id="save-button">Create Account</button>
                </div>
            </div>
        </form>
        <!-- update form -->
        <form action="<?= URLROOT ?>/user-management/update-user" method="post">
            <div class="form_update popup form_update_user">
                <h1>Update user</h1>
                <br>
                <div>
                    <input type="text" id="username" name="username" data-field="user" placeholder="Username" required />
                    <?php if (!empty($data['username_error'])) : ?>
                        <span class="invalid-feedback"><?= $data['username_error'] ?></span>
                        <script>
                            alert("<?= $data['username_error'] ?>")
                        </script>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="email" id="email" name="email" data-field="email" placeholder="Email" required />
                    <?php if (!empty($data['email_error'])) : ?>
                        <span class="invalid-feedback"><?= $data['email_error'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="text" id="password" name="password" data-field="pass" placeholder="Password" required />
                    <?php if (!empty($data['password_error'])) : ?>
                        <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <select name="role" id="role" data-field="role">
                        <option value="user">User</option>
                        <option value="dmin">Admin</option>
                    </select>
                </div>
                <div>
                    <button id="save-button">Update Account</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>