<?php
require_once 'GeneralController.php';
// Initialize data with empty error messages
$data = [
    'username' => '',
    'email' => '',
    'password' => '',
    'username_error' => '',
    'email_error' => '',
    'password_error' => '',
];

/**
 * @property mixed $userModel
 */
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];
            $generalObj = new GeneralController;
            //validate email
            $data['email_error'] = $generalObj->validateEmail($data['email']);
            //validate username
            $data['username_error'] = $generalObj->validateUsername($data['username']);
            if ($this->userModel->getUserByUsername($data['username'])) {
                $data['username_error'] = 'Username is already taken';
            } elseif ($this->adminModel->getAdminByUsername($data['username'])) {
                $data['username_error'] = 'Username is already taken';
            }
            //validate password
            $data['password_error'] = $generalObj->validatePassword($data['password']);

            //make sure errors are empty
            if (empty($data['email_error']) && empty($data['username_error']) && empty($data['password_error'])) {
                //validated
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //Call model function to register user
                if ($this->userModel->insertUser($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('users/register', $data);
            }
        } else {
            //init data to save text in form
            $data = [
                'username' => trim(isset($_POST['username']) ? $_POST['username'] : ''),
                'email' => trim(isset($_POST['email']) ? $_POST['email'] : ''),
                'password' => trim(isset($_POST['password']) ? $_POST['password'] : ''),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
            ];
            //load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //init data
            $username_or_email = trim($_POST['username_or_email']);
            $password = trim($_POST['password']);
            $isEmail = false;
            $data = [
                'username_or_email' => $username_or_email,
                'password' => $password,
                'username_or_email_error' => '',
                'password_error' => '',
            ];
            //validate email
            if (empty($data['username_or_email'])) {
                $data['username_or_email_error'] = 'Please enter username or email';
            }
            //validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password';
            }
            //Check if $username_or_email is email or username
            if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
                $isEmail = true;
                //search by email
                if (!$this->userModel->getUserByEmail($username_or_email)) {
                    $data['username_or_email_error'] = 'No user found';
                }
            } else {
                //search by username
                if (!$this->userModel->getUserByUsername($username_or_email)) {
                    $data['username_or_email_error'] = 'No user found';
                }
            }
            //make sure errors are empty
            if (empty($data['username_or_email_error_error']) && empty($data['password_error'])) {
                //validated
                //Check and set logged-in for both email and username
                if ($isEmail) {
                    $loggedInUser = $this->userModel->loginEmail($username_or_email, $password);
                } else {
                    $loggedInUser = $this->userModel->loginUsername($username_or_email, $password);
                }
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    redirect('pages/index');
                } else {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                //load view with errors
                $this->view('users/login', $data);
            }
        } else {
            //init data
            $data = [
                'username_or_email' => trim(isset($_POST['username_or_email']) ? $_POST['username_or_email'] : ''),
                'password' => trim(isset($_POST['password']) ? $_POST['password'] : ''),
                'username_or_email_error' => '',
                'password_error' => '',
            ];
            //load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['license'] = $user->is_premium;
        $_SESSION['user_role'] = $user->role;
        //redirect to dashboard
        redirect('pages/index');
    }

    public function logout()
    {
        //unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['license']);
        unset($_SESSION['user_role']);
        //destroy session
        session_destroy();
        //redirect to home
        redirect('pages/index');
    }
}