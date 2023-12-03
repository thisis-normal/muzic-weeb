<?php
class Albums extends Controller
{
    public function __construct()
    {
        $this->albumModel = $this->model('Album');
    }
    public function detail()
    {
        $id = $_GET['id'];
        if (!isset($id) || $id == '') {
            header('Location: ' . URLROOT . '/pages/index');
        }
        $data = [
            'totalSong' => $this->albumModel->getTotalSongs($id),
            'album' => $this->albumModel->getAlbumAllByID($id),
        ];
        $this->view('pages/album', $data);
    }
};
