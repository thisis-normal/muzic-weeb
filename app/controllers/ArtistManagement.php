<?php

class ArtistManagement extends Controller
{
    public function __construct()
    {
        $this->artistModel = $this->model('Artist');
        $this->userModel = $this->model('User');
    }

    public function createArtist()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'artist_name' => trim($_POST['artist_name']),
                'biography' => trim($_POST['biography']),
                'image' => $_FILES['image'],
                'image_err' => ''
            ];
            $data['image_err'] = $this->validateImage($data['image']);
            if (empty($data['image_err'])) {
                $fileName = $data['image']['name'];
                //destination folder
                $destination = '../public/img/' . $fileName;
                // Avoid overwriting existing files
                if (file_exists('../public/img/' . $fileName)) {
                    $fileName = uniqid() . $fileName;
                    // Re-build destination with new filename
                    $destination = '../public/img/' . $fileName;
                }
                // Move uploaded file
                if (move_uploaded_file($data['image']['tmp_name'], $destination)) {
                    if ($this->artistModel->createArtist($data['artist_name'], $data['biography'], $fileName)) {
                        //link artist_id to user if $_SESSION['admin_role'] is artist
                        if ($_SESSION['admin_role'] == 'artist') {
                            $artist_id = $this->artistModel->getLatestArtist()->artist_id;
                            if (!$this->userModel->linkArtistToUser($_SESSION['admin_id'], $artist_id)) {
                                die('Something went wrong');
                            }
                        }
                        flash('artist_message', 'Artist created');
                        redirect('admins/artist');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                $this->view('admin/artists', $data);
            }
        } else {
            $this->view('admin/artists');
        }
    }

    public function updateArtist()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'id' => trim($_POST['id']),
                'artist_name' => trim($_POST['artist_name']),
                'biography' => trim($_POST['biography']),
                'image' => $_FILES['image'],
                'image_err' => ''
            ];
            $fileName = $data['image']['name'];
            $oldArtist = $this->artistModel->getArtistById($data['id']);
            //check if image is uploaded or not
            if ($data['image']['size'] > 0) {
                $data['image_err'] = $this->validateImage($data['image']);
                if (empty($data['image_err'])) {
                    //destination folder
                    $destination = '../public/img/' . $fileName;
                    // Avoid overwriting existing files
                    if (file_exists('../public/img/' . $fileName)) {
                        $fileName = uniqid() . $fileName;
                        // Re-build destination with new filename
                        $destination = '../public/img/' . $fileName;
                    }
                    // Move uploaded file
                    if (move_uploaded_file($data['image']['tmp_name'], $destination)) {
                        if ($this->artistModel->updateArtist($data['id'], $data['artist_name'], $data['biography'], $fileName)) {
                            flash('artist_message', 'Artist updated');
                            redirect('admins/artist');
                        } else {
                            die('Something went wrong');
                        }
                    }
                } else {
                    redirect('admins/artist');
                }
            } else {
                $fileName = $oldArtist->image;
                if ($this->artistModel->updateArtist($data['id'], $data['artist_name'], $data['biography'], $fileName)) {
                    flash('artist_message', 'Artist updated');
                    redirect('admins/artist');
                } else {
                    die('Something went wrong');
                }
            }

        }
    }

    public function deleteArtist()
    {
        $id = trim($_GET['id']);
        if ($this->artistModel->deleteArtist($id)) {
            redirect('admins/artist');
        } else {
            die('Something went wrong');
        }
    }

    public function validateImage($image)
    {
        if (empty($image['name'])) {
            return 'Please enter image';
        }
        // Allowed image types
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        // Get image file from $_FILES
        $validateImg = $image;
        // Validate file type
        if (!in_array($validateImg['type'], $allowedTypes)) {
            return 'Invalid image type';
        }
        // Validate file size (< 10MB)
        if ($validateImg['size'] > 10000000) {
            return 'File too large';
        }
        return '';
    }
}