<?php

class Statistics extends Controller
{
    public function __construct()
    {
        $this->statisticModel = $this->model('Statistic');
    }

    public function chart(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
    }
}