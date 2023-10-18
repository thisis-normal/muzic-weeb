<?php

class  Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
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
        $this->view('admin/artists');
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
