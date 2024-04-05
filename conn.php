<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
class con
{
    private $host = "";// localhost
    private $user = ""; //user 
    private $pas = ""; //Password
    private $db = ""; //Database name
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
        $sql = "INSERT INTO `login`(`id`, `user_name`, `password`, `email_id`, `permission`) VALUES ('','$inst[0]','$inst[1]','$inst[2]','1');";
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
        $mail->Username = ''; // sender Email address
        $mail->Password = ''; //app pasword
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('');// sender email address

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
}
