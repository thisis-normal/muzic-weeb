<?php

class Lyrics extends Controller
{
    public function __construct()
    {
    }

    public function detail()
    {
        $this->view('pages/lyrics');
    }
}
