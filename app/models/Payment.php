<?php
class Payment {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPayment($data)
    {
        $this->db->query('INSERT INTO payments (payment_id, user_id, fullname, email, address, plan, paypal_fee, net_amount, payment_method, payment_status, payment_date, expiry_date, status) VALUES (:orderID, :user_id, :name, :email, :address, :plan, :paypal_fee, :net_amount, :payment_method, :payment_status, :payment_date, :expiry_date, :status)');
        //bind values
        $this->db->bind(':orderID', $data['orderID']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':plan', $data['plan']);
        $this->db->bind(':paypal_fee', $data['paypalFee']);
        $this->db->bind(':net_amount', $data['netAmount']);
        $this->db->bind(':payment_method', $data['paymentMethod']);
        $this->db->bind(':payment_status', $data['paymentStatus']);
        $this->db->bind(':payment_date', $data['paymentDate']);
        $this->db->bind(':expiry_date', $data['expiry_date']);
        $this->db->bind(':status', $data['status']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getSalaryByMonth($month, $year)
    {
        $this->db->query('SELECT * FROM payments WHERE MONTH(payment_date) = :month AND YEAR(payment_date) = :year');
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAllSalary()
    {
        $this->db->query('SELECT * FROM payments');
        $result = $this->db->resultSet();
        return $result;
    }
    public function getRevenue()
    {
        $this->db->query('SELECT SUM(net_amount) AS revenue FROM payments WHERE payment_status = "Completed"');
        $result = $this->db->single()->revenue;
        return $result;
    }
}