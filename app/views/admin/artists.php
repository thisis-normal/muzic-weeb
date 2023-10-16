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
<div id="artists-tab" class="tab-content active">
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
                        <a class="activenav" href="#">Artists</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-create btnpopup" data-form="form_create_artist">
                <i class='bx bx-plus'></i>
                <span class="text">Artist Create</span>
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
                            <th>Artist name</th>
                            <th>Biography</th>
                            <th>Image</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>Erik</td>
                            <td>6/4/2002</td>

                            <td class="truncate-text">http://cvcvbnvcxcvbcvxbnvbvzvxbcxvzcvxbc</td>

                            <td>
                                <a href=""><i class='bx bx-trash' style='color:#fb0004'></i></a>
                                <a href="" class="edit-button btnpopup" data-form="form_update_artist" data-artistname="Erik" data-biography="6/4/2002" data-image="http://cvcvbnvcxcvbcvxbnvbvzvxbcxvzcvxbc"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- form create -->

        <form>

            <div class="form_create formAd popup form_create_artist">
                <h1>Create artist</h1>
                <br>
                <div>
                    <input type="text" id="artistname" placeholder="artistname">
                </div>
                <div>
                    <textarea name="" id="biography" placeholder="biography" cols="30" rows="10"></textarea>

                </div>
                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file">
                        <input class="form-input-file" type="file" id="file" accept="image/*" size="14" />
                        <span class="form-input--file-button">Image</span>
                        <span class="form-input--file-text">Choose file..</span>
                    </label>
                </div>

                <div>

                    <button id="save-button">artist</button>
                </div>

            </div>
        </form>
        <!-- update form -->
        <form>

            <div class="form_update formAd popup form_update_artist">
                <h1>Update artist</h1>
                <br>
                <div>
                    <input type="text" id="artistname" data-field="artistname" placeholder="artistname">
                </div>
                <div>
                    <textarea name="" id="biography" data-field="biography" placeholder="biography" cols="30" rows="10"></textarea>

                </div>


                <div class="form-controlGroup-inputWrapper">
                    <label class="form-input form-input--file file_update">
                        <input class="form-input-file" type="file" id="file" accept="image/*" size="14" />
                        <span class="form-input--file-button">Image</span>
                        <input type="text" class="form-input--file-text" data-field="image">
                    </label>
                </div>




                <div>

                    <button id="save-button">Update artist</button>
                </div>

            </div>
        </form>
    </main>
</div>
</section>
</body>
<script src="<?= URLROOT ?>/public/js/script.js"></script>