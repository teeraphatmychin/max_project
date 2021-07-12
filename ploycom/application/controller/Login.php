<?php


class Login extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->login = $this->model('Login_model');
        $this->cus = $this->model('Member_model');
    }
    public function index($value='',$check='')
    {
        $data['mail'] = '';
        if(isset($check) && !empty($check)):
            $data['check_confirm_mail'] = $check;
            if(isset($value) && !empty($value)):
                $data['mail'] = $value;
            endif;
        else:
            if(isset($value) && !empty($value)):
                $data['mail'] = $value;
            endif;
        endif;

        $this->set_page('login',$data);
    }
    public function check_login()
    {
        // echo "<pre>";print_r($_POST);exit;
        if (isset($_POST) && !empty($_POST)):
            $username = $_POST['email'];
            $password = $_POST['password'];
            $con['table'] = 'member';
            $con['select'] = "member_id,member_name,member_address,member_card_id,member_email,member_phone,member_status";
            $con['where'] = "member_email = '$username' AND member_password = '$password'";
            // $con['where'] = "member_email = '$username' AND member_password = '$password' AND member_status != 1";
            $member = $this->login->select($con);
            if(count($member) > 0):
                if ($member[0]->member_status == 1):
                    echo json_encode('close');
                elseif($member[0]->member_status == 2):
                    echo json_encode('not_verified');
                else:
                    if (count($member) > 0):
                        $_SESSION['member'] = $member[0];
                        $_SESSION['member']->address = $_SESSION['member']->member_address;
                        $address  = explode('/',$_SESSION['member']->member_address);
                        $_SESSION['member']->member_address = '';
                        $_SESSION['member']->member_address = implode(' ',$address);
                        echo json_encode('success');
                    else:
                        echo json_encode('fail');
                    endif;
                endif;
            else:
                echo json_encode('fail');
            endif;
        else:
            $this->redirect('login');
        endif;
    }
    public function registation_ajax()
    {
        // echo "<pre>";print_r($_POST);exit;
        if(isset($_POST) && !empty($_POST)):
            $con['table'] = 'member';
            $con['where'] = 'member_email = "'.$_POST['email'].'"';
            $check_regis = $this->login->select($con);
            unset($con);
            // echo json_encode($check_regis);exit;
            // echo "<pre>";print_r(count($check_regis));exit;
            // echo "$check_regis";exit;
            if(count($check_regis)<=0):
                $mu = isset($_POST['mu']) && !empty($_POST['mu']) ? ' ม.'.$_POST['mu'] : null;
                $alley = isset($_POST['alley']) && !empty($_POST['alley']) ? ' ซ.'.$_POST['alley'] : null;
                $village = isset($_POST['village']) && !empty($_POST['village']) ? ' หมู่บ้าน/อาคาร'.$_POST['village'] : null;
                $road = isset($_POST['road']) && !empty($_POST['road']) ? ' ถ.'.$_POST['road'] : null;
                $province = isset($_POST['province']) && !empty($_POST['province']) ? ' จ.'.$_POST['province'] : null;
                $amphur = isset($_POST['amphur']) && !empty($_POST['amphur']) ? ' อ.'.$_POST['amphur'] : null;
                $district = isset($_POST['district']) && !empty($_POST['district']) ? ' ต.'.$_POST['district'] : null;
                $zipcode = isset($_POST['zipcode']) && !empty($_POST['zipcode']) ? ' '.$_POST['zipcode'] : null;
                $address = $_POST['address'].$mu.$alley.$village.$road.$province.$amphur.$district.$zipcode;

                $con['table'] = 'member';
                $con['data'] = array(
                    'member_password' => $_POST['password'],
                    'member_name' => $_POST['name'].' '.$_POST['last_name'],
                    'member_email' => $_POST['email'],
                    'member_address' => $address,
                    'member_card_id' => $_POST['card_id'],
                    'member_phone' => $_POST['phone_number'],
                    'member_status' => 2
                );
                $add_member = $this->login->insert($con);
                unset($con);

                // $username = $_POST['email'];
                // $password = $_POST['password'];
                // $con['table'] = 'member';
                // $con['select'] = "member_id,member_name,member_address,member_card_id,member_email,member_phone";
                // $con['where'] = "member_email = '$username' AND member_password = '$password'";
                // $member = $this->cus->select($con);
                // unset($con);
                // if (count($data) != 0):
                //     $_SESSION['member'] = $member[0];
                //     $address  = explode('/',$_SESSION['member']->member_address);
                //     $_SESSION['member']->member_address = '';
                //     $_SESSION['member']->member_address = implode(' ',$address);
                //     $json = array();
                //     $json[0] = 'success';
                //     $json[1] = 'product';
                //     if(isset($_POST['url']) && !empty($_POST['url'])):
                //         $json[1] = $_POST['url'];
                //     endif;
                //     echo json_encode($json);
                // else:
                //     echo json_encode(array('login_fail'));
                // endif;
                echo json_encode(array('success',$_POST['email']));
            else:
                echo json_encode(array('used'));
            endif;
        else:
            $this->redirect('login');
        endif;
        // echo json_encode($_POST);exit;
    }
    public function registation()
    {
        $this->set_page('registation');
    }
    public function forget()
    {
        if(isset($_POST['email']) && !empty($_POST['email'])):
            // echo json_encode(array($_POST['email'],111));exit;
            $con['select'] = 'member_email,member_password';
            $con['where'] = 'member_email = "'.$_POST['email'].'"';
            $data_member = $this->cus->select($con);

            if(count($data_member) > 0):
                $data_member = $data_member[0];
                $msg = 'กูรหัสผ่าน '.$this->base_url().'<br>';
                $msg .= 'อีเมล์ : '.$_POST['email'].'<br>';
                $msg .= 'รหัสผ่าน : '.$data_member->member_password.'<br>';
                $data['mail'] = $_POST['email'];
                $data['msg_html'] = $msg;
                $data['subject'] = 'กู้รหัสผ่าน';
                // echo json_encode($data);exit;
                $check_mail = $this->mail($data);
                if($check_mail[0] == 'mail_success'):
                    echo json_encode('success');
                else:
                    // echo "<pre>";print_r($check_mail);exit;
                    echo json_encode('mail_fail');
                endif;
            else:
                echo json_encode('fail');
            endif;
        else:
            $this->set_page('forget');
        endif;
    }
    public function send_confirm_mail()
    {
        // echo json_encode(array('1111'));exit;
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
                <a href="'.$this->base_url().'login/confirm_account/'.base64_encode($_POST['mail']).'"  style="'.$style.'">คลิกที่นี่เพื่อยืนยันตัวตน</a>
                </div>
            </div>
        </div>';
        $data['mail'] = $_POST['mail'];
        $data['msg_html'] = $msg;
        $data['subject'] = 'ยันยืนตัวตน';
        // echo json_encode($data);exit;
        $check_mail = $this->mail($data);
        if($check_mail[0] == 'mail_success'):
            echo json_encode('send_mail_success');
        else:
            echo json_encode('send_mail_fail');
        endif;
        // echo "<pre>";print_r($_POST);exit;
    }
    public function confirm_account($value)
    {
        if(isset($value) && !empty($value)):
            $con['where'] = 'member_email = "'.base64_decode($value).'" AND member_status = 2';
            $check_mail = $this->cus->select($con);
            unset($con);
            $check_mail = count($check_mail);

            $_SESSION['check_swal_mail'] = 1;

            if($check_mail == 1):
                $con['where'] = 'member_email = "'.base64_decode($value).'"';
                $con['data'] = array(
                    'member_status' => 0
                );
                $this->cus->update($con);
                unset($con);

                // $this->set_page('confirm_mail');
                $url = 'login/index/'.$value;
                $this->redirect($url);
            else:
                $url = 'login/index/'.$value.'/confirmed';
                $this->redirect($url);
            endif;
        endif;
    }
    public function logout()
    {
        unset($_SESSION['member']);
        $url = isset($_POST['url']) && !empty($_POST['url'])? $_POST['url'] : 'login';
        $this->redirect($url);
    }
}
 ?>
