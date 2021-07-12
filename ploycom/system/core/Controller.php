<?php
@session_start();
class Controller
{
    public $config = [];
    function __construct()
    {
        require_once 'application/config/config.php';
        $this->config = $config;
    }
    public function base_url($link = '')
    {
        if (!empty($link)):
            return $this->config['base_url'].$link;
        else:
            return $this->config['base_url'];
        endif;
    }
    public function model($model)
    {
        require_once './application/models/' . $model . '.php';
        return new $model();
    }
    public function view($view, $data = array())
    {
        $target = './application/views/'.$view;
        if (strpos($view,'.html') !== false) {
            $this->file($target,$data);

        }else {
            $target .= '.php';
            $this->file($target,$data);
        }
    }
    public function public_url($url='')
    {
        if (!empty($url)) :
            $url = 'public/'.$url;
        else :
            $url = 'public/';
        endif;
        return $this->base_url($url);
    }
    public function image_url($url='')
    {
        if (!empty($url)) :
            $url = 'public/file/images/'.$url;
        else :
            $url = 'public/public/file/images/';
        endif;
        return $this->base_url($url);
    }
    public function error($type = '')
    {
        require_once './application/views/errors/error.php';
    }
    public function file($file,$data=array())
    {
        $data = $this->prepare_view_vars($data);
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        unset($data);
        if (file_exists($file)) {
            require_once $file;
        }else {
            return $this->error();exit;
        }
    }
    public function redirect($value)
    {
        header('Location: '.$this->base_url($value));
    }
    protected function prepare_view_vars($vars)
    {
        if ( ! is_array($vars)){
			$vars = is_object($vars) ? get_object_vars($vars) : array();
		}

		foreach (array_keys($vars) as $key){
			if (strncmp($key, '_ci_', 4) === 0){
				unset($vars[$key]);
			}
		}
		return $vars;
    }
    public function mail($data)
    {
        // echo json_encode($data);exit;
        // echo "<pre>";print_r($data);exit;
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
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = $this->config['mail']['username'];
        //Password to use for SMTP authentication
        $mail->Password = $this->config['mail']['password'];
        //Set who the message is to be sent from
        $mail->setFrom($this->config['mail']['username'], 'PLOYCOM');
        //Set who the message is to be sent to
        $mail->addAddress($data['mail'], 'sent to');
        //Set the subject line
        $mail->Subject = $data['subject'];
        // $mail->AddAttachment('../mvc/public/file/10.jpg');
        // $mail->AddAttachment('../mvc/public/file/20.jpg');

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
        $mail->msgHTML($data['msg_html']);

        //send the message, check for errors
        if (!$mail->send()) {
            // echo "Mailer Error: " . $mail->ErrorInfo;
            return array('mail_error',$mail->ErrorInfo);
        } else {
            // echo "Message sent!";
            return array('mail_success');

        }

    }
}


?>
