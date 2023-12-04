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

    /* ni means name input*/

    .ni {
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        padding: 8px 20px;
        border-radius: .8rem;
        min-width: 124px;
        text-align: center;
        background: rgba(78, 190, 150, 0.1);
        border: 0.5px solid rgba(22, 179, 124, 0.2);
        cursor: pointer;
    }

    .ni:before {
        content: "VIP";
        color: #4EBE96;
    }

    .ni:active {
        transform: scale(0.94);
    }

    #ni {
        position: fixed;
        opacity: 0;
        visibility: hidden;
    }

    #ni:checked+.ni {
        background: rgba(216, 79, 104, 0.1);
        border-color: rgba(216, 79, 104, 0.2);
    }

    #ni:checked+.ni:before {
        content: "NORMAL";
        color: #D84F68;
    }
</style>
<div id="user-tab" class="tab-content active">
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <h2 style="color: #11ff00; text-align: center "><?php flash('register_success'); ?></h2>
                <h2 style="color: #11ff00; text-align: center "><?php flash('update_success'); ?></h2>
                <h2 style="color: red; text-align: center "><?php flash('delete_success'); ?></h2>
                <h2 style="color: red; text-align: center "><?php flash('username_err'); ?></h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>
                        <a class="activenav" href="#">Users</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create btnpopup" data-form="form_create_user">
                <i class='bx bx-plus'></i>
                <span class="text">Create User</span>
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
                            <th>Ordinal</th>
                            <th style="text-align: center !important;">Username</th>
                            <th style="text-align: center !important;">Email</th>
                            <th style="text-align: center !important;">Password</th>
                            <th style="text-align: center !important;">Register date</th>
                            <th style="text-align: center !important;">Premium</th>
                            <th style="text-align: center !important;">Role</th>
                            <th style="text-align: center !important;">Action</th>

                        </tr>
                    </thead>
                    <?php foreach ($data['listUser'] as $user) : ?>
                        <tbody>
                            <tr>
                                <td style="text-align: center !important;"><?= $user->id ?></td>
                                <td align="center"><?= $user->username ?></td>
                                <td align="center"><?= $user->email ?></td>
                                <td align="center" class="limit-text"><?= $user->password ?></td>
                                <td align="center"><?= $user->regis_date ?></td>
                                <td align="center">
                                    <div> <?php
                                            echo "$user->subscription_id";
                                            ?>
                                    </div>
                                </td>
                                <td align="center"><?= $user->role ?></td>
                                <td align="center">
                                    <a href="#" class="delete-user" data-delete="<?= $user->username ?>" data-delete-href="<?= URLROOT ?>/user-management/delete-user?username=<?= $user->username ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                    <a href="<?= URLROOT ?>/user-management/update-user?id=<?= $user->id ?>" class="edit-button btnpopup" data-form="form_update_user" data-id="<?= $user->id ?>" data-user="<?= $user->username ?>" data-email="<?= $user->email ?>" data-role="<?= $user->role ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                                </td>
<!--                                data-pass="--><?php //= $user->password ?><!--"-->
                            </tr>
                        </tbody>
                    <?php endforeach; ?>

                </table>
            </div>

        </div>
        <!-- create user form -->
        <form id="data-form" action="<?= URLROOT ?>/user-management/create-user" method="post">
            <div class="form_create popup form_create_user">
                <h1>Create user</h1>
                <br>
                <div>
                    <input type="text" id="username" name="username" placeholder="Username" required />
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" required />
                    <?php if (!empty($data['email_error'])) : ?>
                        <span class="invalid-feedback"><?= $data['email_error'] ?></span>
                    <?php endif; ?>
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
                        <option value="artist">Artist</option>
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
                </div>
                <div>
                    <input type="email" id="email" name="email" data-field="email" placeholder="Email" required />
                </div>
                <div>
                    <input type="text" id="password" name="password" data-field="pass" placeholder="Password" />
                    <input type="text" name="id" hidden data-field="id">
                </div>
                <div>
                    <select name="role" id="role" data-field="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="artist">Artist</option>
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