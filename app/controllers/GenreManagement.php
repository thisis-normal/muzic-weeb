<?php
class GenreManagement extends Controller {
    public function __construct()
    {
        $this->genreModel = $this->model('Genre');
    }
    public function createGenre() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'genre_name' => trim($_POST['genre_name']),
                'genre_name_err' => ''
            ];
            if (empty($data['genre_name'])) {
                $data['genre_name_err'] = 'Please enter genre name';
            }
            if (empty($data['genre_name_err'])) {
                if ($this->genreModel->insertGenre($data['genre_name'])) {
                    redirect('admins/genre');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('admin/genre', $data);
            }
        } else {
            $data = [
                'genre_name' => '',
                'genre_name_err' => ''
            ];
            $this->view('admin/genre', $data);
        }
    }
    public function updateGenre() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'genre_id' => trim($_POST['id']), // 'id' is the name of the input field in the form 'form_update_genre
                'genre_name' => trim($_POST['genre_name']),
                'genre_name_err' => ''
            ];
            if (empty($data['genre_name'])) {
                $data['genre_name_err'] = 'Please enter genre name';
            }
            $oldGenre = $this->genreModel->getGenreById($data['genre_id']);
            if ($oldGenre->name !== $data['genre_name']) {
                if ($this->genreModel->getGenreByName($data['genre_name'])) {
                    $data['genre_name_err'] = 'Genre name is already taken';
                }
            }
            if (empty($data['genre_name_err'])) {
                if ($this->genreModel->updateGenre($data['genre_id'], $data['genre_name'])) {
                    redirect('admins/genre');
                } else {
                    die('Something went wrong');
                }
            } else {
                flash('genre_name_err', $data['genre_name_err']);
                redirect('admins/genre');
            }
        }
    }
    public function deleteUser() {
        $id = trim($_GET['id']);
        if ($this->genreModel->deleteGenre($id)) {
            redirect('admins/genre');
        } else {
            die('Something went wrong');
        }
    }
}