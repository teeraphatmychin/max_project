<?php /**
 *
 */
class Employee extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->emp = $this->model('Employee_model');
        // if(isset($_SESSION['user'])):
        //     if(isset($_GET['url'])):
        //         if($_GET['url'] == 'employee/index' or $_GET['url'] == 'employee/' or $_GET['url'] == 'employee'):
        //             //กรณีอยู่หน้า index แบบ Url
        //             $this->redirect('page/');
        //         endif;
        //     else:
        //         //กรณีอยู่หน้า index แบบ routes default
        //         $this->redirect('page');
        //     endif;
        // else:
        //     if(isset($_GET['url'])):
        //         if($_GET['url'] != 'employee/check_login'):
        //             if($_GET['url'] != 'employee/index'):
        //                 $this->redirect();
        //             endif;
        //         endif;
        //     endif;
        // endif;
    }
    public function index($value='')
    {
        $data['check_session'] = '';
        if(isset($_SESSION['user']) and (count((array)$_SESSION['user']) > 0)):
            $data['check_session'] = $_SESSION['user']->menu_option[0]->option_path;
        endif;
        $this->set_page('employee/login',$data);
        // $this->set_page('employee/login');
    }
    public function letf_nav($value='')
    {
        $this->view('partail/left_nav');
    }
    public function homepage($value='')
    {
        echo "this is hoempage";
    }
    public function list_issue($value='')
    {
        $this->set_page('employee/list_issue');
    }
    public function get($value='')
    {
        if(isset($_POST['emp_id']) and !empty($_POST['emp_id'])):
            $con['table'] = 'tb_user';
            $con['where'] = 'id = "'.$_POST['emp_id'].'"';
            $data = $this->emp->select($con);
            if(count($data) > 0):
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail','ไม่สามารถค้นหาพนักงานได้'));
            endif;
        else:
            echo json_encode(array('fail','มีบางอย่างผิดพลาด','โปรดแจ้งเจ้าหน้าที่ IT'));
        endif;
    }
    public function check_login($value='')
    {
        unset($_SESSION['user']);
        if(isset($_SESSION['user'])):
            echo json_encode(array('isset',$_SESSION['user']->menu_option[0]->option_path));
        else:
            if(isset($_POST['username']) and !empty($_POST['username'])):
                $con['table'] = 'tb_user';
                $con['select'] = 'id,login_user,user_id,level_id,first_name,last_name,position,active_flag,division,division_th,head,email,menu_option,tel,zone,token_no';
                $con['where'] = 'login_user = "'.$_POST['username'].'" AND new_login_pass = "'.$_POST['password'].'"';
                $data = $this->emp->select($con);
                unset($con);
                if ($data == true):
                    $_SESSION['user'] = $data[0];
                    $con['table'] = 'tb_option';
                    $con['select'] = 'option_id,option_name,option_path,option_color,option_icon';
                    $con['where'] = 'option_id IN('.$_SESSION['user']->menu_option.')'; //here
                    $con['order_by'] = 'option_order ASC';
                    // $con['order_by'] = 'case option_id when 6 then 1 when 5 then 2 when 7 then 3 when 9 then 4 end;';
                    $data = $this->emp->select($con);
                    unset($con);
                    if(count($data) > 0):
                        $_SESSION['user']->menu_option = $data;
                        echo json_encode(array('success',$_SESSION['user']->menu_option[0]->option_path));
                    else:
                        echo json_encode(array('No Permission'));
                    endif;
                    // $option = explode(',',$_SESSION['user']->menu_option);
                    // $_SESSION['user']->menu_option = array();
                    // foreach ($data as $key => $value):
                    //     // $option[$value->option_id] = $value;
                    //     // $data[$value->option_id] = $value;
                    //     // $data[$value->option_id]->test = $value->option_id;
                    //     // unset($data[$key]);
                    //     // echo $value->option_id;
                    //     $_SESSION['user']->menu_option[$key] = $data[$option[$key]];
                    // endforeach;
                    // // sort($option);
                    // echo "<pre>";print_r($_SESSION['user']->menu_option);exit;
                    // exit;
                else:
                    echo json_encode(array('fail'));
                endif;
            else:
                echo json_encode(array('isset',$_SESSION['user']->menu_option[0]->option_path));
            endif;
        endif;

    }
    public function logout($value='')
    {
        unset($_SESSION['user']);
        $this->redirect();
    }
    public function list_issue_ajax($value='')
    {
        if($_SESSION['user']->division == 'IT'):
            $con['table'] = 'tb_issue';
            $con['order_by'] = 'issue_id DESC';
            $data = $this->emp->select($con);
            unset($con);

            $con['table'] = 'tb_user';
            $con['select'] = 'division_th,first_name';
            if(count($data) > 0 ):
                foreach ($data as $key => $value):
                    $con['where'] = 'user_id = "'.$value->issue_owner.'"';
                    $user_data = $this->emp->select($con);
                    // echo "<pre>";print_r($user_data);exit;
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
        else:
            $con['table'] = 'tb_issue';
            $con['where'] = 'issue_owner  = "'.$_SESSION['user']->user_id.'"';
            $con['order_by'] = 'issue_id DESC';
            $data = $this->emp->select($con);
            unset($con);

            if(count($data) > 0 ):
                foreach ($data as $key => $value):
                    $value->topic_issue = $_SESSION['user']->first_name.'  '.$_SESSION['user']->division;
                    $value->issue_id = $this->encode($data[$key]->issue_id);
                    $value->issue_date_th = $this->date_th($value->issue_date,1);
                    $value->issue_content = str_replace('|path_url|',$this->public_url(),$value->issue_content);
                    if(strpos($value->issue_status,'/') !== false):
                        $expolde_issue_status = explode('/',$value->issue_status);
                        $value->issue_stauts = $expolde_issue_status[0];
                    endif;
                endforeach;
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function edit_issue($value='')
    {
        $con['table'] = 'tb_issue';
        $con['select'] = 'issue_content,issue_status';
        $con['where'] = 'issue_id = "'.$this->decode($_POST['issue_id']).'"';
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            if($data[0]->issue_status != 'success'):
                $con['table'] = 'tb_edit_issue';
                $con['data'] = array(
                    'issue_id' => $this->decode($_POST['issue_id']),
                    'edit_issue_content' => $data[0]->issue_content
                );
                $this->emp->insert($con);
                unset($con);
                $new_issue_content = $_POST['issue_content'];
                if(strpos($this->public_url(),$_POST['issue_content']) !== false):
                    $new_issue_content = str_replace($this->public_url(),'|path_url|',$_POST['issue_content']);
                endif;
                $con['table'] = 'tb_issue';
                $con['where'] = 'issue_id = "'.$this->decode($_POST['issue_id']).'"';
                $con['data'] = array('issue_content' => str_replace($this->public_url(),'|path_url|',$_POST['issue_content']));
                $update = $this->emp->update($con);

                echo json_encode(array('success'));
            else:
                echo json_encode(array('successed'));
            endif;
        else:
            echo json_encode(array('fail','ไม่มีข้อมูลการแจ้งปัญหามาก่อน'));
        endif;
    }
    public function add_issue($value='')
    {
        $con['table'] = 'tb_issue';
        $con['data'] = array(
            'issue_owner' => $_SESSION['user']->user_id,
            'issue_content' => str_replace($this->public_url(),'|path_url|',$_POST['issue_content']),
            'issue_date' => date('Y-m-d H:i:s'),
            'issue_status' => 'danger'
        );
        $data = $this->emp->insert($con);
        unset($con);
        if($data === true):
            $con['table'] = 'tb_issue';
            $con['where'] = 'issue_owner = "'.$_SESSION['user']->user_id.'"';
            $con['order_by'] = 'issue_id DESC';
            $con['limit'] = '1';
            $data = $this->emp->select($con);
            unset($con);
            $data[0]->topic_issue = $_SESSION['user']->first_name.'  '.$_SESSION['user']->division;
            $data[0]->issue_id = $this->encode($data[0]->issue_id);
            $data[0]->issue_date_th = $this->date_th($data[0]->issue_date,1);
            $data[0]->issue_content = str_replace('|path_url|',$this->public_url(),$data[0]->issue_content);

            echo json_encode(array('success',$data[0]));
        else:
            echo json_encode('fail');
        endif;
    }
    public function reset_password($value='')
    {
        if(isset($_POST['new_password']) and !empty($_POST['new_password'])):
            $con['table'] = 'tb_user';
            $con['select'] = '1';
            $con['where'] = 'user_id = "'.$_SESSION['user']->user_id.'" AND new_login_pass = "'.$_POST['old_password'].'"';
            $data = $this->emp->select($con);
            unset($con);
            if($data):
                $con['table'] = 'tb_user';
                $con['where'] = 'user_id = "'.$_SESSION['user']->user_id.'"';
                $con['data'] = array(
                    'new_login_pass' => $_POST['new_password']
                );
                $update = $this->emp->update($con);
                unset($con);
                echo json_encode('success');
            else:
                echo json_encode('fail');
            endif;
        endif;
        // if(isset($_POST['tel']) and !empty($_POST['tel'])):
        // endif;
    }

    public function equipment_list_ajax($value='')
    {
        $con['table'] = 'tb_equipment';
        $data = $this->emp->select($con);
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
        $this->emp->insert($con);
        unset($con);

        $con['table'] = 'tb_equipment';
        $con['where'] = 'eq_serial_no = "'.$data['eq_serial_no'].'"';
        $check_insert = $this->emp->select($con);
        unset($con);

        if(count($check_insert) > 0):
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;
    }
    public function get_quotation($value='')
    {
        if(isset($_POST['q_id']) and !empty($_POST['q_id'])):
            $con['table'] = 'tb_quotation';
            $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
            // $con['where'] = 'q_id = "3"';
            $data = $this->emp->select($con);
            unset($con);
            if(count($data) > 0):
                $data[0]->q_id_encode = $this->encode($data[0]->q_id);
                $con['table'] = 'tb_quotation_d';
                $con['where'] = 'q_id = "'.$data[0]->q_id.'"';
                $prodcut_detail = $this->emp->select($con);
                unset($con);
                $data[0]->product = array();
                $data[0]->sum_total = 0;
                for ($i=strlen($data[0]->q_num); $i < 4; $i++):
                    $data[0]->q_num = '0'.$data[0]->q_num;
                endfor;
                $data[0]->q_date_th = $this->date_th($data[0]->q_date,2);
                $data[0]->q_number = $data[0]->q_type.'.'.$data[0]->q_num.'/'.(substr($data[0]->q_date,0,4)+543);
                if($data[0]->q_set_price != ''):
                    $set_price = explode(':',$data[0]->q_set_price);
                    $data[0]->q_set_price_data = $data[0]->q_set_price;
                    $data[0]->q_set_price = $set_price[0].' วัน '.$set_price[1];
                else:
                    $data[0]->q_set_price = '';
                endif;
                if($data[0]->q_set_delivery != ''):
                    $set_delivery = explode(':',$data[0]->q_set_delivery);
                    $data[0]->q_set_delivery_data = $data[0]->q_set_delivery;
                    $data[0]->q_set_delivery = $set_delivery[0].' วัน '.$set_delivery[1];
                else:
                    $data[0]->q_set_delivery_data = '';
                endif;
                if($data[0]->q_warranty != ''):
                    $warranty = explode(':',$data[0]->q_warranty);
                    $data[0]->q_set_warranty_data = $data[0]->q_warranty;
                    $data[0]->q_warranty = $warranty[0].' วัน '.$warranty[1];
                else:
                    $data[0]->q_set_warranty_data = '';
                endif;
                foreach ($prodcut_detail as $key => $value):
                    $con['table'] = 'tb_product';
                    $con['where'] = 'p_id = "'.$value->p_id.'"';
                    $product = $this->emp->select($con);
                    unset($con);
                    $data[0]->product[$key]['p_id'] = $product[0]->p_id;
                    $data[0]->product[$key]['p_name'] = $product[0]->p_code.' : '.$product[0]->p_detail;
                    $data[0]->product[$key]['p_name_manual'] = '';
                    if(!empty($value->product_name)):
                        $data[0]->product[$key]['p_name_manual'] = $value->product_name;
                    endif;
                    $data[0]->product[$key]['p_unit'] = $value->p_unit;
                    $data[0]->product[$key]['p_qty'] = $value->p_qty;
                    $data[0]->product[$key]['p_price_sum'] = $value->p_price * $value->p_unit;
                    $data[0]->sum_total += $data[0]->product[$key]['p_price_sum'];
                    $data[0]->product[$key]['p_price_sum'] = number_format($data[0]->product[$key]['p_price_sum'],2);
                    $data[0]->product[$key]['p_price'] = number_format($value->p_price,2);
                    $data[0]->product[$key]['p_price_data'] = $value->p_price;
                endforeach;
                //ลดราคาก่อนคิด vat
                $data[0]->total_price = number_format($data[0]->sum_total,2);
                $data[0]->sum_total = $data[0]->sum_total - $data[0]->q_discount;
                $data[0]->price_vat = $data[0]->sum_total * ($data[0]->q_vat/100);
                $data[0]->price_whitout_vat = number_format($data[0]->sum_total - $data[0]->price_vat,2);
                $data[0]->price_vat = number_format($data[0]->price_vat,2);
                $data[0]->sum_total = number_format($data[0]->sum_total,2);
                $sum_exp = explode(',',$data[0]->sum_total);
                $sum_exp = implode('',$sum_exp);
                $data[0]->sum_total_th = $this->Convert($sum_exp);
                $data[0]->q_discount = number_format($data[0]->q_discount,2);
                if($data[0]->q_po != ''):
                    $data[0]->q_po_date_th = $this->date_th($data[0]->q_po_date,1);
                    $data[0]->q_po_date = str_replace(' ','T',substr($data[0]->q_po_date,0,-3));
                else:
                    $data[0]->q_po_date = '';
                endif;
                // $data[0]->q_po_date = substr($data[0]->q_po_date,0,-2);
                $data[0]->q_agent_service = str_replace('โทร.',' โทร.',$data[0]->q_agent_service);
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
                        case 'IT':
                            $user_status = 'it';
                            break;
                        default:
                            break;
                    endswitch;
                else:
                    $user_status = 'it';
                endif;
                echo json_encode(array('success',$data,$user_status));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function update_quotation($value='')
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
                        'q_remark' => $_POST['q_remark']
                    );
                    $this->emp->update($con);
                    unset($con);

                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$q_id.'" AND q_status = "edit"';
                    $check = $this->emp->select($con);
                    if(count($check) > 0 ):
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                case 'edit':

                    $con['table'] = 'tb_quotation';
                    $con['select'] = 'q_id,q_num';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND q_status != "cancel"';
                    $old_quotation = $this->emp->select($con);
                    unset($con);
                    if(count($old_quotation) > 0):
                        $con['table'] = 'tb_quotation';
                        $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
                        $con['data'] = array(
                            'q_status' => 'cancel',
                            'q_status_date' => date('Y-m-d H:i:s')
                        );
                        $this->emp->update($con);
                        unset($con);

                        $agent_service = explode(',',$_POST['q_service_name']);
                        //get head Service
                        $con['table'] = 'tb_user';
                        $con['select'] = 'head';
                        $con['where'] = 'id = "'.$agent_service[0].'"';
                        $head_id = $this->emp->select($con);
                        unset($con);
                        $head_id = $head_id[0]->head;

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
                            'q_stock_number' => $_POST['q_stock_number'],
                            'q_status' => 'new',
                            'q_status_date' => date('Y-m-d H:i:s'),
                            'q_vat' => 7,
                            'q_ro' => $_POST['q_ro_number'],
                            'q_service_id' => $agent_service[0],
                            'q_agent_service' => $agent_service[1].'โทร.'.$_POST['q_service_phone'],
                            'q_set_price' => $_POST['q_set_price'][0].':'.$_POST['q_set_price'][1],
                            'q_set_delivery' => $_POST['q_set_delivery'][0].':'.$_POST['q_set_delivery'][1],
                            'q_warranty' => $_POST['q_warranty'][0].':'.$_POST['q_warranty'][1],
                            'q_discount' => $discount = !empty($_POST['q_discount'])? $_POST['q_discount'] : 0,
                            'q_brand' => $_POST['q_brand'],
                            'q_model' => $_POST['q_model'],
                            'q_sn' => $_POST['q_sn'],
                            'q_customer_department' => $_POST['q_customer_department']
                        );
                        $this->emp->insert($con);
                        unset($con);
                        $con['table'] = 'tb_quotation';
                        $con['select'] = 'q_id';
                        $con['where'] = 'q_num = "'.$old_quotation[0]->q_num.'"';
                        $con['order_by'] = 'q_id DESC';
                        $con['limit'] = '1';
                        $get_last_id = $this->emp->select($con);
                        unset($con);
                        $con['table'] = 'tb_quotation_d';
                        foreach ($_POST['q_product'] as $key => $value):
                        $con['data'] = array(
                        'q_id' => $get_last_id[0]->q_id,
                        'q_stock_number' => $_POST['q_stock_number'],
                        'p_id' => $_POST['q_product'][$key],
                        'p_price' => $_POST['q_product_price'][$key],
                        'p_unit' => $_POST['q_quanity'][$key],
                        'p_qty' => $_POST['q_quanity_type'][$key]
                        );
                        $this->emp->insert($con);
                        endforeach;
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
                    $data = $this->emp->update($con);
                    unset($con);
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND q_status = "approved"';
                    $check = $this->emp->select($con);
                    unset($con);
                    if(count($check) > 0):
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('fail'));
                    endif;
                    break;
                case 'customer_approve':
                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status = "approved"';
                    $check = $this->emp->select($con);
                    unset($con);
                    if(count($check) > 0):
                        $con['table'] = 'tb_quotation';
                        $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status_customer = "created"';
                        $check = $this->emp->select($con);
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
                            $this->emp->update($con);
                            unset($con);
                            $con['table'] = 'tb_quotation';
                            $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_status_customer = "approved"';
                            $con['where'] .= 'AND q_po = "'.$_POST['q_po'].'"';
                            $check = $this->emp->select($con);
                            if(count($check) > 0):
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
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'"';
                    $con['data'] = array(
                        'q_status_customer' => 'reject',
                        'q_status_customer_date' => date('Y-m-d H:i:s')
                    );
                    $this->emp->update($con);
                    unset($con);

                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$_POST['q_id'].'" AND q_status_customer = "reject"';
                    $check = $this->emp->select($con);
                    if(count($check) > 0):
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
                    $this->emp->update($con);
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
                    $this->emp->update($con);
                    unset($con);

                    $con['table'] = 'tb_quotation';
                    $con['where'] = 'q_id = "'.$this->decode($_POST['q_id']).'" AND q_remark_customer = "'.$_POST['q_remark_customer'].'"';
                    $check = $this->emp->select($con);
                    if(count($check) > 0):
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
    public function list_quotation_ajax($value='')
    {
        if(isset($_POST['status']) and !empty($_POST['status']) and $_POST['status'] == 'get'):
            $con['table'] = 'tb_quotation';
            $con['select'] = 'q_id,q_date,q_num,q_service_id,q_type,q_topic,q_to,q_to_detail,q_stock_number,q_agent_service,q_set_price,q_set_delivery,q_warranty,q_status,';
            $con['select'] .= 'q_status_customer,q_status_customer_date,q_status_date,q_ro,q_customer_id';
            $user_status = '';
            $con['where'] = '';
            switch ($_SESSION['user']->position):
                case 'Service Ad.':
                    $con['where'] = 'q_emp_id = "'.$_SESSION['user']->user_id.'" AND';
                    $con['where'] .= ' q_status IN("new","edit","approved") AND q_status_customer != "approved" AND q_status_customer != "reject" AND';
                    $user_status = 'admin';
                    break;
                case 'Service Eng.':
                    $con['where'] = 'q_service_id = "'.$_SESSION['user']->id.'" AND q_status = "approved" AND q_status_customer != "reject" AND';
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
            $con['where'] .= ' YEAR(q_date) = "'.date('Y').'"';
            $con['order_by'] = 'q_id DESC';
            $data = $this->emp->select($con);
            unset($con);
            $con['table'] = 'tb_customer';
            $data_customer = $this->emp->select($con);
            unset($con);
            if(count($data) > 0):
                $customer = array();
                foreach ($data_customer as $key_cus => $value_cus):
                    $customer[$value_cus->id] = $value_cus->cus_name;
                endforeach;

                foreach ($data as $key => $value):
                    for ($i=strlen($value->q_num); $i < 3; $i++):
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



                echo json_encode(array('success',$data,$user_status));
            else:
                echo json_encode(array('empty'));
            endif;
        endif;
    }
    public function add_quotation($value='')
    {
        if(isset($_POST['add_quotation']) and !empty($_POST['add_quotation'])):
            $con['table'] = 'tb_quotation';
            $con['select'] = 'MAX(q_num) AS q_num';
            $con['where'] = 'YEAR(q_date) = "'.date('Y').'"';
            $max_num = $this->emp->select($con);
            unset($con);
            if(count($max_num) > 0):
                $max_num = $max_num[0]->q_num + 1;
            else:
                $max_num = 1;
            endif;

            $agent_service = explode(',',$_POST['q_service_name']);

            //get head Service
            $con['table'] = 'tb_user';
            $con['select'] = 'head';
            $con['where'] = 'id = "'.$agent_service[0].'"';
            $head_id = $this->emp->select($con);
            unset($con);
            $head_id = $head_id[0]->head;

            $con['data'] = array(
                'q_num' => $max_num,
                'q_date' => $_POST['q_date'],
                'q_type' => $_POST['q_type'],
                'q_emp_id' => $_SESSION['user']->user_id,
                'q_head_id' => $head_id,
                'q_customer_id' => $_POST['q_customer_id'],
                'q_topic' => $_POST['q_topic'],
                'q_to' => $_POST['q_to'],
                'q_to_detail' => $_POST['q_to_detail'],
                'q_stock_number' => $stock_number = !empty($_POST['q_stock_number'])?$_POST['q_stock_number']:'-',
                'q_status' => 'new',
                'q_status_date' => date('Y-m-d H:i:s'),
                'q_vat' => 7,
                'q_ro' => $ro_number = !empty($_POST['q_ro_number'])?$_POST['q_ro_number']:'-',
                'q_service_id' => $agent_service[0],
                'q_agent_service' => $agent_service[1].'โทร.'.$_POST['q_service_phone'],
                'q_set_price' => $_POST['q_set_price'][0].':'.$_POST['q_set_price'][1],
                'q_set_delivery' => $_POST['q_set_delivery'][0].':'.$_POST['q_set_delivery'][1],
                'q_warranty' => $_POST['q_warranty'][0].':'.$_POST['q_warranty'][1],
                'q_discount' => $discount = !empty($_POST['q_discount'])? $_POST['q_discount'] : 0,
                'q_brand' => $_POST['q_brand'],
                'q_model' => $_POST['q_model'],
                'q_sn' => $_POST['q_sn'],
                'q_customer_department' => $_POST['q_customer_department']
            );
            $con['table'] = 'tb_quotation';
            $this->emp->insert($con);
            unset($con);



            $con['table'] = 'tb_quotation';
            $con['select'] = 'q_id';
            $con['where'] = 'q_date = "'.$_POST['q_date'].'" AND q_num = "'.$max_num.'"';
            $check = $this->emp->select($con);
            unset($con);
            if(count($check) > 0):
                echo json_encode(array('success'));
                $con['table'] = 'tb_quotation_d';
                foreach ($_POST['q_product'] as $key => $value):
                    $con['data'] = array(
                        'q_id' => $check[0]->q_id,
                        'q_stock_number' => $_POST['q_stock_number'],
                        'p_id' => $_POST['q_product'][$key],
                        'p_price' => $_POST['q_product_price'][$key],
                        'p_unit' => $_POST['q_quanity'][$key],
                        'p_qty' => $_POST['q_quanity_type'][$key]
                    );
                    $this->emp->insert($con);
                endforeach;
                unset($con);
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function list_brand_ajax($value='')
    {
        $con['table'] = 'tb_brand';
        $con['select'] = 'b_brand';
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail',$data));
        endif;
    }
    public function list_product_ajax($value='')
    {
        $con['table'] = 'tb_product';
        $con['limit'] = '500';
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail',$data));
        endif;
    }
    public function list_customer_ajax($value='')
    {
        $con['table'] = 'tb_customer';
        if(isset($_POST['zone']) and $_POST['zone'] == 'active' and strtolower($_SESSION['user']->division) == 'sale'):
            $con['where'] = 'cus_zone = "'.$_SESSION['user']->zone.'"';
        endif;
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail',$data));
        endif;
    }
    public function list_service_name_ajax($value='')
    {
        $con['table'] = 'tb_user';
        $con['select'] = 'id,first_name,last_name,division_th,tel,zone';
        if(strtolower($_SESSION['user']->division) == 'sale' or strtolower($_SESSION['user']->division) == 'it'):
            if($_SESSION['user']->position == 'Admin Sale Manager'):
                $con['where'] = 'active_flag = "1" AND position IN("Sale Rep.","Service Eng.")';
            else:
                $con['where'] = 'active_flag = "1" AND position = "Sale Rep."';
            endif;
        else:
          $con['where'] = 'active_flag = "1" AND position = "Service Eng."';
        endif;
        $con['order_by'] = 'division_th ASC';
        $data = $this->emp->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail',$data));
        endif;
    }
    public function get_number_quotations($value='')
    {
        $con['table'] = 'tb_quotation';
        $con['select'] = 'MAX(q_num) AS q_num';
        $con['where'] = 'YEAR(q_date) = "'.date('Y').'"';
        $max_num = $this->emp->select($con);
        unset($con);
        if(count($max_num) > 0):
            $max_num = $max_num[0]->q_num + 1;
        else:
            $max_num = 1;
        endif;

        if($max_num > 0):
            echo json_encode(array('success',$max_num));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function test_autocomplete($value='')
    {
        $this->set_page('employee/autocomplete');
    }
    public function icon($value='')
    {
        $this->set_page('employee/icon');
    }
    public function summernote($value='')
    {
        $this->view('partail/summernote');
    }
    public function test($value='')
    {
        $this->set_page('test/test_progress');
    }
    public function test_chosen($value='')
    {
        $this->set_page('test/test_chosen');
    }
    public function test_pdf($value='')
    {
        $this->set_page('employee/test_pdf');
    }
    public function test_input($value='')
    {
        $this->set_page('test/test_input');
    }
    public function issue_upload_image($value='')
    {
        $data['upload_path'] = '../it_support/public/file/images/issue/' ;
        $data['file'] = $_FILES;
        // $data['new_size'] = '1920/1080';
        // $data['new_size'] = '1366';
        $data['suffix'] = 'issue'; // ต่อท้ายชื่อรูปภาพ
        $data['path_image'] = $this->public_url();
        $path = $this->image_upload($data);
        echo $path[0];
    }
    function verify_login(){
        if(isset($_SESSION['user'])):
            if(isset($_SESSION['user']->id)):
                echo json_encode('logged in');
            endif;
        else:
            echo json_encode('logged out');
        endif;
    }
}
 ?>
