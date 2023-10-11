<?php

class admin extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('admin/index');
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this->view('pages/about', $data);
    }
}
