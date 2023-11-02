<?php

class SongManagement extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
        $this->genreModel = $this->model('Genre');
    }

    public function createSong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'song_name' => trim($_POST['song_name']),
                'album_id' => trim($_POST['album_id']),
                'artist_id' => trim($_POST['artist_id']),
                'genre_id_array' => $_POST['genre_id'],
                'release_date' => trim($_POST['release_date']),
                'file' => $_FILES['song'],
                'file_err' => ''
            ];
//            var_dump($data); die();
            $data['file_err'] = $this->validateSong($data['file']);
            if (empty($data['file_err'])) {
                $fileName = $data['file']['name'];
                //destination folder
                $destination = '../public/songs/' . $fileName;
                // Avoid overwriting existing files
                if (file_exists('../public/songs/' . $fileName)) {
                    $fileName = uniqid() . $fileName;
                    // Re-build destination with new filename
                    $destination = '../public/songs/' . $fileName;
                }
                // Move uploaded file
                if (move_uploaded_file($data['file']['tmp_name'], $destination)) {
                    $song_id = $this->songModel->createSong($data['song_name'],$data['release_date'], $data['album_id'], $data['artist_id'], $fileName);
                    if ($song_id) {
                        foreach ($data['genre_id_array'] as $genre_id) {
                            $this->genreModel->insertGenreSong($song_id, $genre_id);
                        }
                        flash('song_message', 'Song created');
                        redirect('admins/song');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                flash('song_err', $data['file_err'], 'alert alert-danger');
                redirect('admins/song');
            }
        }
    }

    public function deleteSong()
    {
        $id = trim($_GET['id']);
        if ($this->songModel->deleteSong($id)) {
            flash('song_message', 'Song deleted');
            redirect('admins/song');
        } else {
            die('Something went wrong');
        }
    }

    public function validateSong($song)
    {
        if (empty($song)) {
            return 'Please enter song name';
        }
        //allow song type
        $allowedType = ['audio/mpeg', 'audio/wav', 'audio/ogg', 'audio/mp3'];
        if (!in_array($song['type'], $allowedType)) {
            return 'Please enter valid song type';
        }
        //check song size
        if ($song['size'] > 10000000) {
            return 'Song size is too large';
        }
        return '';
    }
}