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
        <a href="#" class="btn-create">
            <i class='bx bx-plus'></i>
            <span class="text">User Create</span>
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

                        <td>
                            <a href=""><i class='bx bx-trash' style='color:#fb0004'></i></a>
                            <a href="javascript:void(0);" class="edit-button"><i class='bx bxs-edit' style='color:#0042fb'></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
    <!-- form create -->
    <form id="data-form">
        <div class="form_create">
            <div>
                <input type="text" id="username" placeholder="Username">
            </div>
            <div>

                <input type="text" id="email" placeholder="Email">
            </div>
            <div>

                <input type="text" id="password" placeholder="Password">
            </div>
            <div><input type="checkbox" id="ni1">
                <label for="ni1" class="ni"></label>
            </div>
            <button id="save-button">Save</button>
            <button id="cancel-button">Hủy</button>
        </div>
    </form>

</main>