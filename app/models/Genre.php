<?php
class Genre
{
    private $db;
    public $genre_id;
    public $song_id;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertGenre($name)
    {
        $this->db->query("INSERT INTO genres (name) VALUES (:name)");
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function insertGenreSong($song_id, $genre_id)
    {
        $this->db->query("INSERT INTO lnk_genre_song (song_id, genre_id ) VALUES (:song_id, :genre_id)");
        $this->db->bind(':song_id', $song_id);
        $this->db->bind(':genre_id', $genre_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllGenreSong()
    {
        $this->db->query("SELECT * FROM lnk_genre_song");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAllGenres()
    {
        $this->db->query("SELECT * FROM genres");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getGenreById($id)
    {
        $this->db->query("SELECT * FROM genres WHERE genre_id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function getGenreByName($name)
    {
        $this->db->query("SELECT * FROM genres WHERE name = :name");
        $this->db->bind(':name', $name);
        $result = $this->db->single();
        return $result;
    }
    public function updateGenre($id, $name)
    {
        $this->db->query("UPDATE genres SET name = :name WHERE genre_id = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteGenre($id)
    {
        $this->db->query("DELETE FROM genres WHERE genre_id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getGenreAllByID($genreId)
    {
        $this->db->query('SELECT lnk_genre_song.song_id AS song_id, genres.name AS genre_name, songs.title AS song_title,albums.album_id AS album_id,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,songs.duration as song_duration
        FROM genres
        INNER JOIN lnk_genre_song ON genres.genre_id = lnk_genre_song.id
        INNER JOIN songs ON lnk_genre_song.song_id = songs.id 
        INNER JOIN albums ON songs.album_id = albums.album_id
        INNER JOIN artists ON songs.artist_id = artists.artist_id
        WHERE genres.genre_id = :genre_id ');
        $this->db->bind(':genre_id', $genreId);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getTotalSongs($genre_id)
    {
        $this->db->query('SELECT COUNT(*) as total_songs FROM lnk_genre_song WHERE id = :genre_id');
        $this->db->bind(':genre_id', $genre_id);
        $result = $this->db->single()->total_songs;
        return $result;
    }
}
