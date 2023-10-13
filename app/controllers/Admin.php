<?php

/**
 * @property mixed $adminModel
 */
class Admin extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function index()
    {
//        $this->view('admin/login');
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this->view('admin/about', $data);
    }
}
