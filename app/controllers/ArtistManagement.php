<?php

class ArtistManagement extends Controller
{
    public function __construct()
    {
        $this->artistModel = $this->model('Artist');
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
                if(move_uploaded_file($data['image']['tmp_name'], $destination)) {
                    if ($this->artistModel->createArtist($data['artist_name'], $data['biography'], $destination)) {
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