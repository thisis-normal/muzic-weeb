<?php /** @var array $data */ ?>
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
                    <a class="active" href="#">Users</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-create user btnpopup" data-form="form_create_user">
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
                        <th>Register date</th>
                        <th>Premium</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Erik</td>
                        <td>Chungvvvv@gmail.com</td>
                        <td>chung</td>
                        <td>06/04/2002</td>
                        <td>
                            <div><input type="checkbox" id="ni">
                                <label for="ni" class="ni"></label>
                            </div>
                        </td>
                        <td>user</td>
                        <td>
                            <a href="" class="delete-user" data-user="Erik"><i class='bx bx-trash' style='color:#fb0004'></i></a>
                            <a href="" class="edit-button btnpopup" data-form="form_update_user" data-user="Erik" data-email="Chungvvvv@gmail.com" data-pass="chung" data-role="Admin"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
    <!-- form create -->

    <form id="data-form" action="<?=URLROOT?>/user-management/create-user" method="post">

        <div class="form_create popup form_create_user">
            <h1>Create user</h1>
            <br>
            <div>
                <input type="text" id="username" placeholder="Username" name="username" required>
            </div>
            <div>
                <input type="email" id="email" placeholder="Email" name="email" required>
            </div>
            <div>
                <input type="text" id="password" placeholder="Password" name="password" required>
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
    <form>

        <div class="form_update popup form_update_user">
            <h1>Update user</h1>
            <br>
            <div>
                <input type="text" id="username" name="username" placeholder="Username" value="<?= $data['username'] ?>"/>
                <?php if (!empty($data['username_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['username_error'] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <input type="text" id="email" name="email" placeholder="Email"  value="<?=$data['email'] ?>"/>
                <?php if (!empty($data['email_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['email_error'] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <input type="text" id="password" name="password" placeholder="Password"  value="<?=$data['password'] ?>"/>
                <?php if (!empty($data['password_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <select name="role" id="role" data-field="role">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div>

                <button id="save-button">Update Account</button>
                <button id="save-button">Update Account</button>
            </div>

        </div>
    </form>
</main>