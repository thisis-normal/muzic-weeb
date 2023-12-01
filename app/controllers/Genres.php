<?php
class Genres extends Controller
{
    public function __construct()
    {
        $this->genreModel = $this->model('Genre');
    }
    public function detail()
    {
        $this->view('pages/genre');
    }
};
