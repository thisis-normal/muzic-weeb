<?php
class Statistic {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalUser()
    {
        $this->db->query('SELECT COUNT(*) AS totalUser FROM users');
        return $this->db->single();
    }

    public function getTotalSong()
    {
        $this->db->query('SELECT COUNT(*) AS totalSong FROM songs');
        return $this->db->single();
    }

    public function getRevenue()
    {
        $this->db->query('SELECT SUM(amount) AS revenue FROM payments');
        return $this->db->single();
    }
}