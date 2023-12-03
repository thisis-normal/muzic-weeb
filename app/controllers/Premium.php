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
        $this->subscriptionPlanModel = $this->model('SubscriptionPlan');
        $this->subscriptionModel = $this->model('Subscription');
    }

    public function index()
    {
        $data = [
            'subscription_plans' => $this->subscriptionPlanModel->getAllSubscriptionPlan()
        ];
//        var_dump($data); die();
        $this->view('premium/index', $data);
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
            'paymentID' => '', //paymentID will be generated after adding payment data to database
            'userID' => $_SESSION['user_id'],
            'name' => $_POST['shippingName'],
            'email' => $_POST['email'],
            'address' => $_POST['shippingAddress'],
            'plan' => $_POST['plan'] ?? 'Premium',
            'paypalFee' => $_POST['paypalFee'],
            'netAmount' => $_POST['netAmount'],
            'paymentMethod' => 'Paypal',
            'paymentStatus' => 'Completed',
            'paymentDate' => $_POST['createTime'],
            'expiryDate' => '',
            'subscriptionPlanID' => $_POST['plan_id'],
            'period' => $_POST['period'],
            'status' => 'Active'
        ];
        $data['period'] = 'Daily';
        if ($data['period'] == 'Yearly') {
            $duration = '+ 1 year';
        } elseif ($data['period'] == 'Monthly') {
            $duration = '+ 1 month';
        } elseif ($data['period'] == 'Weekly') {
            $duration = '+ 1 week';
        } elseif ($data['period'] == 'Daily') {
            $duration = '+ 1 day';
        } else {
            $duration = '+ 1 month';
        }
        $data['paymentDate'] = $this->changeTimeZone($data['paymentDate'], 'Asia/Ho_Chi_Minh');
        $data['expiryDate'] = date('Y-m-d H:i:s', strtotime($data['paymentDate'] . $duration));
        var_dump($data);
        die();
        //validate
        if (empty($data['orderID']) || empty($data['userID']) || empty($data['name']) || empty($data['email']) || empty($data['address']) || empty($data['plan']) || empty($data['paypalFee']) || empty($data['netAmount']) || empty($data['paymentMethod']) || empty($data['paymentStatus']) || empty($data['paymentDate'])) {
            die('Something missing!');
        }
        //add payment to database and get paymentID
        $data['paymentID'] = $this->paymentModel->addPayment($data);
        if ($data['paymentID']) {
            //add subscription data to database
            $this->subscriptionModel->addSubscription($data);
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

    public function sendEmail($data): void
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
            $emailTemplate = file_get_contents(APPROOT . '/views/email_template/confirm_email.htm');
            // Replace placeholders with actual values;
            $emailTemplate = str_replace('[guest_name]', $_SESSION['user_name'], $emailTemplate);
            $emailTemplate = str_replace('[order_number]', $data['orderID'], $emailTemplate);
            $emailTemplate = str_replace('[full_name]', $data['name'], $emailTemplate);
            $emailTemplate = str_replace('[email]', $data['email'], $emailTemplate);
            $emailTemplate = str_replace('[address]', $data['address'], $emailTemplate);
            $emailTemplate = str_replace('[plan]', $data['plan'], $emailTemplate);
            $emailTemplate = str_replace('[payment_method]', $data['paymentMethod'], $emailTemplate);
            $emailTemplate = str_replace('[payment_status]', $data['paymentStatus'], $emailTemplate);
            $emailTemplate = str_replace('[payment_date]', $data['paymentDate'], $emailTemplate);
            $emailTemplate = str_replace('[expiry_date]', $data['expiry_date'], $emailTemplate);
            //Recipients
            $mail->setFrom('normal2002.dev@gmail.com', 'Admin');
            $mail->addAddress('thuonghuunguyen2002@gmail.com');        // Add a recipient
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

    public function test()
    {

    }
}
