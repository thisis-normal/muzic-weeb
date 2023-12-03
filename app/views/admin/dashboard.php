<?php
require APPROOT . '/views/admin/index.php';
/** @var array $data */ ?>
<!-- <script src="<?= URLROOT ?>/public/js/script.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <h3>Statistics & Analytics</h3>
                </div>
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <form action="<?=URLROOT?>/statistics/chart" method="post" id="myForm">
                            <select name="line_chart_timeframe" id="select1">
                                <option value="">Select Timeframe</option>
                                <option value="month">This month</option>
                                <option value="1stQuarter">1st Quarter</option>
                                <option value="2ndQuarter">2nd Quarter</option>
                                <option value="3rdQuarter">3rd Quarter</option>
                                <option value="4thQuarter">4th Quarter</option>
                                <option value="year">This year</option>
                            </select>
                            <canvas id="myChart1" width="400" height="200"></canvas>
                    </div>
                    <div style="width: 50%;">
                        <select name="bar_chart_timeframe" id="select2">
                            <option value="">Select Timeframe</option>
                            <option value="month">This month</option>
                            <option value="1stQuarter">1st Quarter</option>
                            <option value="2ndQuarter">2nd Quarter</option>
                            <option value="3rdQuarter">3rd Quarter</option>
                            <option value="4thQuarter">4th Quarter</option>
                            <option value="year">This year</option>
                        </select>
                        <canvas id="myChart2" width="400" height="200"></canvas>
                        <input type="submit" value="submit">
                        </form>
                    </div>
                </div>



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

<script>
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
    })

    function drawChart1(xValues, yValues) {
        const ctx = document.getElementById('myChart1').getContext('2d');
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



    function drawChart(xValues, yValues1, yValues2) {
        const ctx = document.getElementById('myChart2').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Loại biểu đồ cột
            data: {
                labels: xValues,
                datasets: [{
                        label: 'Nhóm 1',
                        data: yValues1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Nhóm 2',
                        data: yValues2,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
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
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // data for bar chart
    const timeValues = ['A', 'B', 'C', 'D', 'E', 'C', 'D', 'E', 'C', 'D', 'E', 'C', 'D', 'E']; // Giả sử các nhóm A, B, C, D, E
    const group1Values = [10, 15, 20, 18, 25, 15, 20, 18, 25, 15, 20, 18, 25, 15, 20, 18, 25]; // Số người cho nhóm 1
    const group2Values = [12, 17, 22, 20, 28, 15, 20, 18, 25, 15, 20, 18, 25, 15, 20, 18, 25]; // Số người cho nhóm 2
    // Draw bar chart
    drawChart(timeValues, group1Values, group2Values);

    //Data for line chart
    const timeValues1 = [1, 2, 3, 4, 5]; // Giả sử thời gian từ 1 đến 5
    const peopleValues1 = [10, 15, 20, 18, 25]; // Số người tương ứng
    //Draw line chart
    drawChart1(timeValues1, peopleValues1);
    const form = document.getElementById('myForm');
    const select1 = document.getElementById('select1');
    const select2 = document.getElementById('select2');

    document.querySelector('#select1').addEventListener('change', function() {
        document.querySelector('form').submit();
    });
    document.querySelector('#select2').addEventListener('change', function() {
        document.querySelector('form').submit();
    });
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>