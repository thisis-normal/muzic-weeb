<?php

class  Admins extends Controller
{
    public function index()
    {
        $this->view('admin/dashboard'); //load view inside views/admin/index.php
    }
    public function user()
    {
        $this->view('admin/user');
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
