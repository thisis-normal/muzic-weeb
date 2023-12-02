<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>
<script src="<?= URLROOT ?>/public/js/script.js"></script>

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
                    <h3><?= round($data['revenue'], 2); ?></h3>
                    <p>Total Revenue</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Statistics</h3>
                    <!-- <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i> -->
                </div>
                <canvas id="myChart" width="400" height="200"></canvas>
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
<!--  -->
<!DOCTYPE html>
<html>

<head>
    <title>Biểu đồ đường</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        function drawChart(xValues, yValues) {
            const ctx = document.getElementById('myChart').getContext('2        d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: xValues,
                    datasets: [{
                        label: 'Số người',
                        data: yValues,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Thời gian'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Số người'
                            }
                        }
                    }
                }
            });
        }

        // Thời gian và số người (ví dụ)
        const timeValues = [1, 2, 3, 4, 5]; // Giả sử thời gian từ 1 đến 5
        const peopleValues = [10, 15, 20, 18, 25]; // Số người tương ứng

        // Vẽ biểu đồ với dữ liệu từ hai tham số
        drawChart(timeValues, peopleValues);
    </script>
</body>

</html>