<?php
session_start();

// Creating variables for the recovery of datas sent by mail button (form/hidden values) in pet_details page
$pet_name=$_REQUEST['pet_name'];
$pet_id=$_REQUEST['pet_id'];
$owner_email=$_REQUEST['owner_email'];
$vet_email = $_SESSION['email'];
$vet_name = $_SESSION['last_name'];

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $vet_email;

//Password to use for SMTP authentication
$mail->Password = 'djolegjpyhyxueqn';

//Set who the message is to be sent from
//Note that with gmail you can only use your account address (same as `Username`)
//or predefined aliases that you have configured within your account.
//Do not use user-submitted addresses in here
$mail->setFrom($vet_email, $vet_name);

//Set who the message is to be sent to
$mail->addAddress($owner_email);

//Set the subject line
$mail->Subject = 'Rappel vaccinal';

//Replace the plain text body with one created manually
$mail->Body = 'Bonjour,
Le rappel de vaccin de '.$pet_name.' approche.
Veuillez prendre un rendez-vous auprès de mon secrétariat.
Bien cordialement, 
Dr '.$vet_name.'';

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else { 
    header("location: ../views/pet_details.php?pet_id=".$pet_id);
};