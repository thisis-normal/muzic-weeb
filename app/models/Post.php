<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query("SELECT *, posts.id as postID, users.id as userID, posts.create_at as postCreateAt 
                             from posts inner join users 
                             on posts.user_id = users.id 
                             ORDER BY posts.create_at DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    public function addPost($data)
    {
        $this->db->query("INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)");
        //bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getPostById($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        //bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function updatePost($data)
    {
        $this->db->query("UPDATE posts SET title = :title, body = :body WHERE id = :id");
        //bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletePost($id)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");
        //bind values
        $this->db->bind(':id', $id);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}