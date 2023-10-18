<?php

class Token
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //save token
    public function insertToken($email, $token): bool
    {
        $this->db->query("INSERT INTO reset_tokens (email, token, created_at, expired_at) VALUES (:email, :token, DEFAULT, DATE_ADD(created_at, INTERVAL 1 HOUR))");
        //Bind values
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function validateEmailToken($email, $token): bool
    {
        $this->db->query("SELECT * FROM reset_tokens WHERE email = :email AND token = :token");
        //Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteToken($email, $token): bool
    {
        $this->db->query("DELETE FROM reset_tokens WHERE email = :email AND token = :token");
        //Bind value
        $this->db->bind(':email', $email);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function isExpiredToken($email, $token): bool
    {
        $this->db->query("SELECT * FROM reset_tokens WHERE email = :email AND token = :token AND expired_at < NOW()");
        //Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            //change status to expired
            $this->updateTokenStatus($email, $token, 'expired');
            return true;
        } else {
            return false;
        }
    }

    public function updateTokenStatus($email, $token, $status): bool
    {
        $this->db->query("UPDATE reset_tokens SET status = :status WHERE email = :email AND token = :token");
        //Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $this->db->bind(':status', $status);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function isUsedToken($email, $token)
    {
        $this->db->query("SELECT * FROM reset_tokens WHERE email = :email AND token = :token AND status = 'used'");
        //Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $row = $this->db->single();
        //Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}