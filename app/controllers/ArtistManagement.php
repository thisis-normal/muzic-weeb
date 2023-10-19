<?php
class ArtistManagement extends Controller {
    public function __construct()
    {
        $this->artistModel = $this->model('Artist');
    }
    public function createArtist() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'artist_name' => trim($_POST['artist_name']),
                'biography' => trim($_POST['biography']),
                'image' => trim($_POST['image']),
                'artistname_err' => '',
                'biography_err' => '',
                'image_err' => ''
            ];
            var_dump($data); die();
            if(empty($data['artistname'])) {
                $data['artistname_err'] = 'Please enter artistname';
            }
            if(empty($data['biography'])) {
                $data['biography_err'] = 'Please enter biography';
            }
            if(empty($data['image'])) {
                $data['image_err'] = 'Please enter image';
            }
            if(empty($data['artistname_err']) && empty($data['biography_err']) && empty($data['image_err'])) {
                if($this->artistModel->createArtist($data)) {
                    header('location: ' . URLROOT . '/admin/artists');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/artists', $data);
            }
        }
    }
}