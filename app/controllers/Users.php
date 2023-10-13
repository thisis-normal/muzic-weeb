<?php
$bruh = [
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
    // Initialize data with empty error messages

    public function register()
    {
        //check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            //sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'username_error' => '',
                'email_error' => '',
                'password_error' => '',
            ];

            //validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email';
            } else {
                //check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    //user found
                    $data['email_error'] = 'Email is already taken';
                }
            }

            //validate name
            if (empty($data['username'])) {
                $data['username_error'] = 'Please enter username';
            }

            //validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password';
            } elseif (strlen($data['password']) < 3) {
                $data['password_error'] = 'Password must be at least 3 characters';
            }

            //make sure errors are empty
            if (empty($data['email_error']) && empty($data['username_error']) && empty($data['password_error'])) {
                //validated
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Call model function to register user
                if ($this->userModel->register($data)) {
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
            //init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];
            //validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email';
            }
            //validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter password';
            }
            //Check for user/email in database
            if ($this->userModel->findUserByEmail($data['email'])) {
                //user found
            } else {
                //user not found
                $data['email_error'] = 'No user found';
            }

            //make sure errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {
                //validated
                //Check and set logged-in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    //create session
                    $this->createUserSession($loggedInUser);
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
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];
            //load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        //redirect to dashboard
        redirect('pages/index');
    }

    public function logout()
    {
        //unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        //destroy session
        session_destroy();
        //redirect to login
        redirect('users/login');
    }
}