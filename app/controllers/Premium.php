<?php

class Premium extends Controller
{
    public function index()
    {
        $this->view('premium/index'); //load view inside views/premium/index.php
    }

    public function payment()
    {
        $this->view('premium/payment'); //load view inside views/premium/payment.php
    }

    public function success()
    {
        //get data from payment form
        $data = [
            'orderID' => $_POST['id'], //id from payment form
            'user_id' => $_SESSION['user_id'],
            'name' => $_POST['shippingName'],
            'email' => $_POST['email'],
            'address' => $_POST['shippingAddress'],
            'plan' => '1',
            'paypalFee' => $_POST['paypalFee'],
            'netAmount' => $_POST['netAmount'],
            'payment_method' => 'Paypal',
            'payment_status' => 'Completed',
            'payment_date' => $_POST['createTime'],
        ];
        var_dump($data);
        die();
    }
}
