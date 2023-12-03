<?php
class Genres extends Controller
{
    public function __construct()
    {
        $this->genreModel = $this->model('Genre');
    }
    public function detail()
    {

        $id = $_GET['id'];
        if (!isset($id) || $id == '') {
            header('Location: ' . URLROOT . '/pages/index');
        }
        $data = [
            'totalSong' => $this->genreModel->getTotalSongs($id),
            'genre' => $this->genreModel->getGenreAllByID($id),
        ];


        $this->view('pages/genre', $data);
    }
};
