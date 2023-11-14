<?php
class  Playlists extends Controller {
    public function __construct()
    {
        $this->playlistModel = $this->model('Playlist');
    }
    public function detail() {
        $id = $_GET['id'];
        if (!isset($id) || $id == '') {
            header('Location: ' . URLROOT . '/pages/index');
        }
        $data = [
            'totalSong' => $this->playlistModel->getTotalSongs($id),
            'playlist' => $this->playlistModel->getPlaylistByID($id),
        ];
//        print_r($data);
//        echo "<br>";
//        die();
        $this->view('pages/playlist', $data);
    }

};