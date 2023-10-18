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
        $this->view('admin/index'); //load view inside views/admin/index.php
    }
    public function user()
    {
        $data = [
            'listUser' => $this->userModel->getAllUser(),
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
}
