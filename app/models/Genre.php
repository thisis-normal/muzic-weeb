<?php
class Genre {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function insertGenre($name) {
        $this->db->query("INSERT INTO genres (name) VALUES (:name)");
        $this->db->bind(':name', $name);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getAllGenres () {
        $this->db->query("SELECT * FROM genres");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getGenreById($id) {
        $this->db->query("SELECT * FROM genres WHERE genre_id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        return $result;
    }
    public function getGenreByName($name) {
        $this->db->query("SELECT * FROM genres WHERE name = :name");
        $this->db->bind(':name', $name);
        $result = $this->db->single();
        return $result;
    }
    public function updateGenre($id, $name) {
        $this->db->query("UPDATE genres SET name = :name WHERE genre_id = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteGenre($id) {
        $this->db->query("DELETE FROM genres WHERE genre_id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}