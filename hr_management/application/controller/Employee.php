<?php /**
 *
 */
class Employee extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->emp = $this->model('Employee_model');
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'employee/index' && $url != 'employee/check_login'):
                if(!isset($_SESSION['emp']) || empty($_SESSION['emp'])):
                    $this->set_page('employee/login');exit;
                endif;
            endif;
        endif;

    }
    public function index($value='')
    {
        $this->set_page('employee/Login');
    }
    public function check_login($value='')
    {
        if(isset($_POST['username']) && !empty($_POST['username'])):
            $con['where'] = 'emp_user = "'.$_POST['username'].'" AND emp_pass = "'.$_POST['password'].'"';
            $data = $this->emp->select($con);
            unset($con);
            if(count($data) > 0):
                $_SESSION['emp'] = $data[0];
                echo json_encode('success');
                $con['table'] = 'tb_log';
                $con['data'] = array(
                    'user_id' => $_SESSION['emp'] ->emp_id,
                    'status' => 'employee',
                );
                $this->emp->insert($con);
                unset($con);
            else:
                echo json_encode('fail');
            endif;
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
        $con['where'] = 'user_id = "'.$_SESSION['emp']->emp_id.'" AND (DATE(date_time) >= "'.$_POST['start_date'].'" AND DATE(date_time) <= "'.$_POST['end_date'].'")';
        $log = $this->emp->select($con);
        unset($con);

        $con['table'] = 'tb_file';
        $con['where'] = '(owner = "'.$_SESSION['emp']->emp_id.'" AND status = 0) AND (DATE(date) >= "'.$_POST['start_date'].'" AND DATE(date) <= "'.$_POST['end_date'].'")';
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


                if(strpos($value->refer,$_SESSION['emp']->emp_id) !== false):
                    $conclude['referenced']++;
                endif;
                if($value->owner == $_SESSION['emp']->emp_id):
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
    public function edit_profile($value='')
    {
        if(isset($_FILES) && count($_FILES) > 0 ):
            $last_name = explode(".", $_FILES["userfile"]["name"]);
            $file_name = round(microtime(true)) . '.' . end($last_name);
            $image_name = '../hr_management/public/file/images/employee/'.$file_name;
            move_uploaded_file($_FILES['userfile']['tmp_name'],$image_name);
            $path = $this->public_url('file/images/employee/').$file_name;
            $con['data']['emp_img'] = $path;
        endif;
        if(isset($_POST) && count($_POST) > 0):
            if(isset($_POST['password']) && !empty($_POST['password'])):
                $con['data']['emp_pass'] = $_POST['password'];
            endif;
            $con['data']['emp_name'] = $_POST['name'];
            $con['where'] = 'emp_id = "'.$_SESSION['emp']->emp_id.'"';
            $update = $this->emp->update($con);
            unset($con);
            if($update != false):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
        // echo "<pre>";print_r(count($_FILES));
        // echo "<pre>";print_r($_POST);exit;

    }
    public function profile($value='')
    {
        $this->set_page('employee/profile');
    }
    public function schedule()
    {
        $this->set_page('employee/schedule');
    }
    public function schedule_detail($value='')
    {
        $this->set_page('employee/schedule_detail');
    }
    public function add_training($value='')
    {
        if(strpos($_POST['link'],'&') !== false):
            $exp = explode('&',$_POST['link']);
            $exp = explode('v=',$exp[0]);
            $link = $exp[1];
        else:
            $exp = explode('v=',$_POST['link']);
            $link = $exp[1];
        endif;
        $con['table'] = 'tb_training';
        $con['data'] = array(
            'link' => $link,
            'cate' => $_POST['dpm']
        );
        $insert = $this->emp->insert($con);
        if($insert != false):
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;
    }
    public function list_training($value='')
    {
        // code...
        $con['table'] = 'tb_training';
        $data = $this->emp->select($con);
        echo json_encode($data);
    }
    public function training($value='')
    {
        $this->set_page('employee/training');
    }
    public function list_department($value='')
    {
        $con['table'] = 'tb_department';
        $department = $this->emp->select($con);
        unset($con);

        echo json_encode($department);
    }
    public function view_all_noti($value='')
    {
        $this->set_page('employee/notification');
    }
    public function notification($value='')
    {
        $con['table'] ='tb_schedule';
        $con['where'] = '(refer LIKE "%'.$_SESSION['emp']->emp_id.'%" OR refer = "") AND (owner != "'.$_SESSION['emp']->emp_id.'")';
        $con['order_by'] = 'id DESC';
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            foreach ($data as $key => $value):
                $exp = explode(' ',$value->posted);
                $date = $exp[0];
                $currentDateTime = $exp[1];
                $time = date('h:i A', strtotime($currentDateTime));
                $timestamp = strtotime($date);
                $day = date('D', $timestamp);
                $value->date = $value->posted;
                $value->posted = $day.','.$this->date_en($date,2).' at '.$time;
            endforeach;

            echo json_encode(array('success',$data));
        else:
            echo json_encode('empty');
        endif;
    }
    public function check_schedule($value='')
    {
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['table'] = 'tb_schedule';
            $con['where'] = 'id = "'.$_POST['id'].'" AND owner = "'.$_SESSION['emp']->emp_id.'"';
            $data  = $this->emp->select($con);
            unset($con);
            if(count($data) > 0):
                echo json_encode('success');exit;
            else:
                echo json_encode('fail');exit;
            endif;
        endif;
    }
    public function cancel_file($value='')
    {
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['table'] = 'tb_file';
            $con['where'] = 'id = "'.$_POST['id'].'"';
            $con['data'] = array(
                'status' => 1
            );
            $delete = $this->emp->update($con);
            unset($con);
            if($delete != false):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    public function submit($value='')
    {
        // code...
        if(isset($_POST['type']) && !empty($_POST['type'])):
            $con['table'] = 'tb_schedule';
            $con['where'] = 'id = "'.$_POST['id'].'" AND end_date >= "'.date('Y-m-d H:i:s').'"';
            $data = $this->emp->select($con);
            unset($con);
            $time = 'On time';
            if (count($data) < 1):
                $time = 'Late';
            endif;
            $date = date('Y-m-d H:i:s');

            switch ($_POST['type']):
                case 'file':
                    $last_name = explode(".", $_FILES["userfile"]["name"]);
                    $file_name = round(microtime(true)) . '.' . end($last_name);

                    $image_name = '../hr_management/public/file/submit/'.$file_name;
                    move_uploaded_file($_FILES['userfile']['tmp_name'],$image_name);
                    $path = $this->public_url('file/submit/').$file_name;

                    $con['table'] = 'tb_file';
                    $con['data'] = array(
                        'path' => $path,
                        'schedule_id' => $_POST['id'],
                        'type' => $_POST['type'],
                        'date' => $date,
                        'time' => $time,
                        'owner' => $_SESSION['emp']->emp_id
                    );
                    $insert = $this->emp->insert($con);
                    unset($con);
                    if($insert != false):
                        echo json_encode('success');
                    endif;


                    break;
                case 'summernote':
                    $con['table'] = 'tb_file';
                    $con['data'] = array(
                        'path' => $_POST['summernote'],
                        'schedule_id' => $_POST['id'],
                        'type' => $_POST['type'],
                        'date' => $date,
                        'time' => $time,
                        'owner' => $_SESSION['emp']->emp_id
                    );
                    if(isset($_POST['method']) && !empty($_POST['method'])):
                        $con['data'] = array(
                            'path' => $_POST['summernote'],
                            'edit_date' => $date,
                        );
                        $con['where'] = 'id = "'.$_POST['file_id'].'"';
                        $insert = $this->emp->update($con);
                    else:
                        $insert = $this->emp->insert($con);
                    endif;
                    unset($con);
                    if($insert != false):
                        echo json_encode('success');
                    endif;
                    break;

                default:
                    // code...
                    break;
            endswitch;
        endif;

    }
    public function list_file($value='')
    {
        $con['table'] = 'tb_file';
        if(isset($_POST['file_id']) && !empty($_POST['file_id'])):
            $con['where'] = 'id = "'.$_POST['file_id'].'"';
        else:
            $con['where'] = 'schedule_id = "'.$_POST['id'].'" AND (owner = "'.$_SESSION['emp']->emp_id.'" AND status = 0)';
        endif;
        $con['order_by'] = 'id DESC';
        $data = $this->emp->select($con);

        if(count($data) > 0):
            foreach ($data as $key => $value):
                $exp = explode(' ',$value->date);
                $date = $exp[0];
                $currentDateTime = $exp[1];
                $time = date('h:i A', strtotime($currentDateTime));
                $timestamp = strtotime($date);
                $day = date('D', $timestamp);
                $value->date = $day.','.$this->date_en($date,2).' at '.$time;
            endforeach;

            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('empty'));
        endif;
    }
    public function upload_image($value='')
    {
        $last_name = explode(".", $_FILES["file"]["name"]);
        $file_name = round(microtime(true)) . '.' . end($last_name);

        $image_name = '../hr_management/public/file/images/schedule/'.$file_name;
        move_uploaded_file($_FILES['file']['tmp_name'],$image_name);
        echo $this->public_url('file/images/schedule/').$file_name;
    }
    public function create_event($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        $end_date = '';
        $end_date = !empty($_POST['end_date']) && !empty($_POST['end_time'])? $_POST['end_date'].'T'.$_POST['end_time']: '';
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
            'owner' => $_SESSION['emp']->emp_id,

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
            $insert = $this->emp->insert($con);
        endif;
        unset($con);
        echo json_encode('success');

    }
    public function data_schedule($value='')
    {
        $con['table'] = 'tb_schedule';
        $con['where'] = 'title != "" AND (refer LIKE "%'.$_SESSION['emp']->emp_id.'%" OR refer = "")';
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['where'] = 'id = "'.$_POST['id'].'"';

            $noti['table'] = 'tb_schedule';
            $noti['where'] = 'id = "'.$_POST['id'].'"';
            $data_noti = $this->emp->select($noti);
            unset($noti);
            if(empty($data_noti[0]->seen)):
                $exp_seen = $_SESSION['emp']->emp_id;
            elseif(!empty($data_noti[0]->seen)):
                if(strpos($data_noti[0]->seen,$_SESSION['emp']->emp_id) !== false):
                    $exp_seen = $data_noti[0]->seen;
                else:
                    if(strpos($data_noti[0]->seen,',') !== false):
                        $exp_seen = explode(',',$data_noti[0]->seen);
                        array_push($exp_seen,$_SESSION['emp']->emp_id);
                        $exp_seen = implode(',',$exp_seen);
                    else:
                        $exp_seen = $data_noti[0]->seen.','.$_SESSION['emp']->emp_id;
                    endif;
                endif;
            endif;
            // echo "$exp_seen";exit;
            $noti['table'] = 'tb_schedule';
            $noti['where'] = 'id = "'.$_POST['id'].'"';
            $noti['data'] = array(
                'seen' => $exp_seen
            );
            $this->emp->update($noti);
            unset($noti);
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
                $schedule[$key]['owner'] = $value->owner;
                if($value->owner == $_SESSION['emp']->emp_id):
                    $schedule[$key]['color'] = '#51cbce';
                endif;
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
            echo json_encode($schedule);exit;
        else:
            echo json_encode('fail');exit;
        endif;

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
    public function log_out($value='')
    {
        if(isset($_SESSION['emp'])):
            unset($_SESSION['emp']);
            $this->redirect('employee');
        else:
            $this->redirect('employee');
        endif;

    }
    public function test_data($value='')
    {
        $this->set_page('employee/test');

    }
    public function __destruct()
    {
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'employee/index' && $url != 'employee/check_login'):
                if(!isset($_SESSION['emp']) || empty($_SESSION['emp'])):
                    $this->set_page('employee/login');exit;
                endif;
            endif;
        endif;
    }

}
 ?>
