<?php

class Subscription
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSubscriptionPlan()
    {
        $this->db->query('SELECT * FROM subscription_plans');
        $results = $this->db->resultSet();
        return $results;
    }
}
