<?php

require_once 'GeneralController.php';

class  UserManagement extends Controller
{
    public function __construct()
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
            } elseif ($this->adminModel->getAdminByUsername($data['username'])) {
                //admin found
                $data['username_error'] = 'Username is already taken';
            } else {
                //user not found
                $data['username_error'] = '';
            }
            //validate email
            $data['email_error'] = $generalObj->validateEmail($data['email']);
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_error'] = 'Email is already taken';
            } elseif ($this->adminModel->getAdminByEmail($data['email'])) {
                $data['email_error'] = 'Email is already taken';
            }
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
                    flash('register_success', 'You are registered and can log in');
                    $this->view('admin/user', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('admin/user', $data);
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
            //load view
            $this->view('admin/index', $data);
        }
    }
    public function listUser()
    {
//        var_dump(1); die();
        require APPROOT . '/views/admin/user.php';
//        $users = $this->adminModel->getAllUser();
//        $data = [
//            'users' => $users
//        ];
//        $this->view('admins/index', $data);
    }
}