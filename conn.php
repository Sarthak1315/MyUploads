<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();
class con
{
    private $host = "";
    private $user = "";
    private $pas = "";
    private $db = "";
    public $c;
    public function __construct()
    {
        $this->c = mysqli_connect($this->host, $this->user, $this->pas, $this->db);
        if ($this->c == null) {
            die("Can not connect.");
        }
    }
    function logout()
    {
        session_destroy();
    }
    function new_res($inst)
    {
        $enc_pass=password_hash($inst[1],PASSWORD_DEFAULT);
        $sql = "INSERT INTO `login`(`id`, `user_name`, `password`, `email_id`, `permission`) VALUES ('','$inst[0]','$enc_pass','$inst[2]','1');";
        // echo $sql;
        $i_r = $this->c->query($sql);
            // echo $insert_comp;
            return $i_r;

    }
    function send_otp($email)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('');

        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Email Verification";
        $otp = rand(999, 9999);
        $_SESSION["a_Email"]=array($email,$otp);


        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify your login</title>
  <!--[if mso]><style type="text/css">body, table, td, a { font-family: Arial, Helvetica, sans-serif !important; }</style><![endif]-->
</head>

<body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
  <table role="presentation"
    style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
    <tbody>
      <tr>
        <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
          <table role="presentation" style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
            <tbody>
              <tr>
                <td style="padding: 5px 0px 0px;">
                  <div style="text-align: center; font-size:large;">
                    <div style="padding-bottom: 20px;"><a href="https://thetechocean.me" style="text-decoration: none; color: #000;"><h1>Tech Ocean</h1></a>
                    </div>
                  </div>
                  <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                    <div style="color: rgb(0, 0, 0); text-align: left;">
                      <h1 style="margin: 1rem 0">Verification code</h1>
                      <p style="padding-bottom: 16px">Please use the verification code below to sign in.</p>
                      <center><strong style="font-size: 220%">'.$otp.'</strong></center>
                      <p style="padding-bottom: 16px">If you didn’t request this, you can ignore this email.</p>
                      <p style="padding-bottom: 16px">Thanks,<br>Sarthak Patel</p>
                    </div>
                  </div>
                  <div style="padding-top: 20px; color: rgb(153, 153, 153); text-align: center;">
                    <p style="padding-bottom: 16px">Made By Sarthak Patel</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>';

        return $mail->send();
        
    }
    function welcome_user($email,$user)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('');

        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Welcome to MyUploads";


        $mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to MyUploads</title>
<style>
    /* CSS styles for email */
    h1 {
        color: #333;
        margin: 25px;
    }
    p {
        color: #666;
        margin-bottom: 10px;
    }
    .btn {
        display: inline-block;
        padding: 15px 100px;
	border:1px solid #007bff;
        color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 15px;
	
    }
    .btn:hover {
        background-color: #007bff;
	color : white;
    }
</style>
</head>
<body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
    <table role="presentation"
    style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
    <tbody>
      <tr>
        <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
          <table role="presentation" style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
            <tbody>
              <tr>
                <td style="padding: 5px 0px 0px;">
                  <div style="text-align: center; font-size:large;">
                    <div style="padding-bottom: 20px;"><a href="https://thetechocean.me" style="text-decoration: none; color: #000;"><h1>Tech Ocean</h1></a>
                    </div>
                  </div>
                   <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                    <div style="color: rgb(0, 0, 0); text-align: left;">
                        <center><h1>Welcome to MyUploads</h1>
                        <img src="cid:img1" alt="img"></center>
                        <p>Dear '.$user.',</p>
                        <p>Thank you for joining MyUploads! We\'re excited to have you as a new member of our community.</p>
                        <p>You can now log in to your account and start uploading and managing your files with ease.</p>
                    <center><a href="https://myuploads.thetechocean.me" target="_blank" class="btn">Log In</a></center>
                        <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                        
                        <p>Happy uploading!</p>
                        
                      <p style="padding-bottom: 16px">Best regards,<br>Sarthak Patel<br><a href = "https://thetechocean.me">Tech Ocean</a></p>
                    </div>
                  </div>
                  <div style="padding-top: 20px; color: rgb(153, 153, 153); text-align: center;">
                    <p style="padding-bottom: 16px">Made By Sarthak Patel</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

</body>
</html>
';
// Embed image
$mail->AddEmbeddedImage('Uploading-amico.png', 'img1');


        return $mail->send();
        
    }

   
}
