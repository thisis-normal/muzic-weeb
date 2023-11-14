<?php

class Playlist
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPlaylist($data)
    {
        $this->db->query('INSERT INTO playlists (playlist_id, user_id, name, description, date_created, status) VALUES (:playlist_id, :user_id, :name, :description, :date_created, :status)');
        //bind values
        $this->db->bind(':playlist_id', $data['playlist_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':date_created', $data['date_created']);
        $this->db->bind(':status', $data['status']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPlaylistByUserID($user_id)
    {
        $this->db->query('SELECT * FROM playlists WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getPlaylistByID($playlist_id)
    {
        $this->db->query('SELECT * FROM playlists WHERE playlist_id = :playlist_id');
        $this->db->bind(':playlist_id', $playlist_id);
        $result = $this->db->single();
        return $result;
    }

    public function getPlaylistByUserIDAndPlaylistID($user_id, $playlist_id)
    {
        $this->db->query('SELECT * FROM playlists WHERE user_id = :user_id AND playlist_id = :playlist_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':playlist_id', $playlist_id);
        $result = $this->db->single();
        return $result;
    }

}