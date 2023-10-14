<?php

class Admin
{
    private $db;
    private $username;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function findAdminByUsername($username) {
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
    public function login($username, $password) {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'admin'");
        //Bind value
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        if($row !== false){
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

}
