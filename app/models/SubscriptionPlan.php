<?php

class SubscriptionPlan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSubscriptionPlan()
    {
        $this->db->query('SELECT * FROM subscription_plans ORDER BY price ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFreeSubscriptionPlanId()
    {
        $this->db->query('SELECT id FROM subscription_plans WHERE price = 0');
        $results = $this->db->resultSet();
        return $results[0]->id;
    }
}
