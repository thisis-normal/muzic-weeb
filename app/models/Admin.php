<?php

class Admin
{
    private $db;
    private $username;

    public function __construct()
    {
        $this->db = new Database;
    }
}
