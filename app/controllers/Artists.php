<?php
class Artists extends Controller
{
    public function __construct()
    {
        $this->artistModel = $this->model('Artist');
    }
    public function detail()
    {
        $id = $_GET['id'];
        if (!isset($id) || $id == '') {
            header('Location: ' . URLROOT . '/pages/index');
        }
        $data = [
            'totalSong' => $this->artistModel->getTotalSongs($id),
            'artist' => $this->artistModel->getArtistAllByID($id),
        ];


        $this->view('pages/artist', $data);
    }
};
