<?php

class Album
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createAlbum($id, $name)
    {
        $this->db->query('INSERT INTO albums (artist_id, title, release_date) VALUES (:artist_id, :title, :release_date)');
        $this->db->bind(':artist_id', $id);
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
}