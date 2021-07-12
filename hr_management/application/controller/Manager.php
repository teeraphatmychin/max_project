<?php /**
 *
 */
class Manager extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->emp = $this->model('Employee_model');
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'manager/index' && $url != 'manager/check_login'):
                if(!isset($_SESSION['manager']) || empty($_SESSION['manager'])):
                    $this->set_page('manager/login');exit;
                endif;
            endif;
        else:
            if(isset($_SESSION['manager']) || !empty($_SESSION['manager'])):
                $this->redirect('manager/schedule');exit;
            endif;
        endif;
    }
    // function read_docx($filename=''){
    //     $filename = '../hr_management/public/file/แบบประเมินความพึงพอใจของผู้เชี่ยวชาญ.docx';
    //     $striped_content = '';
    //     $content = '';
    //
    //     if(!$filename || !file_exists($filename)) return false;
    //
    //     $zip = zip_open($filename);
    //     if (!$zip || is_numeric($zip)) return false;
    //
    //     while ($zip_entry = zip_read($zip)) {
    //
    //         if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
    //
    //         if (zip_entry_name($zip_entry) != "word/document.xml") continue;
    //
    //         $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
    //
    //         zip_entry_close($zip_entry);
    //     }
    //     zip_close($zip);
    //     $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    //     $content = str_replace('</w:r></w:p>', "\r\n", $content);
    //     $striped_content = strip_tags($content);
    //
    //     return $striped_content;
    // }
    public function index($value='')
    {
        $this->set_page('manager/Login');
    }
    public function check_login($value='')
    {
        if(isset($_POST['username']) && !empty($_POST['username'])):
            $con['table'] = 'tb_manager';
            $con['where'] = 'username = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"';
            $data = $this->emp->select($con);
            unset($con);
            if(count($data) > 0):
                $_SESSION['manager'] = $data[0];
                echo json_encode('success');
                $con['table'] = 'tb_log';
                $con['data'] = array(
                    'user_id' => $_SESSION['manager']->id,
                    'status' => $_SESSION['manager']->status,
                );
                $this->emp->insert($con);
                unset($con);
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    // public function notification($value='')
    // {
    //     $this->set_page('manager/notification');
    // }
    public function add_department($value='')
    {
        // code...
        // echo "<pre>";print_r($_POST);exit;
        $con['table'] = 'tb_department';
        $con['select'] = 'MAX(id) AS max_id';
        $dpm = $this->emp->select($con);
        unset($con);
        if(count($dpm) > 0):
            $max_id = intval($dpm[0]->max_id + 1);
            if(strlen($max_id) == 1):
                $max_id = '0'.$max_id;
            endif;
        else:
            $max_id = '01';
        endif;



        $con['table'] = 'tb_department';
        $con['data'] = array(
            'id' => $max_id,
            'dpm_initials_name' => $_POST['initials'],
            'dpm_full_name' => $_POST['full'],
        );
        $insert = $this->emp->insert($con);
        if($insert != false):
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;

    }
    public function employee_detail_ajax($value='')
    {
        // get data emp
        // get log
        if(isset($_POST['emp_id']) && !empty($_POST['emp_id'])):
            $con['where'] = 'emp_id = "'.$_POST['emp_id'].'"';
            $emp = $this->emp->select($con);
            unset($con);
            $emp = $emp[0];


            $con['table'] = 'tb_department';
            $con['where'] = 'id = "'.$emp->emp_department.'"';
            $department = $this->emp->select($con);
            unset($con);

            $emp->emp_department = $department[0]->dpm_full_name;

            if(count((array)$emp) > 0):
                echo json_encode(array('success',$emp));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function add_employee($value='')
    {
        //get department
        $con['table'] = 'tb_department';
        $con['where'] = 'id = "'.$_POST['department'].'"';
        $dpm = $this->emp->select($con);
        unset($con);
        $dpm = $dpm[0];

        // get max id
        $con['table'] = 'tb_employee';
        $con['select'] = 'MAX(emp_id) AS max_id';
        $emp = $this->emp->select($con);
        unset($con);
        if(count($emp) > 0):
            $max_id = intval($emp[0]->max_id + 1);
            if(strlen($max_id) == 1):
                $max_id = '0'.$max_id;
            endif;
        else:
            $max_id = '01';
        endif;
        // get emp_user
        $emp_user = $dpm->dpm_initials_name.$max_id.date('my');

        //get password
        $emp_pass = '123456';

        // upload file
        $emp_img = '';
        if(count($_FILES) > 0):
            $floder = 'file/images/employee/';
            $path = '../hr_management/public/'.$floder;
            $last_name = explode(".", $_FILES["userfile"]["name"]);
            $file_name = round(microtime(true)) . '.' .end($last_name);
            $image_name = $path.$file_name;
            move_uploaded_file($_FILES['userfile']['tmp_name'],$image_name);
            $emp_img = $this->public_url($floder).$file_name;
        endif;



        $con['table'] = 'tb_employee';
        $con['data'] = array(
            'emp_id' => $max_id,
            'emp_user' => $emp_user,
            'emp_pass' => $emp_pass,
            'emp_name' => $_POST['first_name'].' '.$_POST['last_name'],
            'emp_department' => $dpm->id,
            'emp_img' => $emp_img,
        );
        $insert = $this->emp->insert($con);
        unset($con);
        if($inset != false):
            echo json_encode('success');exit;
        else:
            echo json_encode('fail');exit;
        endif;

    }
    public function employee_report($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        $conclude = array(
            'login' => 0, //
            'posted' => 0, //
            'referenced' => 0, //
            'submission' => 0, //
            'ontime' => 0,//
            'late' => 0,//
        );
        // $detail_work = array(
        //     'login' => array(),
        //     'submission' => array(),
        // );
        $con['table'] = 'tb_log';
        $con['where'] = 'user_id = "'.$_POST['emp_id'].'" AND (DATE(date_time) >= "'.$_POST['start_date'].'" AND DATE(date_time) <= "'.$_POST['end_date'].'")';
        $log = $this->emp->select($con);
        unset($con);

        $con['table'] = 'tb_file';
        $con['where'] = '(owner = "'.$_POST['emp_id'].'" AND status = 0) AND (DATE(date) >= "'.$_POST['start_date'].'" AND DATE(date) <= "'.$_POST['end_date'].'")';
        $file = $this->emp->select($con);
        unset($con);

        $con['table'] = 'tb_schedule';
        $con['where'] = 'title != "" AND (DATE(posted) >= "'.$_POST['start_date'].'" AND DATE(posted) <= "'.$_POST['end_date'].'")';
        $schedule = $this->emp->select($con);
        unset($con);

        $conclude['submission'] = count($file);
        $conclude['login'] = count($log);

        if(count($schedule) > 0):
            foreach ($schedule as $key => $value) :
                $exp = explode(' ',$value->posted);
                $date = $exp[0];
                $currentDateTime = $exp[1];
                $time = date('h:i A', strtotime($currentDateTime));
                $timestamp = strtotime($date);
                $day = date('D', $timestamp);
                $value->date_format = $day.','.$this->date_en($date,2).' at '.$time;


                if(strpos($value->refer,$_POST['emp_id']) !== false):
                    $conclude['referenced']++;
                endif;
                if($value->owner == $_POST['emp_id']):
                    $conclude['posted']++;
                endif;

            endforeach;
        endif;

        if(count($file) > 0):
            foreach ($file as $key_file => $value_file):
                foreach ($schedule as $k => $v):
                    if($value_file->schedule_id == $v->id && $v->id != ''):
                        $exp = explode(' ',$value_file->date);
                        $date = $exp[0];
                        $currentDateTime = $exp[1];
                        $time = date('h:i A', strtotime($currentDateTime));
                        $timestamp = strtotime($date);
                        $day = date('D', $timestamp);
                        // $value_file->date = $value_file->posted;
                        $value_file->date_format = $day.','.$this->date_en($date,2).' at '.$time;

                        if($value_file->time == 'On time'):
                            $conclude['ontime']++;
                        endif;
                        if($value_file->time == 'Late'):
                            $conclude['late']++;
                        endif;
                    endif;
                endforeach;
            endforeach;
        endif;
        if(count($log) > 0):
            foreach ($log as $key_log => $value_log):
                $exp = explode(' ',$value_log->date_time);
                $date = $exp[0];
                $currentDateTime = $exp[1];
                $time = date('h:i A', strtotime($currentDateTime));
                $timestamp = strtotime($date);
                $day = date('D', $timestamp);
                $value_log->date_format = $day.','.$this->date_en($date,2).' at '.$time;
            endforeach;
        endif;

        echo json_encode(array($conclude,$file,$log,$schedule));



    }
    public function manage_employee($value='')
    {
        $this->set_page('manager/manage_employee');
    }
    public function test($value='')
    {
        $this->set_page('manager/user');
    }
    public function profile($value='')
    {
        $this->set_page('manager/profile');
    }
    public function schedule_detail($value='')
    {
        $this->set_page('manager/schedule_detail');
    }
    public function delete_event($value='')
    {
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['table'] = 'tb_schedule';
            $con['where'] = 'id = "'.$_POST['id'].'"';
            $con['data'] = array('title' => '');
            $delete = $this->emp->update($con);
            unset($con);
            if($delete != false):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    public function create_event($value='')
    {
        $end_date = '';
        $end_date = !empty($_POST['end_date']) && !empty($_POST['end_time'])? $_POST['end_date'].' '.$_POST['end_time']: '';
        if(empty($end_date)):
            $end_date = !empty($_POST['end_date']) && empty($_POST['end_time'])? $_POST['end_date']: '';
        endif;
        $start_date = !empty($_POST['start_date']) && !empty($_POST['start_time'])? $_POST['start_date'].'T'.$_POST['start_time']: '';
        if(empty($start_date)):
            $start_date = !empty($_POST['start_date']) && empty($_POST['start_time'])? $_POST['start_date']: '';
        endif;
        $con['table'] = 'tb_schedule';
        $con['data'] = array(
            'title' => $_POST['title'],
            'start_date' => $start_date,
            'end_date' => $end_date,
            'description' => $_POST['description'],
            'refer' => $_POST['refer'],
            'posted' => date('Y-m-d H:i:s'),
            'owner' => 'manager',

        );
        $con['table'] = 'tb_schedule';
        if(isset($_POST['type']) && !empty($_POST['type'])):
            switch ($_POST['type']) {
                case 'update':
                    $con['where'] = 'id = "'.$_POST['id'].'"';
                    $insert = $this->emp->update($con);
                    break;
                case 'delete':
                    $con['where'] = 'id = "'.$_POST['id'].'"';
                    $con['data'] = array(
                        'title' => '',
                    );
                    $insert = $this->emp->update($con);
                    break;
                default:
                    break;
            }
        else:
            // echo "<pre>";print_r($_POST);exit;
            $insert = $this->emp->insert($con);
        endif;
        unset($con);
        echo json_encode('success');

    }
    public function upload_image($value='')
    {
        $last_name = explode(".", $_FILES["file"]["name"]);
        $file_name = round(microtime(true)) . '.' . end($last_name);

        $image_name = '../hr_management/public/file/images/schedule/'.$file_name;
        move_uploaded_file($_FILES['file']['tmp_name'],$image_name);
        echo $this->public_url('file/images/schedule/').$file_name;
    }
    public function list_employee($value='')
    {
        if(isset($_POST['type']) && !empty($_POST['type'])):
        else:
            $con['where'] = 'emp_status != "disable"';
        endif;
        $con['order_by'] = 'emp_department ASC';
        $employee = $this->emp->select($con);
        unset($con);

        $con['table'] = 'tb_department';
        $department = $this->emp->select($con);
        unset($con);

        foreach ($employee as $key => $value):
            foreach ($department as $key_dep => $value_dep):
                if($value->emp_department == $value_dep->id):
                    $value->emp_department = $value_dep->dpm_full_name;
                endif;
            endforeach;
        endforeach;

        if(isset($_POST['dpm']) && !empty($_POST['dpm'])):
            echo json_encode(array('success',$department));
        else:
            if(count($employee) > 0):
                echo json_encode(array('success',$employee));
            else:
                echo json_encode(array('empty'));
            endif;
        endif;
    }
    public function data_schedule($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        $con['table'] = 'tb_schedule';
        $con['where'] = 'title != "" AND owner = "manager"';
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['where'] = 'id = "'.$_POST['id'].'"';
        endif;
        $data = $this->emp->select($con);
        unset($con);
        if($data != false):
            $schedule = array();
            foreach ($data as $key => $value):
                $schedule[$key]['id'] = $value->id;
                $schedule[$key]['title'] = $value->title;
                $schedule[$key]['start'] = $value->start_date;
                $schedule[$key]['end'] = str_replace(' ','T',$value->end_date);
                $schedule[$key]['detail'] = $value->description;
                $schedule[$key]['refer'] = $value->refer;
                $schedule[$key]['posted'] = $value->posted;
                if(isset($_POST['get_date_foemat']) && !empty($_POST['get_date_foemat'])):
                    if(!empty($schedule[$key]['end'])):
                        if(strpos($schedule[$key]['end'],'T')):
                            $exp = explode('T',$schedule[$key]['end']);
                            $date = $exp[0];
                            $currentDateTime = $exp[1];
                            $time = date('h:i A', strtotime($currentDateTime));
                        else:
                            $date = $schedule[$key]['end'];
                            $time = '00:00 AM';
                        endif;
                        $timestamp = strtotime($date);
                        $day = date('D', $timestamp);
                        $schedule[$key]['due'] = $day.','.$this->date_en($date,2).' at '.$time;
                    else:
                        $schedule[$key]['due'] = 'Indefinite';
                    endif;

                    // posted
                    $exp_posted = explode(' ',$schedule[$key]['posted']);
                    $date_posted = $exp_posted[0];
                    $timestamp_posted = strtotime($date_posted);
                    $day_posted = date('D', $timestamp_posted);
                    $currentDateTime_posted = $exp_posted[1];
                    $time_posted = date('h:i A', strtotime($currentDateTime_posted));
                    $schedule[$key]['posted'] = $day_posted.','.$this->date_en($date_posted,2).' at '.$time_posted;

                endif;
            endforeach;
        endif;
        echo json_encode($schedule);exit;

    }
    public function schedule()
    {
        $this->set_page('manager/schedule');
    }
    public function training($value='')
    {
        $this->set_page('manager/training');
    }

    public function test_data($value='')
    {
        $this->set_page('manager/test');

    }
    public function log_out($value='')
    {
        if(isset($_SESSION['manager'])):
            unset($_SESSION['manager']);
            $this->redirect('manager');
        else:
            $this->redirect('manager');
        endif;

    }
    public function __destruct()
    {
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'manager/index' && $url != 'manager/check_login'):
                if(!isset($_SESSION['manager']) || empty($_SESSION['manager'])):
                    $this->set_page('manager/login');exit;
                endif;
            endif;
        endif;
    }
}
 ?>
