<?php /**
 *
 */
class Quotation extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->quo = $this->model('Quotation_model');
    }
    public function index($value='')
    {
        // code...
    }
    public function list($value='')
    {
      if(isset($_POST['status']) and !empty($_POST['status']) and $_POST['status'] == 'get'):
              $con['table'] = 'tb_quotation';
              $con['select'] = 'q_id,q_date,q_num,q_service_id,q_type,q_topic,q_to,q_to_detail,q_stock_number,q_agent_service,q_set_price,q_set_delivery,q_warranty,q_status,';
              $con['select'] .= 'q_status_customer,q_status_customer_date,q_status_date,q_ro,q_customer_id';
              $user_status = '';
              $con['where'] = '';
              $data_year = '';
              if(strtolower($_SESSION['user']->division) == 'service'):
                  switch ($_SESSION['user']->position):
                      case 'Service Ad.':
                          // $con['where'] = 'q_emp_id = "'.$_SESSION['user']->user_id.'" AND';
                          $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                          // $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                          $user_status = 'admin';
                          break;
                      case 'Service Eng.':
                          $con['where'] = 'q_service_id = "'.$_SESSION['user']->id.'" AND q_status = "approved" AND';
                          $user_status = 'service';
                          break;
                      case ($_SESSION['user']->position == 'Service Supervisor' || $_SESSION['user']->position == 'Service Manager'):
                          $con['where'] = 'q_head_id = "'.$_SESSION['user']->user_id.'" AND';
                          $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                          $user_status = 'supervisor';
                          break;
                      case 'IT':
                          $user_status = 'it';
                          break;
                      default:
                          break;
                  endswitch;
                  $con_year['where'] = $con['where'].' q_type NOT IN("SUP","AC")';
                  $con['where'] .= ' q_type NOT IN("SUP","AC") AND';
                  $con_year['table'] = 'tb_quotation';
                  $con_year['select'] = 'YEAR(q_date) AS q_date';
                  $con_year['group_by'] = 'YEAR(q_date)';
                  $data_year = $this->quo->select($con_year);
                  unset($con_year);
              elseif(strtolower($_SESSION['user']->division) == 'sale'): // case sale
                  switch ($_SESSION['user']->position):
                      case ($_SESSION['user']->position == 'Admin Sale Manager' || $_SESSION['user']->position == 'Sale Manager'):
                          $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                          $user_status = 'supervisor';
                          break;
                      case 'Admin Sale':
                          $con['where'] .= ' q_status IN("new","edit","approved") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                          $user_status = 'admin';
                          break;
                      case 'Sale Rep.':
                          $con['where'] .= ' q_status IN("new","edit","approved") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                          $con['where'] .= ' q_emp_id = "'.$_SESSION['user']->id.'" AND';
                          $user_status = 'sale';
                          break;
                      default:
                          // code...
                          break;
                  endswitch;
                  $con_year['where'] = $con['where'].' q_type IN("SUP","AC")';
                  $con['where'] .= ' q_type IN("SUP","AC") AND';
                  $con_year['table'] = 'tb_quotation';
                  $con_year['select'] = 'YEAR(q_date) AS q_date';
                  $con_year['group_by'] = 'YEAR(q_date)';
                  $data_year = $this->quo->select($con_year);
                  unset($con_year);
              elseif(strtolower($_SESSION['user']->division) == 'it'):
                  // $con_year['where'] = ' q_type IN("SUP","AC")';
                  // $con['where'] .= ' q_type IN("SUP","AC") AND';
                  $con_year['table'] = 'tb_quotation';
                  $con_year['select'] = 'YEAR(q_date) AS q_date';
                  $con_year['group_by'] = 'YEAR(q_date)';
                  $data_year = $this->quo->select($con_year);
                  unset($con_year);
              endif;
              //get data by set years
              if((isset($_POST['year_start']) and isset($_POST['year_end'])) and (!empty($_POST['year_start']) and !empty($_POST['year_end']))):
                  $con['where'] .= ' YEAR(q_date) >= "'.($_POST['year_start']-543).'" AND YEAR(q_date) <= "'.($_POST['year_end']-543).'"';
              else:
                  $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
              endif;
              $con['order_by'] = 'q_id DESC';
              $data = $this->quo->select($con);
              unset($con);
              $con['table'] = 'tb_customer';
              $data_customer = $this->quo->select($con);
              unset($con);
              if(count($data) > 0):
                  $customer = array();
                  foreach ($data_customer as $key_cus => $value_cus):
                      $customer[$value_cus->id] = $value_cus->cus_name;
                  endforeach;

                  foreach ($data as $key => $value):
                      for ($i=strlen($value->q_num); $i < 4; $i++):
                          $value->q_num = '0'.$value->q_num;
                      endfor;
                      $value->q_number = $value->q_type.'.'.$value->q_num.'/'.substr($value->q_date,0,4);
                      $value->q_id_code = $this->encode($value->q_id);
                      if($value->q_customer_id != ''):
                          $value->q_customer_name = $customer[$value->q_customer_id];
                      else:
                      $value->q_customer_name = 'ไม่ได้เลือกโรงพยาบาล';
                      endif;
                  endforeach;
                  echo json_encode(array('success',$data,$user_status,$data_year));
              else:
                  echo json_encode(array('empty'));
              endif;
          endif;
    }
    public function get_new_quotation($value='')
    {
        if(isset($_POST['status']) and !empty($_POST['status'])):
            $con['table'] = 'tb_quotation';
            $con['select'] = 'q_id,q_date,q_num,q_service_id,q_type,q_topic,q_to,q_to_detail,q_stock_number,q_agent_service,q_set_price,q_set_delivery,q_warranty,q_status,';
            $con['select'] .= 'q_status_customer,q_status_customer_date,q_status_date,q_ro,q_customer_id';
            $user_status = '';
            $con['where'] = '';
            $data_year = '';
            if(strtolower($_SESSION['user']->division) == 'service'):
                switch ($_SESSION['user']->position):
                    case 'Service Ad.':
                        $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                        $user_status = 'admin';
                        break;
                    case 'Service Eng.':
                        $con['where'] = 'q_service_id = "'.$_SESSION['user']->id.'" AND q_status = "approved" AND';
                        $user_status = 'service';
                        break;
                    case ($_SESSION['user']->position == 'Service Supervisor' || $_SESSION['user']->position == 'Service Manager'):
                        $con['where'] = 'q_head_id = "'.$_SESSION['user']->user_id.'" AND';
                        $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                        $user_status = 'supervisor';
                        break;
                    case 'IT':
                        $user_status = 'it';
                        break;
                    default:
                        break;
                endswitch;
                $con_year['where'] = $con['where'].' q_type NOT IN("SUP","AC")';
                $con['where'] .= ' q_type NOT IN("SUP","AC") AND';
                $con_year['table'] = 'tb_quotation';
                $con_year['select'] = 'YEAR(q_date) AS q_date';
                $con_year['group_by'] = 'YEAR(q_date)';
                $data_year = $this->quo->select($con_year);
                unset($con_year);
            elseif(strtolower($_SESSION['user']->division) == 'sale'): // case sale
                switch ($_SESSION['user']->position):
                    case ($_SESSION['user']->position == 'Admin Sale Manager' || $_SESSION['user']->position == 'Sale Manager'):
                        $con['where'] .= ' q_status IN("new","edit","approved","cancel") AND';
                        $user_status = 'supervisor';
                        break;
                    case 'Admin Sale':
                        $con['where'] .= ' q_status IN("new","edit","approved") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                        $user_status = 'admin';
                        break;
                    case 'Sale Rep.':
                        $con['where'] .= ' q_status IN("new","edit","approved") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                        $con['where'] .= ' q_emp_id = "'.$_SESSION['user']->id.'" AND';
                        $user_status = 'sale';
                        break;
                    default:
                        // code...
                        break;
                endswitch;
                $con_year['where'] = $con['where'].' q_type IN("SUP","AC")';
                $con['where'] .= ' q_type IN("SUP","AC") AND';
                $con_year['table'] = 'tb_quotation';
                $con_year['select'] = 'YEAR(q_date) AS q_date';
                $con_year['group_by'] = 'YEAR(q_date)';
                $data_year = $this->quo->select($con_year);
                unset($con_year);
            elseif(strtolower($_SESSION['user']->division) == 'it'):
                // $con_year['where'] = ' q_type IN("SUP","AC")';
                // $con['where'] .= ' q_type IN("SUP","AC") AND';
                $con_year['table'] = 'tb_quotation';
                $con_year['select'] = 'YEAR(q_date) AS q_date';
                $con_year['group_by'] = 'YEAR(q_date)';
                $data_year = $this->quo->select($con_year);
                unset($con_year);
            endif;
            //get data by set years
            if((isset($_POST['year_start']) and isset($_POST['year_end'])) and (!empty($_POST['year_start']) and !empty($_POST['year_end']))):
                $con['where'] .= ' YEAR(q_date) >= "'.($_POST['year_start']-543).'" AND YEAR(q_date) <= "'.($_POST['year_end']-543).'"';
            else:
                $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
            endif;
            $con['where'] .= 'AND q_id > "'.$_POST['last_id'].'"';
            $con['order_by'] = 'q_id DESC';
            $data = $this->quo->select($con);
            unset($con);
            $con['table'] = 'tb_customer';
            $data_customer = $this->quo->select($con);
            unset($con);
            if(count($data) > 0):
                $customer = array();
                foreach ($data_customer as $key_cus => $value_cus):
                    $customer[$value_cus->id] = $value_cus->cus_name;
                endforeach;

                foreach ($data as $key => $value):
                    for ($i=strlen($value->q_num); $i < 4; $i++):
                        $value->q_num = '0'.$value->q_num;
                    endfor;
                    $value->q_number = $value->q_type.'.'.$value->q_num.'/'.substr($value->q_date,0,4);
                    $value->q_id_code = $this->encode($value->q_id);
                    if($value->q_customer_id != ''):
                        $value->q_customer_name = $customer[$value->q_customer_id];
                    else:
                    $value->q_customer_name = 'ไม่ได้เลือกโรงพยาบาล';
                    endif;
                endforeach;
                echo json_encode(array('success',$data,$user_status,$data_year));
            else:
                echo json_encode(array('empty'));
            endif;
        endif;
    }
    public function print_report($date_start='',$date_end='')
    {
        $con['table'] = 'tb_quotation';
        $con['select'] = 'q_id,q_date,q_num,q_service_id,q_type,q_topic,q_to,q_to_detail,q_stock_number,q_agent_service,q_set_price,q_set_delivery,q_warranty,q_status,';
        $con['select'] .= 'q_status_customer,q_customer_department,q_status_customer_date,q_status_date,q_ro,q_customer_id,q_brand,q_model,q_sn,q_remark_customer,q_discount,q_vat,q_po,';
        $con['select'] .= 'q_head_id,q_po,q_po_date';
        $user_status = '';
        // $con['where'] = '';
        switch ($_SESSION['user']->position):
            case ($_SESSION['user']->position == 'Service Supervisor' || $_SESSION['user']->position == 'Service Manager'):
                $con['where'] = 'q_head_id = "'.$_SESSION['user']->user_id.'" AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'supervisor';
                break;
            case 'IT':
                $con['where'] = ' q_status != "cancel" AND';
                $user_status = 'it';
                break;

            default:
                break;
        endswitch;
        if((isset($date_start) and !empty($date_start))):
            if((isset($date_end) and !empty($date_end))):
                if($date_start == $date_end):
                    $con['where'] .= ' q_date LIKE "'.$date_start.'%"';
                elseif($date_start > $date_end):
                    $con['where'] .= ' (q_date >= DATE("'.$date_end.'") AND q_date <= DATE("'.$date_start.'"))';
                else:
                    $con['where'] .= ' (q_date >= DATE("'.$date_start.'") AND q_date <= DATE("'.$date_end.'"))';
                endif;
            else:
                $con['where'] .= ' q_date >= DATE("'.$date_start.'")';
            endif;
        else:
            if((isset($date_end) and !empty($date_end))):
                $con['where'] .= ' q_date >= DATE("'.$date_end.'")';
                // $con['where'] .= ' q_date <= DATE("'.$_POST['date_end'].'")';
            else:
                $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
            endif;
        endif;
        $con['order_by'] = 'q_id ASC';
        $data = $this->quo->select($con);
        unset($con);

        $this->set_page('quotation/print_report');
    }
    public function report($type_page='')
    {
        $con['table'] = 'tb_quotation';
        $con['select'] = 'q_id,q_date,q_num,q_service_id,q_type,q_topic,q_to,q_to_detail,q_stock_number,q_agent_service,q_set_price,q_set_delivery,q_warranty,q_status,';
        $con['select'] .= 'q_status_customer,q_customer_department,q_status_customer_date,q_status_date,q_ro,q_customer_id,q_brand,q_model,q_sn,q_remark_customer,q_discount,q_discount_type,q_vat,q_po,';
        $con['select'] .= 'q_head_id,q_po,q_po_date';
        $user_status = '';
        $con['where'] = '';
        switch ($_SESSION['user']->position):
            case ($_SESSION['user']->position == 'Service Supervisor' || $_SESSION['user']->position == 'Service Manager'):
                $con['where'] = 'q_head_id = "'.$_SESSION['user']->id.'" AND';
                $con['where'] .= ' q_type IN("SER","SER-PM","SER-IN") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'supervisor';
                break;
            case ($_SESSION['user']->position == 'Service Ad.'):
                $con['where'] .= ' q_type IN("SER","SER-PM","SER-IN") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'supervisor';
                break;
            case ($_SESSION['user']->position == 'Admin Sale Manager' || $_SESSION['user']->position == 'Sale Manager'):
                $con['where'] .= ' q_type IN("SUP","AC") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'supervisor';
                break;
            case 'Admin Sale':
                $con['where'] .= ' q_type IN("SUP","AC") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'admin';
                break;
            case 'Sale Rep.':
                $con['where'] = 'q_emp_id = "'.$_SESSION['user']->id.'" AND';
                $con['where'] .= ' q_type IN("SUP","AC") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'admin';
                break;
            case 'Service Eng.':
                $con['where'] = 'q_emp_id = "'.$_SESSION['user']->id.'" OR q_service_id = "'.$_SESSION['user']->id.'" AND';
                $con['where'] .= ' q_type IN("SER","SER-PM","SER-IN") AND';
                $con['where'] .= ' q_status != "cancel" AND';
                $user_status = 'admin';
                break;
            case 'IT':
                $con['where'] = ' q_status != "cancel" AND';
                $user_status = 'it';
                break;
            default:
                break;
        endswitch;
        //search date default
        if((isset($_POST['date_start']) and !empty($_POST['date_start']))):
            if((isset($_POST['date_end']) and !empty($_POST['date_end']))):
                if($_POST['date_start'] == $_POST['date_end']):
                    $con['where'] .= ' q_date LIKE "'.$_POST['date_start'].'%"';
                elseif($_POST['date_start'] > $_POST['date_end']):
                    $con['where'] .= ' (q_date >= DATE("'.$_POST['date_end'].'") AND q_date <= "'.$_POST['date_start'].' 23:59:59")';
                    // $con['where'] .= ' (q_date >= DATE("'.$_POST['date_end'].'") AND q_date <= DATE("'.$_POST['date_start'].'"))';
                else:
                    $con['where'] .= ' (q_date >= DATE("'.$_POST['date_start'].'") AND q_date <= "'.$_POST['date_end'].' 23:59:59")';
                    // $con['where'] .= ' (q_date >= DATE("'.$_POST['date_start'].'") AND q_date <= DATE("'.$_POST['date_end'].'"))';
                endif;
            else:
                $con['where'] .= ' q_date >= DATE("'.$_POST['date_start'].'")';
            endif;
        else:
            if((isset($_POST['date_end']) and !empty($_POST['date_end']))):
                $con['where'] .= ' q_date >= DATE("'.$_POST['date_end'].'")';
            else:
                $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
                // $con['where'] .= ' YEAR(q_date) >= "2019"';
            endif;
        endif;
        // $con['order_by'] = 'q_id ASC';
        $con['order_by'] = 'q_date ASC';
        $data = $this->quo->select($con);
        unset($con);
        $con['table'] = 'tb_customer';
        $data_customer = $this->quo->select($con);
        unset($con);
        $data_detail = new stdClass;
        $data_detail->sum_all = 0;
        $data_detail->status = array();
        // $this->log($data);
        if(count($data) > 0):
            $customer = array();
            foreach ($data_customer as $key_cus => $value_cus):
                $customer[$value_cus->id] = $value_cus->cus_name;
            endforeach;
            //get head
            $con['table'] = 'tb_user';
            $con['select'] = 'id,first_name';
            if(strtolower($_SESSION['user']->division) == 'service'):
                $con['where'] = 'position = "Service Supervisor" OR position = "Service Manager"';
            elseif(strtolower($_SESSION['user']->division) == 'sale'):
                $con['where'] = 'position = "Area Manager" OR position = "Sale Manager" OR position = "Service Supervisor" OR position = "Service Manager"';
            endif;
            $data_head = $this->quo->select($con);
            unset($con);
            $head = array();
            foreach ($data_head as $key_head => $value_head):
                $head[$value_head->id] = $value_head->first_name;
            endforeach;
            // $this->log($head);
            $head['have_no_head'] = 'have_no_head';

            $report = array();
            $check_date = array('','','');
            $report_key = array('','','');
            $check_service = '';
            $check_head = '';
            foreach ($data as $key => $value):
                /*---------------------------------*/
                $get_year_for_check = explode('-',$value->q_date);
                if($get_year_for_check[0] != $check_date[0]): // get key year
                    $check_date[0] = $get_year_for_check[0];
                    if($get_year_for_check[1] != $check_date[1]): //get key month
                        $check_date[1] = $get_year_for_check[1];
                    endif;
                endif;
                if(!isset($report[$check_date[0]][$check_date[1]])):
                    $report[$check_date[0]][$check_date[1]] = array();
                endif;
                //ต้องมีเช็ค id service
                $con['table'] = 'tb_user';
                $con['select'] = 'id,first_name,head';
                $con['where'] = 'id = "'.$value->q_service_id.'"';
                $service_eng = $this->quo->select($con);
                unset($con);
                $service_eng = $service_eng[0];

                if(empty($service_eng->head)):
                    $service_eng->head = 'have_no_head';
                endif;
                if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]])):
                    $count_service_eng = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->sum_text = '-';
                endif;

                if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]) and $service_eng->first_name != $check_service):
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait'] = new stdClass;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->discount = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum_text = '-';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->num = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->sum = 0;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->num_text = '0';
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->sum_text = '-';
                    $check_service = $service_eng->first_name;
                    $check_head = $head[$service_eng->head];
                else:

                endif;

                //all status
                if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num)): //get quotation number จำนวนใบ ทั้งหมด
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num = 1;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num += 1;
                else:
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num += 1;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num += 1;
                endif;
                if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum)): // get sum จำนวนเงิน รายบุคคล
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum = 0;
                endif;
                $con['table'] = 'tb_quotation_d';
                $con['where'] = 'q_id = "'.$data[$key]->q_id.'"';
                $prodcut_detail = $this->quo->select($con);
                unset($con);
                foreach ($prodcut_detail as $key_pro => $value_pro): // get data product from quotation
                    $p_discount = 0;
                    if(!empty($value_pro->p_discount)):
                        if($value_pro->p_discount_type == 'percent'):
                            $p_discount = intval(($value_pro->p_price * $value_pro->p_unit) * ($value_pro->p_discount / 100));
                        else:
                            $p_discount = intval($value_pro->p_discount);
                        endif;
                        $p_discount = intval($p_discount);
                    endif;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->discount += $p_discount;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum,2);
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                    $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum,2);
                endforeach;

                //approved
                if($value->q_status_customer == 'approved'):
                    if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num)): //get quotation number จำนวนใบ ทั้งหมด
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num = 1;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->num += 1;
                    else:
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num += 1;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->num += 1;
                    endif;
                    if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum)): // get sum จำนวนเงิน รายบุคคล
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum = 0;
                    endif;
                    $con['table'] = 'tb_quotation_d';
                    $con['where'] = 'q_id = "'.$data[$key]->q_id.'"';
                    $prodcut_detail = $this->quo->select($con);
                    unset($con);
                    foreach ($prodcut_detail as $key_pro => $value_pro): // get data product from quotation
                        $p_discount = 0;
                        if($value_pro->p_discount_type == 'percent'):
                            $p_discount = intval(($value_pro->p_price * $value_pro->p_unit) * ($value_pro->p_discount / 100));
                        else:
                            $p_discount = intval($value_pro->p_discount);
                        endif;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum,2);
                    endforeach;
                endif;
                //cancel
                if($value->q_status_customer == 'reject'):
                    if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num)): //get quotation number จำนวนใบ ทั้งหมด
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num = 1;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->num += 1;
                    else:
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num += 1;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->num += 1;
                    endif;
                    if(!isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum)): // get sum จำนวนเงิน รายบุคคล
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum = 0;
                    endif;
                    $con['table'] = 'tb_quotation_d';
                    $con['where'] = 'q_id = "'.$data[$key]->q_id.'"';
                    $prodcut_detail = $this->quo->select($con);
                    unset($con);
                    foreach ($prodcut_detail as $key_pro => $value_pro): // get data product from quotation
                        $p_discount = 0;
                        if($value_pro->p_discount_type == 'percent'):
                            $p_discount = intval(($value_pro->p_price * $value_pro->p_unit) * ($value_pro->p_discount / 100));
                        else:
                            $p_discount = intval($value_pro->p_discount);
                        endif;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum_total += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum += ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                        $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum,2);
                    endforeach;
                endif;
                //get wait num
                $approved_num = 0;
                $reject_num = 0;
                $all_num = 0;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num)):
                    $approved_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num;
                endif;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num)):
                    $reject_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num;
                endif;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num)):
                    $all_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num;
                endif;
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->num = number_format($all_num - ($approved_num + $reject_num));
                $total_all_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num;
                $total_approve_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->num;
                $total_reject_num = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->num;
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->num = $total_all_num - ($total_approve_num + $total_reject_num);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->num);

                //get wait sum
                $approved_sum = 0;
                $reject_sum = 0;
                $all_sum = 0;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum)):
                    $approved_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->sum;
                endif;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum)):
                    $reject_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->sum;
                endif;
                if(isset($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum)):
                    $all_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->sum;
                endif;
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->sum = $all_sum - ($approved_sum + $reject_sum);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->sum_text = number_format($all_sum - ($approved_sum + $reject_sum),2);
                $total_all_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->sum;
                $total_approve_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['approved']->sum;
                $total_reject_sum = $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['reject']->sum;
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->sum = $total_all_sum - ($total_approve_sum + $total_reject_sum);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->sum_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['wait']->sum,2);


                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['all']->num);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['approved']->num);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['reject']->num);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]][$service_eng->first_name]['wait']->num);
                $report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num_text = number_format($report[$check_date[0]][$check_date[1]][$head[$service_eng->head]]['total']['all']->num);
                /*---------------------------------*/


                if(strtolower($_SESSION['user']->division) == 'sale'):
                    for ($i=strlen($value->q_num); $i < 4; $i++):
                        $value->q_num = '0'.$value->q_num;
                    endfor;
                else:
                    for ($i=strlen($value->q_num); $i < 3; $i++):
                        $value->q_num = '0'.$value->q_num;
                    endfor;
                endif;
                $value->q_number = $value->q_type.'.'.$value->q_num.'/'.substr($value->q_date,0,4);
                $value->q_id_code = $this->encode($value->q_id);
                if($value->q_customer_id != ''):
                    $value->q_customer_name = $customer[$value->q_customer_id];
                else:
                    $value->q_customer_name = 'ไม่ได้เลือกโรงพยาบาล';
                endif;
                $data[0]->q_id_encode = $this->encode($data[0]->q_id);
                $con['table'] = 'tb_quotation_d';
                $con['where'] = 'q_id = "'.$data[$key]->q_id.'"';
                $prodcut_detail = $this->quo->select($con);
                unset($con);
                $data[$key]->product = array();
                $data[$key]->sum_total = 0;
                for ($i=strlen($data[$key]->q_num); $i < 3; $i++):
                    $data[$key]->q_num = '0'.$data[$key]->q_num;
                endfor;
                $data[$key]->q_date_th = $this->date_th($data[$key]->q_date,2);
                if (!empty($data[$key]->q_status_customer)):
                    $data[$key]->q_create_date_th = $this->date_th($data[$key]->q_status_customer_date,2);
                else:
                    $data[$key]->q_create_date_th = '-';
                endif;
                $data[$key]->q_number = $data[$key]->q_type.'.'.$data[$key]->q_num.'/'.(substr($data[$key]->q_date,0,4)+543);
                $set_price = explode(':',$data[$key]->q_set_price);
                $data[$key]->q_set_price_data = $data[$key]->q_set_price;
                $data[$key]->q_set_price = '<u>'.$set_price[0].' วัน </u>'.$set_price[1];
                $set_delivery = explode(':',$data[$key]->q_set_delivery);
                $data[$key]->q_set_delivery_data = $data[$key]->q_set_delivery;
                $data[$key]->q_set_delivery = '<u>'.$set_delivery[0].' วัน </u>'.$set_delivery[1];
                $warranty = explode(':',$data[$key]->q_warranty);
                $data[$key]->q_set_warranty_data = $data[$key]->q_warranty;
                $data[$key]->q_warranty = '<u>'.$warranty[0].' วัน </u>'.$warranty[1];
                foreach ($prodcut_detail as $key_pro => $value_pro):
                    $con['table'] = 'tb_product';
                    $con['where'] = 'p_id = "'.$value_pro->p_id.'"';
                    $product = $this->quo->select($con);
                    unset($con);
                    if(count($product) > 0):
                        $data[$key]->product[$key_pro]['p_id'] = $product[0]->p_id;
                        if(!empty($product[0]->product_name)):
                            $data[$key]->product[$key_pro]['p_name'] = $product[0]->product_name;
                        else:
                            $data[$key]->product[$key_pro]['p_name'] = $product[0]->p_code.' : '.$product[0]->p_detail;
                        endif;
                        $data[$key]->product[$key_pro]['p_unit'] = $value_pro->p_unit;
                        $data[$key]->product[$key_pro]['p_qty'] = $value_pro->p_qty;
                        $p_discount = 0;
                        if($value_pro->p_discount_type == 'percent'):
                            $p_discount = intval(($value_pro->p_price * $value_pro->p_unit) * ($value_pro->p_discount / 100));
                        else:
                            $p_discount = intval($value_pro->p_discount);
                        endif;
                        $data[$key]->product[$key_pro]['p_price_sum'] = ($value_pro->p_price * $value_pro->p_unit) - $p_discount;
                        $data[$key]->sum_total += $data[$key]->product[$key_pro]['p_price_sum'];
                        $data[$key]->product[$key_pro]['p_price_sum'] = number_format($data[$key]->product[$key_pro]['p_price_sum'],2);
                        $data[$key]->product[$key_pro]['p_price'] = number_format($value_pro->p_price,2);
                        $data[$key]->product[$key_pro]['p_price_data'] = $value_pro->p_price;
                    endif;
                endforeach;
                //get status : get data detail
                if($value->q_status_customer != ''):
                    if(!isset($data_detail->status['customer_'.$value->q_status_customer])):
                        $data_detail->status['customer_'.$value->q_status_customer] = 0;
                    endif;
                    $data_detail->status['customer_'.$value->q_status_customer] += 1;
                    $data_detail->sum['customer_'.$value->q_status_customer] = number_format($data[$key]->sum_total,2);
                else:
                    if(!isset($data_detail->status[$value->q_status])):
                        $data_detail->status[$value->q_status] = 0;
                    endif;
                    $data_detail->status[$value->q_status] += 1;
                    $data_detail->sum[$value->q_status] = number_format($data[$key]->sum_total,2);
                endif;
                //ลดราคาก่อนคิด vat
                $data[$key]->total_price = number_format($data[$key]->sum_total,2);
                // $data[$key]->sum_total = $data[$key]->sum_total - $data[$key]->q_discount;
                $data[$key]->price_vat = $data[$key]->sum_total * ($data[$key]->q_vat/100);
                $data[$key]->price_whitout_vat = number_format($data[$key]->sum_total - $data[$key]->price_vat,2);
                $data[$key]->price_vat = number_format($data[$key]->price_vat,2);
                $sum_exp = explode(',',$data[$key]->sum_total);
                $sum_exp = implode('',$sum_exp);
                $data[$key]->sum_total_th = $this->Convert($sum_exp);
                // $data[$key]->q_discount = number_format($data[$key]->q_discount,2);
                if($data[$key]->q_discount_type == 'percent'):
                    $data[$key]->sum_total = $data[$key]->sum_total - ($data[$key]->sum_total * ($data[$key]->q_discount/100));
                    $data[$key]->q_discount_text = $data[$key]->q_discount;
                    $data[$key]->q_discount = $data[$key]->q_discount.'%';
                else:
                    $data[$key]->sum_total = $data[$key]->sum_total - $data[$key]->q_discount;
                    $data[$key]->q_discount = number_format($data[$key]->q_discount,2);
                    $data[$key]->q_discount_text = number_format($data[$key]->q_discount,2);
                endif;
                $data_detail->sum_all += $data[$key]->sum_total; //ราคารวมทั้งหมด
                $data[$key]->sum_total = number_format($data[$key]->sum_total,2);
                $data[$key]->q_po_date_th = '-';
                if($data[$key]->q_po != ''):
                    $data[$key]->q_po_date_th = $this->date_th($data[$key]->q_po_date,1);
                    $data[$key]->q_po_date = str_replace(' ','T',substr($data[$key]->q_po_date,0,-3));
                else:
                    $data[$key]->q_po_date = '';
                endif;
                $data[$key]->q_po_date = substr($data[$key]->q_po_date,0,-2);
                $data[$key]->q_agent_service = str_replace('โทร.',' โทร.',$data[$key]->q_agent_service);
                $data[$key]->q_service_name = array_values(explode('โทร.',$data[$key]->q_agent_service))[0];
                $con['table'] = 'tb_user';
                $con['select'] = 'first_name,last_name';
                $con['where'] = 'id = "'.$data[$key]->q_head_id.'"';
                $head_service = $this->quo->select($con);
                unset($con);
                $data[$key]->q_head_service_name = $head_service[0]->first_name.' '.$head_service[0]->last_name;
            endforeach;
            // echo "<pre>";print_r($report);exit;

            $data_detail->sum_all = number_format($data_detail->sum_all,2);
            // echo "<pre>";print_r($data_detail);exit;
            // echo "<pre>";print_r($data);exit;
            if(!empty($type_page)):
                $print['print'] = $data;
                $print['data_detail'] = $data_detail;
                $print['user_status'] = $user_status;
                switch ($_SESSION['user']->division):
                    case 'Sale':
                        $this->set_page('quotation/sale/print_report',$print);
                        break;
                    case 'Service':
                        $this->set_page('quotation/service/print_report',$print);
                        break;
                    default:
                        break;
                endswitch;
            else:
                if (strtolower($_SESSION['user']->division) == 'sale'):
                    echo json_encode(array('success',$data,$data_detail,$user_status));
                elseif(strtolower($_SESSION['user']->division) == 'service' or strtolower($_SESSION['user']->division) == 'it'):
                    echo json_encode(array('success',$report,$data_detail,$user_status));
                endif;
            endif;
        else:
            echo json_encode(array('empty'));
        endif;

        // if(count($data) > 0):
        //     echo json_encode(array('success',$data));
        // else:
        //     echo json_encode(array('fail'));
        // endif;

    }
    public function add($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        if(isset($_POST['add_quotation']) and !empty($_POST['add_quotation'])):
            $con['table'] = 'tb_quotation';
            $con['select'] = 'MAX(q_num) AS q_num';
            if (strtolower($_SESSION['user']->division) == 'sale'):
                $con['where'] = 'q_type  IN("SUP","AC") AND';
            elseif(strtolower($_SESSION['user']->division) == 'service'):
                $con['where'] = 'q_type NOT IN("SUP","AC") AND';
            endif;
            $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
            $max_num = $this->quo->select($con);
            unset($con);
            if(count($max_num) > 0):
                $max_num = $max_num[0]->q_num + 1;
            else:
                $max_num = 1;
            endif;

            if(isset($_POST['q_customer_id']) and !empty($_POST['q_customer_id'])):
                $q_customer_id = $_POST['q_customer_id'];
            else:
                $q_customer_id = '';
            endif;

            //ไม่ได้ตรวจสอบว่ามีซ้ำบน database รึป่าว
            if(isset($_POST['q_num_manual']) and !empty($_POST['q_num_manual'])):
                $max_num = $_POST['q_num_manual'];
            endif;

            //add new customer
            if(isset($_POST['q_customer_name']) and !empty($_POST['q_customer_name'])):
                $con['table'] = 'tb_customer';
                $con['where'] = 'cus_name = "'.$_POST['q_customer_name'].'"';
                $customer = $this->quo->select($con);
                unset($con);
                if(count($customer) > 0):
                    echo json_encode(array('fail','มีลูกค้านี้อยู่แล้วในระบบ'));exit;
                elseif(count($customer) < 1):
                    $con['table'] = 'tb_customer';
                    $con['data'] = array('cus_name' => $_POST['q_customer_name']);
                    $this->quo->insert($con);
                    unset($con);
                    $con['table'] = 'tb_customer';
                    $con['where'] = 'cus_name = "'.$_POST['q_customer_name'].'"';
                    $customer = $this->quo->select($con);
                    unset($con);
                    if(count($customer) > 0):
                        $q_customer_id = $customer[0]->id;
                    else:
                        echo json_encode(array('fail','เพิ่มข้อมูลไม่สำเร็จ'));exit;
                    endif;
                endif;
            endif;

            $agent_service = '';
            if(isset($_POST['q_service_name']) and !empty($_POST['q_service_name'])):
                $agent_service = explode(',',$_POST['q_service_name']);
            endif;

            //check status position
            switch ($_SESSION['user']->position):
                case 'Sale Rep.': //ฝ่ายขาย(sale)
                    $agent_service[0] = $_SESSION['user']->id;
                    break;
                case 'Sale Manager': //Sale manager
                    $agent_service = explode(',',$_POST['q_service_name']);
                    break;

                default:
                    // code...
                    break;
            endswitch;
            // if(strtolower($_SESSION['user']->division) == 'sale'):
            //     $agent_service[0] = $_SESSION['user']->id;
            // endif;
            if($_SESSION['user']->position == 'Service Eng.' or $_SESSION['user']->position == 'Sale Rep.'):
                $agent_service[0] = $_SESSION['user']->user_id;
                $agent_service[1] = $_SESSION['user']->first_name.' '.$_SESSION['user']->last_name;
            else:
                $agent_service = explode(',',$_POST['q_service_name']);
                $agent_service[1] = $agent_service[1].'โทร.'.$_POST['q_service_phone'];
            endif;
            //get head Service
            $con['table'] = 'tb_user';
            $con['select'] = 'head';
            $con['where'] = 'id = "'.$agent_service[0].'"';
            $head_id = $this->quo->select($con);
            unset($con);
            $head_id = $head_id[0]->head;

            $q_date = date('Y-m-d H:i:s');
            if(($_POST['q_warranty'][0] == 0 or empty($_POST['q_warranty'][0])) and empty($_POST['q_warranty'][1])):
                $q_warranty = '';
            else:
                $q_warranty = $_POST['q_warranty'][0].':'.$_POST['q_warranty'][1];
            endif;
            $con['data'] = array(
                'q_num' => $max_num,
                'q_date' => $q_date,
                'q_type' => $_POST['q_type'],
                'q_emp_id' => $_SESSION['user']->user_id,
                'q_head_id' => $head_id,
                'q_customer_id' => $q_customer_id,
                'q_topic' => $_POST['q_topic'],
                'q_to' => $_POST['q_to'],
                'q_to_detail' => $_POST['q_to_detail'],
                'q_status' => 'new',
                'q_status_date' => date('Y-m-d H:i:s'),
                'q_vat' => 7,
                'q_remark' => $q_remark = !empty($_POST['q_remark'])?$_POST['q_remark']:'',
                'q_a_note' => $q_a_note = !empty($_POST['q_a_note'])?$_POST['q_a_note']:'',
                'q_ro' => $ro_number = !empty($_POST['q_ro_number'])?$_POST['q_ro_number']:'',
                'q_job_number' => $ro_number = !empty($_POST['q_job_number'])?$_POST['q_job_number']:'',
                'q_customer_department' => $q_customer_department = !empty($_POST['q_customer_department'])? $_POST['q_customer_department'] : '',
                'q_stock_number' => $stock_number = isset($_POST['q_stock_number']) && !empty($_POST['q_stock_number'])?$_POST['q_stock_number']:'',
                'q_service_id' => $agent_service[0],
                'q_agent_service' => $agent_service[1],
                'q_set_price' => $_POST['q_set_price'][0].':'.$_POST['q_set_price'][1],
                'q_set_delivery' => $_POST['q_set_delivery'][0].':'.$_POST['q_set_delivery'][1],
                'q_warranty' => $q_warranty,
                'q_discount' => $discount = !empty($_POST['q_discount'])? $_POST['q_discount'] : 0,
                'q_discount_type' => isset($_POST['q_discount_type']) and !empty($_POST['q_discount_type'])? $_POST['q_discount_type']: 'integer',
            );
            if(isset($_POST['q_note'])):
                $q_note = '';
                foreach ($_POST['q_note_list'] as $key => $value):
                    $q_note .= $value.'|';
                endforeach;
                $con['data']['q_note'] = $q_note;
            endif;

            $con['table'] = 'tb_quotation';
            $this->quo->insert($con);
            unset($con);

            $con['table'] = 'tb_quotation';
            $con['select'] = 'q_id';
            $con['where'] = 'q_date = "'.$q_date.'" AND q_num = "'.$max_num.'"';
            $check = $this->quo->select($con);
            unset($con);
            if(count($check) > 0):
                $con['table'] = 'tb_quotation_d';
                foreach ($_POST['q_product'] as $key => $value):
                    $con_price['table'] = 'tb_product';
                    $con_price['select'] = 'p_price3,p_price2,p_price1';
                    $con_price['where'] = 'p_id = "'.$_POST['q_product'][$key].'"';
                    $data_product = $this->quo->select($con_price);
                    unset($con_price);
                    $data_price = '';
                    if(count($data_product)>0):
                        $data_price = $data_product[0]->p_price1.','.$data_product[0]->p_price2.','.$data_product[0]->p_price3;
                    endif;
                    $con['data'] = array(
                        'q_id' => $check[0]->q_id,
                        'p_id' => $_POST['q_product'][$key],
                        'product_name' => $_POST['q_product_name'][$key],
                        'p_price' => $_POST['q_product_price'][$key],
                        'p_unit' => $_POST['q_quanity'][$key],
                        'p_discount' => $_POST['p_discount'][$key],
                        'data_price' => $data_price,
                        'p_discount_type' => $discount_type = isset($_POST['p_discount_type'][$key])?'percent':'integer',
                        'p_qty' => $_POST['q_quanity_type'][$key]
                    );
                    $this->quo->insert($con);
                endforeach;
                unset($con);
                $con['table'] = 'tb_quotation_status';
                $con['data'] = array(
                    'q_id' => $check[0]->q_id,
                    'qs_name' => 'new',
                    'qs_date' => $q_date
                );
                $this->quo->insert($con);
                unset($con);
                // get token from head
                $con['table'] = 'tb_user';
                $con['select'] = 'token_no';
                $con['where'] = 'user_id = "'.$head_id.'"';
                $get_token = $this->quo->select($con);
                unset($con);
                // $Message = "Today is ".date('Y-m-d');
                // $numberc = 1;
                // $num_rows=0;
                // $Message = $Message .$this->sendemo("10000f").$this->sendemo("10000f").$this->sendemo("10000f");
                $get_year = substr($q_date,0,4)+543;
                $Message = "มีการสร้างใบเสนอราคาเลขที่ " .  $_POST['q_type'].'.'.$max_num.'/'.$get_year;

                $this->send_line_notify($Message,$_SESSION['user']->token_no);
                // $this->send_line_notify($Message,$get_token[0]->token_no);
                echo json_encode(array('success'));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            switch ($_POST['type']):
                case 'admin_edit':
                    $q_id = $this->decode($_POST['q_id']);
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$q_id.'"';
                    $con['data'] = array(
                        'q_status' => 'edit',
                        'q_status_date' => date('Y-m-d H:i:s'),
                        'q_remark_customer' => '',
                        'q_remark' => $_POST['q_remark']
                    );
                    $this->quo->update($con);
                    unset($con);

                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$q_id.'" AND q_status = "edit"';
                    $check = $this->quo->select($con);
                    if(count($check) > 0 ):
                        $head_id = $check[0]->q_head_id;
                        // get token from head
                        $con['table'] = 'tb_user';
                        $con['select'] = 'token_no';
                        $con['where'] = 'user_id = "'.$head_id.'"';
                        $get_token = $this->quo->select($con);

                        $get_year = substr($check[0]->q_date,0,4)+543;
                        $Message = "มีการแจ้งขอให้แก้ไขใบเสนอราคาเลขที่ " .  $check[0]->q_type.'.'.$check[0]->q_num.'/'.$get_year;

                        $this->send_line_notify($Message,$get_token[0]->token_no);
                        unset($con);

                        //update quotation status
                        $con['table'] = 'tb_quotation_status';
                        $con['data'] = array(
                            'q_id' => $q_id,
                            'qs_name' => 'admin_edit',
                            'qs_date' => date('Y-m-d H:i:s')
                        );
                        $this->quo->insert($con);
                        unset($con);


                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                case 'edit':
                    // echo "<pre>";print_r($_POST);exit;
                    $con['table'] = 'tb_quotation';
                    $con['select'] = 'q_id,q_num';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND q_status != "cancel"';
                    $old_quotation = $this->quo->select($con);
                    unset($con);
                    if(count($old_quotation) > 0):
                        $con['table'] = 'tb_quotation';
                        $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
                        $con['data'] = array(
                            'q_status' => 'cancel',
                            'q_status_date' => date('Y-m-d H:i:s')
                        );
                        $this->quo->update($con);
                        unset($con);
                        $agent_service = array();
                        if($_SESSION['user']->position == 'Service Eng.' or $_SESSION['user']->position == 'Sale Rep.'):
                            $agent_service[0] = $_SESSION['user']->user_id;
                            $agent_service[1] = $_SESSION['user']->first_name.' '.$_SESSION['user']->last_name.'โทร.'.$_SESSION['user']->tel;
                        else:
                            $agent_service = explode(',',$_POST['q_service_name']);
                            $agent_service[1] = $agent_service[1].'โทร.'.$_POST['q_service_phone'];
                        endif;
                        //get head Service
                        $con['table'] = 'tb_user';
                        $con['select'] = 'head';
                        $con['where'] = 'id = "'.$agent_service[0].'"';
                        $head_id = $this->quo->select($con);
                        unset($con);
                        $head_id = $head_id[0]->head;
                        if(($_POST['q_warranty'][0] == 0 or empty($_POST['q_warranty'][0])) and empty($_POST['q_warranty'][1])):
                            $q_warranty = '';
                        else:
                            $q_warranty = $_POST['q_warranty'][0].':'.$_POST['q_warranty'][1];
                        endif;

                        if(isset($_POST['q_num_manual']) and !empty($_POST['q_num_manual'])):
                            $old_quotation[0]->q_num = $_POST['q_num_manual'];
                        else:
                            $old_quotation[0]->q_num = $old_quotation[0]->q_num;
                        endif;

                        $con['table'] = 'tb_quotation';
                        $con['data'] = array(
                            'q_num' => $old_quotation[0]->q_num,
                            'q_date' => date('Y-m-d H:i:s'),
                            'q_type' => $_POST['q_type'],
                            'q_emp_id' => $_SESSION['user']->user_id,
                            'q_head_id' => $head_id,
                            'q_customer_id' => $_POST['q_customer_id'],
                            'q_topic' => $_POST['q_topic'],
                            'q_to' => $_POST['q_to'],
                            'q_to_detail' => $_POST['q_to_detail'],
                            'q_status' => 'new',
                            'q_status_date' => date('Y-m-d H:i:s'),
                            'q_vat' => 7,
                            'q_ro' => $ro_number = !empty($_POST['q_ro_number'])?$_POST['q_ro_number']:'',
                            'q_job_number' => $ro_number = !empty($_POST['q_job_number'])?$_POST['q_job_number']:'',
                            'q_customer_department' => $q_customer_department = !empty($_POST['q_customer_department'])? $_POST['q_customer_department'] : '',
                            'q_stock_number' => $stock_number = isset($_POST['q_stock_number']) && !empty($_POST['q_stock_number'])?$_POST['q_stock_number']:'',
                            'q_service_id' => $agent_service[0],
                            'q_agent_service' => $agent_service[1],
                            'q_set_price' => $_POST['q_set_price'][0].':'.$_POST['q_set_price'][1],
                            'q_set_delivery' => $_POST['q_set_delivery'][0].':'.$_POST['q_set_delivery'][1],
                            'q_warranty' => $q_warranty,
                            'q_discount' => $discount = !empty($_POST['q_discount'])? $_POST['q_discount'] : 0,
                            'q_discount_type' => isset($_POST['q_discount_type'])? $_POST['q_discount_type']: 'integer',
                        );
                        if(isset($_POST['q_note'])):
                            $q_note = '';
                            foreach ($_POST['q_note_list'] as $key => $value):
                                $q_note .= $value.'|';
                            endforeach;
                            $con['data']['q_note'] = $q_note;
                        endif;
                        $this->quo->insert($con);
                        unset($con);
                        $con['table'] = 'tb_quotation';
                        $con['select'] = 'q_id';
                        $con['where'] = 'q_num = "'.$old_quotation[0]->q_num.'"';
                        $con['order_by'] = 'q_id DESC';
                        $con['limit'] = '1';
                        $get_last_id = $this->quo->select($con);
                        unset($con);
                        $con['table'] = 'tb_quotation_d';
                        foreach ($_POST['q_product'] as $key => $value):
                            $con_price['table'] = 'tb_product';
                            $con_price['select'] = 'p_price3,p_price2,p_price1';
                            $con_price['where'] = 'p_id = "'.$_POST['q_product'][$key].'"';
                            $data_product = $this->quo->select($con_price);
                            unset($con_price);
                            $data_price = '';
                            if(count($data_product)>0):
                                $data_price = $data_product[0]->p_price1.','.$data_product[0]->p_price2.','.$data_product[0]->p_price3;
                            endif;
                            $con['data'] = array(
                                'q_id' => $get_last_id[0]->q_id,
                                'p_id' => $_POST['q_product'][$key],
                                'product_name' => $_POST['q_product_name'][$key],
                                'p_price' => $_POST['q_product_price'][$key],
                                'p_unit' => $_POST['q_quanity'][$key],
                                'p_discount' => $_POST['p_discount'][$key],
                                'data_price' => $data_price,
                                'p_discount_type' => $discount_type = isset($_POST['p_discount_type'][$key])?'percent':'integer',
                                'p_qty' => $_POST['q_quanity_type'][$key]
                            );
                            $this->quo->insert($con);
                        endforeach;
                        unset($con);
                        //get q_id
                        $con['select'] = 'q_id';
                        $con['where'] = 'q_num = "'.$old_quotation[0]->q_num.'" AND q_status != "cancel"';
                        $con['order_by'] = 'q_id DESC';
                        $con['limit'] = '1';
                        $q_id = $this->quo->select($con);
                        unset($con);
                        //update quotation status
                        $con['table'] = 'tb_quotation_status';
                        $con['data'] = array(
                            'q_id' => $q_id[0]->q_id,
                            'qs_name' => 'new',
                            'qs_date' => date('Y-m-d H:i:s')
                        );
                        $this->quo->insert($con);
                        unset($con);
                        // get token from head
                        $con['table'] = 'tb_user';
                        $con['select'] = 'token_no';
                        $con['where'] = 'user_id = "'.$head_id.'"';
                        $get_token = $this->quo->select($con);
                        unset($con);
                        if(count($get_token) > 0):
                            $con['table'] = 'tb_quotation';
                            $con['where'] = 'q_id = "'.$q_id[0]->q_id.'" AND q_status = "new"';
                            $check = $this->quo->select($con);
                            unset($con);
                            $get_year = substr($check[0]->q_date,0,4)+543;
                            $Message = "มีการสร้างใบเสนอราคาเลขที่ " .  $check[0]->q_type.'.'.$check[0]->q_num.'/'.$get_year;
                            $this->send_line_notify($Message,$get_token[0]->token_no);
                        endif;
                        unset($con);
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('updated'));
                    endif;
                    break;
                case 'approve':
                    // echo "<pre>";print_r($_POST);exit;
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND (q_status != "cancel" OR q_status != "edit")';
                    $con['data'] = array(
                        'q_status' => 'approved',
                        'q_status_date' => date('Y-m-d H:i:s')
                    );
                    $data = $this->quo->update($con);
                    unset($con);
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND q_status = "approved"';
                    $check = $this->quo->select($con);
                    unset($con);
                    if(count($check) > 0):
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                case 'customer_approve':
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'"';
                    // $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status = "approved"';
                    $check = $this->quo->select($con);
                    unset($con);
                    if(count($check) > 0):
                        $con['table'] = 'tb_quotation';
                        $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'"';
                        // $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status_customer = "created"';
                        $check = $this->quo->select($con);
                        unset($con);
                        if(count($check) > 0):
                            $con['table'] = 'tb_quotation';
                            $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'"';
                            $con['data'] = array(
                                'q_status_customer' => 'approved',
                                'q_status_customer_date' => date('Y-m-d H:i:s'),
                                'q_po' => $_POST['q_po'],
                                'q_po_date' => $_POST['q_po_date'],
                            );
                            $this->quo->update($con);
                            unset($con);
                            $con['table'] = 'tb_quotation';
                            $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status_customer = "approved"';
                            $con['where'] .= 'AND q_po = "'.$_POST['q_po'].'"';
                            $check = $this->quo->select($con);
                            if(count($check) > 0):
                                //update quotation status
                                $con['table'] = 'tb_quotation_status';
                                $con['data'] = array(
                                    'q_id' => $this->decode($_POST['q_id']),
                                    'qs_name' => 'approved',
                                    'qs_date' => date('Y-m-d H:i:s')
                                );
                                $this->quo->insert($con);
                                unset($con);

                                echo json_encode(array('success',$this->date_th($_POST['q_po_date'],1)));
                            else:
                                echo json_encode(array('fail'));
                            endif;
                        else:
                            echo json_encode(array('ใบเสนอราคานี้ยังไม่ถูกสั่งพิมพ์'));
                        endif;
                    else:
                        echo json_encode(array('หัวหน้ายังไม่อนุมัติ'));
                    endif;
                    break;
                case 'customer_reject':
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'"';
                    $con['data'] = array(
                        'q_status_customer' => 'reject',
                        'q_remark_customer' => $_POST['q_remark_customer'],
                        'q_status_customer_date' => date('Y-m-d H:i:s')
                    );
                    $this->quo->update($con);
                    unset($con);

                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status_customer = "reject"';
                    $check = $this->quo->select($con);
                    if(count($check) > 0):
                        //update quotation status
                        $con['table'] = 'tb_quotation_status';
                        $con['data'] = array(
                            'q_id' => $this->decode($_POST['q_id']),
                            'qs_name' => 'customer_reject',
                            'qs_date' => date('Y-m-d H:i:s')
                        );
                        $this->quo->insert($con);
                        unset($con);
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                case 'print':
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
                    $con['data'] = array(
                        'q_status_customer' => 'created',
                        'q_status_customer_date' => date('Y-m-d H:i:s')
                    );
                    $this->quo->update($con);
                    unset($con);
                    //update quotation status
                    $con['table'] = 'tb_quotation_status';
                    $con['data'] = array(
                        'q_id' => $q_id,
                        'qs_name' => 'print',
                        'qs_date' => date('Y-m-d H:i:s')
                    );
                    $this->quo->insert($con);
                    unset($con);
                    echo json_encode(array('success'));
                    break;
                case 'remark_customer':
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'"';
                    $con['data'] = array(
                        'q_remark_customer' => $_POST['q_remark_customer'],
                        'q_remark_customer_date' => date('Y-m-d H:i:s')
                    );
                    $this->quo->update($con);
                    unset($con);
                    //check update
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_remark_customer = "'.$_POST['q_remark_customer'].'"';
                    $check = $this->quo->select($con);
                    if(count($check) > 0):
                        //update quotation status
                        $con['table'] = 'tb_quotation_status';
                        $con['data'] = array(
                            'q_id' => $this->decode($_POST['q_id']),
                            'qs_name' => 'remark_customer',
                            'qs_date' => date('Y-m-d H:i:s')
                        );
                        $this->quo->insert($con);
                        unset($con);
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                default:
                    break;
            endswitch;
        endif;
    }
    public function get_quotation($value='')
    {
        if(isset($_POST['q_id']) and !empty($_POST['q_id'])):
            $con['table'] = 'tb_quotation';
            $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
            $data = $this->quo->select($con);
            unset($con);
            if(count($data) > 0):
                $data[0]->q_id_encode = $this->encode($data[0]->q_id);
                $con['table'] = 'tb_quotation_d';
                $con['where'] = 'q_id = "'.$data[0]->q_id.'"';
                $prodcut_detail = $this->quo->select($con);
                unset($con);
                $data[0]->product = array();
                $data[0]->sum_total = 0;
                if($_SESSION['user']->division == 'Sale'):
                    $num_for = 4;
                else:
                    $num_for = 3;
                endif;
                for ($i=strlen($data[0]->q_num); $i < $num_for; $i++):
                    $data[0]->q_num = '0'.$data[0]->q_num;
                endfor;
                $data[0]->q_date_th = $this->date_th($data[0]->q_date,2);
                $data[0]->q_number = $data[0]->q_type.'.'.$data[0]->q_num.'/'.(substr($data[0]->q_date,0,4)+543);
                if($_SESSION['user']->division == 'Sale'):
                    $set_price = explode(':',$data[0]->q_set_price);
                    $data[0]->q_set_price_data = $data[0]->q_set_price;
                    $data[0]->q_set_price = $set_price[0].' วัน '.$set_price[1];
                    $set_delivery = explode(':',$data[0]->q_set_delivery);
                    $data[0]->q_set_delivery_data = $data[0]->q_set_delivery;
                    $data[0]->q_set_delivery = $set_delivery[0].' วัน '.$set_delivery[1];
                    $warranty = explode(':',$data[0]->q_warranty);
                    $data[0]->q_set_warranty_data = $data[0]->q_warranty;
                    $data[0]->q_warranty = $warranty[0].' วัน '.$warranty[1];
                else:
                    $set_price = explode(':',$data[0]->q_set_price);
                    $data[0]->q_set_price_data = $data[0]->q_set_price;
                    $data[0]->q_set_price = '<u>'.$set_price[0].' วัน </u>'.$set_price[1];
                    $set_delivery = explode(':',$data[0]->q_set_delivery);
                    $data[0]->q_set_delivery_data = $data[0]->q_set_delivery;
                    $data[0]->q_set_delivery = '<u>'.$set_delivery[0].' วัน </u>'.$set_delivery[1];
                    $warranty = explode(':',$data[0]->q_warranty);
                    $data[0]->q_set_warranty_data = $data[0]->q_warranty;
                    $data[0]->q_warranty = '<u>'.$warranty[0].' วัน </u>'.$warranty[1];
                endif;
                foreach ($prodcut_detail as $key => $value):
                    $con['table'] = 'tb_product';
                    $con['where'] = 'p_id = "'.$value->p_id.'"';
                    $product = $this->quo->select($con);
                    unset($con);
                    $data[0]->product[$key]['p_id'] = $product[0]->p_id;
                    if(!empty($prodcut_detail[$key]->product_name)):
                        $data[0]->product[$key]['p_name'] = $prodcut_detail[$key]->product_name;
                    else:
                        $data[0]->product[$key]['p_name'] = $product[0]->p_code.' : '.$product[0]->p_detail;
                    endif;
                    if(strtolower($_SESSION['user']->division) == 'sale'):
                        $data[0]->product[$key]['p_unit'] = $value->p_unit;
                        $data[0]->product[$key]['p_qty'] = $value->p_qty;

                        $data[0]->product[$key]['p_price'] = 0;
                        $data[0]->product[$key]['p_discount'] = $value->p_discount;
                        $data[0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        if(!empty($value->p_discount)):
                            switch ($value->p_discount_type):
                                case 'percent':
                                $data[0]->product[$key]['p_price_sum'] = $data[0]->product[$key]['p_price_sum'] - ($data[0]->product[$key]['p_price_sum'] * ($value->p_discount/100));
                                break;
                                case 'integer':
                                $data[0]->product[$key]['p_price_sum'] = $data[0]->product[$key]['p_price_sum'] - $value->p_discount;
                                break;
                                default:
                                // code...
                                break;
                            endswitch;
                        endif;
                        $data[0]->sum_total += $data[0]->product[$key]['p_price_sum'];
                        $data[0]->product[$key]['p_price_sum'] = number_format($data[0]->product[$key]['p_price_sum'],2);
                        $data[0]->product[$key]['p_price'] = number_format($value->p_price,2);
                        $data[0]->product[$key]['product_name'] = $value->product_name;
                        $data[0]->product[$key]['p_price_data'] = $value->p_price;
                        $data[0]->product[$key]['p_discount'] = $value->p_discount;
                        $data[0]->product[$key]['p_discount_type'] = $value->p_discount_type;
                        $data[0]->product[$key]['p_qty'] = $value->p_qty;
                    else:
                        $data[0]->product[$key]['p_unit'] = $value->p_unit;
                        $data[0]->product[$key]['p_qty'] = $value->p_qty;
                        $data[0]->product[$key]['p_price'] = $value->p_price;
                        $data[0]->product[$key]['p_discount'] = $value->p_discount;
                        $data[0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                        if(!empty($value->p_discount)):
                            switch ($value->p_discount_type):
                                case 'percent':
                                    $data[0]->product[$key]['p_price_sum'] = $data[0]->product[$key]['p_price_sum'] - ($data[0]->product[$key]['p_price_sum'] * ($value->p_discount/100));
                                    $data[0]->product[$key]['p_price'] = $data[0]->product[$key]['p_price_sum']/$value->p_unit;
                                    break;
                                case 'integer':
                                    $data[0]->product[$key]['p_price_sum'] = $data[0]->product[$key]['p_price_sum'] - $value->p_discount;
                                    $data[0]->product[$key]['p_price'] = $data[0]->product[$key]['p_price_sum']/$value->p_unit;
                                    break;
                                default:
                                // code...
                                break;
                            endswitch;
                        endif;
                        $data[0]->sum_total += $data[0]->product[$key]['p_price_sum'];
                        $data[0]->product[$key]['p_price_sum'] = number_format($data[0]->product[$key]['p_price_sum'],2);
                        $data[0]->product[$key]['p_price'] = number_format($data[0]->product[$key]['p_price'],2);
                        $data[0]->product[$key]['p_discount_type'] = $value->p_discount_type;
                        $data[0]->product[$key]['p_price_data'] = $value->p_price;
                    endif;
                endforeach;
                //ลดราคาก่อนคิด vat
                $data[0]->total_price = number_format($data[0]->sum_total,2);
                if($data[0]->q_discount_type == 'percent'):
                    $data[0]->sum_total = $data[0]->sum_total - ($data[0]->sum_total * ($data[0]->q_discount/100));
                    $data[0]->q_discount_text = $data[0]->q_discount;
                    $data[0]->q_discount = $data[0]->q_discount.'%';
                else:
                    $data[0]->sum_total = $data[0]->sum_total - $data[0]->q_discount;
                    $data[0]->q_discount = number_format($data[0]->q_discount,2);
                    $data[0]->q_discount_text = number_format($data[0]->q_discount,2);
                endif;
                $data[0]->price_vat = ($data[0]->sum_total * 0.934579439252336) * ($data[0]->q_vat/100);
                // $data[0]->price_vat = $data[0]->sum_total * ($data[0]->q_vat/100);
                // $data[0]->price_whitout_vat = number_format($data[0]->sum_total - $data[0]->price_vat,2);
                $data[0]->price_whitout_vat = number_format($data[0]->sum_total * 0.934579439252336,2);
                $data[0]->price_vat = number_format($data[0]->price_vat,2);
                $data[0]->sum_total = number_format($data[0]->sum_total,2);
                $sum_exp = explode(',',$data[0]->sum_total);
                $sum_exp = implode('',$sum_exp);
                $data[0]->sum_total_th = $this->Convert($sum_exp);
                if($data[0]->q_po != ''):
                    $data[0]->q_po_date_th = $this->date_th($data[0]->q_po_date,1);
                    $data[0]->q_po_date = str_replace(' ','T',substr($data[0]->q_po_date,0,-3));
                else:
                    $data[0]->q_po_date = '';
                endif;

                //get job ro stocknumber q_customer_department
                $q_ro = !empty($data[0]->q_ro)?'RO.'.$data[0]->q_ro:'';
                $q_customer_department = !empty($data[0]->q_customer_department)?'แผนก.'.$data[0]->q_customer_department:'';
                $q_job_number = !empty($data[0]->q_job_number)?'Job -'.$data[0]->q_job_number:'';
                $q_stock_number = !empty($data[0]->q_stock_number)?'คุรภัณฑ์ :'.$data[0]->q_stock_number:'';
                // $data[0]->list_detail = $q_ro.$q_customer_department.$q_job_number.$q_stock_number;
                $data[0]->list_detail = [$q_ro,$q_customer_department,$q_job_number,$q_stock_number];

                //get note
                $data[0]->q_note = explode('|',$data[0]->q_note);


                $data[0]->q_agent_service = str_replace('โทร.',' โทร.',$data[0]->q_agent_service);
                $data[0]->q_agent_data = array();
                $q_agent_service = explode('โทร.',$data[0]->q_agent_service);
                $name = explode(' ',$q_agent_service[0]);
                $con['table'] = 'tb_user';
                $con['select'] = 'id,user_id,division,email';
                $con['where'] = 'first_name = "'.$name[0].'" AND last_name = "'.$name[1].'"';
                $sale = $this->quo->select($con);
                unset($con);
                $data[0]->q_agent_data = $sale[0];

                $user_status = '';
                if(strtolower($_SESSION['user']->division) != 'sale'):
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
                else:
                    switch ($_SESSION['user']->position):
                        case 'Admin Sale':
                            $user_status = 'admin';
                            break;
                        case 'Sales Rep.':
                            $user_status = 'admin';
                            break;
                        case ($_SESSION['user']->position == 'Admin Sale Manager'):
                            $user_status = 'admin sale manager';
                            break;
                        case ($_SESSION['user']->position == 'Sale Manager'):
                            $user_status = 'manager';
                            break;
                        default:
                            break;
                    endswitch;
                    // $user_status = 'it';
                endif;

                echo json_encode(array('success',$data,$user_status));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }

    public function update_bidder($value='')
    {
        if(isset($_POST['id']) and !empty($_POST['id'])):
            $con['table'] = 'tb_quotation';
            $con['where'] = 'q_id = "'.$this->decode($_POST['id']).'"';
            $data = $this->quo->select($con);
            unset($con);
            if(count($data) > 0):
                $con['table'] = 'tb_quotation';
                $con['data'] = array(
                    'q_bidder' => $_POST['q_bidder']
                );
                $con['where'] = 'q_id = "'.$this->decode($_POST['id']).'"';
                $this->quo->update($con);
                unset($con);

                $con['table'] = 'tb_quotation';
                $con['where'] = 'q_id = "'.$this->decode($_POST['id']).'" AND q_bidder = "'.$_POST['q_bidder'].'"';
                $check = $this->quo->select($con);
                if(count($check) > 0):
                    echo json_encode(array('success'));
                endif;

            endif;
        endif;
    }
}
 ?>
