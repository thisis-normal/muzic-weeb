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
//            var_dump($data); die();
            //make sure errors are empty
            if (empty($data['username_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['role_error'])) {
                //validated
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //register user
                if ($this->adminModel->createUser($data['username'], $data['email'], $data['password'], $data['role'])) {
                    flash('register_success', 'User registered');
                    //pass data to view

                    redirect('admins/user');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('admins/user');
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
            $this->view('admin/user', $data);
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'id' => trim($_POST['id']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role']),
                'username_err' => '',
                'email_err' => '',
            ];
            $oldUser = $this->userModel->getUserById($data['id']);
            if ($data['username'] !== $oldUser->username) {
                //check username in db
                if ($this->userModel->getUserByUsername($data['username'])) {
                    //user found
                    $data['username_err'] = 'Username is already taken';
                } elseif ($this->adminModel->getAdminByUsername($data['username'])) {
                    //admin found
                    $data['username_err'] = 'Username is already taken';
                }
            }
            if ($data['email'] !== $oldUser->email) {
                //check email in db
                if ($this->userModel->getUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                } elseif ($this->adminModel->getAdminByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            if (empty($data['username_err']) && empty($data['email_err'])) {
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //register user
                if ($this->adminModel->updateUserById($data['id'], $data['username'], $data['email'], $data['password'], $data['role'])) {
                    flash('update_success', 'User updated');
                    //pass data to view
                    redirect('admins/user');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('admins/user');
            }
        }
    }

    public function deleteUser()
    {
        $username = trim($_GET['username']);
        if ($this->userModel->deleteUser($username)) {
            flash('delete_success', 'User deleted');
            redirect('admins/user');
        } else {
            die('Something went wrong');
        }
    }

    public function listUser()
    {
//        $users = $this->adminModel->getAllUser();
//        $data = [
//            'users' => $users
//        ];
//        $this->view('admins/index', $data);
    }
}