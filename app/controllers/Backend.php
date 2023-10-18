<?php
require_once 'GeneralController.php';

/**
 * @property mixed $adminModel
 */
class Backend extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function index()
    {
        if (isAdminLoggedIn()) {
            redirect('admins/index');
        } else {
            redirect('backend/login');
        }
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
            ];
            $generalObj = new GeneralController;
            //validate username
            $data['username_error'] = $generalObj->validateUsername($data['username']);
            //check username
            if (!$this->adminModel->getAdminByUsername($data['username'])) {
                //user not found
                $data['username_error'] = 'No user found';
            }
            //validate password
            $data['password_error'] = $generalObj->validatePassword($data['password']);

            //make sure errors are empty
            if (empty($data['username_error']) && empty($data['password_error'])) {
                //validated
                //check and set logged in user
                $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);
                if ($loggedInAdmin) {
                    //create session
                    $this->createAdminSession($loggedInAdmin);
                    redirect('admins/dashboard');
                } else {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('admin/login', $data);
                }
            } else {
                //load view with errors
                $this->view('admin/login', $data);
            }
        } else {
            //init data
            $data = [
                'username' => trim(isset($_POST['username']) ? $_POST['username'] : ''),
                'password' => trim(isset($_POST['password']) ? $_POST['password'] : ''),
                'username_error' => '',
                'password_error' => '',
            ];
            //load view
            $this->view('admin/login', $data);
        }
    }

    public function about()
    {
        $this->view('admin/index');
    }

    public function createAdminSession($user)
    {
        $_SESSION['admin_id'] = $user->id;
        $_SESSION['admin_name'] = $user->username;
        $_SESSION['admin_email'] = $user->email;
        //redirect to dashboard
        redirect('admin/index');
    }

    public function logout()
    {
        //unset session variables
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_email']);
        //destroy session
        session_destroy();
        //redirect to home
        redirect('backend/');
    }

    public function bruhBruh()
    {
        var_dump(1);
        die();
    }
}
