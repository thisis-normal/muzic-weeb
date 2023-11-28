<?php
class Albums extends Controller
{
    public function __construct()
    {
        $this->albumModel = $this->model('Album');
    }
    public function detail()
    {
        $this->view('pages/album', $data);
    }
};
