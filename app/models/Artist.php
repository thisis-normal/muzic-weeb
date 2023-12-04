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
        $this->db->query('SELECT lnk_artist_song.song_id AS song_id, songs.title AS song_title,albums.album_id AS album_id,albums.title AS album_title, songs.file_path ,artists.name AS artist_name,songs.duration as song_duration
        FROM artists
        INNER JOIN lnk_artist_song ON artists.artist_id = lnk_artist_song.id
        INNER JOIN songs ON lnk_artist_song.song_id = songs.id 
        INNER JOIN albums ON songs.album_id = albums.album_id
        -- INNER JOIN artists ON songs.artist_id = artists.artist_id
        WHERE artists.artist_id = :artist_id ');
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
