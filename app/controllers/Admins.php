<?php

class  Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->artistModel = $this->model('Artist');
        $this->genreModel = $this->model('Genre');
    }
    public function index()
    {
        $this->view('admin/dashboard'); //load view inside views/admin/index.php
    }
    public function dashboard()
    {
        $this->view('admin/dashboard');
    }
    public function user()
    {
        $data = [
            'listUser' => $this->adminModel->getAllUsers(),
        ];
        $this->view('admin/user', $data);
    }
    public function artist()
    {
        $data = [
            'listArtist' => $this->artistModel->getAllArtists(),
        ];
        $this->view('admin/artists', $data);
    }
    public function song()
    {
        $data = [
            'listGenre' => $this->genreModel->getAllGenres(),
        ];
        $this->view('admin/song', $data);
    }
    public function genre()
    {
        $data = [
            'listGenre' => $this->genreModel->getAllGenres(),
        ];
        $this->view('admin/genre', $data);
    }
    public function album()
    {
        $this->view('admin/album');
    }
    public function songrequest()
    {
        $this->view('admin/songrequest');
    }
}
