<?php /**
 *
 */
class Admin extends Core_controller
{
    function __construct()
    {
        parent::__construct();
        $this->admin = $this->model('Admin_model');
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'admin/index' && $url != 'admin/check_login'):
                if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])):
                    $this->set_page('admin/check_login');exit;
                endif;
            endif;
        endif;




        $con['table'] = 'tb_staff';
        $con['select'] = 'staff_user,staff_check';
        $con['where'] = 'staff_status != "ลาออก"';
        $staff = $this->admin->select($con);
        unset($con);
        $con['table'] = 'tb_setting';
        $setting = $this->admin->select($con);
        unset($con);

        $con['table'] = 'tb_schedule';
        $con['select'] = 'start_date,end_date';
        $con['where'] = '(start_date LIKE "'.date('Y-m-d').'%" AND status = "1") AND title != ""';
        $schedule = $this->admin->select($con);
        unset($con);

        if(count($setting) > 0):
            $setting = $setting[0];
            if(strpos($setting->set_wage,'d') !== false):
                if($setting->set_end_time <= date('H:i')):
                    if(count($schedule) > 0):
                        $schedule = $schedule[0];
                        $start_date = explode('T',$schedule->start_date);
                        $between_date = 1;
                        if($schedule->end_date != ''):
                            $end_date = explode('T',$schedule->end_date);
                            $between_date = $this->DateDiff($start_date[0],$end_date[0]);
                        endif;
                        if($staff != false):
                            $holiday = array($start_date[0]);
                            $check_holiday = '';
                            for ($i=1; $i <= $between_date; $i++):
                                $this_date = date('Y-m-d',strtotime($start_date[0].' + '.$i.' days'));
                                array_push($holiday,$this_date);
                            endfor;
                            foreach ($holiday as $key_ho => $value_ho):
                                if($value_ho == date('Y-m-d')):
                                    $check_holiday = 'pass';
                                endif;
                            endforeach;
                            if($check_holiday == 'pass'):
                                foreach ($staff as $key => $value):
                                    if(strpos($value->staff_check,'checked') !== false):
                                        $checked = explode(',',$value->staff_check);
                                        if($checked[1] != date('Y-m-d')):
                                            $con['table'] = 'tb_working';
                                            $con['select'] = 'work_id,work_status';
                                            $con['where'] = '(staff_user = "'.$value->staff_user.'" AND DATE(work_date) = "'.date('Y-m-d').'") AND (work_status != "ทำงาน" AND work_status NOT LIKE "เลิกงาน%")';
                                            $work_id = $this->admin->select($con);
                                            unset($con);
                                            if(!empty($work_id)):
                                                if($work_id[0]->work_status != 'ขาดงาน'):
                                                    $con['table'] = 'tb_working';
                                                    $con['where'] = 'work_id = "'.$work_id[0]->work_id.'"';
                                                    $con['data'] = array(
                                                        'work_status' => 'ขาดงาน'
                                                    );
                                                    $insert = $this->admin->update($con);
                                                    unset($con);
                                                endif;
                                            else:
                                                $con['table'] = 'tb_working';
                                                $con['data'] = array(
                                                    'work_date' => date('Y-m-d H:i:s'),
                                                    'staff_user' => $value->staff_user,
                                                    'work_status' => 'ขาดงาน'
                                                );
                                                $insert = $this->admin->insert($con);
                                                unset($con);
                                            endif;
                                        endif;
                                    endif;
                                endforeach;
                            endif;
                        endif;
                    endif;
                else: //else schedule
                    if(date('H:i') >= $setting->set_end_time):
                        if($staff != false):
                            foreach ($staff as $key => $value):
                                if(strpos($value->staff_check,'checked') !== false):
                                    $checked = explode(',',$value->staff_check);
                                    if($checked[1] != date('Y-m-d')):
                                        $con['table'] = 'tb_working';
                                        $con['select'] = 'work_id,work_status';
                                        $con['where'] = '(staff_user = "'.$value->staff_user.'" AND DATE(work_date) = "'.date('Y-m-d').'") AND (work_status != "ทำงาน" AND work_status NOT LIKE "เลิกงาน%")';
                                        $work_id = $this->admin->select($con);
                                        unset($con);
                                        if(!empty($work_id)):
                                            if($work_id[0]->work_status != 'ขาดงาน'):
                                                $con['table'] = 'tb_working';
                                                $con['where'] = 'work_id = "'.$work_id[0]->work_id.'"';
                                                $con['data'] = array(
                                                    'work_status' => 'ขาดงาน'
                                                );
                                                $insert = $this->admin->update($con);
                                                unset($con);
                                            endif;
                                        else:
                                            $con['table'] = 'tb_working';
                                            $con['data'] = array(
                                                'work_date' => date('Y-m-d H:i:s'),
                                                'staff_user' => $value->staff_user,
                                                'work_status' => 'ขาดงาน'
                                            );
                                            $insert = $this->admin->insert($con);
                                            unset($con);
                                        endif;
                                    endif;
                                endif;
                            endforeach;
                        endif;
                    endif;
                endif;
            endif; //endif setting end time
        else:
            $url = explode('/',$_SERVER['REQUEST_URI']);
            if($url[3] != 'setting'):
                echo "<script>";
                echo 'if (window.confirm("มีบางอย่างผิดพลาด setting กรูณาตั้งค่าระบบ")){ ';
                echo 'window.location.href = "'.$this->base_url('admin/setting').'"';
                echo "}else{";
                echo 'window.location.href = "'.$this->base_url('admin/setting').'"';
                echo "}";
                echo "</script>";
            endif;
        endif; //endif setting
    }
    public function index($value='')
    {
        if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])):
            $this->set_page('admin/login');
        else:
            $this->redirect('admin/checkin');
        endif;
    }
    public function check_login($value='')
    {
        if(isset($_POST['username']) && !empty($_POST['username'])):
            $con['where'] = 'username = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"';
            $data = $this->admin->select($con);
            if(count((array)$data)>0):
                $_SESSION['admin'] = $data;
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function checkin($value='')
    {
        $this->set_page('admin/checkin');
    }
    public function list_checkin_ajax($value='')
    {
        $con['table'] = 'tb_staff';
        if(!isset($_POST['type']) && empty($_POST['type'])):
            $con['where'] = 'staff_status != "ลาออก"';
        endif;
        $con['order_by'] = 'staff_check ASC';
        $data['staff'] = $this->admin->select($con);
        unset($con);

        if(count($data['staff']) < 1):
            echo json_encode(array('fail'));exit;
        else:

            $con['table'] = 'tb_working';
            $con['select'] = 'work_ot,staff_user,work_date,work_wage';
            $con['where'] = 'DATE(work_date) = "'.date('Y-m-d').'"';
            $ot = $this->admin->select($con);
            unset($con);

            $con['table'] = 'tb_department';
            $department = $this->admin->select($con);
            unset($con);
            foreach ($data['staff'] as $key => $value):
                if(strpos($value->staff_check,'checked') !== false ):
                    $staff_check = explode(',',$value->staff_check);
                    if($staff_check[1] != date('Y-m-d')):
                        $value->staff_check = '0';
                    endif;
                endif;

                foreach ($department as $key_de => $value_de) :
                    if($value->staff_department == $value_de->dep_id):
                        $value->staff_department = $value_de->dep_name;
                    endif;
                endforeach;

                foreach ($ot as $key_ot => $value_ot):
                    if($value_ot->staff_user == $value->staff_user):
                        $explode_ot = explode('/',$value_ot->work_ot);
                        $value->ot = number_format(array_sum($explode_ot));
                    endif;
                    if($value_ot->staff_user == $value->staff_user):
                        $work_date = $this->date_th($value_ot->work_date,3);
                        $data['staff'][$key]->work_date = $work_date;
                        $value->work_wage = $value_ot->work_wage;
                    endif;
                endforeach;

            endforeach;
            // echo "<pre>";print_r($data['staff']);exit;
            echo json_encode(array('success',$data['staff']));exit;
        endif;
    }
    public function list_ot($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $con['table'] = 'tb_working';
            $con['select'] = 'work_ot';
            $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
            $ot = $this->admin->select($con);
            $ot = $ot[0]->work_ot;
            if(!empty($ot)):
                $expolde_ot = explode('/',$ot);
                if(isset($_POST['type']) && $_POST['type'] == 'data'):
                    echo json_encode(array('success',$expolde_ot));
                else:
                    foreach ($expolde_ot as $key => $value):
                        $expolde_ot[$key] = number_format($value);
                    endforeach;
                    echo json_encode(array('success',$expolde_ot));
                endif;
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function add_ot($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            // $ot = number_format($_POST['ot']);
            $ot = $_POST['ot'];
            $con['table'] = 'tb_working';
            $con['select'] = 'work_ot';
            $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
            $work_ot = $this->admin->select($con);
            $work_ot = $work_ot[0]->work_ot;
            if(!empty($work_ot) || $work_ot != 0):
                $work_ot = $work_ot.'/'.$ot;
            else:
                $work_ot = $ot;
            endif;
            $con['table'] = 'tb_working';
            $con['data'] = array(
                'work_ot' => $work_ot
            );
            $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
            $update = $this->admin->update($con);
            if($update != false):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    public function update_ot($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $ot = $_POST['ot'];
            // echo "<pre>";print_r($_POST);exit;
            unset($ot[$_POST['index_ot']]);
            $con['table'] = 'tb_working';
            $con['data'] = array(
                'work_ot' => implode('/',$ot)
            );
            $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
            $update = $this->admin->update($con);


        endif;
    }
    public function update_check_in($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            switch ($_POST['type']):
                case 'work_success':
                    $con['table'] = 'tb_setting';
                    $setting = $this->admin->select($con);
                    $setting = $setting[0];
                    unset($con);

                    $con['table'] = 'tb_working';
                    $con['select'] = 'work_id,work_status,work_date';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
                    $work = $this->admin->select($con);
                    $work = $work[0];
                    unset($con);

                    $now = date('H:i:s');
                    $get_wage = explode('/',$setting->set_wage);
                    $wage = 0;
                    if(strpos($setting->set_wage,'d') !== false): //daily
                        $wage = $get_wage[0];
                    else:// hourly
                        // $time_check_in = explode(' ',$work->work_date);
                        // $time = $this->diff2time($now,$time_check_in[1]);
                        // if($time != 'ตรงเวลา'):
                        //     if(strpos($time,'ชม') !== false):
                        //         $exp_time = explode(' ',$time);
                        //         if(strpos($exp_time[0],'.') !== false):
                        //             $sub_time = explode('.',$exp_time[0]);
                        //             if($sub_time[1] >= 50):
                        //                 $wage = $sub_time[0] + 1;
                        //             else:
                        //                 $wage = $sub_time[0];
                        //             endif;
                        //         else:
                        //             $wage = $exp_time[0];
                        //         endif;
                        //     elseif(strpos($time,'นาที') !== false):
                        //         $exp_time = explode(' ',$time);
                        //         if($exp_time[0] >= 50):
                        //             $wage = 1;
                        //         endif;
                        //     endif;
                        //     $wage = $wage * $get_wage[0];
                        // endif;
                    endif;
                    $con['table'] = 'tb_working';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
                    $con['data'] = array(
                        // 'work_wage' => $wage,
                        'work_status' => 'เลิกงาน/'.date('Y-m-d').' '.$now,
                    );
                    $update = $this->admin->update($con);
                    unset($con);

                    $con['table'] = 'tb_staff';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
                    $con['data'] = array(
                        'staff_check' => 0
                    );
                    $check_in = $this->admin->update($con);
                    unset($con);
                    echo json_encode('success');


                    break;
                case 'check_in':


                    $con['table'] = 'tb_setting';
                    $setting = $this->admin->select($con);
                    $setting = $setting[0];

                    $con['table'] = 'tb_working';
                    $con['select'] = 'work_id,work_status';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'" AND DATE(work_date) = "'.date('Y-m-d').'"';
                    $work_id = $this->admin->select($con);
                    unset($con);

                    $now = date('H:i:s');
                    $work_late = '';
                    if(strpos($setting->set_wage,'d') !== false):
                        if($setting->set_late_time < $now):
                            if(strpos($setting->set_deduct,'/') !== false):
                                $explode_deduct = explode('/',$setting->set_deduct);
                                if(strpos($setting->set_deduct,'.') !== false):
                                    $time = $this->diff2time($now,$setting->set_late_time);
                                    $exp_time = explode(' ',$time);
                                    $diff_time = floor($exp_time[0] / $explode_deduct[0]);
                                    $deduct = $diff_time * $explode_deduct[1];
                                else:
                                    $time = $this->diff2time($now,$setting->set_late_time);
                                    $exp_time = explode('.',$time);
                                    $deduct = $exp_time[0] * $explode_deduct[1];
                                endif;
                                $late = $setting->set_late_time;
                                $time_late = $this->diff2time($now,$late);
                                $work_late = '';
                                if ($time_late != 'ตรงเวลา'):
                                    $work_late = $deduct.'/'.$time_late;
                                endif;
                            else:
                                $late = $setting->set_late_time;
                                $deduct = $this->diff2time($now,$late,1) * $setting->set_deduct;
                                $time_late = $this->diff2time($now,$late);
                                $work_late = '';
                                if ($time_late != 'ตรงเวลา'):
                                    $work_late = $deduct.'/'.$time_late;
                                endif;
                            endif;
                        endif;
                    endif;
                    if(count($work_id) > 0):
                        if($work_id[0]->work_status == 'ยกเลิก'):
                            $con['table'] = 'tb_working';
                            $con['where'] = 'work_id = "'.$work_id[0]->work_id.'"';
                            $check_work_date = $this->admin->select($con);
                            $con['data'] = array(
                                'work_date' => date('Y-m-d H:i:s'),
                                'work_wage' => $setting->set_wage,
                                'work_late' => $work_late,
                                'work_status' => 'ทำงาน'
                            );
                            $insert = $this->admin->update($con);
                            unset($con);
                        elseif(strpos($work_id[0]->work_status,'เลิกงาน') !== false):
                            $con['table'] = 'tb_working';
                            $con['data'] = array(
                                'work_date' => date('Y-m-d H:i:s'),
                                'work_late' => $work_late,
                                'work_wage' => $setting->set_wage,
                                'staff_user' => $_POST['staff_user'],
                                'work_status' => 'ทำงาน'
                            );
                            $insert = $this->admin->insert($con);
                            unset($con);
                        endif;
                    else:
                        $con['table'] = 'tb_working';
                        $con['data'] = array(
                            'work_date' => date('Y-m-d H:i:s'),
                            'work_late' => $work_late,
                            'work_wage' => $setting->set_wage,
                            'staff_user' => $_POST['staff_user'],
                            'work_status' => 'ทำงาน'
                        );
                        $insert = $this->admin->insert($con);
                        unset($con);
                    endif;
                    if($insert != false):
                        $con['table'] = 'tb_staff';
                        $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
                        $con['data'] = array(
                            'staff_check' => 'checked,'.date('Y-m-d'),
                        );
                        $check_in = $this->admin->update($con);
                        unset($con);

                        echo json_encode('success');
                    else:
                        echo json_encode('fail');
                    endif;

                    break;
                case 'cancel_check_in':

                    $con['table'] = 'tb_staff';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
                    $con['data'] = array(
                        'staff_check' => '0'
                    );
                    $check_in = $this->admin->update($con);
                    unset($con);


                    $con['table'] = 'tb_working';
                    $con['select'] = 'work_id';
                    $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
                    $con['order_by'] = 'work_date DESC';
                    $con['limit'] = '1';
                    $max_work = $this->admin->select($con);
                    $max_work = $max_work[0]->work_id;
                    unset($con);

                    $con['table'] = 'tb_working';
                    $con['where'] = 'work_id = "'.$max_work.'"';
                    $con['data'] = array(
                        'work_status' => 'ยกเลิก',
                    );
                    $update = $this->admin->update($con);
                    unset($con);

                    if($update != false):
                        echo json_encode('success');
                    else:
                        echo json_encode('fail');
                    endif;

                    break;
                default:
                    // code...
                    break;
            endswitch;
        endif;
    }
    public function schedule($value='')
    {
        $this->set_page('admin/schedule');
    }
    public function data_schedule($value='')
    {
        $con['table'] = 'tb_schedule';
        $con['where'] = 'title != ""';
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['where'] = 'id = "'.$_POST['id'].'"';
        endif;
        $data = $this->admin->select($con);
        unset($con);
        if($data != false):
            $schedule = array();
            foreach ($data as $key => $value):
                $schedule[$key]['id'] = $value->id;
                $schedule[$key]['title'] = $value->title;
                $schedule[$key]['start'] = $value->start_date;
                $schedule[$key]['end'] = $value->end_date;
                $schedule[$key]['detail'] = $value->detail;
                $schedule[$key]['refer'] = $value->refer;
                $schedule[$key]['status'] = $value->status;
                if($value->status == 1):
                    $schedule[$key]['color'] = 'red';
                else:
                    $schedule[$key]['color'] = '#3498DB';
                endif;
            endforeach;
        endif;
        echo json_encode($schedule);exit;
    }
    public function add_schedule_ajax($value='')
    {
        if (isset($_POST) && !empty($_POST)):
            $end_date = '';
            $end_date = !empty($_POST['end_date']) && !empty($_POST['end_time'])? $_POST['end_date'].'T'.$_POST['end_time']: '';
            if(empty($end_date)):
                $end_date = !empty($_POST['end_date']) && empty($_POST['end_time'])? $_POST['end_date']: '';
            endif;
            $start_date = !empty($_POST['start_date']) && !empty($_POST['time'])? $_POST['start_date'].'T'.$_POST['time']: '';
            if(empty($start_date)):
                $start_date = !empty($_POST['start_date']) && empty($_POST['time'])? $_POST['start_date']: '';
            endif;
            $holiday = !empty($_POST['holiday'])?$_POST['holiday']:0;
            $con['table'] = 'tb_schedule';
            $con['data'] = array(
                'title' => $_POST['title'],
                'start_date' => $start_date,
                'end_date' => $end_date,
                'detail' => $_POST['detail'],
                'status' => $holiday,
            );
            if(!empty($_POST['staff_name'])):
                if(count($_POST['staff_name'])>0):
                    $staff_name = '';
                    $staff_name = implode(',',$_POST['staff_name']);
                    $con['data']['refer'] = $staff_name;
                endif;
            endif;

            if(isset($_POST['type']) && !empty($_POST['type'])):
                $con['where'] = 'id = "'.$_POST['id'].'"';
                $insert = $this->admin->update($con);
                unset($con['where']);
            else:
                $insert = $this->admin->insert($con);
            endif;

            if($insert != false):
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
    }
    public function list_staff_for_schedule($value='')
    {
        $con['table'] = 'tb_staff';
        $con['order_by'] = 'staff_department ASC';
        $con['where'] = 'staff_status = "ทำงานอยู่"';
        $staff = $this->admin->select($con);
        unset($con);

        if($staff != false):
            $con['table'] = 'tb_department';
            $department = $this->admin->select($con);
            unset($con);

            foreach ($staff as $key => $value):
                foreach ($department as $key_de => $value_de):
                    if($value->staff_department == $value_de->dep_id):
                        $value->staff_department = $value_de->dep_name;
                    endif;
                endforeach;
            endforeach;
            echo json_encode(array('success',$staff));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function setting($value='')
    {
        if(isset($_POST['type']) && !empty($_POST['type'])):
            if($_POST['type'] == 'update'):
                $con['table'] = 'tb_setting';
                $setting = $this->admin->select($con);
                unset($con);

                $set_deduct = '';
                $holiday = empty($_POST['holiday'])?'':implode(',',$_POST['holiday']);
                if(!empty($_POST['hour_deduct']) && !empty($_POST['minute_deduct'])):
                    $set_deduct = ($_POST['hour_deduct'] * 60 ) + $_POST['minute_deduct'].'/'.$_POST['deduct_manule'];
                elseif(!empty($_POST['hour_deduct']) && empty($_POST['minute_deduct'])):
                    $set_deduct = ($_POST['hour_deduct'] * 60 ).'/'.$_POST['deduct_manule'];
                elseif(!empty($_POST['minute_deduct']) && empty($_POST['hour'])):
                    $set_deduct = $_POST['minute_deduct'].'/'.$_POST['deduct_manule'];
                else:
                    $set_deduct = $_POST['deduct_default'];
                endif;

                if(!empty($_POST['hourly_wage']) && empty($_POST['daily_wage'])):
                    $wage = $_POST['hourly_wage'].'/h';
                elseif(!empty($_POST['daily_wage']) && empty($_POST['hourly_wage'])):
                    $wage = $_POST['daily_wage'].'/d';
                endif;

                if(count($setting) > 0):
                    $con['table'] = 'tb_setting';
                    $con['data'] = array(
                        'set_wage' => $wage,
                        'set_start_time' => $_POST['start_time'],
                        'set_late_time' => $_POST['late_time'],
                        'set_end_time' => $_POST['end_time'],
                        'set_deduct' => $set_deduct,
                        'set_holiday' => $holiday,
                    );
                    $update = $this->admin->update($con);
                    unset($con);
                    if($update != false):
                        echo json_encode('success');
                    else:
                        echo json_encode('fail');
                    endif;
                else:
                    $con['table'] = 'tb_setting';
                    $con['data'] = array(
                        'set_wage' => $wage,
                        'set_start_time' => $_POST['start_time'],
                        'set_late_time' => $_POST['late_time'],
                        'set_end_time' => $_POST['end_time'],
                        'set_deduct' => $set_deduct,
                        'set_holiday' => $holiday,
                    );
                    $update = $this->admin->insert($con);
                    unset($con);
                    if($update != false):
                        echo json_encode('success');
                    else:
                        echo json_encode('fail');
                    endif;
                endif;
            elseif($_POST['type'] == 'list'):
                $con['table'] = 'tb_setting';
                $data = $this->admin->select($con);
                foreach ($data as $key => $value):
                    if(strpos($value->set_deduct,'/') !== false):
                        $time = explode('/',$value->set_deduct);
                        $value->set_deduct = sprintf("%d.%02d",   floor($time[0]/60), $time[0]%60).'/'.$time[1];
                    endif;
                endforeach;
                if ($data != false):
                    echo json_encode(array('success',$data[0]));
                else:
                    echo json_encode(array('fail'));
                endif;

            endif;
        else:
            $this->set_page('admin/setting');
        endif;
    }
    public function manage_staff($value='')
    {
        $this->set_page('admin/manage_staff');
    }
    public function list_department($value='')
    {
        $con['table'] = 'tb_department';
        $department = $this->admin->select($con);
        if (count($department) > 0):
            echo json_encode(array('success',$department));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function add_staff($value='')
    {
        $con['table'] = 'tb_staff';
        $con['select'] = 'MAX(staff_id) AS max_id';
        $staff = $this->admin->select($con);
        unset($con);
        if(count($staff) > 0):
            $max_id = intval($staff[0]->max_id + 1);
            if(strlen($max_id) == 1):
                $max_id = '0'.$max_id;
            else:
                $max_id = $max_id++;
            endif;
        else:
            $max_id = '01';
        endif;
        $date = date('m-y');
        $date = join('',explode('-',$date));
        $staff_user = $_POST['staff_department'].$max_id.$date;
        $name = $_POST['name'].' '.$_POST['last_name'];
        $staff_pass = join('',explode('-',$_POST['staff_pass']));
        $con['table'] = 'tb_staff';
        $con['data'] = array(
            'staff_id' => $max_id,
            'staff_user' => $staff_user,
            'staff_name' => $name,
            'staff_department' => $_POST['staff_department'],
            'staff_pass' => $staff_pass,
            'staff_address' => $_POST['staff_address'],
        );
        $insert = $this->admin->insert($con);
        if($insert != false):
            echo json_encode(array('success',$staff_user));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update_staff($value='')
    {
        $name = $_POST['name'].' '.$_POST['last_name'];
        $staff_pass = join('',explode('-',$_POST['staff_pass']));
        $con['table'] = 'tb_staff';
        $con['data'] = array(
            'staff_name' => $name,
            'staff_department' => $_POST['staff_department'],
            'staff_pass' => $staff_pass,
            'staff_address' => $_POST['staff_address'],
            'staff_status' => $_POST['staff_status'],
        );
        $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
        $insert = $this->admin->update($con);
        if($insert != false):
            echo json_encode(array('success',$_POST['staff_user']));
        else:
            echo json_encode('fail');
        endif;
    }
    public function staff_detail_ajax($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $con['table'] = 'tb_staff';
            $con['where'] = 'staff_user = "'.$_POST['staff_user'].'"';
            $staff = $this->admin->select($con);
            unset($con);
            if($staff != false):
                $con['table'] = 'tb_department';
                $department = $this->admin->select($con);
                unset($con);

                foreach ($staff as $key => $value):
                    foreach ($department as $key_de => $value_de):
                        if($value->staff_department == $value_de->dep_id):
                            $value->staff_dep = $value->staff_department;
                            $value->staff_department = $value_de->dep_name;
                        endif;
                    endforeach;
                    $datetime = DateTime::createFromFormat('Ymd', $value->staff_pass);
                    $value->staff_pass = $datetime->format('Y-m-d');
                endforeach;
                echo json_encode(array('success',$staff[0]));
            else:
                echo json_encode(array('fail'));
            endif;
        else:
            echo json_encode(array('have no paramiter'));
        endif;
    }
    public function report_staff($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $con['table'] = 'tb_setting';
            $setting = $this->admin->select($con);
            $setting = $setting[0];
            unset($con);

            $con['table'] = 'tb_working';
            $con['where'] = '(work_status != "ยกเลิก" AND staff_user = "'.$_POST['staff_user'].'") AND (DATE(work_date) >= "'.$_POST['date']['start_date'].'" AND DATE(work_date) <= "'.$_POST['date']['end_date'].'")';
            $work = $this->admin->select($con);
            unset($con);
            if(count($work) > 0):
                $conclude = array(
                    'work_date' => 0,
                    'work_late' => 0,
                    'work_absent' => 0,
                    'normal_money' => 0,
                    'deduct_money' => 0,
                    'ot_money' => 0,
                    'sum_money' => 0,
                    'hourly_date' => 0,
                    'hourly_money' => 0,
                );
                $detail_work = array(
                    'work_hourly' => array(),
                    'work_daily' => array(),
                    'work_late' => array(),
                    'work_absent' => array(),
                );
                $i = 0;
                foreach ($work as $key => $value):
                    if (!empty($value->work_late )):
                        $explode_work_date = explode(' ',$value->work_date);
                        $ex_time = explode(':',$explode_work_date[1]);
                        $detail_work['work_late'][$i]['work_date'] = $explode_work_date[0].' '.$ex_time[0].':'.$ex_time[1];
                        $detail_work['work_late'][$i]['late_time_start'] = '';
                        $explode_time = explode(' ',$value->work_date);
                        $ex_time2 = explode(':',$explode_time[1]);
                        $detail_work['work_late'][$i]['late_time_end'] = $ex_time2[0].':'.$ex_time2[1];

                        $explode_work_late = explode('/',$value->work_late);

                        $conclude['deduct_money'] += $explode_work_late[0];
                        $conclude['work_late'] += 1;

                        if(strpos($explode_work_late[1],'.') !== false):
                            $exp = explode(' ',$explode_work_late[1]);
                            $exp2 = explode('.',$exp[0]);
                            $time2 = ($exp2[0] * 60) + $exp2[1];
                        else:
                            preg_match_all('!\d+!', $explode_work_late[1], $time2);
                            $time2 = $time2[0][0];
                        endif;
                        $newtimestamp = strtotime($value->work_date.' - '.$time2.' minute');
                        $explode_start_time = explode(' ',date('Y-m-d H:i:s', $newtimestamp));
                        $ex_time3 = explode(':',$explode_start_time[1]);
                        $detail_work['work_late'][$i]['late_time_start'] = $ex_time3[0].':'.$ex_time3[1];
                        $detail_work['work_late'][$i]['deduct_money'] = $explode_work_late[0];
                        $detail_work['work_late'][$i]['time_late'] = $explode_work_late[1];
                        $detail_work['work_late'][$i]['type'] = 'work_late';
                    endif;
                    if(strpos($value->work_status,'/') !== false):
                        $conclude['hourly_date']++;
                        if(strpos($value->work_status,'เลิกงาน') !== false):
                            $get_wage = explode('/',$setting->set_wage);
                            $time_check_in = explode(' ',$value->work_date);
                            $now = explode('/',$value->work_status);
                            $now = explode(' ',$now[1]);
                            $now = $now[1];
                            $time = $this->diff2time($now,$time_check_in[1]);
                            if($time != 'ตรงเวลา'):
                                if(strpos($time,'ชม') !== false):
                                    $exp_time = explode(' ',$time);
                                    if(strpos($exp_time[0],'.') !== false):
                                        $sub_time = explode('.',$exp_time[0]);
                                        if($sub_time[1] >= 50):
                                            $wage = $sub_time[0] + 1;
                                        else:
                                            $wage = $sub_time[0];
                                        endif;
                                    else:
                                        $wage = $exp_time[0];
                                    endif;
                                elseif(strpos($time,'นาที') !== false):
                                    $exp_time = explode(' ',$time);
                                    if($exp_time[0] >= 50):
                                        $wage = 1;
                                    endif;
                                endif;
                                $wage = $wage * $get_wage[0];
                            endif;
                            $explode_work_date = explode(' ',$value->work_date);
                            $work_wage = explode('/',$value->work_wage);
                            // $conclude['hourly_money'] += $wage[0];
                            $exp_work_date = explode(':',$explode_work_date[1]);
                            $work_date = implode(':',array($exp_work_date[0],$exp_work_date[1]));
                            $now = explode(':',$now);
                            $now = implode(':',array($now[0],$now[1]));
                            $conclude['hourly_money'] += $wage;
                            $detail_work['work_hourly'][$i]['work_date'] = $work_date.' - '.$now;
                            $detail_work['work_hourly'][$i]['work_hourly'] = $time.' / ชั่วโมงละ '.$work_wage[0];
                            $detail_work['work_hourly'][$i]['wage'] = $wage;
                        endif;
                    else:
                        if ($value->work_ot != ''):
                            $explode_work_ot = explode('/',$value->work_ot);
                            $conclude['ot_money'] += array_sum($explode_work_ot);
                            $conclude['sum_money'] += array_sum($explode_work_ot);
                            $detail_work['work_daily'][$i]['ot_money'] = array_sum($explode_work_ot);
                        elseif($value->work_status == 'ทำงาน'):
                            $detail_work['work_daily'][$i]['ot_money'] = 0;
                        endif;
                        if($value->work_status == 'ทำงาน'):
                            $conclude['work_date'] += 1;
                            $wage = explode('/',$value->work_wage);
                            $conclude['normal_money'] += $wage[0];
                            $conclude['sum_money'] += $wage[0];
                            $explode_work_date = explode(' ',$value->work_date);
                            $detail_work['work_daily'][$i]['wage'] = $wage[0];
                            $detail_work['work_daily'][$i]['work_date_in_time'] = $this->date_th($value->work_date,1);
                        endif;
                        if($value->work_status == 'ขาดงาน'):
                            $conclude['work_absent'] += 1;
                            $detail_work['work_absent'][$i]['date_absent'] = $this->date_th($explode_work_date[0],2);
                        endif;

                    endif;
                    $i++;
                endforeach;
                $conclude['sum_money'] = ($conclude['sum_money'] + $conclude['hourly_money']) - $conclude['deduct_money'];
                foreach ($conclude as $key_con => $value_con):
                    $conclude[$key_con] = number_format($value_con);
                endforeach;

                echo json_encode(array($work,$conclude,$detail_work));
            endif;
        else:
            echo json_encode(array('fail'));
        endif;

    }
    public function print_slip($value='')
    {
        $data['url'] = explode('/',$_GET['url']);
        $this->set_page('admin/print',$data);
    }
    public function data_print($value=''){

        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $value = $_POST['staff_user'];
            $con['table'] = 'tb_staff';
            $con['where'] = 'staff_user = "'.$value.'"';
            $data['staff'] = $this->admin->select($con);
            unset($con);
            $con['table'] = 'tb_department';
            $department = $this->admin->select($con);
            unset($con);
            $con['table'] = 'tb_working';
            $con['where'] = 'staff_user = "'.$value.'" AND (DATE(work_date) >= "'.date('Y-m').'-1" AND DATE(work_date) <= "'.date('Y-m-t',strtotime(date('Y-m-d'))).'")';
            $data['work'] = $this->admin->select($con);
            unset($con);

            $data['conclude'] = array(
                'work_date' => 0,
                'work_date_ot' => 0,
                'work_late' => 0,
                'work_absent' => 0,
                'deduct_money' => 0,
                'ot_money' => 0,
                'work_date_money' => 0,
                'sum_money' => 0,
                'total_money' => 0,
            );
            foreach ($data['staff'] as $key => $value):
                foreach ($department as $key_de => $value_de) :
                    if($value->staff_department == $value_de->dep_id):
                        $value->staff_department = $value_de->dep_name;
                    endif;
                endforeach;
            endforeach;

            if(count($data['work']) > 0):
                foreach ($data['work'] as $key_work => $value_work):
                    if ($value_work->work_late != ''):
                        $explode_work_late = explode('/',$value_work->work_late);
                        $data['conclude']['deduct_money'] += $explode_work_late[0];
                        $data['conclude']['work_late'] += 1;
                    endif;
                    if ($value_work->work_ot != ''):
                        $explode_work_ot = explode('/',$value_work->work_ot);
                        $data['conclude']['work_date_ot'] += 1;
                        $data['conclude']['ot_money'] += array_sum($explode_work_ot);
                        $data['conclude']['sum_money'] += array_sum($explode_work_ot);
                    endif;
                    if($value_work->work_status == 'ทำงาน'):
                        $exp_wage = explode('/',$value_work->work_wage);
                        $data['conclude']['work_date'] += 1;
                        $data['conclude']['work_date_money'] += $exp_wage[0];
                        $data['conclude']['sum_money'] += $exp_wage[0];
                    endif;
                    if($value_work->work_status == 'ขาดงาน'):
                        $data['conclude']['work_absent'] += 1;
                    endif;
                endforeach;
            endif;
            $data['conclude']['total_money'] = $data['conclude']['sum_money'] - $data['conclude']['deduct_money'];
            foreach ($data['conclude'] as $key_con => $value_con):
                $data['conclude'][$key_con] = number_format($value_con);
            endforeach;
            $data['period'] = $this->month_th_mini(date('m')).' '.intval((date('Y') + 543)-2500);
            $data['today'] = $this->date_th(date('Y-m-d'),2);

            echo json_encode(array('success',$data));
            // $this->set_page('admin/print',$data);
        else:
            // $this->redirect('admin/manage_staff');
        endif;
    }
    public function logout()
    {
        unset($_SESSION['admin']);
        if(!isset($_SESSION['admin'])):
            $this->redirect('admin');
        endif;
    }
    public function __destruct()
    {
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'admin/index' && $url != 'admin/check_login'):
                if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])):
                    $this->set_page('admin/check_login');exit;
                endif;
            endif;
        endif;
    }
}
 ?>
