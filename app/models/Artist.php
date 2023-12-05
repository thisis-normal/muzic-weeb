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

    public function getAllArtists($limit = 0)
    {
        if ($limit == 0) {
            $this->db->query('SELECT * FROM artists');
        } else {
            $this->db->query('SELECT * FROM artists ORDER BY RAND() LIMIT :limit');
            $this->db->bind(':limit', $limit);
        }
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
    public function getLatestArtist()
    {
        $this->db->query('SELECT * FROM artists ORDER BY artist_id DESC LIMIT 1');
        return $this->db->single();
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
    public function getArtistAllByID($artistId)
    {
        $this->db->query('SELECT songs.id as song_id, songs.title AS song_title,albums.album_id AS album_id,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,songs.duration as song_duration
        FROM artists
        INNER JOIN songs ON artists.artist_id = songs.artist_id
        INNER JOIN albums ON songs.album_id = albums.album_id
        WHERE artists.artist_id = :artist_id');
        $this->db->bind(':artist_id', $artistId);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getTotalSongs($artistId)
    {
        $this->db->query('SELECT COUNT(*) as total_songs FROM lnk_artist_song WHERE id = :artist_id');
        $this->db->bind(':artist_id', $artistId);
        $result = $this->db->single()->total_songs;
        return $result;
    }
}
