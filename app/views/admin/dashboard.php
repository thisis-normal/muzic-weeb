<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>


<div id="dashboard-tab" class="tab-content active">
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
                        <a class="activeav" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <!-- <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
        </a> -->
        </div>
        <ul class="box-info">
            <li>
                <i class="bx bxs-music"></i>
                <span class="text">
                    <h3><?= $data['totalSong'] ?></h3>
                    <p>Song</p>
                </span>
            </li>
            <li>
                <i class="bx bxs-group"></i>
                <span class="text">
                    <h3><?= $data['totalUser'] ?></h3>
                    <p>User</p>
                </span>
            </li>
            <li>
                <i class="bx bxs-dollar-circle"></i>
                <span class="text">
                    <h3><?= round($data['revenue'],2);?></h3>
                    <p>Total Revenue</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Songs</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Date Order</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="img/people.png" />
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png" />
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png" />
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status process">Process</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png" />
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png" />
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="todo">
            <div class="head">
                <h3>Todos</h3>
                <i class="bx bx-plus"></i>
                <i class="bx bx-filter"></i>
            </div>
            <ul class="todo-list">
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
            </ul>
        </div> -->
        </div>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>