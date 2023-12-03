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
        $this->db->query('SELECT MONTH(create_at) AS month, SUM(net_amount) AS total_net_amount
        FROM payments  
        WHERE MONTH(create_at) IN (:month) AND payment_status = "Completed"
        GROUP BY MONTH(create_at)');
        $this->db->bind(':month', $month);
        return $this->db->resultSet();
    }
}