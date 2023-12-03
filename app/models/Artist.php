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

    public function getAllArtists()
    {
        $this->db->query('SELECT * FROM artists');
        return $this->db->resultSet();
    }
    public function getArtistById($id)
    {
        $this->db->query('SELECT * FROM artists WHERE artist_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function getArtistByUserId($id)
    {
        $this->db->query('SELECT * FROM artists INNER JOIN users ON users.artist_id = artists.artist_id WHERE users.id = :user_id');
        $this->db->bind(':user_id', $id);
        return $this->db->resultSet();
    }


    public function updateArtist($id, $name, $biography, $image)
    {
        $this->db->query('UPDATE artists SET name = :artist_name, biography = :biography, image = :image WHERE artist_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':artist_name', $name);
        $this->db->bind(':biography', $biography);
        $this->db->bind(':image', $image);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteArtist($id)
    {
        $this->db->query('DELETE FROM artists WHERE artist_id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function searchArtists($search)
    {
        $this->db->query('SELECT * FROM artists WHERE name LIKE :search LIMIT 5');
        $this->db->bind(':search', '%' . $search . '%');

        $results = $this->db->resultSet();
        return $results;
    }
}
