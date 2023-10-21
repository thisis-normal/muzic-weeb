<?php

class  Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->artistModel = $this->model('Artist');
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
            'listArtist' => $this->artistModel->getArtists(),
        ];
        $this->view('admin/artists', $data);
    }
    public function song()
    {
        $this->view('admin/song');
    }
    public function genre()
    {
        $this->view('admin/genre');
    }
    public function songrequest()
    {
        $this->view('admin/songrequest');
    }
}
