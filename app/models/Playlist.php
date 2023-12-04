<?php

class Playlist
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPlaylist()
    {
        $this->db->query('SELECT * FROM playlists');
        return $this->db->resultSet();
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
    public function getTotalSongs($playlist_id)
    {
        $this->db->query('SELECT COUNT(*) as total_songs FROM lnk_playlist_song WHERE playlist_id = :playlist_id');
        $this->db->bind(':playlist_id', $playlist_id);
        $result = $this->db->single()->total_songs;
        return $result;
    }
    public function getPlaylistByUserID($id)
    {
    }

    public function getPlaylistByID($playlistId)
    {
        $this->db->query('SELECT lnk_playlist_song.song_id AS song_id, playlists.title AS playlist_title, songs.title AS song_title,albums.album_id AS album_id,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,artists.artist_id  AS artist_id,songs.duration as song_duration
        FROM playlists 
        INNER JOIN lnk_playlist_song ON playlists.playlist_id = lnk_playlist_song.playlist_id
        INNER JOIN songs ON lnk_playlist_song.song_id = songs.id 
        INNER JOIN albums ON songs.album_id = albums.album_id
        INNER JOIN artists ON songs.artist_id = artists.artist_id
        WHERE playlists.playlist_id = :playlist_id ');
        $this->db->bind(':playlist_id', $playlistId);
        $result = $this->db->resultSet();
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
    public function searchPlaylists($search)
    {
        $this->db->query('SELECT playlists.playlist_id AS id , lnk_playlist_song.song_id AS song_id, playlists.title AS playlist_title, songs.title AS song_title,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,songs.duration as song_duration, playlists.description AS playlist_description
        FROM playlists 
        INNER JOIN lnk_playlist_song ON playlists.playlist_id = lnk_playlist_song.playlist_id
        INNER JOIN songs ON lnk_playlist_song.song_id = songs.id 
        INNER JOIN albums ON songs.album_id = albums.album_id
        INNER JOIN artists ON songs.artist_id = artists.artist_id WHERE songs.title LIKE :search LIMIT 5');
        $this->db->bind(':search', '%' . $search . '%');

        $results = $this->db->resultSet();
        return $results;
    }
}
