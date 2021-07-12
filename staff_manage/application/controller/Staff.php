<?php /**
 *
 */
class Staff extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->staff = $this->model('STaff_model');
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'staff/index' && $url != 'staff/check_login'):
                if(!isset($_SESSION['staff']) || empty($_SESSION['staff'])):
                    $this->set_page('staff/login');exit;
                endif;
            endif;
        endif;
    }
    public function index($value='')
    {
        if(!isset($_SESSION['staff']) || empty($_SESSION['staff'])):
            $this->set_page('staff/login');
        else:
            $this->redirect('staff/schedule');
        endif;
    }
    public function check_login($value='')
    {
        if(isset($_POST['username']) && !empty($_POST['username'])):
            $con['where'] = 'staff_user = "'.$_POST['username'].'" AND staff_pass = "'.$_POST['password'].'"';
            $data = $this->staff->select($con);
            if(count((array)$data)>0):
                $_SESSION['staff'] = $data;
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function schedule($value='')
    {
        $this->set_page('staff/schedule');
    }
    public function data_schedule($value='')
    {
        $con['table'] = 'tb_staff';
        $staff = $this->staff->select($con);
        unset($con);

        $con['table'] = 'tb_schedule';
        $con['where'] = 'title != "" AND (refer LIKE "%'.$_SESSION['staff'][0]->staff_id.'%" OR refer = "")';
        if(isset($_POST['id']) && !empty($_POST['id'])):
            $con['where'] = 'id = "'.$_POST['id'].'"';
        endif;
        $data = $this->staff->select($con);
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

                if(strpos($schedule[$key]['start'],'T') !== false):
                    $explode_start = explode('T',$schedule[$key]['start']);
                    $schedule[$key]['start_date'] = $this->date_th($explode_start[0].' '.$explode_start[1],1).' น.';
                else:
                    $schedule[$key]['start_date'] = $this->date_th($schedule[$key]['start'],2);
                endif;

                if($value->status == 1):
                    $schedule[$key]['color'] = 'red';
                else:
                    $schedule[$key]['color'] = '#3498DB';
                endif;
                if($value->refer != ''):
                    $con['table'] = 'tb_staff';
                    $con['select'] = 'staff_name';
                    $con['where'] = 'staff_id IN ('.$value->refer.')';
                    $schedule[$key]['staff_name'] = $this->staff->select($con);
                    unset($con);
                endif;
            endforeach;

        endif;
        echo json_encode($schedule);exit;
    }
    public function profile($value='')
    {
        $con['table'] = 'tb_department';
        $department = $this->staff->select($con);
        unset($con);
        foreach ($department as $key => $value):
            if($value->dep_id = $_SESSION['staff'][0]->staff_department):
                $_SESSION['staff'][0]->staff_department = $value->dep_name;
            endif;
        endforeach;

        if(strpos($_SESSION['staff'][0]->staff_pass,'-') !== false):
            // echo "<pre>";print_r($_SESSION);exit;
        else:
            $datetime = DateTime::createFromFormat('Ymd', $_SESSION['staff'][0]->staff_pass);
            $_SESSION['staff'][0]->staff_pass = $datetime->format('Y-m-d');
        endif;
        $this->set_page('staff/profile');
    }
    public function report_staff($value='')
    {
        if(isset($_POST['staff_user']) && !empty($_POST['staff_user'])):
            $con['table'] = 'tb_setting';
            $setting = $this->staff->select($con);
            $setting = $setting[0];
            unset($con);

            $con['table'] = 'tb_working';
            $con['where'] = '(work_status != "ยกเลิก" AND staff_user = "'.$_POST['staff_user'].'") AND (DATE(work_date) >= "'.$_POST['date']['start_date'].'" AND DATE(work_date) <= "'.$_POST['date']['end_date'].'")';
            $work = $this->staff->select($con);
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
                            $detail_work['work_daily'][$i]['work_date_in_time'] = $this->date_th($explode_work_date[0],2);
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
        if(isset($value) && !empty($value)):
            $con['table'] = 'tb_staff';
            $con['where'] = 'staff_user = "'.$value.'"';
            $data['staff'] = $this->staff->select($con);
            unset($con);
            $con['table'] = 'tb_department';
            $department = $this->staff->select($con);
            unset($con);
            $con['table'] = 'tb_working';
            $con['where'] = 'staff_user = "'.$value.'" AND (DATE(work_date) >= "'.date('Y-m').'-1" AND DATE(work_date) <= "'.date('Y-m-t',strtotime(date('Y-m-d'))).'")';
            $data['work'] = $this->staff->select($con);
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

            $this->set_page('staff/print',$data);
        else:
            $this->redirect('staff/profile');
        endif;
    }
    public function logout()
    {
        unset($_SESSION['staff']);
        if(!isset($_SESSION['staff'])):
            $this->redirect('staff');
        endif;
    }
    public function destructor()
    {
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'staff/index' && $url != 'staff/check_login'):
                if(!isset($_SESSION['staff']) || empty($_SESSION['staff'])):
                    $this->set_page('staff/check_login');exit;
                endif;
            endif;
        endif;
    }
}
 ?>
