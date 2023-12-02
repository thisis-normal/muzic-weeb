<?php
require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * @property mixed $songModel
 * @property mixed $genreModel
 */
class SongManagement extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
        $this->genreModel = $this->model('Genre');
    }

    public function createSong(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'song_name' => trim($_POST['song_name']),
                'album_id' => trim($_POST['album_id'] ?? null),
                'artist_id_array' => $_POST['artist_id'],
                'genre_id_array' => $_POST['genre_id'],
                'release_date' => trim($_POST['release_date']),
                'file' => $_FILES['song'],
                'fileName' => '',
                'duration' => '',
                'status' => '',
                'file_err' => ''
            ];
            //fix artist_id_array at index 0 because I didn't fix the query yet!
            $data['artist_id'] = $_POST['artist_id'][0];
            $data['file_err'] = $this->validateSong($data['file']);
            if (empty($data['file_err'])) {
                $data['fileName'] = $data['file']['name'];
                //destination folder
                $destination = '../public/songs/' . $data['fileName'];
                // Avoid overwriting existing files
                if (file_exists('../public/songs/' . $data['fileName'])) {
                    $data['fileName'] = uniqid() . $data['fileName'];
                    // Re-build destination with new filename
                    $destination = '../public/songs/' . $data['fileName'];
                }
                // Move uploaded file
                if (move_uploaded_file($data['file']['tmp_name'], $destination)) {
                    //get song duration
                    $data['duration'] = $this->getSongDuration($data['fileName']);
                    //set status
                    $data['status'] = 'Approved';
                    $song_id = $this->songModel->createSong($data);
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
    public function updateSong() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'id' => trim($_POST['id']),
                'song_name' => trim($_POST['song_name']),
                'artist_id' => ($_POST['artist_id']),
                'album_id' => trim($_POST['album_id']),
                'genre_id_array' => $_POST['genre_id'],
                'release_date' => trim($_POST['release_date']),
                'file' => $_FILES['song'],
                'fileName' => '',
                'duration' => '',
                'status' => '',
                'file_err' => ''
            ];
            var_dump($data); die();
        }

    }

    public function deleteSong(): void
    {
        $id = trim($_GET['id']);
        if ($this->songModel->deleteSong($id)) {
            flash('song_message', 'Song deleted');
            redirect('admins/song');
        } else {
            die('Something went wrong');
        }
    }

    public function validateSong($song): string
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

    public function getSongDuration($fileName): int
    {
        // Create FFProbe instance
        $ffprobe = FFMpeg\FFProbe::create([
            'ffmpeg.binaries' => PROJECT_ROOT . '/ffmpeg/bin/ffmpeg.exe',
            'ffprobe.binaries' => PROJECT_ROOT . '/ffmpeg/bin/ffprobe.exe',
            'timeout' => 3600, // The timeout for the underlying process
            'ffmpeg.threads' => 12,   // The number of threads that FFMpeg should use
        ]);
        // Probe the MP3 file
        $metadata = $ffprobe->format('../public/songs/' . $fileName);
        // Get the duration
        $duration = $metadata->get('duration');
        //change duration to minute
        return (int) round($duration);
    }
}