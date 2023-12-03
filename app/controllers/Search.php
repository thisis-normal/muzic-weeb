<?php
class  Search extends Controller
{
    public function __construct()
    {
        $this->playlistModel = $this->model('Playlist');
        $this->artistModel = $this->model('Artist');
        $this->albumModel = $this->model('Album');
    }
    public function result()
    {
        $search = $_GET['search'];
        $playlists = $this->playlistModel->searchPlaylists($search);
        $artists = $this->artistModel->searchArtists($search);
        $albums = $this->albumModel->searchAlbums($search);
        $data = [
            'playlists' => $playlists,
            'artists' => $artists,
            'albums' => $albums
        ];
        $this->view('pages/searchresult', $data);
    }
};
