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
}