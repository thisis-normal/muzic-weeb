<?php
class User {
    private $db;
    private $username;
    private $email;
    private $password;
    private $regis_date;
    private $is_prepared = 0;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Find user by email
    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
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
    public function findUserByUsername($username) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
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


    //REGISTER FUNCTION
    public function register($data) {
        $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
//        $this->db->bind(':regis_date', currentTimestamp);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getUserById($id) {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        //Bind value
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function loginEmail($email, $password) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        //Bind value
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    public function loginUsername($username, $password) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
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