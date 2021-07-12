<?php /**
 *
 */
class Daily_report extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->dr = $this->model('Daily_report_model');
    }
    public function add($value='')
    {
        $con['data'] = array(
            'd_owner' => $_SESSION['user']->user_id,
            'd_detail' => str_replace($this->public_url(),'|path_url|',$_POST['d_detail']),
            'd_date' => date('Y-m-d H:i:s')
        );
        $data = $this->dr->insert($con);
        unset($con);
        if($data === true):
            $con['where'] = 'd_owner = "'.$_SESSION['user']->user_id.'"';
            $con['order_by'] = 'd_id DESC';
            $con['limit'] = '1';
            $data = $this->dr->select($con);
            unset($con);
            $data[0]->d_topic = $_SESSION['user']->first_name.'  '.$_SESSION['user']->division_th;
            $data[0]->d_id = $this->encode($data[0]->d_id);
            $data[0]->daycolor = $this->get_daycolor($data[0]->d_date);
            $data[0]->d_date_th = $this->date_th($data[0]->d_date,3);
            $data[0]->d_detail = str_replace('|path_url|',$this->public_url(),$data[0]->d_detail);

            echo json_encode(array('success',$data[0]));
        else:
            echo json_encode('fail');
        endif;
    }
    public function list($value='')
    {
        if(empty($_SESSION['user']->head)):
            $con['table'] = 'tb_daily_report';
            $con['order_by'] = 'd_id DESC';
            $data = $this->dr->select($con);
            unset($con);
            $con['table'] = 'tb_user';
            $con['select'] = 'division_th,first_name';
            if(count($data) > 0 ):
                foreach ($data as $key => $value):
                    $con['where'] = 'user_id = "'.$value->d_owner.'"';
                    $user_data = $this->dr->select($con);
                    $value->d_topic = $user_data[0]->first_name.'  '.$user_data[0]->division_th;
                    $value->d_id = $this->encode($data[$key]->d_id);
                    $value->daycolor = $this->get_daycolor($value->d_date);
                    $value->d_date_th = $this->date_th($value->d_date,3);
                    $value->d_detail = str_replace('|path_url|',$this->public_url(),$value->d_detail);
                endforeach;
                unset($con);
                $user_status = 'head';
                echo json_encode(array('success',$data,$user_status));
            else:
                echo json_encode(array('fail'));
            endif;
        else:
            $con['table'] = 'tb_daily_report';
            $con['where'] = 'd_owner  = "'.$_SESSION['user']->user_id.'"';
            $con['order_by'] = 'd_id DESC';
            $data = $this->dr->select($con);
            unset($con);

            if(count($data) > 0 ):
                foreach ($data as $key => $value):
                    $value->d_topic = $_SESSION['user']->first_name.'  '.$_SESSION['user']->division_th;
                    $value->d_id = $this->encode($data[$key]->d_id);
                    $value->daycolor = $this->get_daycolor($value->d_date);
                    $value->d_date_th = $this->date_th($value->d_date,3);
                    $value->d_detail = str_replace('|path_url|',$this->public_url(),$value->d_detail);
                endforeach;
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function update($value='')
    {
        $con['table'] = 'tb_daily_report';
        $con['select'] = 'd_detail';
        $con['where'] = 'd_id = "'.$this->decode($_POST['d_id']).'"';
        $data = $this->dr->select($con);
        unset($con);
        if(count($data) > 0):
            $new_d_detail = $_POST['d_detail'];
            if(strpos($this->public_url(),$_POST['d_detail']) !== false):
                $new_d_detail = str_replace($this->public_url(),'|path_url|',$_POST['d_detail']);
            endif;
            $con['table'] = 'tb_daily_report';
            $con['where'] = 'd_id = "'.$this->decode($_POST['d_id']).'"';
            $con['data'] = array(
                'd_history' => $_POST['d_detail'].'<==>',
                'd_detail' => $new_d_detail
            );
            $update = $this->dr->update($con);
            echo json_encode(array('success'));
        else:
            echo json_encode(array('fail','ไม่มีข้อมูลการแจ้งปัญหามาก่อน'));
        endif;
    }
    public function upload_image($value='')
    {
        $data['upload_path'] = '../it_support/public/file/images/daily_report/' ;
        $data['file'] = $_FILES;
        // $data['new_size'] = '1920/1080';
        // $data['new_size'] = '1366';
        $data['suffix'] = 'daily_report'; // ต่อท้ายชื่อรูปภาพ
        $data['path_image'] = $this->public_url();
        $path = $this->image_upload($data);
        echo $path[0];
    }
    public function check_record($value='')
    {
        if(isset($_POST['d_id']) and !empty($_POST['d_id'])):
            if($_SESSION['user']->level_id > 8):
                $con['table'] = 'tb_daily_report';
                $con['where'] = 'd_id = "'.$this->decode($_POST['d_id']).'"';
                $con['data'] = array(
                    'd_status' => 'read'
                );
                $this->dr->update($con);
            endif;
        endif;
    }
    public function summernote($value='')
    {
        $this->view('partail/summernote');
    }
    private function get_daycolor($strDate)
    {
        $date = explode(' ',$strDate);
        $dayOfWeek = date("l", strtotime($date[0]));
        $strDayName = Array('Monday'=>'warning','Tuesday'=>'#f997e9','Wednesday'=>'success','Thursday'=>'#ef4224','Friday'=>'info','Saturday'=>'primary','Sunday'=>'danger',);
        return $strDayName[$dayOfWeek];

    }
}
 ?>
