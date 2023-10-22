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
}