<?php /**
 *
 */
class Admin extends Core_controller
{
    function __construct()
    {
        parent::__construct();
        $this->admin = $this->model('Admin_model');
        if(isset($_SESSION['admin'])):
            // if(isset($_GET['url'])):
            //     if($_GET['url'] == 'admin/index' or $_GET['url'] == 'admin/' or $_GET['url'] == 'admin'):
            //         $this->redirect('admin/issue_list'); //กรณีอยู่หน้า index แบบ Url
            //     endif;
            // else:
            //     $this->redirect('admin/issue_list'); //กรณีอยู่หน้า index แบบ routes default
            // endif;
        else:
            if(isset($_GET['url'])): //เพื่อให้สามารถใช้ function login ได้
                if($_GET['url'] != 'admin/check_login'):
                    if($_GET['url'] != 'admin/login'):
                        $this->redirect('admin/login');
                    endif;
                endif;
            endif;
        endif;
    }
    public function index($value='')
    {
        $this->set_page('admin/management');
    }
    public function login($value='')
    {
        if(!isset($_SESSION['admin'])):
            $this->set_page('admin/login');
        else:
            $this->redirect('admin/');
        endif;
    }
    public function check_login($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        if(isset($_SESSION['admin'])):
            echo json_encode(array('isset'));
        else:
            if(isset($_POST['username']) and !empty($_POST['username'])):
                $con['table'] = 'tb_user';
                $con['where'] = 'login_user = "'.$_POST['username'].'" AND new_login_pass = "'.$_POST['password'].'" AND division = "IT"';
                $data = $this->admin->select($con);
                if ($data == true):
                    $_SESSION['admin'] = $data[0];
                    echo json_encode(array('success'));
                else:
                    echo json_encode(array('fail'));
                endif;
            else:
                //validate input
                echo json_encode(array('isset'));
            endif;
        endif;
    }
    public function equipment_list($value='')
    {
        $this->set_page('admin/equipment_list');
    }
    public function equipment_list_ajax($value='')
    {
        $con['table'] = 'tb_equipment';
        $data = $this->admin->select($con);
        unset($con);
        if(count($data) > 0):
            if(isset($_POST['type']) and $_POST['type'] == 'num'):
                $data = count($data);
            endif;
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function add_equipment($value='')
    {
        $data = $_POST;
        $data['eq_type'] = $data['eq_id'];
        $data['eq_windows'] = $data['eq_windows'].' '.$data['windows_bit'];
        unset($data['windows_bit']);
        $data['eq_product'] = $data['eq_product_name'];
        unset($data['eq_product_name']);
        $con['table'] = 'tb_equipment';
        $con['data'] = $data;
        $this->admin->insert($con);
        unset($con);

        $con['table'] = 'tb_equipment';
        $con['where'] = 'eq_serial_no = "'.$data['eq_serial_no'].'"';
        $check_insert = $this->admin->select($con);
        unset($con);

        if(count($check_insert) > 0):
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;
    }
    public function issue_list($value='')
    {
        $this->set_page('admin/issue_list');
    }
    public function issue_list_ajax($value='')
    {
        $con['table'] = 'tb_issue';
        $con['order_by'] = 'issue_id DESC';
        $data = $this->admin->select($con);
        unset($con);

        $con['table'] = 'tb_user';
        $con['select'] = 'division_th,first_name';
        if(count($data) > 0 ):
            foreach ($data as $key => $value):
                $con['where'] = 'user_id = "'.$value->issue_owner.'"';
                $user_data = $this->admin->select($con);
                $value->topic_issue = $user_data[0]->first_name.'  '.$user_data[0]->division_th;

                $value->issue_id = $this->encode($data[$key]->issue_id);
                $value->issue_date_th = $this->date_th($value->issue_date,1);
                $value->issue_content = str_replace('|path_url|',$this->public_url(),$value->issue_content);
                if(strpos($value->issue_status,'/') !== false):
                    $expolde_issue_status = explode('/',$value->issue_status);
                    $value->issue_stauts = $expolde_issue_status[0];
                endif;
            endforeach;
            unset($con);
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update_issue($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            switch ($_POST['type']):
                case 'check': //type = check หมายความว่าแค่เข้ามาตวรจสอบปัญหา
                    $con['data'] = array(
                        'issue_status' => 'info' // หมายความว่าได้เปิดูปัญหานี้แล้ว
                    );
                    break;
                case 'cancel': //type = cancel หมายความว่าปัญหานี้ถูก ยกเลิกสถานะ success
                    $con['data'] = array(
                        'issue_status' => 'info',
                        'issue_success' => date('Y-m-d H:i:s')
                    );
                    break;
                case 'completed': //type = completed หมายความว่าปัญหานี้ถูกแก้ไขแล้ว
                    $con['data'] = array(
                        'issue_status' => 'success',  // หมายความว่าได้แก้ไขปัญหานี้แล้ว
                        'issue_success' => date('Y-m-d H:i:s')
                    );
                    break;
                default:
                    // code...
                    break;
            endswitch;
            $id = $this->decode($_POST['id']);
            $issue_status = $con['data']['issue_status'];
            $con['table'] = 'tb_issue';
            $con['where'] = 'issue_id = "'.$id.'"';

            $this->admin->update($con);
            unset($con);

            $con['table'] = 'tb_issue';
            $con['where'] = 'issue_id = "'.$id.'" AND issue_status = "'.$issue_status.'"';
            $check_insert = $this->admin->select($con);
            if(count($check_insert) > 0):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    public function test_image($value='')
    {
        $this->set_page('admin/test');
    }
    public function logout($value='')
    {
        unset($_SESSION['admin']);
        $this->redirect('admin');
    }
    public function FunctionName($value='')
    {
        // code...
        // Windows 10 Pro 64 bit
        // Windows 10 Pro 32 bit
        // Windows 10 Home 64 bit
        //
        // Windows 8 Single Languages
        // Windows 8.1 Single Languages
        //
        // Windows 7 Pro 64 bit
        // Windows 7 Pro 32 bit
        // Windows 7 Home 32 bit
        //
        // Office Pro Plus 2019
        // Office Pro Plus 2016
        // Office Pro Plus 2013
        // Office Enterprise 2007
        //
        // 'INSERT INTO tb_equipment (eq_product,eq_model,eq_detail,eq_serial_no,eq_windows,eq_office,eq_product_key,eq_computer_name,eq_user,eq_department)VALUES
        // ("Product","Model","Detail","Serail","Windows","Office","windows_Key","ComName","User","Department");


    }
}
 ?>
