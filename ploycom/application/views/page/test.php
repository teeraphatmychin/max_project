<?php $this->view('partail/main_css') ?>


<?php
$style = 'box-sizing: border-box;color: #fff !important;background-color: #2196f3 !important;border-radius: 4px;';
$style .= 'user-select: none;text-align: center;cursor: pointer;white-space: nowrap;outline: none;border: none;display: inline-block;padding: 8px 16px;vertical-align: middle;overflow: hidden;text-decoration: none;';
$msg = '<div style="box-sizing: border-box;background:#f4f4f4;padding:60px 16px">
    <div style="background:#fff;margin:auto;float:unset;width: 49.99999%;padding: 8px 16px!important;text-align: center!important;border-radius: 4px;box-sizing: border-box;">
        <div style="font-size: 36px!important;box-sizing: border-box;display: block;">
            PLOYCOM
        </div>
        <div style="box-sizing: border-box;display: block;margin-bottom: 16px!important;">
            ขอบคุณที่สมัครสมาชิกกับเรา
        </div>
        <div class="">
        <a href="'.$this->base_url().'"  style="'.$style.'">คลิกที่นี่เพื่อยืนยันตัวตน</a>
        </div>
    </div>
</div>';
// echo $msg;
// exit;
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require '../mvc/public/mail_api/src/PHPMailer.php';
require '../mvc/public/mail_api/src/SMTP.php';

//Create a new PHPMailer instance
// $mail = new PHPMailer;
$mail = new PHPMailer\PHPMailer\PHPMailer();
//Tell PHPMailer to use SMTP
$mail->CharSet = 'utf-8';
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
// $mail->Host = "smtp-mail.outlook.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
// $mail->SMTPSecure = 'STARTTLS';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "maxsrisupan@gmail.com";
// $mail->Username = "maxsrisupan@outlook.com";
//Password to use for SMTP authentication
$mail->Password = "suchakrisrisupan611291181659900745771";
//Set who the message is to be sent from
$mail->setFrom('maxsrisupan@gmail.com', 'maxki everyday');
//Set who the message is to be sent to
$mail->addAddress('maxsrisupan@gmail.com', 'sent to');
//Set the subject line
$mail->Subject = 'ยืนยันตัวตน';
$mail->AddAttachment('../mvc/public/file/10.jpg');
// $mail->AddAttachment('../mvc/public/file/20.jpg');
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$mail->msgHTML($msg);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
