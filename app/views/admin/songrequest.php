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
<div id="songrequest-tab" class="tab-content active">
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
                        <a class="activenav" href="#">Song request</a>
                    </li>
                </ul>
            </div>
            <!-- <a href="#" class="btn-create">
                <i class='bx bx-plus'></i>
                <span class="text">Song Create</span>
            </a> -->
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
                            <th>Status</th>
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
                            <td>Passive</td>


                            <td>
                                <!-- <a href=""><i class='bx bx-trash' style='color:#fb0004'></i></a> -->
                                <a href="" class="edit-button btnpopup" data-form="form_update_songrequest" data-status="Passive"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <form action="" method="post">
            <div class="form_update popup form_update_songrequest">
                <h1>Update Song Request</h1>
                <br>

                <div class="wrapper" id="status">
                    <div class="select-btn">
                        <span data-field="status">Select status</span>
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
                    <button id="save-button">Update Song request</button>
                </div>
            </div>
        </form>
    </main>
</div>
</section>
</body>
<script>
    const dataForArtist = ["Afghanistan", "Algeria", "Argentina"];
    const dataForGenre = ["Pop", "Rock", "Rap"];
    const dataForStatus = ["Active", "Passive", "Deactive"];
    const dataForDefault = ["a", "b", "c"];
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>