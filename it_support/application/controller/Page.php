<?php /**
 *
 */
class Page extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->page = $this->model('Admin_model');
        $explode_url = explode('/',$_GET['url']);
        // $this->log($_SESSION);
        if(isset($_SESSION['user'])):
            if(count($explode_url) > 1):
                $check_permission = 'error';
                foreach ($_SESSION['user']->menu_option as $key => $value):
                    if($explode_url[1] == $value->option_path):
                        $check_permission = 'true';
                    endif;
                endforeach;
                if($check_permission == 'error'):
                    $this->view('errors/error_permission');exit;
                endif;
            else:
                $this->redirect('page/'.$_SESSION['user']->menu_option[0]->option_path);
            endif;
        else:
            $this->redirect();
        endif;

    }
    public function index($value='')
    {

    }
    public function manage_tender($value='')
    {
        // if($_SESSION['user']->id == '294'): //หมายถึงพี่เจี๊ยบ
            $this->set_page('tender/manage');
        // else:
        //     if($_SESSION['user']->position == 'Admin.sale'):
        //         $this->set_page('tender/list');
        //     else:
        //         $this->set_page('tender/list_stock');
        //     endif;
        // endif;
    }
    public function report_tender($value='')
    {
        $this->set_page('tender/report');
    }
    public function stock_of($value='')
    {
        $this->set_page('stock/of/list');
    }
    public function borrowing($value='')
    {
        $this->set_page('borrowing/demo/list');
    }
    public function stock_demo($value='')
    {
        $this->set_page('Stock/demo/list');
    }
    public function software_license($value='')
    {
        $this->set_page('software_license/list');
    }
    public function job_option($value='')
    {
        $this->set_page('job_option/list');
    }
    public function daily_report($value='')
    {
        $this->set_page('daily_report/'.$_SESSION['user']->division.'/list');
    }
    public function stock($value='')
    {
        if($_SESSION['user']->division == 'IT'):
            $division = 'sale';
        else:
            $division = strtolower($_SESSION['user']->division);
        endif;
        $this->set_page('stock/'.$division.'/list');
    }
    public function homepage($value='')
    {
        $this->set_page('homepage');
    }
    public function equipment($value='')
    {
        $this->set_page('equipment/list');
    }
    public function image($value='')
    {
        // code...
    }
    public function repair_report()
    {
        $this->set_page('repair_order/report');
    }
    public function quotation_report()
    {
        if(strtolower($_SESSION['user']->division) == 'sale'):
            $this->set_page('quotation/sale/report');
        else:
            $this->set_page('quotation/service/report');
        endif;
    }
    public function quotation($value='',$brand='',$signature='',$position='')
    {
        if((isset($value) and !empty($value))):
            $con['table'] = 'tb_quotation';
            $con['where'] = 'q_id = "'.$this->decode($value).'"';
            $data['print'] = $this->page->select($con);
            unset($con);

            if(count($data) > 0):
                $con['table'] = 'tb_quotation_d';
                $con['where'] = 'q_id = "'.$data['print'][0]->q_id.'"';
                $prodcut_detail = $this->page->select($con);
                unset($con);
                $data['head'][0] = new stdClass;
                $data['head'][0]->position_th = '';
                if(strtolower($_SESSION['user']->division) != 'sale'):
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name,signature,position';
                    $con['where'] = 'user_id = "'.$data['print'][0]->q_head_id.'"';
                    $data['head'] = $this->page->select($con);
                    unset($con);
                    $data['head'][0]->position_th = '';
                    switch ($data['head'][0]->position):
                        case 'Service Manager':
                            $data['head'][0]->position_th = 'ผู้จัดการแผนกบริการ';
                            break;
                        case 'Service Supervisor':
                            $data['head'][0]->position_th = 'ผู้จัดการเขตแผนกบริการ';
                            break;
                        case 'General Manager':
                            $data['head'][0]->position_th = 'ผู้จัดการทั่วไป';
                            break;
                        default:
                            // code...
                            break;
                    endswitch;
                    if($data['head'][0]->position == 'Service Manager'):
                        $data['head'][0]->position_th = 'ผู้จัดการแผนกบริการ';
                    else:
                        $data['head'][0]->position_th = 'ผู้จัดการเขตแผนกบริการ';
                    endif;
                    if($signature == 'service'):
                        $con['table'] = 'tb_user';
                        $con['select'] = 'first_name,last_name,signature,position';
                        $con['where'] = 'id = "'.$data['print'][0]->q_service_id.'"';
                        $data['head'] = $this->page->select($con);
                        unset($con);
                        $data['head'][0]->position_th = $data['print'][0]->q_bidder;
                    endif;
                else:
                    $data['print'][0]->q_agent_data = array();
                    if($signature == 'gm'):
                        $user_id = '9601005';
                        $q_agent_service = explode('โทร.',$data['print'][0]->q_agent_service);
                        $name = explode(' ',$q_agent_service[0]);
                        $con['table'] = 'tb_user';
                        $con['select'] = 'id,user_id,division,email';
                        $con['where'] = 'first_name = "'.$name[0].'" AND last_name = "'.$name[1].'"';
                        $sale = $this->page->select($con);
                        unset($con);
                        $data['print'][0]->q_agent_data = $sale[0];
                        $data['print'][0]->q_agent_email = $sale[0]->email;
                    else:
                        $q_agent_service = explode('โทร.',$data['print'][0]->q_agent_service);
                        $name = explode(' ',$q_agent_service[0]);
                        $con['table'] = 'tb_user';
                        $con['select'] = 'id,user_id,division,email';
                        $con['where'] = 'first_name = "'.$name[0].'" AND last_name = "'.$name[1].'"';
                        $sale = $this->page->select($con);
                        unset($con);
                        $user_id = $sale[0]->user_id;
                        $data['print'][0]->q_agent_data = $sale[0];
                        $data['print'][0]->q_agent_email = $sale[0]->email;
                    endif;
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name,signature';
                    $con['where'] = 'user_id = "'.$user_id.'"';
                    $data['head'] = $this->page->select($con);
                    unset($con);
                    if($signature == 'gm'):
                        $data['head'][0]->last_name = 'แสงเกื้อกูลชัย';
                        $data['head'][0]->position_th = 'ผู้จัดการทั่วไป';
                        $signature = $data['head'][0]->signature;
                        $data['head'][0]->first_name = 'วีระชัย';
                    elseif($signature == 'sale'):
                        $data['head'][0]->position_th = $data['print'][0]->q_bidder;
                    endif;
                endif;

                $data['head'] = $data['head'][0];
                if(!empty($position)):
                    $data['head']->position_th = $position;
                endif;

                $data['print'][0]->product = array();
                $data['print'][0]->sum_total = 0;
                for ($i=strlen($data['print'][0]->q_num); $i < 4; $i++):
                    $data['print'][0]->q_num = '0'.$data['print'][0]->q_num;
                endfor;
                $data['print'][0]->q_date_th = $this->date_th($data['print'][0]->q_date,2);
                $data['print'][0]->q_number = $data['print'][0]->q_type.'.'.$data['print'][0]->q_num.'/'.(substr($data['print'][0]->q_date,0,4)+543);
                if(strtolower($_SESSION['user']->division) == 'sale'):
                    $set_price = explode(':',$data['print'][0]->q_set_price);
                    $data['print'][0]->q_set_price_data = $data['print'][0]->q_set_price;
                    $data['print'][0]->q_set_price = $set_price[0].' วัน '.$set_price[1];
                    $set_delivery = explode(':',$data['print'][0]->q_set_delivery);
                    $data['print'][0]->q_set_delivery_data = $data['print'][0]->q_set_delivery;
                    $data['print'][0]->q_set_delivery = $set_delivery[0].' วัน '.$set_delivery[1];
                    if($data['print'][0]->q_warranty != ''):
                        $warranty = explode(':',$data['print'][0]->q_warranty);
                        $data['print'][0]->q_set_warranty_data = $data['print'][0]->q_warranty;
                        $data['print'][0]->q_warranty = $warranty[0].' วัน '.$warranty[1];
                    else:
                        $data['print'][0]->q_warranty = '';
                    endif;
                else:
                    $set_price = explode(':',$data['print'][0]->q_set_price);
                    $data['print'][0]->q_set_price_data = $data['print'][0]->q_set_price;
                    $data['print'][0]->q_set_price = '<i><u class="text-success">'.$set_price[0].' วัน </u></i>'.$set_price[1];
                    $set_delivery = explode(':',$data['print'][0]->q_set_delivery);
                    $data['print'][0]->q_set_delivery_data = $data['print'][0]->q_set_delivery;
                    $data['print'][0]->q_set_delivery = '<i><u class="text-success">'.$set_delivery[0].' วัน </u></i>'.$set_delivery[1];
                    if($data['print'][0]->q_warranty != ''):
                        $warranty = explode(':',$data['print'][0]->q_warranty);
                        $data['print'][0]->q_set_warranty_data = $data['print'][0]->q_warranty;
                        $data['print'][0]->q_warranty = '<i><u class="text-success">'.$warranty[0].' วัน </u></i>'.$warranty[1];
                    else:
                        $data['print'][0]->q_warranty = '';
                    endif;
                endif;
                foreach ($prodcut_detail as $key => $value):
                    $con['table'] = 'tb_product';
                    $con['where'] = 'p_id = "'.$value->p_id.'"';
                    $product = $this->page->select($con);
                    unset($con);
                    $data['print'][0]->product[$key]['p_id'] = $product[0]->p_id;
                    if($prodcut_detail[0]->product_name != ''):
                        $data['print'][0]->product[$key]['p_name'] = $prodcut_detail[0]->product_name;
                    else:
                        $data['print'][0]->product[$key]['p_name'] = $product[0]->p_code.' : '.$product[0]->p_detail;
                    endif;
                    if(strtolower($_SESSION['user']->division) == 'sale'):
                        $data['print'][0]->product[$key]['p_unit'] = $value->p_unit;
                        $data['print'][0]->product[$key]['p_qty'] = $value->p_qty;
                        $data['print'][0]->product[$key]['p_price'] = $value->p_price;
                        $data['print'][0]->product[$key]['p_discount'] = $value->p_discount;
                        $data['print'][0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        $data['print'][0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        if(!empty($value->p_discount)):
                            switch ($value->p_discount_type):
                                case 'percent':
                                    $data['print'][0]->product[$key]['p_price_sum'] = $data['print'][0]->product[$key]['p_price_sum'] - ($data['print'][0]->product[$key]['p_price_sum'] * ($value->p_discount/100));
                                    break;
                                case 'integer':
                                    $data['print'][0]->product[$key]['p_price_sum'] = $data['print'][0]->product[$key]['p_price_sum'] - $value->p_discount;
                                    break;
                                default:
                                // code...
                                break;
                            endswitch;
                        endif;
                        $data['print'][0]->sum_total += $data['print'][0]->product[$key]['p_price_sum'];
                        $data['print'][0]->product[$key]['p_price_sum'] = number_format($data['print'][0]->product[$key]['p_price_sum'],2);
                        $data['print'][0]->product[$key]['p_price'] = number_format($value->p_price,2);
                        $data['print'][0]->product[$key]['p_price_data'] = $value->p_price;
                    else:
                        $data['print'][0]->product[$key]['p_unit'] = $value->p_unit;
                        $data['print'][0]->product[$key]['p_qty'] = $value->p_qty;
                        $data['print'][0]->product[$key]['p_price'] = $value->p_price;
                        $data['print'][0]->product[$key]['p_discount'] = $value->p_discount;
                        $data['print'][0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        $data['print'][0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        if(!empty($value->p_discount)):
                            switch ($value->p_discount_type):
                                case 'percent':
                                    $data['print'][0]->product[$key]['p_price_sum'] = $data['print'][0]->product[$key]['p_price_sum'] - ($data['print'][0]->product[$key]['p_price_sum'] * ($value->p_discount/100));
                                    $data['print'][0]->product[$key]['p_price'] = $data['print'][0]->product[$key]['p_price_sum']/$value->p_unit;
                                    break;
                                case 'integer':
                                    $data['print'][0]->product[$key]['p_price_sum'] = $data['print'][0]->product[$key]['p_price_sum'] - $value->p_discount;
                                    $data['print'][0]->product[$key]['p_price'] = $data['print'][0]->product[$key]['p_price_sum']/$value->p_unit;
                                    break;
                                default:
                                // code...
                                break;
                            endswitch;
                        endif;
                        $data['print'][0]->sum_total += $data['print'][0]->product[$key]['p_price_sum'];
                        $data['print'][0]->product[$key]['p_price_sum'] = number_format($data['print'][0]->product[$key]['p_price_sum'],2);
                        $data['print'][0]->product[$key]['p_price'] = number_format($data['print'][0]->product[$key]['p_price'],2);
                        $data['print'][0]->product[$key]['p_price_data'] = $value->p_price;
                    endif;
                endforeach;
                //ลดราคาก่อนคิด vat
                $data['print'][0]->total_price = number_format($data['print'][0]->sum_total,2);
                if($data['print'][0]->q_discount_type == 'percent'): //ส่วนลดรวม
                    $data['print'][0]->q_discount_number = number_format($data['print'][0]->sum_total * ($data['print'][0]->q_discount/100),2);
                    $data['print'][0]->sum_total = $data['print'][0]->sum_total - ($data['print'][0]->sum_total * ($data['print'][0]->q_discount/100));
                    $data['print'][0]->q_discount = $data['print'][0]->q_discount.'%';
                else:
                    $data['print'][0]->sum_total = $data['print'][0]->sum_total - $data['print'][0]->q_discount;
                    $data['print'][0]->q_discount = number_format($data['print'][0]->q_discount,2);
                endif;
                // echo "<pre>";print_r($data);exit;
                // $data['print'][0]->sum_total = $data['print'][0]->sum_total - $data['print'][0]->q_discount;
                $data['print'][0]->price_vat = $data['print'][0]->sum_total * 0.934579439252336;
                // $data['print'][0]->price_vat = $data['print'][0]->sum_total * ($data['print'][0]->q_vat/100);
                $data['print'][0]->price_whitout_vat = number_format($data['print'][0]->sum_total - $data['print'][0]->price_vat,2);
                $data['print'][0]->price_vat = number_format($data['print'][0]->price_vat,2);
                $data['print'][0]->sum_total = number_format($data['print'][0]->sum_total,2);
                $sum_exp = explode(',',$data['print'][0]->sum_total);
                $sum_exp = implode('',$sum_exp);
                $data['print'][0]->sum_total_th = $this->Convert($sum_exp);

                //get q_note
                // $data['print'][0]->q_note
                $q_note = explode('|',$data['print'][0]->q_note);
                // $count_note = count($q_note) - 1;
                // $text_q_note = '';
                // foreach ($q_note as $key_note => $value_note):
                //     if($count_note != $key_note):
                //         $text_q_note .= ($key_note+1).'. '.$value_note.'<br>';
                //     endif;
                // endforeach;
            endif;
            if($_SESSION['user']->division == 'sale'):
                $q_ro = $data['print'][0]->q_ro = !empty($data['print'][0]->q_ro)?'RO. '.$data['print'][0]->q_ro:'';
                $q_customer_department = $data['print'][0]->q_customer_department = !empty($data['print'][0]->q_customer_department)?'แผนก '.$data['print'][0]->q_customer_department:'';
                $q_job_number = $data['print'][0]->q_job_number = !empty($data['print'][0]->q_job_number)?'Job - '.$data['print'][0]->q_job_number:'';
                $q_stock_number = $data['print'][0]->q_stock_number = !empty($data['print'][0]->q_stock_number)?'คุรภัณฑ์ : '.$data['print'][0]->q_stock_number:'';
                $data['print'][0]->list_detail = [$q_ro,$q_customer_department,$q_job_number,$q_stock_number];
            else:
                $q_stock_number = $data['print'][0]->q_stock_number = !empty($data['print'][0]->q_stock_number)?'<b>คุรภัณฑ์ : '.$data['print'][0]->q_stock_number.'</b>':'<b>เลขคุรภัณฑ์ :  - </b>';
                $data['print'][0]->list_detail = [$q_stock_number];
            endif;
            // $data['print'][0]->list_detail = $q_ro.$q_customer_department.$q_job_number.$q_stock_number;

            // $data['print'][0]->q_note = $text_q_note;
            $data['print'][0]->q_note = $q_note;
            $con['table'] = 'tb_quotation';
            $con['select'] = 'q_id';
            $con['where'] = 'q_num = "'.$data['print'][0]->q_num.'"';
            $con['order_by'] = 'q_id ASC';
            $get_version = $this->page->select($con);
            // echo "<pre>";print_r($get_version);exit;
            foreach ($get_version as $key => $value):
                if($value->q_id == $data['print'][0]->q_id):
                    $get_zero = '';
                    for ($i=strlen(($key+1)); $i < 2; $i++):
                        $get_zero .= '0';
                    endfor;
                    $data['print'][0]->version =  $get_zero.($key);
                endif;
            endforeach;
            $data['print'][0]->brand = '';
            if($brand != 'no_brand'):
                $data['print'][0]->brand = $brand;
            endif;
            $data['print'][0]->signature = $signature;
            // echo "<pre>";print_r($data);exit;
            $data['print'] = $data['print'][0];

            if($_SESSION['user']->division == 'IT'):
                $division = 'service';
            else:
                $division = strtolower($_SESSION['user']->division);
            endif;
            // $this->set_page('quotation/'.$division.'/list');
            $this->set_page('quotation/'.$division.'/print',$data);
            // echo "some things went wrong!!";
            // unset($con);
            // $this->set_page('print_quotation');
        else:
            if($_SESSION['user']->division == 'IT'):
                $division = 'sale';
            else:
                $division = strtolower($_SESSION['user']->division);
            endif;
            $this->set_page('quotation/'.$division.'/list');
        endif;
    }
    public function issue($value='')
    {
        if($_SESSION['user']->division == 'IT'):
            $this->set_page('issue_list');
        else:
            $this->set_page('list_issue');
        endif;
    }
    public function user($value='')
    {
        echo "this is user";
    }
    public function repair_order($value='')
    {
        if((isset($value) and !empty($value))):
            $con['table'] = 'tb_ro';
            $con['where'] = 'ro_id = "'.$this->decode($value).'"';
            $data['ro'] = $this->page->select($con);
            unset($con);
            if(count($data) > 0):
                $data['ro'] = $data['ro'][0];
                $con['table'] = 'tb_customer';
                $con['where'] = 'id = "'.$data['ro']->ro_customer_id.'"';
                $data['customer'] = $this->page->select($con);
                unset($con);
                if(count($data['customer']) > 0):
                    $data['customer'] = $data['customer'][0];
                endif;
                $data['ro']->ro_working_service_data = array();
                if(!empty($data['ro']->ro_working_service_id)):
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name';
                    $con['where'] = 'id = "'.$data['ro']->ro_working_service_id.'"';
                    $data['ro']->ro_working_service_data = $this->page->select($con);
                    unset($con);
                    $data['ro']->ro_working_service_data = $data['ro']->ro_working_service_data[0]->first_name.' '.$data['ro']->ro_working_service_data[0]->last_name;
                else:
                    $data['ro']->ro_working_service_data = '-';
                endif;
                $data['ro']->ro_working_result_service_data = array();
                if(!empty($data['ro']->ro_working_result_service_id)):
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name';
                    $con['where'] = 'id = "'.$data['ro']->ro_working_result_service_id.'"';
                    $data['ro']->ro_working_result_service_data = $this->page->select($con);
                    unset($con);
                    $data['ro']->ro_working_result_service_data = $data['ro']->ro_working_result_service_data[0]->first_name.' '.$data['ro']->ro_working_result_service_data[0]->last_name;
                else:
                    $data['ro']->ro_working_result_service_data = '-';
                endif;
                //get date and time
                if($data['ro']->ro_working_date != 0):
                    $ro_working_date = explode(' ',$data['ro']->ro_working_date);
                    $ro_working_time = explode(':',$ro_working_date[1]);
                    $ro_working_date = explode('-',$ro_working_date[0]);
                    $data['ro']->ro_working_date = $ro_working_date[2].'/'.$ro_working_date[1].'/'.substr(($ro_working_date[0]+543),2);
                    $data['ro']->ro_working_time = $ro_working_time[0].'.'.$ro_working_time[1];
                else:
                    $data['ro']->ro_working_date = '-';
                    $data['ro']->ro_working_time = '-';
                endif;
                if($data['ro']->ro_working_result_date != 0):
                    $ro_working_result_date = explode(' ',$data['ro']->ro_working_result_date);
                    $ro_working_result_date = explode('-',$ro_working_result_date[0]);
                    $data['ro']->ro_working_result_date = $ro_working_result_date[2].'/'.$ro_working_result_date[1].'/'.substr(($ro_working_result_date[0]+543),2);
                else:
                    // $data['ro']->ro_working_result_date = '-';
                    $data['ro']->ro_working_result_date = '-';
                endif;
                //get quotation
                $data['ro']->ro_quotation_data = array();
                if(!empty($data['ro']->ro_quotation_id)):
                    $con['table'] = 'tb_quotation';
                    $con['select'] = 'q_date,q_num,q_type';
                    $con['where'] = 'q_id = "'.$data['ro']->ro_quotation_id.'"';
                    $data['ro']->ro_quotation_data = $this->page->select($con);
                    unset($con);
                    if(count($data['ro']->ro_quotation_data) > 0):
                        foreach ($data['ro']->ro_quotation_data as $key_ro_quotation_data => $value_ro_quotation_data):
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
                if($data['ro']->ro_quotation_date == 0):
                    $data['ro']->ro_quotation_date = '-';
                endif;
                if(empty($data['ro']->ro_invoice_number)):
                    $data['ro']->ro_invoice_number = '-';
                endif;
                if($data['ro']->ro_invoice_date == 0):
                    $data['ro']->ro_invoice_date = '-';
                endif;
                if(empty($data['ro']->ro_of_number)):
                    $data['ro']->ro_of_number = '-';
                endif;
                if(empty($data['ro']->ro_working_result_product_detail)):
                    $data['ro']->ro_working_result_product_detail = '-';
                endif;
                if(empty($data['ro']->ro_equipment_product)):
                    $data['ro']->ro_equipment_product = '-';
                endif;
                if($data['ro']->ro_of_date == 0):
                    $data['ro']->ro_of_date = '-';
                endif;

                $data['ro']->ro_id_encode = $this->encode($data['ro']->ro_id);
                $con['table'] = 'tb_rod';
                $con['where'] = 'ro_id = "0'.$data['ro']->ro_id.'"';
                $prodcut_detail = $this->page->select($con);
                unset($con);
                $data['ro']->product = array();
                $data['ro']->sum_total = 0;
                if(count($prodcut_detail) > 0):
                    $data['ro']->product = array();
                    $data['ro']->sum_total = 0;
                    $num_for = 3;
                    for ($i=strlen($data['ro']->ro_number); $i < $num_for; $i++):
                        $data['ro']->ro_number = '0'.$data['ro']->ro_number;
                    endfor;
                    $get_year_create = explode(' ',$data['ro']->ro_create_date);
                    $get_year_create = explode('-',$get_year_create[0]);
                    $data['ro']->ro_number = $data['ro']->ro_number.'/'.$get_year_create[0];
                    $data['ro']->ro_date_th = $this->date_th($data['ro']->ro_create_date,2);
                    foreach ($prodcut_detail as $key => $value):
                        $con['table'] = 'tb_product';
                        $con['where'] = 'p_id = "'.$value->rod_product_id.'"';
                        $product = $this->page->select($con);
                        unset($con);
                        $data['ro']->product[$key]['p_id'] = $product[0]->p_id;
                        if(!empty($prodcut_detail[$key]->product_name)):
                            $data['ro']->product[$key]['p_name'] = $prodcut_detail[$key]->product_name;
                        else:
                            $data['ro']->product[$key]['p_name'] = $product[0]->p_detail;
                            $data['ro']->product[$key]['p_code'] = $product[0]->p_code;
                        endif;
                        $data['ro']->product[$key]['p_unit'] = $value->rod_product_unit;
                        $data['ro']->product[$key]['p_price_sum'] = $value->rod_product_price * $value->rod_product_unit;
                        $data['ro']->sum_total += $data['ro']->product[$key]['p_price_sum'];
                        $data['ro']->product[$key]['p_price_sum'] = number_format($data['ro']->product[$key]['p_price_sum'],2);
                        $data['ro']->product[$key]['p_price'] = $value->rod_product_price;
                    endforeach;
                endif;
            endif;
            // echo "<pre>";print_r($data);exit;
            $this->set_page('repair_order/print',$data);
        else:
            $this->set_page('repair_order/list');
        endif;
    }
}
 ?>
