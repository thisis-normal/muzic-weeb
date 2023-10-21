<?php

class Artist
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createArtist($name, $biography, $imaPath)
    {
        $this->db->query('INSERT INTO artists (name, biography, image) VALUES(:artist_name, :biography, :image)');
        $this->db->bind(':artist_name', $name);
        $this->db->bind(':biography', $biography);
        $this->db->bind(':image', $imaPath);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getArtists()
    {
        $this->db->query('SELECT * FROM artists');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getArtistById($id)
    {
        $this->db->query('SELECT * FROM artists WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateArtist($data)
    {
        $this->db->query('UPDATE artists SET artist_name = :artist_name, biography = :biography, image = :image WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':artist_name', $data['artist_name']);
        $this->db->bind(':biography', $data['biography']);
        $this->db->bind(':image', $data['image']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteArtist($id)
    {
        $this->db->query('DELETE FROM artists WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}