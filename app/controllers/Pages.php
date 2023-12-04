<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->albumModel = $this->model('Album');
        $this->artistModel = $this->model('Artist');
        $this->playlistModel = $this->model('Playlist');
    }

    public function index()
    {
        $data = [
            'album' => $this->albumModel->getAllAlbums(),
            'playlist' => $this->playlistModel->getAllPlaylist(),
            'artist' => $this->artistModel->getAllArtists(),

        ];

        $this->view('pages/index', $data);
    }
    public function playlist()
    {
        $this->view('pages/playlist');
    }
    public function browse()
    {
        $this->view('pages/browse');
    }
    public function search()
    {
        $data = $this->model('Genre')->getAllGenres();
        $this->view('pages/search', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this->view('pages/about', $data);
    }
}
