<?php

class AlbumManagement extends Controller
{
    public function __construct()
    {
        $this->albumModel = $this->model('Album');
        $this->artistModel = $this->model('Artist');
    }

    public function createAlbum()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'id' => trim($_POST['artist_id']),
                'album_name' => trim($_POST['album_name']),
                'artist' => trim($_POST['selected_artist']),
                'album_name_err' => '',
                'artist_err' => '',
            ];
            if (empty($data['album_name'])) {
                $data['album_name_err'] = 'Please enter album name';
            }
            if (empty($data['artist'])) {
                $data['artist_err'] = 'Please enter artist name';
            }
            if (empty($data['album_name_err']) && empty($data['artist_err'])) {
                if ($this->albumModel->createAlbum($data['id'], $data['album_name'])) {
                    flash('register_success', 'Album created successfully');
                    redirect('admins/album');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('register_fail', 'Please fill in all fields', 'alert alert-danger');
                redirect('admins/album');
            }
        }
    }

    public function updateAlbum()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'album_id' => trim($_POST['album_id']),
                'album_name' => trim($_POST['album_name']),
                'artist_id' => trim($_POST['artist_id']),
                'album_name_err' => '',
                'artist_err' => '',
            ];
            if (empty($data['album_name'])) {
                $data['album_name_err'] = 'Please enter album name';
            }
            if (empty($data['artist_id'])) {
                $data['artist_err'] = 'Please enter artist id';
            }
            if (empty($data['album_name_err']) && empty($data['artist_err'])) {
                if ($this->albumModel->updateAlbum($data['album_id'], $data['album_name'], $data['artist_id'])) {
                    flash('register_success', 'Album updated successfully');
                    redirect('admins/album');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('register_fail', 'Please fill in all fields', 'alert alert-danger');
                redirect('admins/album');
            }
        }
    }

    public function deleteAlbum()
    {
        $id = trim($_GET['album_id']);
        if ($this->albumModel->deleteAlbum($id)) {
            flash('register_success', 'Album deleted successfully');
            redirect('admins/album');
        } else {
            die('Something went wrong');
        }

    }
}
