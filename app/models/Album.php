<?php

class Album
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createAlbum($artist_id, $name)
    {
        $this->db->query('INSERT INTO albums (artist_id, title, release_date) VALUES (:artist_id, :title, :release_date)');
        $this->db->bind(':artist_id', $artist_id);
        $this->db->bind(':title', $name);
        $this->db->bind(':release_date', date("Y-m-d"));
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllAlbums()
    {
        $this->db->query('SELECT * FROM albums');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllAlbumWithArtistName()
    {
        $this->db->query('SELECT albums.album_id, albums.title, artists.name, albums.artist_id FROM albums INNER JOIN artists ON albums.artist_id = artists.artist_id order by albums.album_id');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAlbumById($id)
    {
        $this->db->query('SELECT * FROM albums WHERE album_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateAlbum($id, $title, $artist_id)
    {
        $this->db->query('UPDATE albums SET title = :title, artist_id = :artist_id WHERE album_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':artist_id', $artist_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAlbum($id)
    {
        $this->db->query('DELETE FROM albums WHERE album_id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function searchAlbums($search)
    {
        $this->db->query('SELECT * FROM albums WHERE title LIKE :search LIMIT 5');
        $this->db->bind(':search', '%' . $search . '%');

        $results = $this->db->resultSet();
        return $results;
    }
    public function getAlbumAllByID($albumId)
    {
        $this->db->query('SELECT  songs.id AS song_id, songs.title AS song_title,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,songs.duration as song_duration
        FROM albums
       
        INNER JOIN songs ON albums.album_id = songs.album_id 
        INNER JOIN artists ON songs.artist_id = artists.artist_id
        -- INNER JOIN albums ON songs.album_id = albums.album_id
        WHERE albums.album_id = :album_id ');
        $this->db->bind(':album_id', $albumId);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getTotalSongs($albumId)
    {
        $this->db->query('SELECT COUNT(*) as total_songs FROM songs WHERE album_id = :album_id');
        $this->db->bind(':album_id', $albumId);
        $result = $this->db->single()->total_songs;
        return $result;
    }
}
