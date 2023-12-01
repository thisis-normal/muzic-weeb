<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('pages/index');
    }
    public function playlist()
    {
        $this->view('pages/playlist');
    }
    public function browse()
    {
        $this->view('pages/browse');
    }
    public function search()
    {
        $data = $this->model('Genre')->getAllGenres();
        $this->view('pages/search', $data);
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
