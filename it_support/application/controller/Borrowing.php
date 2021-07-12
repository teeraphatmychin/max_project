<?php /**
 *
 */
class Borrowing extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->borrowing = $this->model('Borrowing_model');
    }
    public function index($value='')
    {

    }
    public function add($value='')
    {
        if(isset($_POST['type'])):
            $con['table'] = 'tb_borrow';
            $con['where'] = "b_number = '".$_POST['b_number']."'";
            $con['order_by'] = 'b_id DESC';
            $check_borrow = $this->borrowing->select($con);
            $b_version = 1;
            if(count($check_borrow) > 0):
                if($_POST['type'] == 'add'):
                    echo json_encode(array('fail','เลขที่ใบยืมถูกใช้แล้ว'));exit;
                elseif($_POST['type'] == 'edit'):
                    $b_version = $check_borrow[0]->b_version + 1;
                    $con['table'] = 'tb_borrow';
                    $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'"';
                    $con['data'] = array(
                        'b_status' => 'cancel'
                    );
                    $this->borrowing->update($con);
                    unset($con);
                    $con['table'] = 'tb_borrow';
                    $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'" AND b_status = "cancel"';
                    $check_cancel = $this->borrowing->select($con);
                    if(count($check_cancel) < 1):
                        echo json_encode(array('fail','ไม่สามารถแก้ไขได้ การเปลี่ยนแปลงเวอร์ชั่นเอกสารไม่สมบูรณ์'));exit;
                    endif;
                endif;
            endif;
            //add new customer
            if(isset($_POST['b_customer_name']) and !empty($_POST['b_customer_name'])):
                $con['table'] = 'tb_customer';
                $con['where'] = 'cus_name = "'.$_POST['b_customer_name'].'"';
                $customer = $this->borrowing->select($con);
                unset($con);
                if($customer):
                    echo json_encode(array('fail','มีลูกค้านี้อยู่แล้วในระบบ'));exit;
                elseif(!$customer):
                    $con['table'] = 'tb_customer';
                    $con['data'] = array('cus_name' => $_POST['b_customer_name']);
                    $this->borrowing->insert($con);
                    unset($con);
                    $con['table'] = 'tb_customer';
                    $con['where'] = 'cus_name = "'.$_POST['b_customer_name'].'"';
                    $customer = $this->borrowing->select($con);
                    unset($con);
                    if(count($customer) > 0):
                        $b_customer = $customer[0]->id;
                    else:
                        echo json_encode(array('fail','เพิ่มข้อมูลลูกค้าไม่สำเร็จ'));exit;
                    endif;
                endif;
            else:
                $b_customer = $_POST['b_customer'];
            endif;
            $date_now = date('Y-m-d H:i:s');
            $con['table'] = 'tb_borrow';
            $con['data'] = array(
                'b_number' => $_POST['b_number'],
                'b_borrower	' => $_POST['b_borrower'],
                'b_version' => 1,
                'b_customer' => $b_customer,
                'b_remark' => $_POST['b_remark'],
                'b_date' => $_POST['b_date'],
                'b_return' => $_POST['b_return'],
                'b_len' => $_POST['b_len'],
                'b_create' => $date_now,
                'b_creator' => $_SESSION['user']->id,
                'b_status' => 'borrowing',
                'b_location' => 'XLC',
            );
            $this->borrowing->insert($con);
            unset($con);
            $con['table'] = 'tb_borrow';
            $con['where'] = "b_create = '".$date_now."'";
            $check_insert = $this->borrowing->select($con);
            unset($con);
            if(count($check_insert) == 1):
                foreach ($_POST['bd_p_sn'] as $key => $value):
                    if(!empty($value)):
                        $barcode_qr2_explode = explode(' ',$_POST['bd_p_barcode_qr2'][$key]);
                        $product_code = $barcode_qr2_explode[0];
                        $con['table'] = 'tb_borrow_d';
                        $con['data'] = array();
                        $con['data']['bd_borrow_id'] = $check_insert[0]->b_id;
                        $con['data']['bd_p_sn'] = $value;
                        $con['data']['bd_p_detail'] = $_POST['bd_p_detail'][$key];
                        $con['data']['bd_p_code'] = $product_code;
                        $con['data']['bd_p_barcode_qr2'] = $_POST['bd_p_barcode_qr2'][$key];
                        $con['data']['bd_p_borrow_date'] = $date_now;
                        $con['data']['bd_p_qty'] = 1;
                        $con['data']['bd_bo_status'] = 1;
                        $con['data']['bd_p_status'] = 'borrowing';
                        $this->borrowing->insert($con);
                        unset($con);
                    endif;
                endforeach;
                echo json_encode(array('success'));
            endif;
            // endif;
        else:
            echo json_encode(array('fail','มียางอย่างผิดพลาด'));
        endif;
    }
    public function list($value='')
    {
        $year = date('Y');
        $year = $year - '3';
        $con['where'] = '';
        if(isset($_POST['date_start']) and !empty($_POST['date_start'])):
            if(isset($_POST['date_end']) and !empty($_POST['date_end'])):
                $con['where'] = 'DATE(b_date) >= "'.$_POST['date_start'].'" AND DATE(b_date) <= "'.$_POST['date_end'].'"';
            else:
                $con['where'] = 'DATE(b_date) >= "'.$_POST['date_start'].'"';
            endif;
        endif;
        if($_SESSION['user']->position == 'Admin.Sale' or $_SESSION['user']->position == 'Programmer'):
            $con['select'] = '';
            $con['where'] .= "b_date >= DATE('".$year."-01-01')";
        else:
            $con['select'] = '';
            $con['where'] .= "b_borrower = '".$_SESSION["user"]->login_user."' AND b_date >= DATE('".$year."-01-01')";
        endif;
        $con['where'] .= " AND b_location = 'XLC' AND b_status != 'cancel'";
        $con['order_by'] = 'b_create DESC';
        $data = $this->borrowing->select($con);
        unset($con);
        if(count($data) > 0):
            foreach ($data as $key => $value):
                $value->b_id = $this->encode($value->b_id);
                $con['table'] = 'tb_user';
                $con['select'] = 'first_name,last_name';
                $con['where'] = "id = '".$value->b_borrower."'";
                $data_user = $this->borrowing->select($con);
                unset($con);
                if(count($data_user) == 1):
                    $value->borrow_fullname = $data_user[0]->first_name.' '.$data_user[0]->last_name;
                else:
                    $value->borrow_fullname = 'ไม่ทราบชื่อ';
                endif;
                $con['table'] = 'tb_customer';
                $con['select'] = 'cus_name';
                $con['where'] = 'id = "'.$value->b_customer.'"';
                $customer = $this->borrowing->select($con);
                unset($con);
                $value->b_customer_name = $customer[0]->cus_name;
                $value->b_date_th = $this->date_th($value->b_date,2,'month cut');
                $value->b_return_th = $this->date_th($value->b_return,2,'month cut');


            endforeach;
            echo json_encode(array('success',$data));
        endif;
    }
    public function get($value='')
    {
        if(isset($_POST['b_id']) and !empty($_POST['b_id'])):
            $con['where'] = "b_id = '".$this->decode($_POST["b_id"])."'";
            $data = $this->borrowing->select($con);
            unset($con);
            if(count($data) == 1):
                foreach ($data as $key => $value):
                    /*get name borrower*/
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name';
                    $con['where'] = "id = '".$value->b_borrower."'";
                    $data_user = $this->borrowing->select($con);
                    unset($con);
                    if(count($data_user) == 1):
                        $value->b_borrow_fullname = $data_user[0]->first_name.' '.$data_user[0]->last_name;
                    else:
                        $value->b_borrow_fullname = $value->b_borrower;
                    endif;
                    /*get product*/
                    $con['table'] = "tb_borrow_d";
                    $con['where'] = "bd_borrow_id = '".$value->b_id."'";
                    $product = $this->borrowing->select($con);
                    unset($con);
                    $value->product = array();
                    if(count($product) > 0):
                        foreach ($product as $key_pro => $value_pro):
                            $value_pro->bd_p_return_date_th = '';
                            if(!empty($value_pro->bd_p_return_date)):
                                $value_pro->bd_p_return_date_th = $this->date_th($value_pro->bd_p_return_date,1);
                            endif;
                        endforeach;
                        $value->product = $product;
                    endif;

                    /*get customer name*/
                    $con['table'] = 'tb_customer';
                    $con['select'] = 'cus_name';
                    $con['where'] = 'id = "'.$value->b_customer.'"';
                    $customer = $this->borrowing->select($con);
                    unset($con);
                    if(count($customer) == 1):
                        $value->b_customer_name = $customer[0]->cus_name;
                    else:
                        $value->b_customer_name = $value->b_customer;
                    endif;


                    $value->b_id = $this->encode($value->b_id);

                    // $value->Bo_ID = $this->encode($value->Bo_ID);
                    $value->b_date_th = $this->date_th($value->b_date,2,'month cut');
                    $value->b_return_th = $this->date_th($value->b_return,2,'month cut');
                endforeach;
                $button = '';
                if($_SESSION['user']->position == 'Admin.Sale' or $_SESSION['user']->position == 'Programmer'):
                    $button = '<button class="btn btn-danger btn-option" option-type="cancel"><i class="material-icons">close</i> ยกเลิก</button>';
                    $button .= '<button class="btn btn-warning btn-option" option-type="edit"><i class="material-icons">edit</i> แก้ไข</button>';
                    $button .= '<button class="btn btn-success btn-option" option-type="print"><i class="material-icons">print</i> สั่งพิม</button>';
                else:
                    $button = 'test';
                endif;
                echo json_encode(array('success',$data,$button));
            else:
                echo json_encode(array('fail','มียางอย่างผิดพลาด'));
            endif;
        endif;
    }
    public function list_customer($value='')
    {
        $con['table'] = 'tb_customer';
        $con['select'] = 'id,cus_name';
        $data = $this->borrowing->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        endif;
    }
    public function list_borrower($value='')
    {
        $con['table'] = 'tb_user';
        $con['select'] = 'id,first_name,last_name';
        $con['where'] = 'active_flag = 1';
        $con['order_by'] = 'position ASC';
        $user = $this->borrowing->select($con);
        unset($con);
        if(count($user) > 0):
            echo json_encode(array('success',$user));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and $_POST['type'] == 'edit'):
            // $this->log($_POST);
            $con['where'] = 'b_id = "'.$this->decode($_POST['b_id']).'"';
            $check_borrow = $this->borrowing->select($con);
            unset($con);
            if(count($check_borrow) > 0):
                foreach ($check_borrow as $key => $value):
                    $con['table'] = 'tb_borrow_d';
                    $con['where'] = 'bd_borrow_id = "'.$value->b_id.'"';
                    $product = $this->borrowing->select($con);
                    unset($con);
                    $value->product = array();
                    if(count($product) > 0):
                        $date_now = date('Y-m-d H:i:s');
                        $value->product = $product;
                        $con['table'] = 'tb_borrow_backup';
                        $con['data'] = array(
                            'b_id' => $value->b_id,
                            'bb_data' => json_encode($check_borrow),
                            'bb_date' => $date_now
                        );
                        $this->borrowing->insert($con);
                        unset($con);

                        $con['table'] = 'tb_borrow_backup';
                        $con['where'] = 'bb_date = "'.$date_now.'"';
                        $check_backup = $this->borrowing->select($con);
                        unset($con);
                        if(count($check_backup) > 0):
                            //add new customer
                            if(isset($_POST['b_customer_name']) and !empty($_POST['b_customer_name'])):
                                $con['table'] = 'tb_customer';
                                $con['where'] = 'cus_name = "'.$_POST['b_customer_name'].'"';
                                $customer = $this->borrowing->select($con);
                                unset($con);
                                if($customer):
                                    echo json_encode(array('fail','มีลูกค้านี้อยู่แล้วในระบบ'));exit;
                                elseif(!$customer):
                                    $con['table'] = 'tb_customer';
                                    $con['data'] = array('cus_name' => $_POST['b_customer_name']);
                                    $this->borrowing->insert($con);
                                    unset($con);
                                    $con['table'] = 'tb_customer';
                                    $con['where'] = 'cus_name = "'.$_POST['b_customer_name'].'"';
                                    $customer = $this->borrowing->select($con);
                                    unset($con);
                                    if(count($customer) > 0):
                                        $b_customer = $customer[0]->id;
                                    else:
                                        echo json_encode(array('fail','เพิ่มข้อมูลลูกค้าไม่สำเร็จ'));exit;
                                    endif;
                                endif;
                            else:
                                $b_customer = $_POST['b_customer'];
                            endif;

                            $con['where'] = 'b_id = "'.$this->decode($_POST['b_id']).'"';
                            $con['data'] = array(
                                'b_number' => $_POST['b_number'],
                                'b_borrower	' => $_POST['b_borrower'],
                                'b_version' => ($value->b_version+1),
                                'b_customer' => $b_customer,
                                'b_remark' => $_POST['b_remark'],
                                'b_date' => $_POST['b_date'],
                                'b_return' => $_POST['b_return'],
                                'b_len' => $_POST['b_len'],
                                'b_date_update' => $date_now,
                                'b_creator' => $_SESSION['user']->id,
                                'b_status' => 'borrowing',
                                'b_location' => 'XLC',
                            );
                            $this->borrowing->update($con);
                            unset($con);
                            $con['where'] = 'b_id = "'.$value->b_id.'" AND b_date_update = "'.$date_now.'"';
                            $check_update = $this->borrowing->select($con);
                            if(count($check_update) > 0):
                                $check_error = array();
                                $check_error[0] = true;
                                if(isset($_POST['return_product']) and count($_POST['return_product']) > 0 and !empty($_POST['return_product'][0])):
                                    foreach ($_POST['return_product'] as $key => $value):
                                        $con['table'] = 'tb_borrow_d';
                                        $con['where'] = 'bd_id = "'.$value.'" AND bd_p_status = "borrowing"';
                                        $check_product = $this->borrowing->select($con);
                                        unset($con);
                                        if(count($check_product) > 0):
                                            $date_return = date('Y-m-d H:i:s');
                                            $con['table'] = 'tb_borrow_d';
                                            $con['where'] = 'bd_id = "'.$check_product[0]->bd_id.'"';
                                            $con['data'] = array(
                                                'bd_p_status' => 'returned',
                                                'bd_p_return_date' => $date_return
                                            );
                                            $this->borrowing->update($con);
                                            unset($con);

                                            $con['table'] = 'tb_borrow_d';
                                            $con['where'] = 'bd_id = "'.$check_product[0]->bd_id.'" AND bd_p_return_date = "'.$date_return.'"';
                                            $check_return = $this->borrowing->select($con);
                                            if(count($check_return) < 1):
                                                $check_error[0] = false;
                                                $check_error[1] = 'ไม่พบสินค้าบางตัวที่ถูกคืน';
                                            endif;
                                        endif;
                                    endforeach;
                                endif;
                                if(isset($_POST['bd_p_sn']) and count($_POST['bd_p_sn']) > 0 and !empty($_POST['bd_p_sn'][0])):
                                    foreach ($_POST['bd_p_barcode_qr2'] as $key => $value):
                                        if(!empty($value)):
                                            $barcode_qr2_explode = explode(' ',$_POST['bd_p_barcode_qr2'][$key]);
                                            $product_code = $barcode_qr2_explode[0];
                                            $con['table'] = 'tb_borrow_d';
                                            $con['data'] = array();
                                            $con['data']['bd_borrow_id'] = $check_insert[0]->b_id;
                                            $con['data']['bd_p_sn'] = $value;
                                            $con['data']['bd_p_detail'] = $_POST['bd_p_detail'][$key];
                                            $con['data']['bd_p_code'] = $product_code;
                                            $con['data']['bd_p_barcode_qr2'] = $_POST['bd_p_barcode_qr2'][$key];
                                            $con['data']['bd_p_borrow_date'] = $date_now;
                                            $con['data']['bd_p_qty'] = 1;
                                            $con['data']['bd_bo_status'] = 1;
                                            $con['data']['bd_p_status'] = 'borrowing';
                                            $this->borrowing->insert($con);
                                            unset($con);
                                        endif;
                                    endforeach;
                                else: //ตรวจสอบรายการ product ที่ถูกยืมในใบยืมนี้ แล้ว update ใบยืมเป็นคืนแล้ว
                                    $con['table'] = 'tb_borrow_d';
                                    $con['where'] = 'bd_borrow_id = "'.$check_borrow[0]->b_id.'" AND bd_p_status = "borrowing"';
                                    $check_product_return = $this->borrowing->select($con);
                                    unset($con);
                                    if(count($check_product_return) < 1):
                                        $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'"';
                                        $con['data'] = array('b_status' => 'returned','b_returned' => $date_now);
                                        $this->borrowing->update($con);
                                        unset($con);
                                        $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'" AND b_status = "returned"';
                                        $check_update_status_borrowing = $this->borrowing->select($con);
                                        unset($con);
                                        if(count($check_update_status_borrowing) < 1):
                                            $check_error[0] = false;
                                            $check_error[1] = 'ไม่สามารถแก้ไขสถานะใบยืมเป็น => คืน ได้';
                                        endif;
                                    else:
                                        //check การทีมีสินค้าบางตัวถูกคืน สถานะใบยืมจะเปลี่ยนเป็นคืนแล้วบางชิ้น
                                        $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'"';
                                        $con['data'] = array('b_status' => 'some_return');
                                        $this->borrowing->update($con);
                                        unset($con);
                                        $con['where'] = 'b_id = "'.$check_borrow[0]->b_id.'" AND b_status = "some_return"';
                                        $check_update_status_borrowing = $this->borrowing->select($con);
                                        unset($con);
                                        if(count($check_update_status_borrowing) < 1):
                                            $check_error[0] = false;
                                            $check_error[1] = 'ไม่สามารถแก้ไขสถานะใบยืมเป็น => คืนบางชิ้น ได้';
                                        endif;
                                    endif;
                                endif;

                                if($check_error[0]):
                                    echo json_encode(array('success','แก้ไขใบยืมสำเร็จ'));
                                else:
                                    echo json_encode(array('fail','แก้ไขข้อมูลสินค้าไม่สำเร็จ',$check_error[1]));
                                endif;
                            else:
                                echo json_encode(array('fail','แก้ไขข้อมูลไม่สำเร็จ'));
                            endif;

                            // echo json_encode(array('success',''));
                        else:
                            echo json_encode(array('fail','ไม่สามารถทำการสำรองข้อมูลได้'));
                        endif;
                    else:
                        echo json_encode(array('fail','ไม่มีรายการสินค้าที่ยืม'));
                    endif;
                endforeach;
            else:
                echo json_encode(array('fail','ไม่มีใบยืมนี้ในระบบ'));
            endif;
        endif;
    }
}
 ?>
