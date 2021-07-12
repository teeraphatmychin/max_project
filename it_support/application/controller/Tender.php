<?php /**
 *
 */
class Tender extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->tender = $this->model('Tender_model');
    }
    public function list($value='')
    {
        $con['where'] = 't_status != "cancel"';
        $con['order_by'] = 't_number DESC';
        $con['limit'] = '50';
        $data = $this->tender->select($con);
        unset($con);
        if(count($data) > 0):
            foreach ($data as $key => $value):
                // $value->t_budget_number = 0;
                // $value->t_budget_number = number_format($value->t_budget);
                $get_year_tender = substr($value->t_date_create,0,4);
                $get_year_tender = ($get_year_tender + 543);
                $get_year_tender = substr($get_year_tender,-2);
                $value->t_number_text = $value->t_number.'/'.$get_year_tender;
                //get sale name
                $con['table'] = 'tb_user';
                $con['select'] = 'first_name,last_name';
                $con['where'] = 'id = "'.$value->t_sale.'"';
                $data_user = $this->tender->select($con);
                unset($con);
                $value->t_sale_name = $value->t_sale;
                if(count($data_user) > 0):
                    $value->t_sale_name = $data_user[0]->first_name;
                    $value->t_sale_lastname = $data_user[0]->last_name;
                endif;
                $value->id = $this->encode($value->t_id);
                $value->t_status_text = '';
                switch ($value->t_status) {
                    case 'new':
                        $value->t_status_text = '<span class="text-info">สร้างใหม่</span>';
                        break;
                    case 'cancel':
                        $value->t_status_text = '<span class="text-danger">ยกเลิก</span>';
                        break;
                    case 'success':
                        $value->t_status_text = '<span class="text-success">อัปเดตแล้ว</span>';
                        break;
                    default:
                        break;
                }
                $value->t_job_status_text = '';
                // switch ($value->t_job_status) {
                //     case 'success':
                //         $value->t_job_status_text = '<span class="text-success">ได้งาน</span>';
                //         break;
                //     case 'unsuccess':
                //         $value->t_job_status_text = '<span class="text-danger">ไม่ได้งาน</span>';
                //         break;
                //     case 'wait':
                //         $value->t_job_status_text = '<span class="text-warning">รอ</span>';
                //         break;
                //     default:
                //         break;
                // }
                $con['table'] = 'tb_tender_detail';
                $con['where'] = 't_id = "'.$this->encode($value->t_id).'" and td_version_status != "cancel"';
                $tb_detail = $this->tender->select($con);
                unset($con);
                $value->tb_detail = array();
                if(count($tb_detail) > 0):
                    $value->t_job_status = array();
                    $value->t_job_status['success'] = 0;
                    $value->t_job_status['unsuccess'] = 0;
                    $value->t_job_status['wait'] = 0;
                    foreach ($tb_detail as $td_key => $td_value):
                        switch ($td_value->td_status) {
                            case 'ได้งาน':
                                $value->t_job_status['success']++ ;
                                break;
                            case 'ไม่ได้งาน':
                                $value->t_job_status['unsuccess']++ ;
                                break;
                            case 'รอ':
                                $value->t_job_status['wait']++ ;
                                break;
                            default:
                                break;
                        }
                    endforeach;
                    $value->t_job_status['success'] = '<b><span class="text-success t-status-success" data-toggle="tooltip" data-placement="top" title="ได้งาน">'.$value->t_job_status['success'].'</span> / ';
                    $value->t_job_status['wait'] = '<span class="text-warning t-status-wait" data-toggle="tooltip" data-placement="top" title="รอ">'.$value->t_job_status['wait'].'</span> / ';
                    $value->t_job_status['unsuccess'] = '<span class="text-danger t-status-unsuccess" data-toggle="tooltip" data-placement="top" title="ไม่ได้งาน">'.$value->t_job_status['unsuccess'].'</span></b>';
                    $value->tb_detail = $tb_detail;
                    $value->t_job_status_text = $value->t_job_status['success'].$value->t_job_status['wait'].$value->t_job_status['unsuccess'];
                else:
                    $value->t_job_status_text = '<span class="text-warning">รออัปเดต</span>';
                endif;
                unset($tb_detail);
            endforeach;

            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function list_report($value='')
    {
        $con['table'] = 'tb_user';
        $con['select'] = 'id';
        $con['where'] = 'head = "'.$_SESSION['user']->id.'"';
        $sale = $this->tender->select($con);
        unset($con);
        if(count($sale) > 0):
            $data = array();
            $sale_id = array();
            foreach ($sale as $key => $value):
                $sale_id[] = $value->id;
                $data[$value->id] = array();
                $data[$value->id]['sale_name'] = '';
                $data[$value->id]['tender'] = array();
                $data[$value->id]['tender']['num'] = 0;
                $data[$value->id]['tender']['job'] = 0;
                $data[$value->id]['t_job_status'] = array();
                $data[$value->id]['t_job_value'] = array();

            endforeach;
            $sale_id = implode(',',$sale_id);
            $con['where'] = 't_sale IN ('.$sale_id.') AND t_status != "cancel"';
            $con['order_by'] = 't_number DESC';
            $data_tender = $this->tender->select($con);
            unset($con);

            if(count($data_tender) > 0):
                foreach ($data_tender as $key => $value):
                    $data[$value->t_sale]['tender']['num']++;
                    $get_year_tender = substr($value->t_date_create,0,4);
                    $get_year_tender = ($get_year_tender + 543);
                    $get_year_tender = substr($get_year_tender,-2);
                    $value->t_number_text = $value->t_number.'/'.$get_year_tender;
                    //get sale name
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name,zone';
                    $con['where'] = 'id = "'.$value->t_sale.'"';
                    $data_user = $this->tender->select($con);
                    unset($con);
                    $value->t_sale_name = $value->t_sale;
                    if(count($data_user) > 0):
                        $data[$value->t_sale]['sale_name'] = $data_user[0]->first_name.' '.$data_user[0]->zone;
                        $value->t_sale_name = $data_user[0]->first_name;
                        $value->t_sale_lastname = $data_user[0]->last_name;
                    endif;
                    $value->id = $this->encode($value->t_id);
                    $value->t_status_text = '';
                    switch ($value->t_status) {
                        case 'new':
                            $value->t_status_text = '<span class="text-info">สร้างใหม่</span>';
                            break;
                        case 'cancel':
                            $value->t_status_text = '<span class="text-danger">ยกเลิก</span>';
                            break;
                        case 'success':
                            $value->t_status_text = '<span class="text-success">อัปเดตแล้ว</span>';
                            break;
                        default:
                            break;
                    }
                    $con['table'] = 'tb_tender_detail';
                    $con['where'] = 't_id = "'.$this->encode($value->t_id).'" and td_version_status != "cancel"';
                    $tb_detail = $this->tender->select($con);
                    unset($con);

                    $data[$value->t_sale]['t_job_status']['success'] = empty($data[$value->t_sale]['t_job_status']['success'])? 0 : $data[$value->t_sale]['t_job_status']['success'];
                    $data[$value->t_sale]['t_job_status']['unsuccess'] = empty($data[$value->t_sale]['t_job_status']['unsuccess'])? 0 : $data[$value->t_sale]['t_job_status']['unsuccess'];
                    $data[$value->t_sale]['t_job_status']['wait'] = empty($data[$value->t_sale]['t_job_status']['wait'])? 0 : $data[$value->t_sale]['t_job_status']['wait'];
                    $data[$value->t_sale]['t_job_status']['sum'] = empty($data[$value->t_sale]['t_job_status']['sum'])? 0 : $data[$value->t_sale]['t_job_status']['sum'];
                    $data[$value->t_sale]['t_job_value']['success'] = empty($data[$value->t_sale]['t_job_value']['success'])? 0 : $data[$value->t_sale]['t_job_value']['success'];
                    $data[$value->t_sale]['t_job_value']['unsuccess'] = empty($data[$value->t_sale]['t_job_value']['unsuccess'])? 0 : $data[$value->t_sale]['t_job_value']['unsuccess'];
                    $data[$value->t_sale]['t_job_value']['wait'] = empty($data[$value->t_sale]['t_job_value']['wait'])? 0 : $data[$value->t_sale]['t_job_value']['wait'];
                    $data[$value->t_sale]['t_job_value']['sum'] = empty($data[$value->t_sale]['t_job_value']['sum'])? 0 : $data[$value->t_sale]['t_job_value']['sum'];

                    $data[$value->t_sale]['job'] = count($tb_detail);
                    if(count($tb_detail) > 0):
                        foreach ($tb_detail as $td_key => $td_value):
                            $data[$value->t_sale]['tender']['job']++;
                            switch ($td_value->td_status) {
                                case 'ได้งาน':
                                    $data[$value->t_sale]['t_job_status']['success']++ ;
                                    $data[$value->t_sale]['t_job_value']['success'] += $td_value->td_price;
                                    break;
                                case 'ไม่ได้งาน':
                                    $data[$value->t_sale]['t_job_status']['unsuccess']++ ;
                                    $data[$value->t_sale]['t_job_value']['unsuccess'] += $td_value->td_price;
                                    break;
                                case 'รอ':
                                    $data[$value->t_sale]['t_job_status']['wait']++ ;
                                    $data[$value->t_sale]['t_job_value']['wait'] += $td_value->td_price;
                                    break;
                                default:
                                    break;
                            }
                        endforeach;
                        $data[$value->t_sale]['t_job_status']['sum'] = $data[$value->t_sale]['t_job_status']['success'] + $data[$value->t_sale]['t_job_status']['unsuccess'] + $data[$value->t_sale]['t_job_status']['wait'];
                        $data[$value->t_sale]['t_job_status']['sum_text'] = number_format($data[$value->t_sale]['t_job_status']['sum']);
                        $data[$value->t_sale]['t_job_value']['sum'] = $data[$value->t_sale]['t_job_value']['success'] + $data[$value->t_sale]['t_job_value']['unsuccess'] + $data[$value->t_sale]['t_job_value']['wait'];
                        $data[$value->t_sale]['t_job_value']['sum_text'] = number_format($data[$value->t_sale]['t_job_value']['sum']);
                        $data[$value->t_sale]['t_job_value']['success_text'] = number_format($data[$value->t_sale]['t_job_value']['success'],2);
                        $data[$value->t_sale]['t_job_value']['unsuccess_text'] = number_format($data[$value->t_sale]['t_job_value']['unsuccess'],2);
                        $data[$value->t_sale]['t_job_value']['wait_text'] = number_format($data[$value->t_sale]['t_job_value']['wait'],2);
                    endif;

                    // $data[$value->t_sale][] = $data_tender[$key];

                endforeach;
                echo json_encode(array('success',$data));
            endif;
        else:
            echo json_encode(array('fail','ไม่พบข้อมูล Sale Rep'));
        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['add_tender']) and !empty($_POST['add_tender'])):
            //add new customer
            $q_customer_id = '';
            if(isset($_POST['t_customer_name']) and !empty($_POST['t_customer_name'])):
                $con['table'] = 'tb_customer';
                $con['where'] = 'cus_name = "'.$_POST['t_customer_name'].'"';
                $customer = $this->tender->select($con);
                unset($con);
                if(count($customer) > 0):
                    $q_customer_id = $customer[0]->id;
                elseif(count($customer) < 1):
                    $con['table'] = 'tb_customer';
                    $con['data'] = array('cus_name' => $_POST['t_customer_name']);
                    $this->tender->insert($con);
                    unset($con);
                    $con['table'] = 'tb_customer';
                    $con['where'] = 'cus_name = "'.$_POST['t_customer_name'].'"';
                    $customer = $this->tender->select($con);
                    unset($con);
                    if(count($customer) > 0):
                        $q_customer_id = $customer[0]->id;
                    else:
                        echo json_encode(array('fail','เพิ่มข้อมูลลูกค้าไม่สำเร็จ'));exit;
                    endif;
                endif;
            else:
                $q_customer_id = $_POST['t_customer'];
            endif;


            $date_now = date('Y-m-d H:i:s');

            //get product present tender
            // $tender_id = '';
            // $con['select'] = 't_id';
            // $con['where'] = 't_number = "'.$_POST['t_number'].'" and t_status != "cancel"';
            // $tender_present = $this->tender->select($con);
            // unset($con);
            // if(count($tender_present) > 0):
            // endif;
            $tender_id = $_POST['t_number'];


            //cancel old tender
            $con['where'] = 't_id = "'.$_POST['t_number'].'" and t_status != "cancel"';
            $con['data'] = array(
                't_status' => 'cancel',
            );
            $this->tender->update($con);
            unset($con);

            //get tender number_order
            $con['select'] = 't_number';
            $con['where'] = 't_id = "'.$tender_id.'"';
            $tender_number = $this->tender->select($con);
            unset($con);
            if(count($tender_number) > 0):
                $tender_number = $tender_number[0]->t_number;
            else:
                echo json_encode(array('fail','ไม่สามารถค้นหาเลขที่ tender ได้'));exit;
            endif;


            $con['data'] = array();
            if(!empty($_POST['t_number']) and $_POST['t_number'] > 0):
                $con['data'] = array(
                    't_number' => $tender_number,
                    't_sale' => htmlspecialchars($_POST['t_sale'], ENT_QUOTES),
                    't_zone' => htmlspecialchars($_POST['t_zone'], ENT_QUOTES),
                    't_budget_type' => htmlspecialchars($_POST['t_budget_type'], ENT_QUOTES),
                    't_open_letter' => $_POST['t_open_letter'], //date
                    't_bank_confirm' => htmlspecialchars($_POST['t_bank_confirm'], ENT_QUOTES),
                    't_compare' => htmlspecialchars($_POST['t_compare'], ENT_QUOTES),
                    't_year_warranty' => intval($_POST['t_year_warranty']),
                    't_customer' => $q_customer_id,
                    't_contract_type' => htmlspecialchars($_POST['t_contract_type'], ENT_QUOTES),
                    't_contract_date' => $_POST['t_contract_date'],
                    't_contract_status' => htmlspecialchars($_POST['t_contract_status'], ENT_QUOTES),
                    't_contract_number' => $_POST['t_contract_number'],
                    't_start_contract' => $_POST['t_start_contract'],
                    't_end_contract' => $_POST['t_end_contract'],
                    't_status' => 'new',
                    't_date_create' => $date_now,
                    't_creater' => $_SESSION['user']->id,
                );
            else:
                echo json_encode(array('fail','ไม่สามารถสร้างเลขที่ tender ได้','โปรดแจ้งเจ้าหน้าที่ IT'));
            endif;
            $this->tender->insert($con);
            unset($con);
            $con['select'] = 't_id';
            $con['where'] = "t_date_create = '".$date_now."' AND t_creater = '".$_SESSION['user']->id."' AND t_status = 'new'";
            $check_insert = $this->tender->select($con);
            unset($con);
            if(count($check_insert)>0):
                //update tender detail from old tender
                    //new tender id
                    // $tender_id_new = '';
                    // $con['select'] = 't_id';
                    // $con['where'] = 't_number = "'.$_POST['t_number'].'" and t_status != "cancel"';
                    // $tender_new = $this->tender->select($con);
                    // unset($con);
                    // if(count($tender_new) > 0):
                    //     $tender_id_new = $tender_new[0]->t_id;
                    // endif;
                $tender_id_new = $check_insert[0]->t_id;
                if($tender_id_new != '' and $tender_id != ''):
                    //check product from old tender
                    $con['table'] = 'tb_tender_detail';
                    $con['where'] = 't_id = "'.$this->encode($tender_id).'" AND td_version_status != "cancel"';
                    $data_tender_detail = $this->tender->select($con);
                    unset($con);
                    if(count($data_tender_detail) > 0):
                        foreach ($data_tender_detail as $key => $value):
                            $con['table'] = 'tb_tender_detail';
                            $con['data'] = array(
                                'td_brand' => $value->td_brand,
                                'td_gen' => $value->td_gen,
                                'td_num' => $value->td_num,
                                'td_type' => $value->td_type,
                                'td_send_product' => $value->td_send_product,
                                'td_date_submit_price' => $value->td_date_submit_price,
                                'td_price' => $value->td_price,
                                'td_status' => $value->td_status,
                                'td_date' => $value->td_date,
                                'td_stock_status' => $value->td_stock_status,
                                'td_signature_sr' => $value->td_signature_sr,
                                'td_signature_am' => $value->td_signature_am,
                                'td_signature_sm' => $value->td_signature_sm,
                                'td_draf_of_status' => $value->td_draf_of_status,
                                'td_of_number' => $value->td_of_number,
                                'td_stock_send_product' => $value->td_stock_send_product,
                                'td_do_number' => $value->td_do_number,
                                't_id' => $this->encode($tender_id_new)
                            );
                            $this->tender->insert($con);
                            unset($con);
                        endforeach;
                        $con['table'] = 'tb_tender_detail';
                        $con['where'] = 't_id = "'.$this->encode($tender_id).'"';
                        $con['data'] = array(
                            'td_version_status' => 'cancel'
                        );
                        $this->tender->update($con);
                        unset($con);
                    else:
                        echo "string";exit;
                    endif;
                endif;
                echo json_encode(array('success','บันทึกสำเร็จ'));
            else:
                echo json_encode(array('fail check insert','ไม่สามารถบันทึกได้','โปรดแจ้งเจ้าหน้าที่ IT','ไม่สามารถค้นหาข้อมูลที่เพิ่มไปได้'));
            endif;
        endif;
    }
    public function add($value='')
    {
        if(isset($_POST['add_tender']) and !empty($_POST['add_tender'])):
            //get last id
            $con['select'] = 'MAX(t_number) as last_id';
            $con['where'] = 'YEAR(t_date_create) = "'.date('Y').'"';
            $last_id = $this->tender->select($con);
            unset($con);
            if(count($last_id) > 0):
                $last_id = intval($last_id[0]->last_id+1);
            else:
                $last_id = 1;
            endif;

            $q_customer_id = '';

            //add new customer
            if(isset($_POST['t_customer_name']) and !empty($_POST['t_customer_name'])):
                $con['table'] = 'tb_customer';
                $con['where'] = 'cus_name = "'.$_POST['t_customer_name'].'"';
                $customer = $this->tender->select($con);
                unset($con);
                if(count($customer) > 0):
                    $q_customer_id = $customer[0]->id;
                elseif(count($customer) < 1):
                    $con['table'] = 'tb_customer';
                    $con['data'] = array('cus_name' => $_POST['t_customer_name']);
                    $this->tender->insert($con);
                    unset($con);
                    $con['table'] = 'tb_customer';
                    $con['where'] = 'cus_name = "'.$_POST['t_customer_name'].'"';
                    $customer = $this->tender->select($con);
                    unset($con);
                    if(count($customer) > 0):
                        $q_customer_id = $customer[0]->id;
                    else:
                        echo json_encode(array('fail','เพิ่มข้อมูลลูกค้าไม่สำเร็จ'));exit;
                    endif;
                endif;
            else:
                $q_customer_id = $_POST['t_customer'];
            endif;


            $date_now = date('Y-m-d H:i:s');
            $con['data'] = array();
            if(!empty($last_id) and $last_id > 0):
                $con['data'] = array(
                    't_number' => $last_id,
                    't_sale' => htmlspecialchars($_POST['t_sale'], ENT_QUOTES),
                    't_zone' => htmlspecialchars($_POST['t_zone'], ENT_QUOTES),
                    't_budget_type' => htmlspecialchars($_POST['t_budget_type'], ENT_QUOTES),
                    't_open_letter' => $_POST['t_open_letter'], //date
                    't_bank_confirm' => htmlspecialchars($_POST['t_bank_confirm'], ENT_QUOTES),
                    't_compare' => htmlspecialchars($_POST['t_compare'], ENT_QUOTES),
                    't_year_warranty' => intval($_POST['t_year_warranty']),
                    't_customer' => $q_customer_id,
                    't_contract_type' => htmlspecialchars($_POST['t_contract_type'], ENT_QUOTES),
                    't_contract_date' => $_POST['t_contract_date'],
                    't_contract_status' => htmlspecialchars($_POST['t_contract_status'], ENT_QUOTES),
                    't_contract_status' => htmlspecialchars($_POST['t_contract_status'], ENT_QUOTES),
                    't_contract_number' => $_POST['t_contract_number'],
                    't_end_contract' => intval($_POST['t_end_contract']),
                    't_status' => 'new',
                    't_start_contract' => $_POST['t_start_contract'],
                    't_end_contract' => $_POST['t_end_contract'],
                    't_date_create' => $date_now,
                    't_creater' => $_SESSION['user']->id,
                );
            else:
                echo json_encode(array('fail','ไม่สามารถสร้างเลขที่ tender ได้','โปรดแจ้งเจ้าหน้าที่ IT'));
            endif;
            $this->tender->insert($con);
            unset($con);

            $con['where'] = "t_number = '".$last_id."' AND t_creater = '".$_SESSION['user']->id."' AND t_status = 'new'";
            $check_insert = $this->tender->select($con);
            unset($con);
            if(count($check_insert)>0):
                echo json_encode(array('success','บันทึกสำเร็จ','save complete'));
            else:
                echo json_encode(array('fail check insert','ไม่สามารถบันทึกได้','โปรดแจ้งเจ้าหน้าที่ IT','ไม่สามารถค้นหาข้อมูลที่เพิ่มไปได้'));
            endif;
        endif;
    }
    public function edit($value='')
    {
        //เพิ่มและ update อันเก่า เป็น cancel
        if(isset($_POST['add_tender']) and !empty($_POST['add_tender'])):
            if(isset($_POST['t_id']) and !empty($_POST['t_id'])):
                $con['where'] = 't_id = "'.$this->decode($_POST['t_id']).'"';
                $con['data'] = array(
                    't_stattus' => 'cancel'
                );
                $this->tender->update($con);
                unset($con);

                $date_now = date('Y-m-d H:i:s');
                $con['data'] = array();
                if(!empty($last_id) and $last_id > 0):
                    $con['data'] = array(
                        't_number' => $_POST['t_number'],
                        't_sale' => htmlspecialchars($_POST['t_sale'], ENT_QUOTES),
                        't_zone' => htmlspecialchars($_POST['t_zone'], ENT_QUOTES),
                        't_budget_type' => htmlspecialchars($_POST['t_budget_type'], ENT_QUOTES),
                        't_open_letter' => $_POST['t_open_letter'], //date
                        't_bank_confirm' => htmlspecialchars($_POST['t_bank_confirm'], ENT_QUOTES),
                        't_year_warranty' => intval($_POST['t_year_warranty']),
                        't_customer' => intval($_POST['t_customer']),
                        't_doc_ref' => htmlspecialchars($_POST['t_doc_ref'], ENT_QUOTES),
                        't_budget' => htmlspecialchars($_POST['t_budget'], ENT_QUOTES),
                        't_send_date' => intval($_POST['t_send_date']),
                        't_submit_price' => intval($_POST['t_submit_price']),
                        't_contract_type' => htmlspecialchars($_POST['t_contract_type'], ENT_QUOTES),
                        't_contract_date' => $_POST['t_contract_date'],
                        't_contract_status' => htmlspecialchars($_POST['t_contract_status'], ENT_QUOTES),
                        't_contract_number' => intval($_POST['t_contract_number']),
                        't_end_constract' => intval($_POST['t_end_constract']),
                        't_status' => 'new',
                        't_date_create' => $date_now,
                        't_creater' => $_SESSION['user']->id,
                    );
                else:
                    echo json_encode(array('fail','ไม่สามารถสร้างเลขที่ tender ได้','โปรดแจ้งเจ้าหน้าที่ IT'));exit;
                endif;
                $this->tender->insert($con);
                unset($con);
                $con['where'] = "t_creater = '".$_SESSION['user']->id."'";
                $check_insert = $this->tender->select($con);
                unset($con);
                $check_insert = array();
                if(count($check_insert)>0):
                    echo json_encode(array('success','บันทึกสำเร็จ'));
                else:
                    echo json_encode(array('fail','ไม่สามารถบันทึกได้','โปรดแจ้งเจ้าหน้าที่ IT','ไม่สามารถค้นหาข้อมูลที่เพิ่มไปได้'));
                endif;
            endif;
        endif;
    }
    public function search($value='')
    {
        if(isset($_POST['number']) and !empty($_POST['number'])):
            $number = $_POST['number'];
            //ค้นหาตามชื่ชื่อโรงพยาบาล ทำอย่างไร ในเมื่อ อ้างอิงด้วยไอดีคนละตาราง
            //รูปแบบการกรอกคำค้น [ชื่อโรงพยาบาล,เลขที่ tender เช่น 259/64]
            //น่าจะพัฒนาได้โดยใช้ร่วมดับ function list() เพื่อลดโค้ด

            //ค้นหารูปแบบคำค้น
            if(strpos($number,'/')):
                $number = explode('/',$number);
                $number = $number[0];
                $con['where'] = 't_number LIKE "%'.$number.'%"';
            else: //ชื่อโรงพยาบาล
                $con['table'] = 'tb_customer';
                $con['where'] = 'cus_name LIKE "%'.$number.'%"';
                $data_customer = $this->tender->select($con);
                unset($con);
                $list_customer = array();
                if(count($data_customer) > 0):
                    foreach ($data_customer as $key => $value):
                        $list_customer[] = $value->id;
                    endforeach;
                    $list_customer = implode(',',$list_customer);
                    $con['where'] = 't_customer IN ('.$list_customer.')';
                endif;
            endif;
            $con['where'] .= ' AND t_status != "cancel"';
            $con['order_by'] = 't_number DESC';
            $con['limit'] = '50';
            $data = $this->tender->select($con);
            // $data_text = $this->tender->select($con,3);
            unset($con);
            if(count($data) > 0):
                foreach ($data as $key => $value):
                    $get_year_tender = substr($value->t_date_create,0,4);
                    $get_year_tender = ($get_year_tender + 543);
                    $get_year_tender = substr($get_year_tender,-2);
                    $value->t_number_text = $value->t_number.'/'.$get_year_tender;
                    //get sale name
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name';
                    $con['where'] = 'id = "'.$value->t_sale.'"';
                    $data_user = $this->tender->select($con);
                    unset($con);
                    $value->t_sale_name = $value->t_sale;
                    if(count($data_user) > 0):
                        $value->t_sale_name = $data_user[0]->first_name;
                        $value->t_sale_lastname = $data_user[0]->last_name;
                    endif;
                    $value->id = $this->encode($value->t_id);
                    $value->t_status_text = '';
                    switch ($value->t_status) {
                        case 'new':
                            $value->t_status_text = '<span class="text-info">สร้างใหม่</span>';
                            break;
                        case 'cancel':
                            $value->t_status_text = '<span class="text-danger">ยกเลิก</span>';
                            break;
                        case 'success':
                            $value->t_status_text = '<span class="text-success">อัปเดตแล้ว</span>';
                            break;
                        default:
                            break;
                    }
                    $value->t_job_status_text = '';
                    // switch ($value->t_job_status) {
                    //     case 'success':
                    //         $value->t_job_status_text = '<span class="text-success">ได้งาน</span>';
                    //         break;
                    //     case 'unsuccess':
                    //         $value->t_job_status_text = '<span class="text-danger">ไม่ได้งาน</span>';
                    //         break;
                    //     case 'wait':
                    //         $value->t_job_status_text = '<span class="text-warning">รอ</span>';
                    //         break;
                    //     default:
                    //         break;
                    // }
                    $con['table'] = 'tb_tender_detail';
                    $con['where'] = 't_id = "'.$this->encode($value->t_id).'" and td_version_status != "cancel"';
                    $tb_detail = $this->tender->select($con);
                    unset($con);
                    $value->tb_detail = array();
                    if(count($tb_detail) > 0):
                        $value->t_job_status = array();
                        $value->t_job_status['success'] = 0;
                        $value->t_job_status['unsuccess'] = 0;
                        $value->t_job_status['wait'] = 0;
                        foreach ($tb_detail as $td_key => $td_value):
                            switch ($td_value->td_status) {
                                case 'ได้งาน':
                                    $value->t_job_status['success']++ ;
                                    break;
                                case 'ไม่ได้งาน':
                                    $value->t_job_status['unsuccess']++ ;
                                    break;
                                case 'รอ':
                                    $value->t_job_status['wait']++ ;
                                    break;
                                default:
                                    break;
                            }
                        endforeach;
                        $value->t_job_status['success'] = '<b><span class="text-success t-status-success" data-toggle="tooltip" data-placement="top" title="ได้งาน">'.$value->t_job_status['success'].'</span> / ';
                        $value->t_job_status['wait'] = '<span class="text-warning t-status-wait" data-toggle="tooltip" data-placement="top" title="รอ">'.$value->t_job_status['wait'].'</span> / ';
                        $value->t_job_status['unsuccess'] = '<span class="text-danger t-status-unsuccess" data-toggle="tooltip" data-placement="top" title="ไม่ได้งาน">'.$value->t_job_status['unsuccess'].'</span></b>';
                        $value->tb_detail = $tb_detail;
                        $value->t_job_status_text = $value->t_job_status['success'].$value->t_job_status['wait'].$value->t_job_status['unsuccess'];
                    else:
                        $value->t_job_status_text = '<span class="text-warning">รออัปเดต</span>';
                    endif;
                    unset($tb_detail);
                endforeach;
                echo json_encode(array('success',$data));
                // echo json_encode(array('success',$data,$data_text));
            else:
                echo json_encode(array('fail','ไม่มีข้อมุลตามคำค้น '.$_POST['number']));
            endif;
        else:
            echo json_encode(array('empty'));
        endif;
    }
    public function get($value='') //main get
    {
        if(isset($_POST['t_id']) and !empty($_POST['t_id'])):
            $con['where'] = 't_id = "'.$this->decode($_POST['t_id']).'"';
            $data = $this->tender->select($con);
            unset($con);
            if(count($data)>0):
                foreach ($data as $key => $value):
                    $get_year_tender = substr($value->t_date_create,0,4);
                    $get_year_tender = ($get_year_tender + 543);
                    $get_year_tender = substr($get_year_tender,-2);
                    $value->t_number_text = $value->t_number.'/'.$get_year_tender;


                    $value->id = $this->encode($value->t_id);

                    //get sale name
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name';
                    $con['where'] = 'id = "'.$value->t_sale.'"';
                    $data_user = $this->tender->select($con);
                    unset($con);
                    $value->t_sale_name = $value->t_sale;
                    if(count($data_user) > 0):
                        $value->t_sale_full = $data_user[0]->first_name.' '.$data_user[0]->last_name.' '.$value->t_zone;
                    endif;


                    $value->t_customer_name = 'ไม่พบข้อมูลลูกค้า';
                    if(isset($value->t_customer) and !empty($value->t_customer)):
                        $con['table'] = 'tb_customer';
                        $con['where'] = 'id = "'.$value->t_customer.'"';
                        $customer = $this->tender->select($con);
                        unset($con);
                        if(count($customer) > 0):
                            $value->t_customer_name = $customer[0]->cus_name;
                        endif;
                    endif;
                    $value->t_contract_date_text = '-';
                    $value->t_start_contract_text = '-';
                    $value->t_end_contract_text = '-';
                    if($value->t_contract_date != '0000-00-00'):
                        $value->t_contract_date_text = $this->date_th($value->t_contract_date,2);
                    endif;
                    if($value->t_start_contract != '0000-00-00'):
                        $value->t_start_contract_text = $this->date_th($value->t_start_contract,2);
                    endif;
                    if($value->t_end_contract != '0000-00-00'):
                        $value->t_end_contract_text = $this->date_th($value->t_end_contract,2);
                    endif;


                endforeach;
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail','มีบางอย่างผิดพลาด'));
            endif;
        endif;
    }
    public function get_detail($value='')
    {
        if(isset($_POST['t_id']) and  !empty($_POST['t_id'])):
            $con['table'] = 'tb_tender_detail';
            $con['where'] = 't_id = "'.$_POST['t_id'].'" and td_version_status != "cancel"';
            $data = $this->tender->select($con);
            unset($con);
            // $con['where'] = 't_id = "'.$this->decode($_POST['t_id']).'"';
            // $check_status = $this->tender->select($con);
            // unset($con);
            $button = '';
            //เช็คยังไง ว่ามี draf หรือยัง

            if(count($data) > 0):
                foreach ($data as $key => $value):
                    if($value->td_stock_send_product == 0):
                        $value->td_stock_send_product = '-';
                    endif;
                    if($value->td_do_number == 0):
                        $value->td_do_number = '-';
                    endif;

                    $value->td_signature_sr_text = '-';
                    $value->td_signature_am_text = '-';
                    $value->td_signature_sm_text = '-';

                    if($value->td_signature_sr != '0000-00-00'):
                        $value->td_signature_sr_text = $this->date_th($value->td_signature_sr,2);
                    endif;
                    if($value->td_signature_am != '0000-00-00'):
                        $value->td_signature_am_text = $this->date_th($value->td_signature_am,2);
                    endif;
                    if($value->td_signature_sm != '0000-00-00'):
                        $value->td_signature_sm_text = $this->date_th($value->td_signature_sm,2);
                    endif;

                    $value->td_status_text = '';
                    switch ($value->td_status) {
                        case 'ได้งาน':
                            $value->td_status_text = '<span class="text-success">ได้งาน</span>';
                            break;
                        case 'ไม่ได้งาน':
                            $value->td_status_text = '<span class="text-danger">ไม่ได้งาน</span>';
                            break;
                        case 'รอ':
                            $value->td_status_text = '<span class="text-warning">รอ</span>';
                            break;
                        default:
                            break;
                    }

                    $value->td_stock_status_text = '';
                    switch ($value->td_stock_status) {
                        case 'มีสินค้า':
                            $value->td_stock_status_text = '<span class="text-success">'.$value->td_stock_status.'</span>';
                            break;
                        case 'ไม่มีของ':
                            $value->td_stock_status_text = '<span class="text-danger">'.$value->td_stock_status.'</span>';
                            break;
                        default:
                            $value->td_stock_status_text = '<span class="text-warning">'.$value->td_stock_status.'</span>';
                            break;
                    }
                    if($value->td_remark == ''):
                        $value->td_remark = '-';
                    endif;
                    $value->td_price_text = number_format($value->td_price);
                endforeach;
                $button .= '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข tender</button>';
                $button .= '<button class="btn btn-warning btn-option" option-type="manage_contract"><i class="material-icons">edit</i> จัดการสัญญา</button>';
                if($_SESSION['user']->id == '296'): // พี่พิม
                        $button .= '<button class="btn btn-warning btn-option" option-type="update_draf"><i class="material-icons">edit</i> อัปเดต Draf OF</button>';
                endif;
                $button .= '<button class="btn btn-warning btn-option" option-type="edit_tender_detail"><i class="material-icons">edit</i> แก้ไขรายการสินค้า</button>';
                $button .= '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">close</i> ลบ</button>';
                echo json_encode(array('success',$data,$button));
            else:
                $button .= '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข tender</button>';
                $button .= '<button class="btn btn-success btn-option" option-type="add_tender_detail"><i class="material-icons">add</i> เพิ่มรายการสินค้า</button>';
                $button .= '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">close</i> ลบ</button>';
                echo json_encode(array('fail','ไม่มีรายการ tender detail',$button));
            endif;
        else:
            echo json_encode(array('fail','ไม่สามารถค้นหาได้'));
        endif;
    }
    public function add_detail($value='')
    {
        if(isset($_POST['t_id']) and !empty($_POST['t_id'])):
            if($_POST['type'] == 'edit'):
                $con['table'] = 'tb_tender_detail';
                $con['where'] = 't_id = "'.$_POST['t_id'].'" and td_version_status != "cancel"';
                $con['data'] = array(
                    'td_version_status' => 'cancel'
                );
                $this->tender->update($con);

                $con['table'] = 'tb_tender_detail';
                $data = date('Y-m-d H:i:s');
                foreach ($_POST['td_brand'] as $key => $value):
                    $con['data'] = array(
                        'td_brand' =>  htmlspecialchars($_POST['td_brand'][$key], ENT_QUOTES),
                        'td_num' =>  htmlspecialchars($_POST['td_num'][$key], ENT_QUOTES),
                        'td_price' =>  intval($_POST['td_price'][$key]),
                        'td_gen' =>  htmlspecialchars($_POST['td_gen'][$key], ENT_QUOTES),
                        'td_type' =>  htmlspecialchars($_POST['td_type'][$key], ENT_QUOTES),
                        'td_send_product' =>  intval($_POST['td_send_product'][$key]),
                        'td_date_submit_price' =>  intval($_POST['td_date_submit_price'][$key]),
                        'td_remark' =>  htmlspecialchars($_POST['td_remark'][$key], ENT_QUOTES),
                        'td_status' =>  htmlspecialchars($_POST['td_status'][$key], ENT_QUOTES),
                        'td_date' => $data,
                        't_id' => $_POST['t_id']
                    );
                    $this->tender->insert($con);
                    unset($con['data']);
                endforeach;
                echo json_encode(array('success'));
            else:
                $con['table'] = 'tb_tender_detail';
                $data = date('Y-m-d H:i:s');
                foreach ($_POST['td_brand'] as $key => $value):
                    $con['data'] = array(
                        'td_brand' =>  htmlspecialchars($_POST['td_brand'][$key], ENT_QUOTES),
                        'td_num' =>  htmlspecialchars($_POST['td_num'][$key], ENT_QUOTES),
                        'td_price' =>  intval($_POST['td_price'][$key]),
                        'td_gen' =>  htmlspecialchars($_POST['td_gen'][$key], ENT_QUOTES),
                        'td_type' =>  htmlspecialchars($_POST['td_type'][$key], ENT_QUOTES),
                        'td_send_product' =>  intval($_POST['td_send_product'][$key]),
                        'td_date_submit_price' =>  intval($_POST['td_date_submit_price'][$key]),
                        'td_remark' =>  htmlspecialchars($_POST['td_remark'][$key], ENT_QUOTES),
                        'td_status' =>  htmlspecialchars($_POST['td_status'][$key], ENT_QUOTES),
                        'td_date' => $data,
                        't_id' => $_POST['t_id']
                    );
                    $this->tender->insert($con);
                    unset($con['data']);
                endforeach;
                echo json_encode(array('success'));
            endif;
        else:
            echo json_encode(array('fail','ไม่สามารถบันทึกได้'));
        endif;
    }
    public function update_draf($value='')
    {
        if(isset($_POST['update_draf']) and !empty($_POST['update_draf'])):
            foreach ($_POST['td_id'] as $key => $value):
                $con['table'] = 'tb_tender_detail';
                $con['where'] = 'td_id = "'.$_POST['td_id'][$key].'"';
                $con['data'] = array(
                    'td_signature_sr' => $_POST['td_signature_sr'][$key],
                    'td_signature_am' => $_POST['td_signature_am'][$key],
                    'td_signature_sm' => $_POST['td_signature_sm'][$key],
                    'td_draf_of_status' => $_POST['td_draf_of_status'][$key],
                    'td_of_number' => $_POST['td_of_number'][$key]
                );
                $this->tender->update($con);
                unset($con);
            endforeach;
            echo json_encode(array('success','บันทึกสำเร็จ'));
        endif;
    }
    public function add_contract($value='')
    {
        if(isset($_POST['t_id']) and !empty($_POST['t_id'])):

        endif;
    }
    public function get_contract($value='')
    {
        if(isset($_POST['t_id']) and !empty($_POST['t_id'])):
             //check data from table contract
             //get data contract
                $con['table'] = 'tb_tender_detail';
                $con['where'] = 't_id = "'.$_POST['t_id'].'" AND td_version_status != "cancel"';
                // $con['group_by'] = 'tc_id';
                $con['order_by'] = 'td_id';
                $tender_detail = $this->tender->select($con);
                unset($con);
                $button = '';
                if(count($tender_detail) > 0):
                    $tc_id = array();
                    $first_key = '';
                    foreach ($tender_detail as $key => $value):
                        if($first_key == ''):
                            $first_key = $value->tc_id;
                        endif;
                        $tc_id[$value->tc_id] = $value->tc_id;
                    endforeach;
                    if(count($tc_id) > 1):
                        $tc_id = implode(',',$tc_id);
                    else:
                        $tc_id = $tc_id[$first_key];
                    endif;
                    $con['table'] = 'tb_tender_contract';
                    $con['where'] = 'tc_id IN ('.$tc_id.')';
                    $tender_contract = $this->tender->select($con);
                    unset($con);
                    $data_contract = array();
                    if(count($tender_contract) > 0):
                        foreach ($tender_contract as $key => $value):
                            $data_contract[$key]['contract'] = $value;
                            $data_contract[$key]['contract']->product = array();
                            $data_contract[$key]['without_contract'] = array();
                            $num_key_contract = 0;
                            $num_key_withoutcontract = 0;
                            foreach ($tender_detail as $key_pro => $value_pro):
                                //ยืนยันราคา
                                $value_pro->td_price_text = number_format($value_pro->td_price);

                                //วันที่ บายเซ็น sr,am,sm
                                $value_pro->td_signature_sr_text = '-';
                                $value_pro->td_signature_am_text = '-';
                                $value_pro->td_signature_sm_text = '-';

                                if($value_pro->td_signature_sr != '0000-00-00'):
                                    $value_pro->td_signature_sr_text = $this->date_th($value_pro->td_signature_sr,2);
                                endif;
                                if($value_pro->td_signature_am != '0000-00-00'):
                                    $value_pro->td_signature_am_text = $this->date_th($value_pro->td_signature_am,2);
                                endif;
                                if($value_pro->td_signature_sm != '0000-00-00'):
                                    $value_pro->td_signature_sm_text = $this->date_th($value_pro->td_signature_sm,2);
                                endif;
                                //สถานะงาน product
                                $value_pro->td_status_text = '';
                                switch ($value_pro->td_status) {
                                    case 'ได้งาน':
                                        $value_pro->td_status_text = '<span class="text-success">ได้งาน</span>';
                                        break;
                                    case 'ไม่ได้งาน':
                                        $value_pro->td_status_text = '<span class="text-danger">ไม่ได้งาน</span>';
                                        break;
                                    case 'รอ':
                                        $value_pro->td_status_text = '<span class="text-warning">รอ</span>';
                                        break;
                                    default:
                                        break;
                                }
                                //สถานะงานของ stock
                                $value_pro->td_stock_status_text = '';
                                switch ($value_pro->td_stock_status) {
                                    case 'มีสินค้า':
                                        $value_pro->td_stock_status_text = '<span class="text-success">'.$value_pro->td_stock_status.'</span>';
                                        break;
                                    case 'ไม่มีของ':
                                        $value_pro->td_stock_status_text = '<span class="text-danger">'.$value_pro->td_stock_status.'</span>';
                                        break;
                                    default:
                                        $value_pro->td_stock_status_text = '<span class="text-warning">'.$value_pro->td_stock_status.'</span>';
                                        break;
                                }
                                //วันส่งของ
                                if($value_pro->td_stock_send_product == 0):
                                    $value_pro->td_stock_send_product = '-';
                                endif;

                                if($value_pro->tc_id != 0):
                                    if($value_pro->tc_id == $value->tc_id):
                                        $data_contract[$key]['contract']->product[$num_key_contract++] = $value_pro;
                                    endif;
                                else:
                                    $data_contract[$key]['without_contract'][$num_key_withoutcontract++] = $value_pro;
                                endif;
                            endforeach;

                            //วันที่ สัญญา
                            $value->tc_date_text = '-';
                            $value->tc_start_text = '-';
                            $value->tc_end_text = '-';
                            if($value->tc_date != '0000-00-00'):
                                $value->tc_date_text = $this->date_th($value->tc_date,2);
                            endif;
                            if($value->tc_start != '0000-00-00'):
                                $value->tc_start_text = $this->date_th($value->tc_start,2);
                            endif;
                            if($value->tc_end != '0000-00-00'):
                                $value->tc_end_text = $this->date_th($value->tc_end,2);
                            endif;


                        endforeach;

                        $button .= '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข tender</button>';
                        $button .= '<button class="btn btn-warning btn-option" option-type="manage_contract"><i class="material-icons">edit</i> จัดการสัญญา</button>';
                        if($_SESSION['user']->id == '296'): // พี่พิม
                                $button .= '<button class="btn btn-warning btn-option" option-type="update_draf"><i class="material-icons">edit</i> อัปเดต Draf OF</button>';
                        endif;
                        $button .= '<button class="btn btn-warning btn-option" option-type="edit_tender_detail"><i class="material-icons">edit</i> แก้ไขรายการสินค้า</button>';
                        $button .= '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">close</i> ลบ</button>';
                        echo json_encode(array('success',$data_contract,$button));
                    else: // ยังไม่มีรายการ product
                        $button .= '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข tender</button>';
                        $button .= '<button class="btn btn-success btn-option" option-type="add_tender_detail"><i class="material-icons">add</i> เพิ่มรายการสินค้า</button>';
                        $button .= '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">close</i> ลบ</button>';
                        echo json_encode(array('empty','ยังไม่มีรายการสินค้า',$button));
                    endif;
                endif;
        endif;
    }
    public function cancel($value='')
    {
        if(isset($_POST['t_id']) and !empty($_POST['t_id'])):
            $con['where'] = 't_id = "'.$this->decode($_POST['t_id']).'"';
            $con['data'] = array(
                't_status' => 'cancel'
            );
            $this->tender->update($con);
            unset($con);

            $con['where'] = 't_id = "'.$this->decode($_POST['t_id']).'" AND t_status = "cancel"';
            $check_cancel = $this->tender->select($con);
            if(count($check_cancel) > 0):
                echo json_encode(array('success'));
            else:
                echo json_encode(array('fail'));
            endif;

        endif;
    }
    public function list_sale($value='')
    {
        $con['table'] = 'tb_user';
        $con['select'] = 'id,first_name,last_name,division_th,tel,zone';
        $con['where'] = 'zone != "" AND (division = "Sale" OR division = "Office")';
        $con['order_by'] = 'zone ASC';
        $data = $this->tender->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail',$data));
        endif;
    }
    public function check_online_status($value='')
    {
        if(!isset($_SESSION['user'])):
            echo json_encode('logout');
        endif;
    }
}
 ?>
