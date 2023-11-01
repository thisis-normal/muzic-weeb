<?php
class Song {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSongs()
    {
        $this->db->query('SELECT songs.title, songs.release_date, songs.status, songs.file_path, songs.id, albums.title as album_title, artists.name as artist_name, genres.name as genre_name FROM songs INNER JOIN albums ON songs.album_id = albums.album_id INNER JOIN artists ON songs.artist_id = artists.artist_id INNER JOIN genre_song ON songs.id = genre_song.song_id INNER JOIN genres ON genre_song.genre_id = genres.genre_id');
//        $this->db->query('SELECT songs.title, genres.name as genre_name FROM songs INNER JOIN genre_song ON songs.id = genre_song.song_id INNER JOIN genres ON genre_song.genre_id = genres.genre_id');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getSongById($id)
    {
        $this->db->query('SELECT * FROM songs WHERE song_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function createSong($song_name, $album_id, $artist_id, $file, $status = 'Approved')
    {
        $this->db->query('INSERT INTO songs (artist_id, title, album_id, file_path, status) VALUES (:artist_id, :song_name, :album_id, :file, :status)');
        $this->db->bind(':artist_id', $artist_id);
        $this->db->bind(':song_name', $song_name);
        $this->db->bind(':album_id', $album_id);
        $this->db->bind(':file', $file);
        $this->db->bind(':status', $status);
        if ($this->db->execute()) {
            //get song id that just created
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
}