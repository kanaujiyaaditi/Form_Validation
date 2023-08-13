<body>
<?php
//Imports For Email Sending
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// Database connection build
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'form';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

//Form data stored in varaibles
if (empty($_POST['Name'])) {
    $errMsg = "Please Enter Name to Proceed";
    echo $errMsg;
} else {
    $name = $_POST['Name'];
    if (!preg_match('/^[a-zA-z]*$/', $name)) {
        $ErrMsg = 'Only alphabets and whitespace are allowed.';
        echo $ErrMsg;
    } else {
        if (empty($_POST['number'])) {
            $Errnumber = 'Please Enter Phone Number.';
            echo $Errnumber;
        } else {
            $number = $_POST['number'];
            if (!preg_match('/^[0-9]*$/', $number)) {
                $errNumber = 'Phone Number is not valid.';
                echo $errNumber;
            } else {
                if (empty($_POST['Email'])) {
                    $ErrEmail = 'Please enter Email.';
                    echo $ErrEmail;
                } else {
                    $pattern =
                        '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^';

                    $email = $_POST['Email'];
                    if (!preg_match($pattern, $email)) {
                        $Erremail = 'Please Enter Valid Email';
                        echo $Erremail;
                    } else {
                        if (empty($_POST['subject'])) {
                            $ErrorArea = 'Please enter Subject ';
                            echo $ErrorArea;
                        } else {
                            $sub = $_POST['subject'];
                            if (empty($_POST['area'])) {
                                $Errormsg = 'Message feild can not be empty ';
                                echo $Errormsg;
                            } else {
                                $mess = $_POST['area'];
                                $ip_address = $_SERVER['REMOTE_ADDR'];

                                //insert query
                                $sql = "INSERT INTO contact_form (F_Name, Phone_No, E_mail, Subject,Message,IP_Address) VALUES ('$name', '$number', '$email','$sub','$mess','$ip_address')";
                                //MAil Functionality Added
                                $info =
                                    $name .
                                    " " .
                                    $email .
                                    ' ' .
                                    $number .
                                    " " .
                                    $mess;
                                $mail = new PHPMailer(true);
                                $mail->isSMTP();
                                $mail->Host = gethostbyname('smtp.gmail.com');
                                $mail->SMTPAuth = true;
                                $mail->Username = 'mailcheck164@gmail.com';
                                $mail->Password = 'dtelkmdjwcqzrzrh';
                                $mail->SMTPSecure = 'tls';
                                $mail->Port = 587;
                                $mail->SMTPOptions = [
                                    'ssl' => [
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true,
                                    ],
                                ];
                                // $mail->SMTPDebug = 2;

                                $mail->setFrom('mailcheck164@gmail.com');
                                $mail->addAddress('test@techsolvitservice.com');

                                $mail->isHTML(true);
                                $mail->Subject = $_POST['subject'];
                                $mail->Body = $info;

                                $mail->send();
                                echo 'Mail has been sent successfully!';
                                echo '<br><br><br><br><br><br><br><br><b>Form submitted successfully. Thank you!</b>';

                            }
                        }
                    }
                }
            }
        }
    }
}


$conn->close();
?>


</body>