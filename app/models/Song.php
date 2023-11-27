<?php

class Song
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSongs()
    {
        $this->db->query('SELECT songs.title, DATE_FORMAT(songs.release_date, "%d/%m/%Y") AS formatted_date, songs.status, songs.file_path, songs.id, albums.title as album_title, artists.name as artist_name, genres.name as genre_name 
        FROM songs INNER JOIN albums ON songs.album_id = albums.album_id 
        INNER JOIN artists ON songs.artist_id = artists.artist_id 
        INNER JOIN lnk_genre_song ON songs.id = lnk_genre_song.song_id 
        INNER JOIN genres ON lnk_genre_song.genre_id = genres.genre_id');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTotalSong()
    {
        $this->db->query('SELECT COUNT(*) AS total_song FROM songs');
        $result = $this->db->single()->total_song;
        return $result;
    }

    public function getSongById($id)
    {
        $this->db->query('SELECT * FROM songs WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function createSong($data)
    {
//        $this->db->query('INSERT INTO songs (artist_id, title,release_date, album_id, file_path, status, duration) VALUES (:artist_id, :song_name, :release_date, :album_id, :file, :status, :duration)');
//        $this->db->bind(':artist_id', $artist_id);
//        $this->db->bind(':song_name', $song_name);
//        $this->db->bind(':release_date', $release_date);
//        $this->db->bind(':album_id', $album_id);
//        $this->db->bind(':file', $file);
//        $this->db->bind(':status', $status);
//        $this->db->bind(':duration', $duration);
        $this->db->query('INSERT INTO songs (artist_id, title,release_date, album_id, file_path, status, duration) VALUES (:artist_id, :song_name, :release_date, :album_id, :file, :status, :duration)');
        $this->db->bind(':artist_id', $data['artist_id']);
        $this->db->bind(':song_name', $data['song_name']);
        $this->db->bind(':release_date', $data['release_date']);
        $this->db->bind(':album_id', $data['album_id']);
        $this->db->bind(':file', $data['fileName']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':duration', $data['duration']);
        if ($this->db->execute()) {
            //get song id that just created
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function deleteSong($id)
    {
        //delete lnk_genre_song first
        $this->db->query('DELETE FROM lnk_genre_song WHERE song_id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            //delete song
            $this->db->query('DELETE FROM songs WHERE id = :id');
            $this->db->bind(':id', $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
