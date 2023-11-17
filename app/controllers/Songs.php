<?php
class Songs extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
        $this->artistModel = $this->model('Artist');
    }

    public function getSongJson()
    {
        $songId = $_POST['songId'];

        $data  = $this->songModel->getSongById($songId);

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function getArtistJson()
    {
        $artistId = $_POST['artistId'];

        $data  = $this->artistModel->getArtistById($artistId);

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
