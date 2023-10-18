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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th align="center">Register date</th>
                            <th>Premium</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php foreach ($data['listUser'] as $user) : ?>
                        <tbody>
                            <tr>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td class="limit-text"><?= $user->password ?></td>
                                <td align="center"><?= $user->regis_date ?></td>
                                <td>
                                    <div><input type="checkbox" id="ni">
                                        <label for="ni" class="ni"></label>
                                    </div>
                                </td>
                                <td><?= $user->role ?></td>
                                <td>
                                    <a href="<?= URLROOT ?>/user-management/delete-user?username=<?= $user->username ?>" class="delete-user" data-user="<?= $user->username ?>"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                    <a href="<?= URLROOT ?>/user-management/update-user?username=<?= $user->username ?>" class="edit-button btnpopup" data-form="form_update_user" data-user="<?= $user->username ?>" data-email="<?= $user->email ?>" data-pass="<?= $user->password ?>" data-role="<?= $user->role ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                                </td>
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
                    <?php if (!empty($data['username_error'])) : ?>
                        <!--    <span class="invalid-feedback">--><?php //= $data['username_error'] 
                                                                    ?><!--</span>-->
                        <script>
                            alert("<?= $data['username_error'] ?>")
                        </script>
                    <?php endif; ?>
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