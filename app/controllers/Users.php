<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/Exception.php';
//require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/PHPMailer.php';
//require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/SMTP.php';
// Require the autoloader from Composer
require __DIR__ . '/../../vendor/autoload.php';
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
        $this->adminModel = $this->model('Admin');
        $this->tokenModel = $this->model('Token');
    }
    public function register()
    {
        //check if logged in
        if (isUserLoggedIn()) {
            redirect('pages/index');
        }
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
            $generalObj = new GeneralController();
            //validate email
            $data['email_error'] = $generalObj->validateEmail($data['email']);
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_error'] = 'Email is already taken';
            } elseif ($this->adminModel->getAdminByEmail($data['email'])) {
                $data['email_error'] = 'Email is already taken';
            }
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
        //check if logged in
        if (isUserLoggedIn()) {
            redirect('pages/index');
        }
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
                    $loggedInUser = $this->userModel->loginByEmail($username_or_email, $password);
                } else {
                    $loggedInUser = $this->userModel->loginByUsername($username_or_email, $password);
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
                'username_or_email' => trim($_POST['username_or_email'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'username_or_email_error' => '',
                'password_error' => '',
            ];
            //load view
            $this->view('users/login', $data);
        }
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'email' => trim($_POST['email']),
                'email_error' => '',
            ];
            //validate email
            $generalObj = new GeneralController();
            $data['email_error'] = $generalObj->validateEmail($data['email']);
            if (!$this->userModel->getUserByEmail($data['email'])) {
                $data['email_error'] = 'Email is not registered';
            }
//                var_dump($data['email_error']); die();
            //make sure errors are empty
            if (empty($data['email_error'])) {
                //validated
                //generate token
                try {
                    $token = bin2hex(random_bytes(50));
                } catch (\Exception $e) {
                }
                //save token to database
                $this->tokenModel->insertToken($data['email'], $token);
                //send email
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.gmail.com';                             // Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
                    $mail->Username = 'normal2002.dev@gmail.com';               // SMTP username
                    $mail->Password = 'fwcmyyxeepdteraz';                     // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port = 587;                                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    $signImg = 'https://user-images.githubusercontent.com/73392859/275767611-5cc355c2-542e-4151-8200-af4d9ac38da5.png';
                    //Recipients
                    $mail->setFrom('normal2002.dev@gmail.com', 'Admin');
                    $mail->addAddress($data['email']);                                  // Add a recipient
                    // Content
                    $mail->isHTML(true);                                        // Set email format to HTML
                    $mail->Subject = 'Reset Password';
                    $mail->Body = '<h2 style="color: black">We received a request to reset your Muzic Weeb account password.</h2>
                     <p>Click the button below to reset your password:</p>
                    <h3><a href="' . URLROOT . '/users/reset-password?email=' . $data['email'] . '&token=' . $token . '">Reset Password</a></h3>
                    <p>If you didn’t submit a request to reset your password, contact our team immediately at support@ulsait.com</p>
                    <h4>The link is valid for 1 hour, please change your password fast</h4>
                    <img src="' . $signImg . '" alt="email_signature">';
                    $mail->send();
                    flash('sent_password_reset', 'Please check your email to reset password');
                    $this->view('users/forgot-password', $data);
                } catch (Exception $e) {
                    //show a js alert
                    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
                }
            } else {
                $this->view('users/forgot-password', $data);
            }
        } else {
            //init data
            $data = [
                'email' => trim($_POST['email'] ?? ''),
                'email_error' => '',
            ];
            $this->view('users/forgot-password', $data);
        }
    }

    public function resetPassword()
    {
        //validate token though url using get method
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [
                'email' => trim($_GET['email']),
                'token' => trim($_GET['token']),
                'errorURL' => '',
            ];
            //check if user exists in database
            if (!$this->userModel->getUserByEmail($data['email'])) {
                $data['errorURL'] = 'This link is invalid, are you trying to hack my website???';
            } elseif (!$this->tokenModel->validateEmailToken($data['email'], $data['token'])) {
                $data['errorURL'] = 'This link is invalid, are you trying to hack my website???';
            } elseif ($this->tokenModel->isExpiredToken($data['email'], $data['token'])) {
                $data['errorURL'] = 'This link is expired';
            } elseif ($this->tokenModel->isUsedToken($data['email'], $data['token'])) {
                $data['errorURL'] = 'This link is used, please request a new one';
            }
            if (!empty($data['errorURL'])) {
                return $this->view('errors/404', $data);
            } else {
                return $this->view('users/reset-password', $data);
            }
        }
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'email' => trim($_POST['email']),
                'token' => trim($_POST['token']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'password_error' => '',
            ];
            //validate password
            $generalObj = new GeneralController();
            $data['password_error'] = $generalObj->validatePassword($data['password']);
            if (!$data['password']) {
                $data['password_error'] = 'Please enter password';
            } elseif (!$data['confirm_password']) {
                $data['password_error'] = 'Please enter confirm password ';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['password_error'] = 'Password does not match';
            }
            if (empty($data['password_error'])) {
                //hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //update password
                $this->userModel->updatePassword($data['email'], $data['password']);
                //delete token
                $this->tokenModel->updateTokenStatus($data['email'], $data['token'], 'used');
                flash('reset_password_success', 'Your password has been changed');
                redirect('users/login');
            } else {
                $this->view('users/reset-password', $data);
            }
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

    public function demo()
    {
        $this->view('errors/404');
    }
}