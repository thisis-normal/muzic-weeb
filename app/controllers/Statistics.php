<?php

class Statistics extends Controller
{
    public function __construct()
    {
        $this->statisticModel = $this->model('Statistic');
        $this->userModel = $this->model('User');

        $this->songModel = $this->model('Song');
        $this->paymentModel = $this->model('Payment');
    }

    public function chart(): void
    {



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $chart = [
                'line_chart_timeframe' => trim($_POST['line_chart_timeframe']),
                'line_chart_timeframe_err' => '',
                'bar_chart_timeframe' => trim($_POST['bar_chart_timeframe']),
                'bar_chart_timeframe_err' => ''
            ];
            $chart['line_chart_timeframe'] = $this->convertQuarterFromText($chart['line_chart_timeframe']);
            $chart['bar_chart_timeframe'] = $this->convertQuarterFromText($chart['bar_chart_timeframe']);
            //            var_dump($chart['line_chart_timeframe']); die();
            //            if (empty($chart['line_chart_timeframe'])) {
            //                $chart['line_chart_timeframe_err'] = 'Please select a timeframe';
            //            }
            //            if (empty($chart['bar_chart_timeframe'])) {
            //                $chart['bar_chart_timeframe_err'] = 'Please select a timeframe';
            //            }
            //            if (empty($chart['line_chart_timeframe_err']) && empty($chart['bar_chart_timeframe_err'])) {
            $lineChart = [];
            foreach ($chart['line_chart_timeframe'] as $month) {
                $lineChart[] = $this->statisticModel->getRevenueByMonth($month);
            }
            //                $barChart = $this->statisticModel->getRevenueByMonth($chart['bar_chart_timeframe']);
            $data = [
                'lineChart' => $lineChart,
                'totalUser' => $this->userModel->getTotalUser(),
                'totalSong' => $this->songModel->getTotalSong(),
                'revenue' => $this->paymentModel->getRevenue(),
                //                    'barChart' => $barChart
            ];
            // var_dump($data['lineChart']); die();
            $this->view('admin/dashboard', $data);
        } else {
            $this->view('admin/dashboard', $chart);
        }
    }

    public function convertQuarterFromText($text)
    {
        switch ($text) {
            case '1stQuarter':
                return [1, 2, 3];
            case '2ndQuarter':
                return [12, 10, 6];
            case '3rdQuarter':
                return [7, 8, 9];
            case '4thQuarter':
                return [10, 11, 12];
            case 'month':
                return [date('m')];
            case 'year':
                return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            default:
                return [];
        }
    }
}
