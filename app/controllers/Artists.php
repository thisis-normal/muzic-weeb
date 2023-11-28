<?php
class Artists extends Controller
{
    public function __construct()
    {
        $this->artistModel = $this->model('Artist');
    }
    public function detail()
    {
        $this->view('pages/artist', $data);
    }
};
