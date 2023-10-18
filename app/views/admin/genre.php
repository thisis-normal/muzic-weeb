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
            <a href="#" class="btn-create">
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
                                <a href=""><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href=""><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>