<?php

class Statistic
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRevenueByMonth($month)
    {
        $this->db->query('SELECT MONTH(create_at) AS month, ROUND(SUM(net_amount)) AS total_net_amount
        FROM payments  
        WHERE MONTH(create_at) IN (:month) AND payment_status = "Completed"
        GROUP BY MONTH(create_at)');
        $this->db->bind(':month', $month);
        return $this->db->resultSet();
    }

    public function getNewUserByMonth($month)
    {
        $this->db->query('SELECT MONTH(regis_date) AS month,COUNT(id) AS total_users
        FROM users
        WHERE MONTH(regis_date) = :month
        GROUP BY MONTH(regis_date)');
        $this->db->bind(':month', $month);
        return $this->db->resultSet();
    }
    public function getNewPremiumUserByMonth($month)
    {
        $this->db->query('SELECT MONTH(start_date) AS month, COUNT(user_id) AS total_users
        FROM subscriptions
        WHERE status = "Active" AND MONTH(start_date) = :month
        GROUP BY MONTH(start_date)');
        $this->db->bind(':month', $month);
        return $this->db->resultSet();
    }
}