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
                'bar_chart_timeframe' => trim($_POST['bar_chart_timeframe']),
            ];
            $chart['line_chart_timeframe'] = $this->convertQuarterFromText($chart['line_chart_timeframe']);
            $chart['bar_chart_timeframe'] = $this->convertQuarterFromText($chart['bar_chart_timeframe']);
            $lineChart = [];
            $newUserByMonth = [];
            $newPremiumUserByMonth = [];
            foreach ($chart['line_chart_timeframe'] as $month) {
                $lineChart[] = $this->statisticModel->getRevenueByMonth($month);
            }
            foreach ($chart['bar_chart_timeframe'] as $month) {
                $newUserByMonth[] = $this->statisticModel->getNewUserByMonth($month);
            }
            foreach ($chart['bar_chart_timeframe'] as $month) {
                $newPremiumUserByMonth[] = $this->statisticModel->getNewPremiumUserByMonth($month);
            }
            $lineChart = $this->convertNullArray($lineChart, $chart, 'line_chart_timeframe', 'total_net_amount', 0.0);
            $newUserByMonth = $this->convertNullArray($newUserByMonth, $chart, 'bar_chart_timeframe', 'total_users', 0);
            $newPremiumUserByMonth = $this->convertNullArray($newPremiumUserByMonth, $chart, 'bar_chart_timeframe', 'total_users', 0);
            $data = [
                'totalUser' => $this->userModel->getTotalUser(),
                'totalSong' => $this->songModel->getTotalSong(),
                'revenue' => $this->paymentModel->getRevenue(),
                'lineChart' => $lineChart,
                'newUserByMonth' => $newUserByMonth,
                'newPremiumUserByMonth' => $newPremiumUserByMonth,
                'line_chart_timeframe' => trim($_POST['line_chart_timeframe']),
                'bar_chart_timeframe' => trim($_POST['bar_chart_timeframe']),
            ];
//            var_dump($data); die();
            $this->view('admin/dashboard', $data);
        }
        redirect('admins/dashboard');
    }

    public function convertQuarterFromText($text)
    {
        switch ($text) {
            case '1stQuarter':
                return [1, 2, 3];
            case '2ndQuarter':
                return [4, 5 ,6];
            case '3rdQuarter':
                return [7, 8, 10];
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
    public function convertNullArray($array, $chart, $timeframe,  $param1, $value1)
    {
        foreach ($array as $key => $value) {
            if (empty($value)) {
                $data = new stdClass();
                $value = [$data];
                $data->month = $chart[$timeframe][$key];
                $data->$param1 = $value1;
                $array[$key] = $value;
            }
        }
        return $array;
    }
}
