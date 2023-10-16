<?php
class GeneralController extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
    }
    public function validateEmail($email) {
        if (empty($email)) {
            return 'Please enter email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Please enter valid email';
        } else {
            return '';
        }
    }
//    elseif ($this->userModel->getUserByEmail($email)) {
//            return 'Email is already taken';
//        }
    public function validateUsername($username) {
        if (empty($username)) {
            return 'Please enter username';
        } elseif (strlen($username) < 3) {
            return 'Username must be at least 3 characters';
        }  else {
            return '';
        }
    }
    public function validatePassword($password) {
        if (empty($password)) {
            return 'Please enter password';
        } elseif (strlen($password) < 3) {
            return 'Password must be at least 3 characters';
        } else {
            return '';
        }
    }
}