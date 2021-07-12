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
    public function error($data = array())
    {
        // $this->view('errors/error.php',$data);
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
    public function redirect($value='')
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
    public function image_upload($data=[])
    {
        $files = '';
        $new_height = 0;
        $file_new_name = '';
        $path_image = array();
        $full_path = explode('public/',$data['upload_path']);
        $full_path = $data['path_image'].$full_path[1];
        if(isset($data['upload_path']) and !empty($data['upload_path'])):
            $path = $data['upload_path'];
        else:
            echo 'Enter your path for uploading image. Please..';exit;
        endif;
        if(!empty($data['new_size'])):
            if(strpos($data['new_size'],'/') == false):
                $new_width = $data['new_size'];
            else:
                $new_size = explode('/',$data['new_size']);
                $new_width = $new_size[0];
                $new_height = $new_size[1];
            endif;
        else:
            $new_width = 1920;
        endif;
        if(!isset($data['file']) or count($data['file']) < 1):
            echo "Choose your file for upload";exit;
        else:
            $key_first = '';
            foreach ($data['file'] as $key => $value):
                $key_first = $key;
            endforeach;
            $data['file'] = $data['file'][$key_first];
        endif;
        if(!is_array($data['file']['name'])):
            $data['file']['name'] = array(0 => $data['file']['name']);
            $data['file']['type'] = array(0 => $data['file']['type']);
            $data['file']['tmp_name'] = array(0 => $data['file']['tmp_name']);
            $data['file']['error'] = array(0 => $data['file']['error']);
            $data['file']['size'] = array(0 => $data['file']['size']);
        endif;
            $files = $data['file']; //get key array อยากตั้งชื่อตัวแปรอะไรที่ input ก็ได้
            foreach ($files['name'] as $key => $value):
                $file_new_name = !empty($data['suffix'])? time().'_'.$data['suffix'] : time();
                $ext = '.'.pathinfo($files['name'][$key], PATHINFO_EXTENSION); //get last name file
                if(count($files['name']) > 1):
                    $file_new_name = !empty($data['suffix'])? time().'_'.$data['suffix'].($key+1) : time().'_group'.($key+1); // new name file when multi upload
                endif;
                $sourceProperties = getimagesize($files['tmp_name'][$key]);
                switch ($sourceProperties['mime']):
                    case 'image/png':
                        $imageResourceId = @ImageCreateFromPNG($files['tmp_name'][$key]);
                        break;
                    case 'image/jpeg':
                        $imageResourceId = @ImageCreateFromJPEG($files['tmp_name'][$key]);
                        break;
                    default:
                        break;
                endswitch;
                $new_height = empty($new_height)? round($new_width*$sourceProperties[1]/$sourceProperties[0]) : $new_height; // get new size if have no paramiter
                if($sourceProperties[1] > $sourceProperties[0]): // $sourceProperties[0] คือ $width_old
                    if($sourceProperties[0] > $new_width):// width_old - x = width_config
                        //กรณีภาพแนงตั้งให้สลับ width กับ height ของแนวนอน
                        $new_height = $new_width;
                        $new_width = round($new_height*$sourceProperties[0]/$sourceProperties[1]);
                        $targetLayer = $this->image_resize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$new_width,$new_height);
                        imagejpeg($targetLayer,$path.$file_new_name.$ext);
                        imageDestroy($targetLayer);
                    else:
                        move_uploaded_file($files['tmp_name'][$key],$path.$file_new_name.$ext);
                    endif;
                else:
                    if($sourceProperties[0] > $new_width):
                        $targetLayer = $this->image_resize($imageResourceId,$sourceProperties[0],$sourceProperties[1],$new_width,$new_height);
                        imagejpeg($targetLayer,$path.$file_new_name.$ext);
                        imageDestroy($targetLayer);
                    else:
                        move_uploaded_file($files['tmp_name'][$key],$path.$file_new_name.$ext);
                    endif;
                endif;
                $path_image[$key] = $full_path.$file_new_name.$ext;
            endforeach;

            return $path_image;
    }
    function image_resize($imageResourceId,$width,$height,$new_width,$new_height) {
        $targetLayer=imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$new_width,$new_height, $width,$height);
        return $targetLayer;
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

        require '../hr_manage/public/mail_api/src/PHPMailer.php';
        require '../hr_manage/public/mail_api/src/SMTP.php';

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
        // $mail->Username = "maxsrisupan@gmail.com";
        $mail->Username = $this->config['mail']['username'];
        //Password to use for SMTP authentication
        // $mail->Password = "suchakrisrisupan611291181659900745771";
        $mail->Password = $this->config['mail']['password'];
        //Set who the message is to be sent from
        $mail->setFrom($this->config['mail']['username'], 'PLOYCOM');
        //Set who the message is to be sent to
        $mail->addAddress($data['mail'], 'sent to');
        //Set the subject line
        $mail->Subject = $data['subject'];
        // $mail->AddAttachment('../hr_manage/public/file/10.jpg');
        // $mail->AddAttachment('../hr_manage/public/file/20.jpg');

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
