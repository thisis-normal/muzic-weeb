<?php
require_once 'GeneralController.php';

class  UserManagement extends Controller
{
    public function index()
    {
        $this->adminModel = $this->model('Admin');
        $this->userModel = $this->model('User');
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role']),
                'role_error' => '',
            ];
            $generalObj = new GeneralController;
            //validate username
            $data['username_error'] = $generalObj->validateUsername($data['username']);
            //check username
            if ($this->userModel->getUserByUsername($data['username'])) {
                //user found
                $data['username_error'] = 'Username is already taken';
            }
            //validate email
            $data['email_error'] = $generalObj->validateEmail($data['email']);
            //validate password
            $data['password_error'] = $generalObj->validatePassword($data['password']);
            //validate role
            if (empty($data['role'])) {
                $data['role_error'] = 'Please enter role';
            }
            //make sure errors are empty
            if (empty($data['username_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['role_error'])) {
                //validated
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //register user
                if ($this->adminModel->createUser($data['username'], $data['email'], $data['password'], $data['role'])) {
//                    flash('register_success', 'You are registered and can log in');
                    redirect('admins/user');
                } else {
                    die('Something went wrong');
                }
            }
        } else {
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role']),
                'username_error' => '',
                'email_error' => '',
                'password_error' => '',
                'role_error' => '',
            ];
            redirect('admins/user');
        }
    }
}