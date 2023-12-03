<?php

class Subscription
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addSubscription($data)
    {
        $this->db->query('INSERT INTO subscriptions (payment_id, user_id, plan_id, start_date, end_date, status) VALUES (:payment_id, :user_id, :plan_id, :start_date, :end_date, :status)');
        //bind values
        $this->db->bind(':payment_id', $data['orderID']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':plan_id', $data['subscriptionPlanID']);
        $this->db->bind(':start_date', $data['paymentDate']);
        $this->db->bind(':end_date', $data['expiryDate']);
        $this->db->bind(':status', $data['status']);
        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSubscriptionByUserID($user_id)
    {
        $this->db->query('SELECT * FROM subscriptions WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->single();
        return $result;
    }

    public function getSubscriptionBySubscriptionID($subscription_id)
    {
        $this->db->query('SELECT * FROM subscriptions WHERE subscription_id = :subscription_id');
        $this->db->bind(':subscription_id', $subscription_id);
        $result = $this->db->single();
        return $result;
    }

    public function getSubscriptionByPlanID($plan_id)
    {
        $this->db->query('SELECT * FROM subscriptions WHERE plan_id = :plan_id');
        $this->db->bind(':plan_id', $plan_id);
        $result = $this->db->single();
        return $result;
    }

    public function getSubscriptionByPaymentStatus($payment_status)
    {
        $this->db->query('SELECT * FROM subscriptions WHERE payment_status = :payment_status');
        $this->db->bind(':payment_status', $payment_status);
    }
}