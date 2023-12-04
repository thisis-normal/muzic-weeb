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
                <table>
                    <thead>
                        <tr>
                            <th>Ordinal</th>
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
                    <?php
                    // Initialize an empty array to store grouped songs
                    $groupedSongs = [];
                    foreach ($data['listSongRequest'] as $row) {
                        $songId = $row->id;
                        // Check if the song ID is already in the grouped array
                        if (!isset($groupedSongs[$songId])) {
                            // If not, initialize it with the current row
                            $groupedSongs[$songId] = $row;
                            // Create a genres array to store genre names
                            $groupedSongs[$songId]->genres = [];
                        }
                        // Add the current genre to the genres array
                        $groupedSongs[$songId]->genres[] = $row->genre_name;
                    }
                    // Initialize an empty array to store artists list
                    $groupedArtists = [];
                    foreach ($data['listSongRequest'] as $row) {
                        $songId = $row->id;
                        // Check if the song ID is already in the grouped array
                        if (!isset($groupedArtists[$songId])) {
                            // If not, initialize it with the current row
                            $groupedArtists[$songId] = $row;
                            // Create a genres array to store genre names
                            $groupedArtists[$songId]->genres = [];
                        }
                        // Add the current genre to the genres array
                        $groupedSongs[$songId]->genres[] = $row->genre_name;
                    }
                    ?>
                    <?php $index = 1; ?>
                    <?php foreach ($groupedSongs as $song) : ?>
                        <tbody>
                            <tr>
                                <td><?= $index++ ?></td>
                                <td><?= $song->title ?></td>
                                <td><?= $song->artist_name ?></td>
                                <td><?= $song->formatted_date ?></td>
                                <td><?= $song->album_title ?></td>
                                <td><?= implode(', ', $song->genres) ?></td>
                                <td class="truncate-text"><?= $song->file_path ?></td>
                                <td><?= $song->status ?></td>
                                <td>
                                    <a href="" id="" class="edit-button btnpopup updateSongRq" data-form="form_update_songrequest" data-id="<?= $song->id ?>" data-status="<?= $song->status ?>"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- <form action="" method="post">
            <div class="form_update popup form_update_songrequest">
                <h1>Update Song Request</h1>
                <br>

                <div>
                    <select id="select-state" data-field="status" name="">


                        <option value="1">1</option>
                        <option value="1">1</option>
                        <option value="1">1</option>


                    </select>
                </div>

                <div>
                    <button id="save-button">Update Song request</button>
                </div>
            </div>
        </form> -->
    </main>
</div>
</section>
</body>
<script>
    $(document).ready(function() {
        $('select').selectize({
            // sortField: 'text',
            maxOptions: 5
        });

    });

    const dataForArtist = ["Afghanistan", "Algeria", "Argentina"];
    const dataForGenre = ["Pop", "Rock", "Rap"];
    const dataForStatus = ["Active", "Passive", "Deactive"];
    const dataForDefault = ["a", "b", "c"];
    $(".updateSongRq").click(function(event) {
        event.preventDefault();
        var id = $(this).attr("data-id")

        Swal.fire({

            title: "Do you want to update the status of this song?",
            showDenyButton: true,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Update",
            denyButtonText: `Not updated`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = "<?= URLROOT ?>/SongManagement";
            } else if (result.isDenied) {
                Swal.fire("Changes are not Updated", "", "info");
            }
        });
    })
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>