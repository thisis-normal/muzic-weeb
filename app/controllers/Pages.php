<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome',
            'description' => 'This is the MVC PHP framework',
        ];
        $this->view('pages/index', $data);
    }
    public function playlist()
    {
        $this->view('pages/playlist');
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
