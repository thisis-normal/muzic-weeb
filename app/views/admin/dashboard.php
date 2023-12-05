<?php

require APPROOT . '/views/admin/index.php';
/** @var array $data */
?>
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
            <?php
            if (isset($data['lineChart'])) {
                foreach ($data['lineChart'] as $key => $array) {
                    foreach ($array as $k => $value) {
                    } ?>

                    <?php
                }
            }
            ?>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Statistics & Analytics</h3>
                </div>
                <div style="display: flex;">
                    <div style="width: 50%;">
                        <form action="<?= URLROOT ?>/statistics/chart" method="post" id="myForm">
                            <select name="line_chart_timeframe" id="select1">
                                <?php if (isset($data['line_chart_timeframe'])) { ?>
                                    <option value="<?= $data['line_chart_timeframe'] ?>"><?= $data['line_chart_timeframe'] ?></option>
                                <?php } else { ?>
                                    <option value="">Select Timeframe</option>
                                <?php } ?>
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
                            <?php if (isset($data['bar_chart_timeframe'])) { ?>
                                <option value="<?= $data['bar_chart_timeframe'] ?>"><?= $data['bar_chart_timeframe'] ?></option>
                            <?php } else { ?>
                                <option value="">Select Timeframe</option>
                            <?php } ?>
                            <option value="month">This month</option>
                            <option value="1stQuarter">1st Quarter</option>
                            <option value="2ndQuarter">2nd Quarter</option>
                            <option value="3rdQuarter">3rd Quarter</option>
                            <option value="4thQuarter">4th Quarter</option>
                            <option value="year">This year</option>
                        </select>
                        <canvas id="myChart2" width="400" height="200"></canvas>
                        <input type="submit" hidden value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</section>
</body>

<script type="text/javascript">
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    })
    document.addEventListener('DOMContentLoaded', function () {
        const switchMode = document.getElementById('switch-mode');
        const isDarkMode = sessionStorage.getItem('darkMode') === 'true';
        switchMode.checked = isDarkMode;
        applyDarkMode(isDarkMode);
        switchMode.addEventListener('change', function () {
            const isChecked = this.checked;
            applyDarkMode(isChecked);
            sessionStorage.setItem('darkMode', isChecked ? 'true' : 'false');
        });

        function applyDarkMode(isDark) {
            if (isDark) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        }
    });


    function drawChart1(xValues, yValues) {
        const ctx = document.getElementById('myChart1').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Số tiền',
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
                            text: 'Số tiền'
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
                    label: 'Người mới',
                    data: yValues1,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                    {
                        label: 'VIP mới',
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
                            text: 'Số tiền'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const timeValues = [];
    const group1Values = [];
    const group2Values = [];
    <?php if (isset($data['newUserByMonth']) && isset($data['newPremiumUserByMonth'])) {
    $newUserByMonth = $data['newUserByMonth'];
    $newPremiumUserByMonth = $data['newPremiumUserByMonth'];
    ?>
    // data for bar chart
    <?php
    foreach ($newUserByMonth as $key => $value) {
    foreach ($value as $k => $v) {
    ?>
    timeValues.push('<?= $v->month ?>');
    group1Values.push('<?= $v->total_users ?>');
    <?php
    }
    }
    foreach ($newPremiumUserByMonth as $key => $value) {
    foreach ($value as $k => $v) {
    ?>
    group2Values.push('<?= $v->total_users ?>');
    <?php
    }
    }
    ?>
    <?php } ?>
    // Draw bar chart
    drawChart(timeValues, group1Values, group2Values);
    const timeValues1 = [];
    const peopleValues1 = [];
    //Data for line chart
    <?php
    if (isset($data['lineChart'])) {
    foreach ($data['lineChart'] as $key => $lineChartArray) {
    foreach ($lineChartArray as $k => $value) {
    ?>
    timeValues1.push('<?= $value->month ?>');
    peopleValues1.push('<?= $value->total_net_amount ?>');
    <?php
    }
    }
    }

    ?>
    //Draw line chart
    drawChart1(timeValues1, peopleValues1);

    const form = document.getElementById('myForm');
    const select1 = document.getElementById('select1');
    const select2 = document.getElementById('select2');

    document.querySelector('#select1').addEventListener('change', function () {
        document.querySelector('#myForm').submit();
    });
    document.querySelector('#select2').addEventListener('change', function () {
        document.querySelector('#myForm').submit();
    });
</script>
<script src="<?= URLROOT ?>/public/js/script.js"></script>