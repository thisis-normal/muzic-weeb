<?php

class Admin
{
    private $db;
    private $username;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAdminByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'admin'");
        //Bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdminByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email AND role = 'admin'");
        //Bind value
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getArtistByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'artist'");
        //Bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getArtistByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email AND role = 'artist'");
        //Bind value
        $this->db->bind(':email', $email);
        $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdByUsername($username)
    {
        $this->db->query("SELECT id FROM users WHERE username = :username");
        //Bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $row;
    }

    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM users");
        $results = $this->db->resultSet();
        return $results;
    }


    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'admin' or username = :username AND role = 'artist'");
        //Bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        if ($row !== false) {
            $hashed_password = $row->password;
        } else {
            return false;
        }
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function createUser($username, $email, $password, $role)
    {
        $this->db->query("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        //Bind values
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':role', $role);
        $this->db->bind(':password', $password);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserById($data)
    {
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $this->db->query("UPDATE users SET username = :username, email = :email, password = :password, role = :role WHERE id = :id");
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':role', $data['role']);
            $this->db->bind(':password', $data['password']);
        } else {
            $this->db->query("UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id");
            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':role', $data['role']);
        }
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}
