<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/Exception.php';
require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../../vendor/PHPMailer/phpmailer/src/SMTP.php';

class Premium extends Controller
{
    public function __construct()
    {
        $this->paymentModel = $this->model('Payment');
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        $this->view('premium/index'); //load view inside views/premium/index.php
    }

    public function payment()
    {
        $this->view('premium/payment'); //load view inside views/premium/payment.php
    }

    public function success()
    {
        //get data from payment form
        $data = [
            'orderID' => $_POST['id'], //id from payment form
            'user_id' => $_SESSION['user_id'],
            'name' => $_POST['shippingName'],
            'email' => $_POST['email'],
            'address' => $_POST['shippingAddress'],
            'plan' => $_POST['plan'] ?? 'Premium',
            'paypalFee' => $_POST['paypalFee'],
            'netAmount' => $_POST['netAmount'],
            'paymentMethod' => 'Paypal',
            'paymentStatus' => 'Completed',
            'paymentDate' => $_POST['createTime'],
            'expiry_date' => '',
            'status' => 'Active'
        ];
        $data['paymentDate'] = $this->changeTimeZone($data['paymentDate'], 'Asia/Ho_Chi_Minh');
        $data['expiry_date'] = date('Y-m-d H:i:s', strtotime($data['paymentDate'] . ' + 1 month'));
        //validate
        if (empty($data['orderID']) || empty($data['user_id']) || empty($data['name']) || empty($data['email']) || empty($data['address']) || empty($data['plan']) || empty($data['paypalFee']) || empty($data['netAmount']) || empty($data['payment_method']) || empty($data['payment_status']) || empty($data['payment_date'])) {
            die('Something missing!');
        }
//        var_dump($this->model('Payment')->addPayment($data)); die();
        //add payment to database
        if ($this->paymentModel->addPayment($data)) {
            //update user's plan
            $this->userModel->updateUserPlan($data['user_id'], $data['plan']);
            //send email
            $this->sendEmail($data);
            //redirect to success page
            $this->view('premium/success', $data); //load view inside views/premium/success.php
        } else {
            //show error
            die('Something went wrong!');
        }
    }

    public function changeTimeZone($isoDatetime, $newTimeZone)
    {
        $datetime = new DateTime($isoDatetime);
        $datetime->setTimezone(new DateTimeZone($newTimeZone));
        return $datetime->format('Y-m-d H:i:s');
    }

//    public function sendEmail($data)
//    {
//        //send email
//        $mail = new PHPMailer(true);
//        try {
//            //Server settings
//            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
//            $mail->isSMTP();                                            // Send using SMTP
//            $mail->Host = 'smtp.gmail.com';                             // Set the SMTP server to send through
//            $mail->SMTPAuth = true;                                     // Enable SMTP authentication
//            $mail->Username = 'normal2002.dev@gmail.com';               // SMTP username
//            $mail->Password = 'fwcmyyxeepdteraz';                     // SMTP password
//            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//            $mail->Port = 587;                                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//            $signImg = 'https://user-images.githubusercontent.com/73392859/275767611-5cc355c2-542e-4151-8200-af4d9ac38da5.png';
//            //Recipients
//            $mail->setFrom('normal2002.dev@gmail.com', 'Admin');
//            $mail->addAddress('thuonghuunguyen2002@gmail.com');                                  // Add a recipient
//            // Content
//            $mail->isHTML(true);                                        // Set email format to HTML
//            $mail->Subject = 'Transaction successful';
//            $mail->Body = '<h1>We have received your payment</h1>
//                            <h2>Thank you for using our service</h2>
//                            <h2>Here is your payment information:</h2>
//                            <h3>
//                            <table>
//                                <tr>
//                                    <td>Order ID:</td>
//                                    <td>' . $data['orderID'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Fullname:</td>
//                                    <td>' . $data['name'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Email:</td>
//                                    <td>' . $data['email'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Address:</td>
//                                    <td>' . $data['address'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Plan:</td>
//                                    <td>' . $data['plan'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Paypal fee:</td>
//                                    <td>' . $data['paypalFee'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Net amount:</td>
//                                    <td>' . $data['netAmount'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Payment method:</td>
//                                    <td>' . $data['paymentMethod'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Payment status:</td>
//                                    <td>' . $data['paymentStatus'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Payment date:</td>
//                                    <td>' . $data['paymentDate'] . '</td>
//                                </tr>
//                                <tr>
//                                    <td>Expiry date:</td>
//                                    <td>' . $data['expiry_date'] . '</td>
//                                </tr>
//                            </table>
//                            </h3>
//                            <h4><p>If you have any question, contact our team at support@ulsait.com</p></h4>
//                            <img src="' . $signImg . '" alt="email_signature">';
//            $mail->send();
//            flash('transaction_success', 'Transaction successful');
//        } catch (Exception $e) {
//            //show a js alert
//            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
//        }
//    }
    public function sendEmail($data)
    {
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
            $mail->Port = 587;                                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above+
            // Load your HTML email template
            $emailTemplate = file_get_contents(__DIR__ . '/../../views/confirm_email.htm');
            // Replace placeholders with actual values;

            //Recipients
            $mail->setFrom('normal2002.dev@gmail.com', 'Admin');
            $mail->addAddress('thuonghuunguyen2002@gmail.com');                                  // Add a recipient
            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Transaction successful';
            $mail->Body = $emailTemplate;
            $mail->send();
            flash('transaction_success', 'Transaction successful');
        } catch (Exception $e) {
            //show a js alert
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        }
    }
}
