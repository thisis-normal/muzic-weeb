<?php
class  Playlists extends Controller {
    public function __construct()
    {
        $this->playlistModel = $this->model('Playlist');
    }
    public function detail() {
        $data = [
            'playlist' => $this->playlistModel->getPlaylistByID($_GET['id']),
        ];
        var_dump($data); die();
        $this->view('pages/playlist', $data);
    }

};