<?php
class Song {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSongs()
    {
        $this->db->query('SELECT * FROM songs');
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
    public function createSong($song_name, $album_id, $artist_id, $genre_id, $file, $status = 'Approved')
    {
        $this->db->query('INSERT INTO songs (artist_id, title, album_id, file) VALUES (:artist_id, :song_name, :album_id, :file)');
        $this->db->bind(':artist_id', $artist_id);
        $this->db->bind(':song_name', $song_name);
        $this->db->bind(':album_id', $album_id);
        $this->db->bind(':file', $file);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}