<?php /**
 *
 */
class Repair_order extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->ro = $this->model('Repair_order_model');
    }
    public function index($value='')
    {

    }
    public function add($value='')
    {
        if(isset($_POST['add_ro']) and !empty($_POST['add_ro'])):
            $con['select'] = 'MAX(ro_number) AS ro_number';
            $con['order_by'] = 'ro_number DESC';
            $con['limit'] = '1';
            $get_last_number = $this->ro->select($con);
            if(count($get_last_number) > 0):
                $get_last_number = $get_last_number[0]->ro_number+1;
            else:
                $get_last_number = 1;
            endif;
            $date = date('Y-m-d H:i:s');
            $con['data'] = array(
                'ro_number' =>  $get_last_number,
                'ro_number_manual' =>  $_POST['ro_number_manual'],
                'ro_customer_id' =>  $_POST['ro_customer_id'],
                'ro_customer_department' =>  $_POST['ro_customer_department'],
                'ro_customer_name' =>  $_POST['ro_customer_name'],
                'ro_customer_tel' =>  $_POST['ro_customer_tel'],
                'ro_product_name' =>  $_POST['ro_product_name'],
                'ro_product_model' =>  $_POST['ro_product_model'],
                'ro_product_serial' =>  $_POST['ro_product_serial'],
                'ro_support_type' => $_POST['ro_support_type'],
                'ro_working_result_type' =>  isset($_POST['ro_working_result_type'])?$_POST['ro_working_result_type']:'',
                'ro_working_date' =>  isset($_POST['ro_working_date'])?$_POST['ro_working_date']:'',
                'ro_working_service_id' =>  isset($_POST['ro_working_service_id'])?$_POST['ro_working_service_id']:'',
                'ro_working_result_service_id' =>  isset($_POST['ro_working_result_service_id'])?$_POST['ro_working_result_service_id']:'',
                'ro_working_result_date' =>  isset($_POST['ro_working_result_date'])?$_POST['ro_working_result_date']:'',
                'ro_working_result_detail' =>  $_POST['ro_working_result_detail'],
                'ro_working_result_product_status' =>  isset($_POST['ro_working_result_product_status'])?$_POST['ro_working_result_product_status']:'',
                'ro_working_result_product_detail' =>  $_POST['ro_working_result_product_detail'],
                'ro_equipment_product' =>  $_POST['ro_equipment_product'],
                'ro_quotation_id' =>  $_POST['ro_quotation_id'],
                'ro_quotation_date' =>  isset($_POST['ro_quotation_date'])?$_POST['ro_quotation_date']:'',
                'ro_invoice_number' =>  isset($_POST['ro_invoice_number'])?$_POST['ro_invoice_number']:'',
                'ro_invoice_date' =>  isset($_POST['ro_invoice_date'])?$_POST['ro_invoice_date']:'',
                'ro_of_number' =>  isset($_POST['ro_of_number'])?$_POST['ro_of_number']:'',
                'ro_of_date' =>  isset($_POST['ro_of_date'])?$_POST['ro_of_date']:'',
                'ro_create_date' =>  $date,
                'ro_creator' => $_SESSION['user']->id
            );
            if($_SESSION['user']->position == 'Service Eng.'):
                if(isset($_POST['ro_working_result_type']) and !empty($_POST['ro_working_result_type'])):
                    $con['data']['ro_working_service_id'] = $_SESSION['user']->id;
                endif;
                if(isset($_POST['ro_working_result_product_status']) and !empty($_POST['ro_working_result_product_status'])):
                    $con['data']['ro_working_result_service_id'] = $_SESSION['user']->id;
                endif;
            endif;
            $con['data']['ro_infrom'] = implode('|',$_POST['ro_infrom']);
            $con['data']['ro_working_list'] = implode('|',$_POST['ro_working_list']);
            $con['data']['ro_working_result_list'] = implode('|',$_POST['ro_working_result_list']);
            $this->ro->insert($con);
            unset($con);
            //get last ro id
            $con['select'] = 'ro_id';
            $con['where'] = 'ro_number = "'.$get_last_number.'"';
            $con['order_by'] = 'ro_id DESC';
            $con['limit'] = '1';
            $last_ro_id = $this->ro->select($con);
            unset($con);
            if(count($last_ro_id) > 0):
                $last_ro_id = $last_ro_id[0]->ro_id;
            endif;
            //if has ro id เพื่อตรวจสอบว่าเพิ่มไปถูกต้องหรือไม่
            if(!empty($last_ro_id)):
                $con['table'] = 'tb_rod';
                foreach ($_POST['rod_product_id'] as $key => $value):
                    if(!empty($_POST['rod_product_id'])):
                        $con['data'] = array(
                            'ro_id' => $last_ro_id,
                            'rod_product_id' => $_POST['rod_product_id'][$key],
                            'rod_product_price' => $_POST['rod_product_price'][$key],
                            'rod_product_unit' => $_POST['rod_product_unit'][$key],
                        );
                        $this->ro->insert($con);
                    endif;
                endforeach;
                echo json_encode(array('success'));exit;
            else:
                echo json_encode(array('last id not found'));exit;
            endif;

        endif;
    }
    public function list($value='')
    {
        if(isset($_POST['status']) and !empty($_POST['status']) and $_POST['status'] == 'get'):
            $con['where'] = '';
            $user_status = '';
            switch ($_SESSION['user']->position):
                case 'Service Ad.':
                    $con['where'] = 'ro_creator = "'.$_SESSION['user']->id.'" AND';
                    $user_status = 'admin';
                    break;
                case 'Service Eng.':
                    $con['where'] = '(ro_working_service_id = "'.$_SESSION['user']->id.'" OR ro_working_result_service_id = "'.$_SESSION['user']->id.'" OR ro_creator = "'.$_SESSION['user']->id.'") AND';
                    $user_status = 'service';
                    break;
                default:
                    // code...
                    break;
            endswitch;
            if((isset($_POST['year_start']) and isset($_POST['year_end'])) and (!empty($_POST['year_start']) and !empty($_POST['year_end']))):
                $con['where'] .= ' YEAR(ro_create_date) >= "'.($_POST['year_start']-543).'" AND YEAR(ro_create_date) <= "'.($_POST['year_end']-543).'"';
            else:
                $con['where'] .= ' YEAR(ro_create_date) = "'.date('Y').'"';
            endif;
            $con['order_by'] = 'ro_id DESC';
            $data_ro = $this->ro->select($con);
            unset($con);
            if(count($data_ro) > 0):
                //get customer
                $con['table'] = 'tb_customer';
                $data_customer = $this->ro->select($con);
                unset($con);
                $customer = array();
                foreach ($data_customer as $key_customer => $value_customer):
                    $customer[$value_customer->id] = $value_customer->cus_name;
                endforeach;
                //add hospital name
                foreach ($data_ro as $key => $value):
                    $value->ro_customer_hospital = $customer[$value->ro_customer_id];
                    //get ro cpar
                    $get_year_ro = explode('-',$value->ro_create_date);
                    $get_year_ro = substr(reset($get_year_ro)+543,-2);
                    $length_ro_number = strlen($value->ro_number);
                    $zero = '';
                    for ($i=$length_ro_number; $i < 4; $i++) {
                        $zero .= '0';
                    }
                    $value->ro_number_full = 'CPAR'.$get_year_ro.'-'.$zero.$value->ro_number;
                endforeach;
                echo json_encode(array('success',$data_ro,$user_status));
            else:
                echo json_encode(array('have no data repair order'));
            endif;
        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type']) and $_POST['type'] == 'edit'):
            // echo "<pre>";print_r($_POST);exit;
            $con['select'] = 'ro_number';
            $con['where']  = 'ro_id = "'.$_POST['ro_id'].'" AND ro_status != "cancel"';
            $check_ro = $this->ro->select($con);
            unset($con);
            if(count($check_ro) > 0):
                $date = date('Y-m-d H:i:s');
                $con['data'] = array(
                    'ro_number' => $check_ro[0]->ro_number,
                    'ro_number_manual' => $_POST['ro_number_manual'],
                    'ro_customer_id' => $_POST['ro_customer_id'],
                    'ro_customer_department' => $_POST['ro_customer_department'],
                    'ro_customer_name' => $_POST['ro_customer_name'],
                    'ro_customer_tel' => $_POST['ro_customer_tel'],
                    'ro_product_name' => $_POST['ro_product_name'],
                    'ro_product_model' => $_POST['ro_product_model'],
                    'ro_product_serial' => $_POST['ro_product_serial'],
                    'ro_support_type' => $_POST['ro_support_type'],
                    'ro_working_result_type' =>  isset($_POST['ro_working_result_type'])?$_POST['ro_working_result_type']:'',
                    'ro_working_date' =>  isset($_POST['ro_working_date'])?$_POST['ro_working_date']:'',
                    'ro_working_service_id' =>  isset($_POST['ro_working_service_id'])?$_POST['ro_working_service_id']:'',
                    'ro_working_result_service_id' =>  isset($_POST['ro_working_result_service_id'])?$_POST['ro_working_result_service_id']:'',
                    'ro_working_result_date' =>  isset($_POST['ro_working_result_date'])?$_POST['ro_working_result_date']:'',
                    'ro_working_result_detail' =>  $_POST['ro_working_result_detail'],
                    'ro_working_result_product_status' =>  isset($_POST['ro_working_result_product_status'])?$_POST['ro_working_result_product_status']:'',
                    'ro_working_result_product_detail' =>  $_POST['ro_working_result_product_detail'],
                    'ro_equipment_product' =>  $_POST['ro_equipment_product'],
                    'ro_quotation_id' =>  $_POST['ro_quotation_id'],
                    'ro_quotation_date' =>  isset($_POST['ro_quotation_date'])?$_POST['ro_quotation_date']:'',
                    'ro_invoice_number' =>  isset($_POST['ro_invoice_number'])?$_POST['ro_invoice_number']:'',
                    'ro_invoice_date' =>  isset($_POST['ro_invoice_date'])?$_POST['ro_invoice_date']:'',
                    'ro_of_number' =>  isset($_POST['ro_of_number'])?$_POST['ro_of_number']:'',
                    'ro_of_date' =>  isset($_POST['ro_of_date'])?$_POST['ro_of_date']:'',
                    'ro_create_date' =>  $date,
                    'ro_creator' => $_SESSION['user']->id
                );
                // echo "<pre>";print_r($con);exit;
                if(!empty($_POST['ro_infrom'][0])):
                    if(count($_POST['ro_infrom']) > 1):
                        $con['data']['ro_infrom'] = implode('|',$_POST['ro_infrom']);
                    else:
                        $con['data']['ro_infrom'] = $_POST['ro_infrom'][0];
                    endif;
                endif;
                if(!empty($_POST['ro_working_list'][0])):
                    if(count($_POST['ro_working_list']) > 1):
                        $con['data']['ro_working_list'] = implode('|',$_POST['ro_working_list']);
                    else:
                        $con['data']['ro_working_list'] = $_POST['ro_working_list'][0];
                    endif;
                endif;
                if(!empty($_POST['ro_working_result_list'][0])):
                    if(count($_POST['ro_working_result_list']) > 1):
                        $con['data']['ro_working_result_list'] = implode('|',$_POST['ro_working_result_list']);
                    else:
                        $con['data']['ro_working_result_list'] = $_POST['ro_working_result_list'][0];
                    endif;
                endif;
                $this->ro->insert($con);
                unset($con);
                $con['select'] = 'ro_id';
                $con['where'] = 'ro_create_date = "'.$date.'"';
                $check_insert = $this->ro->select($con);
                // $check_insert = array(224);
                if(count($check_insert) > 0):
                    //cancel old ro
                    $con['where']  = 'ro_id = "'.$_POST['ro_id'].'"';
                    $con['data'] = array('ro_status' => 'cancel');
                    $this->ro->update($con);
                    unset($con);
                    if(count($_POST['rod_product_id']) > 0):
                        // echo "condition add product rod";exit;
                        $con['table'] = 'tb_rod';
                        foreach ($_POST['rod_product_id'] as $key => $value):
                            if(!empty($_POST['rod_product_id'])):
                                $con['data'] = array(
                                    'ro_id' => $check_insert[0]->ro_id,
                                    'rod_product_id' => $_POST['rod_product_id'][$key],
                                    'rod_product_price' => $_POST['rod_product_price'][$key],
                                    'rod_product_unit' => $_POST['rod_product_unit'][$key],
                                );
                                $this->ro->insert($con);
                            endif;
                        endforeach;
                    endif;
                    echo json_encode(array('success'));
                else:
                    echo json_encode(array('fail'));
                endif;
            else:
                echo json_encode(array('updated'));
            endif;
        endif;
    }
    public function get_ro($value='')
    {
        if(isset($_POST['ro_id']) and !empty($_POST['ro_id'])):
            $con['where'] = 'ro_id = "'.$_POST['ro_id'].'"';
            $data = $this->ro->select($con);
            unset($con);
            if(count($data) > 0):
                //get customer
                $con['table'] = 'tb_customer';
                $data_customer = $this->ro->select($con);
                unset($con);
                $customer = array();
                foreach ($data_customer as $key_customer => $value_customer):
                    $customer[$value_customer->id] = $value_customer->cus_name;
                endforeach;
                //add hospital name
                foreach ($data as $key => $value):
                    $value->ro_customer_hospital = $customer[$value->ro_customer_id];
                    $value->ro_infrom = !empty($value->ro_infrom)?explode('|',$value->ro_infrom):array();
                    $value->ro_working_list = !empty($value->ro_working_list)?explode('|',$value->ro_working_list):array();
                    $value->ro_working_result_list = !empty($value->ro_working_result_list)?explode('|',$value->ro_working_result_list):array();
                    $value->ro_working_service_data = array();
                    if(!empty($value->ro_working_service_id)):
                        $con['table'] = 'tb_user';
                        $con['select'] = 'first_name,last_name';
                        $con['where'] = 'id = "'.$value->ro_working_service_id.'"';
                        $value->ro_working_service_data = $this->ro->select($con);
                        unset($con);
                        $value->ro_working_service_data = $value->ro_working_service_data[0];
                    endif;
                    $value->ro_working_result_service_data = array();
                    if(!empty($value->ro_working_result_service_id)):
                        $con['table'] = 'tb_user';
                        $con['select'] = 'first_name,last_name';
                        $con['where'] = 'id = "'.$value->ro_working_result_service_id.'"';
                        $value->ro_working_result_service_data = $this->ro->select($con);
                        unset($con);
                        $value->ro_working_result_service_data = $value->ro_working_result_service_data[0];
                    endif;

                    //get date and time
                    if($value->ro_working_date != 0):
                        $ro_working_date = explode(' ',$value->ro_working_date);
                        $ro_working_time = explode(':',$ro_working_date[1]);
                        $ro_working_date = explode('-',$ro_working_date[0]);
                        $value->ro_working_date = $ro_working_date[2].'/'.$ro_working_date[1].'/'.substr(($ro_working_date[0]+543),2);
                        $value->ro_working_time = $ro_working_time[0].'.'.$ro_working_time[1];
                    else:
                        $value->ro_working_date = '-';
                        $value->ro_working_time = '-';
                    endif;
                    if($value->ro_working_result_date != 0):
                        $ro_working_result_date = explode(' ',$value->ro_working_result_date);
                        $ro_working_result_date = explode('-',$ro_working_result_date[0]);
                        $value->ro_working_result_date = $ro_working_result_date[2].'/'.$ro_working_result_date[1].'/'.substr(($ro_working_result_date[0]+543),2);
                    else:
                        // $value->ro_working_result_date = '-';
                        $data[0]->ro_working_result_date = '-';
                    endif;
                    //get quotation
                    $value->ro_quotation_data = array();
                    if(!empty($value->ro_quotation_id)):
                        $con['table'] = 'tb_quotation';
                        $con['select'] = 'q_date,q_num,q_type';
                        $con['where'] = 'q_id = "'.$value->ro_quotation_id.'"';
                        $value->ro_quotation_data = $this->ro->select($con);
                        unset($con);
                        if(count($value->ro_quotation_data) > 0):
                            foreach ($value->ro_quotation_data as $key_ro_quotation_data => $value_ro_quotation_data):
                                $num_for = 4;
                                $zero = '';
                                for ($i=strlen($value_ro_quotation_data->q_num); $i < $num_for; $i++):
                                    $zero = '0'.$zero;
                                endfor;
                                $value_ro_quotation_data->q_num = $zero.$value_ro_quotation_data->q_num;
                                $value_ro_quotation_data->q_date = explode(' ',$value_ro_quotation_data->q_num);
                                $value_ro_quotation_data->q_date = explode('-',$value_ro_quotation_data->q_date[0]);
                                $value_ro_quotation_data->q_date = $value_ro_quotation_data->q_date[0];
                                $value_ro_quotation_data->quotation_number = $value_ro_quotation_data->q_type.'.'.$value_ro_quotation_data->q_num.'/'.($value_ro_quotation_data->q_date+543);
                            endforeach;
                        endif;
                    endif;

                endforeach;
                if($data[0]->ro_quotation_date == 0):
                    $data[0]->ro_quotation_date = '-';
                endif;
                if(empty($data[0]->ro_invoice_number)):
                    $data[0]->ro_invoice_number = '-';
                endif;
                if($data[0]->ro_invoice_date == 0):
                    $data[0]->ro_invoice_date = '-';
                endif;
                if(empty($data[0]->ro_of_number)):
                    $data[0]->ro_of_number = '-';
                endif;
                if($data[0]->ro_of_date == 0):
                    $data[0]->ro_of_date = '-';
                endif;

                $data[0]->ro_id_encode = $this->encode($data[0]->ro_id);
                $con['table'] = 'tb_rod';
                $con['where'] = 'ro_id = "0'.$data[0]->ro_id.'"';
                $prodcut_detail = $this->ro->select($con);
                unset($con);
                $data[0]->product = array();
                $data[0]->sum_total = 0;
                if(count($prodcut_detail) > 0):
                    $data[0]->product = array();
                    $data[0]->sum_total = 0;
                    $num_for = 3;
                    for ($i=strlen($data[0]->ro_number); $i < $num_for; $i++):
                        $data[0]->ro_number = '0'.$data[0]->ro_number;
                    endfor;
                    $get_year_create = explode(' ',$data[0]->ro_create_date);
                    $get_year_create = explode('-',$get_year_create[0]);
                    $data[0]->ro_number = $data[0]->ro_number.'/'.$get_year_create[0];
                    $data[0]->ro_date_th = $this->date_th($data[0]->ro_create_date,2);
                    foreach ($prodcut_detail as $key => $value):
                        $con['table'] = 'tb_product';
                        $con['where'] = 'p_id = "'.$value->rod_product_id.'"';
                        $product = $this->ro->select($con);
                        unset($con);
                        if(count($product) > 0):
                            $data[0]->product[$key]['p_id'] = $product[0]->p_id;
                            if(!empty($prodcut_detail[$key]->product_name)):
                                $data[0]->product[$key]['p_name'] = $prodcut_detail[$key]->product_name;
                            else:
                                $data[0]->product[$key]['p_name'] = $product[0]->p_detail;
                                $data[0]->product[$key]['p_code'] = $product[0]->p_code;
                            endif;
                            $data[0]->product[$key]['p_unit'] = $value->rod_product_unit;
                            $data[0]->product[$key]['p_price_sum'] = $value->rod_product_price * $value->rod_product_unit;
                            $data[0]->sum_total += $data[0]->product[$key]['p_price_sum'];
                            $data[0]->product[$key]['p_price_sum'] = number_format($data[0]->product[$key]['p_price_sum'],2);
                            $data[0]->product[$key]['p_price'] = $value->rod_product_price;
                        endif;
                    endforeach;
                    //ลดราคาก่อนคิด vat
                    $data[0]->total_price = number_format($data[0]->sum_total,2);
                    $data[0]->sum_total = number_format($data[0]->sum_total,2);
                    $sum_exp = explode(',',$data[0]->sum_total);
                    $sum_exp = implode('',$sum_exp);
                    $data[0]->sum_total_th = $this->Convert($sum_exp);
                endif;
                switch ($_SESSION['user']->position):
                    case 'Service Ad.':
                        $user_status = 'admin';
                        break;
                    case 'Service Eng.':
                        $user_status = 'service';
                        break;
                    case ($_SESSION['user']->position == 'Service Supervisor' || $_SESSION['user']->position == 'Service Manager'):
                        $user_status = 'supervisor';
                        break;
                    case 'Programmer':
                        $user_status = 'it';
                        break;
                    default:
                        break;
                endswitch;
                echo json_encode(array('success',$data,$user_status));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function list_quotation($value='')
    {
        $con['table'] = 'tb_quotation';
        $con['select'] = 'q_id,q_type,q_num,q_date';
        $con['where'] = 'q_status != "cancel" AND q_type IN("SER","SER-PM","SER-IN")';
        $con['order_by'] = 'q_id DESC';
        $data = $this->ro->select($con);
        if(count($data) > 0):
            foreach ($data as $key => $value):
                $num_for = 4;
                $zero = '';
                for ($i=strlen($value->q_num); $i < $num_for; $i++):
                    $zero = '0'.$zero;
                endfor;
                $value->q_num = $zero.$value->q_num;
                $value->q_date = explode(' ',$value->q_date);
                $value->q_date = explode('-',$value->q_date[0]);
                $value->q_date = $value->q_date[0];
                $value->quotation_number = $value->q_type.'.'.$value->q_num.'/'.($value->q_date+543);
            endforeach;
            echo json_encode(array('success',$data));
        endif;

    }
    public function report($value='')
    {
        if(isset($_POST['status']) and !empty($_POST['status']) and $_POST['status'] == 'get'):
            $con['where'] = '';
            $user_status = '';
            switch ($_SESSION['user']->position):
                case 'Service Ad.':
                    // $con['where'] = 'ro_creator = "'.$_SESSION['user']->id.'" AND';
                    $user_status = 'admin';
                    break;
                case 'Service Eng.':
                    $con['where'] = '(ro_working_service_id = "'.$_SESSION['user']->id.'" OR ro_working_result_service_id = "'.$_SESSION['user']->id.'" OR ro_creator = "'.$_SESSION['user']->id.'") AND';
                    $user_status = 'service';
                    break;
                default:
                    // code...
                    break;
            endswitch;
            if((isset($_POST['year_start']) and isset($_POST['year_end'])) and (!empty($_POST['year_start']) and !empty($_POST['year_end']))):
                $con['where'] .= ' YEAR(ro_create_date) >= "'.($_POST['year_start']-543).'" AND YEAR(ro_create_date) <= "'.($_POST['year_end']-543).'"';
            else:
                $con['where'] .= ' YEAR(ro_create_date) = "'.date('Y').'"';
            endif;
            $con['order_by'] = 'ro_id DESC';
            $data_ro = $this->ro->select($con);
            unset($con);
            if(count($data_ro) > 0):
                //get customer
                $con['table'] = 'tb_customer';
                $data_customer = $this->ro->select($con);
                unset($con);
                $customer = array();
                foreach ($data_customer as $key_customer => $value_customer):
                    $customer[$value_customer->id] = $value_customer->cus_name;
                endforeach;
                $con['table'] = 'tb_user';
                $con['select'] = 'first_name,last_name,head,id';
                $con['where'] = 'division = "Service"';
                $data_user = $this->ro->select($con);
                unset($con);
                $user = array();
                foreach ($data_user as $key_user => $value_user):
                    $user[$value_user->id] = new stdClass;
                    $user[$value_user->id]->name = $value_user->first_name;
                    $user[$value_user->id]->head = $value_user->head;
                endforeach;
                $data_detail = new stdClass;
                $data_detail->sum_all = 0;
                $data_detail->status = array();
                foreach ($data_ro as $key => $value):
                    $value->ro_customer_hospital = $customer[$value->ro_customer_id];
                    //get ro cpar
                    $get_year_ro = explode('-',$value->ro_create_date);
                    $get_year_ro = substr(reset($get_year_ro)+543,-2);
                    $length_ro_number = strlen($value->ro_number);
                    $zero = '';
                    for ($i=$length_ro_number; $i < 4; $i++) {
                        $zero .= '0';
                    }
                    $value->ro_number_full = 'CPAR'.$get_year_ro.'-'.$zero.$value->ro_number;
                    //get agent service
                    $value->ro_working_service_name = '';
                    $value->ro_working_result_service_name = '';
                    $value->ro_working_service_head = '';
                    if(!empty($value->ro_working_service_id)):
                        $value->ro_working_service_name = $user[$value->ro_working_service_id]->name;
                        $value->ro_working_service_head = $user[$user[$value->ro_working_service_id]->head]->name;
                    endif;
                    if(!empty($value->ro_working_result_service_id)):
                        $value->ro_working_result_service_name = $user[$value->ro_working_result_service_id];
                    endif;
                    //get conclude
                    if($value->ro_status != 'cancel'):
                        if($value->ro_working_result_product_status != ''):
                            if(!isset($data_detail->status[$value->ro_working_result_product_status])):
                                $data_detail->status[$value->ro_working_result_product_status] = 0;
                            endif;
                            $data_detail->status[$value->ro_working_result_product_status] += 1;
                        else:
                            if(!isset($data_detail->status[$value->ro_working_result_type])):
                                $data_detail->status[$value->ro_working_result_type] = 0;
                            endif;
                            $data_detail->status[$value->ro_working_result_type] += 1;
                        endif;
                    endif;
                endforeach;


                echo json_encode(array('success',$data_ro,$user_status,$data_detail));
            else:
                echo json_encode(array('have no data repair order'));
            endif;
        endif;
    }
    public function print($value='')
    {
        exit;
        $this->set_page('repair_order/print');
    }
    public function calculation($value='')
    {
        $sum = array();
        $sum_total = 0;
        foreach ($_POST['quanity'] as $key => $value):
            $sum[$key] = $value * $_POST['price'][$key];
            $sum_total += $sum[$key];
            $sum[$key] = number_format($sum[$key],2);
        endforeach;
        $sum_total = number_format($sum_total,2);
        echo json_encode(array($sum,$sum_total));exit;
    }
}
 ?>
