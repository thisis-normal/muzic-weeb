<?php
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
                'password' => trim($_POST['password']),
                'username_error' => '',
                'email_error' => '',
                'password_error' => '',
            ];

            //validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_error'] = 'Please enter valid email';
//                var_dump(1); die();
            } else {
                //check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    //user found
                    $data['email_error'] = 'Email is already taken';
                }
            }

            //validate username
            if (empty($data['username'])) {
                $data['username_error'] = 'Please enter username';
            } elseif (strlen($data['username']) < 3) {
                $data['username_error'] = 'Username must be at least 3 characters';
            } else {
                //check username
                if ($this->userModel->findUserByUsername($data['username'])) {
                    //user found
                    $data['username_error'] = 'Username is already taken';
                }
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
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
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
                if (!$this->userModel->findUserByEmail($username_or_email)) {
                    $data['username_or_email_error'] = 'No user found';
                }
                var_dump("Email");
            } else {
                //search by username
                if (!$this->userModel->findUserByUsername($username_or_email)) {
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
//                var_dump($loggedInUser); die();
                if ($loggedInUser) {
                    if ($loggedInUser->role == 'admin') {
                        $this->createAdminSession($loggedInUser);
                        redirect('admin/index');
                    } else {
                        $this->createUserSession($loggedInUser);
                        redirect('pages/index');
                    }
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