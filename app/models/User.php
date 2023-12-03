<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM users WHERE role = 'user'");
        if ($this->db->execute()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }
    public function getTotalUser() {
        $this->db->query("SELECT COUNT(*) FROM users WHERE role = 'user'");
        if ($this->db->execute()) {
            return $this->db->resultSet()[0]->{"COUNT(*)"};
        } else {
            return false;
        }
    }

    //Find user by email
    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email AND role = 'user'");
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

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'user'");
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
    public function insertUser($data)
    {
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

    public function getAllUserById($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        //Bind value
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function loginByEmail($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email AND role = 'user' OR  email = :email AND role = 'artist'");
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

    public function loginByUsername($username, $password)
    {
        $this->db->query("SELECT * FROM users WHERE username = :username AND role = 'user' OR  username = :username AND role = 'artist'");
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
    public function updatePassword($email, $password) {
        $this->db->query("UPDATE users SET password = :password WHERE email = :email");
        //Bind values
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateUserSubscription($userID, $subscription_id) {
        $this->db->query("UPDATE users SET subscription_id = :subscription_id WHERE id = :id");
        //Bind values
        $this->db->bind(':id', $userID);
        $this->db->bind(':subscription_id', $subscription_id);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteUser($username) {
        $this->db->query("DELETE FROM users WHERE username = :username");
        //Bind values
        $this->db->bind(':username', $username);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}