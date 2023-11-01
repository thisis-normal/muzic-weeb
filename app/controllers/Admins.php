<?php

class  Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
        $this->artistModel = $this->model('Artist');
        $this->genreModel = $this->model('Genre');
        $this->albumModel = $this->model('Album');
        $this->songModel = $this->model('Song');
    }
    public function index()
    {
        $this->view('admin/dashboard'); //load view inside views/admin/index.php
    }
    public function dashboard()
    {
        $this->view('admin/dashboard');
    }
    public function user()
    {
        $data = [
            'listUser' => $this->adminModel->getAllUsers(),
        ];
        $this->view('admin/user', $data);
    }
    public function artist()
    {
        $data = [
            'listArtist' => $this->artistModel->getAllArtists(),
        ];
        $this->view('admin/artists', $data);
    }
    public function song()
    {
        $data = [
            'listArtist' => $this->artistModel->getAllArtists(),
            'listAlbum' => $this->albumModel->getAllAlbumWithArtistName(),
            'listGenre' => $this->genreModel->getAllGenres(),
            'listSong' => $this->songModel->getSongs(),
        ];
//        var_dump($data['listSong']); die();
        $this->view('admin/song', $data);
    }
    public function genre()
    {
        $data = [
            'listGenre' => $this->genreModel->getAllGenres(),
        ];
        $this->view('admin/genre', $data);
    }
    public function album()
    {
        $data = [
            'listArtist' => $this->artistModel->getAllArtists(),
            'listAlbum' => $this->albumModel->getAllAlbumWithArtistName(),
        ];
//        var_dump($data['listAlbum']); die();
        $this->view('admin/album', $data);
    }
    public function songrequest()
    {
        $this->view('admin/songrequest');
    }
}
