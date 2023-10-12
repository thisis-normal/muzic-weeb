<style>
    .truncate-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        /* Điều chỉnh độ rộng tối đa bạn muốn hiển thị */
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
                    <a class="active" href="#">Artists</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-create">
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
                            <a href=""><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</main>