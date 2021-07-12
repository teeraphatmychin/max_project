<?php /**
 *
 */
class Customer extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->cus = $this->model('Member_model');

        if(!isset($_SESSION['member']) && empty($_SESSION['member'])):
            $this->redirect('login');
        else:
            $this_day = date('Y-m-d');
            $con['table'] = 'tb_order';
            $con['where'] = "DATE(order_date) <= '".date('Y-m-d')."'";
            $data['order'] = $this->cus->select($con);
            unset($con);
            foreach ($data['order'] as $key_order => $value):
                $order_date = explode(' ',$data['order'][$key_order]->order_date);
                $day = explode('-',$order_date[0]);
                $time = number_format($this->DateTimeDiff($data['order'][$key_order]->order_date,date('Y-m-d H:i:s')),3);
                if ($day[0] - date('Y') <= 0 && $day[1] - date('m') <= 0 && $day[2] - date('d') <= 0 && $data['order'][$key_order]->order_status == 0):
                    if (((24*60*60) - ($time * 60 * 60)) <= 0) :
                        $order_id = $data['order'][$key_order]->order_id;
                        $con['table'] = 'tb_order';
                        $con['where'] = "order_id = '$order_id'";
                        $con['data'] = array(
                            'order_status' => 4
                        );
                        $this->cus->update($con);
                        unset($con);
                    endif;
                else:

                endif;
            endforeach;
            unset($data['order']);
        endif;
    }
    public function index()
    {
        // $this->set_page('customer/main_customer');
        $this->redirect('customer/profile');
    }
    public function profile()
    {
        $name = explode(' ',$_SESSION['member']->member_name);
        $data['first_name'] = $name[0];
        $data['last_name'] = $name[1];
        // echo "<pre>";print_r($_SESSION);exit;
        $data['address'] = explode('/',$_SESSION['member']->address);
        // echo "<pre>";print_r($data['address']);exit;
        $find = array('ม.','ซ.','ถ.','จ.','อ.','ต.');
        $key_find = 0;
        foreach ($data['address'] as $key => $value) {
            if (strpos($data['address'][$key],'.') !== false ) {
                if (strpos($data['address'][$key],$find[$key_find]) !== false) {
                    switch ($key_find) {
                        case 0:
                            $mu = explode('.',$data['address'][$key]);
                            $data['mu'] = $mu[1];
                            break;
                        case 1:
                            $alley = explode('.',$data['address'][$key]);
                            if($alley[1] == '-'):
                                $data['alley'] = null;
                            else:
                                $data['alley'] = $alley[1];
                            endif;
                            break;
                        case 2:
                            $road = explode('.',$data['address'][$key]);
                            if($road[1] == '-'):
                                $data['road'] = null;
                            else:
                                $data['road'] = $road[1];
                            endif;
                            break;
                        case 3:
                            $province = explode('.',$data['address'][$key]);
                            $data['province'] = $province[1];
                            break;
                        case 4:
                            $amphur = explode('.',$data['address'][$key]);
                            $data['amphur'] = $amphur[1];
                            break;
                        case 5:
                            $district = explode('.',$data['address'][$key]);
                            $data['district'] = $district[1];
                            break;
                        default:
                            // code...
                            break;
                    }
                    $key_find++;
                }
            }
        }
        $data['zipcode'] = end($data['address']);
        // echo "<pre>";print_r($data);exit;
        $this->set_page('customer/profile',$data);
    }
    public function update_profile()
    {
        // echo "<pre>";print_r($_POST);exit;
        if(isset($_POST['email']) && !empty($_POST['email'])):
            $con['table'] = 'member';
            $con['where'] = 'member_email = "'.$_POST['email'].'" AND member_id != "'.$_SESSION['member']->member_id.'"';
            $data['validate_email'] = $this->cus->select($con);
            unset($con);
            if(count($data['validate_email']) < 1):
                $mu = isset($_POST['mu']) && !empty($_POST['mu']) ? '/ม.'.$_POST['mu'] : null;
                $alley = isset($_POST['alley']) && !empty($_POST['alley']) ? '/ซ.'.$_POST['alley'] : '/ซ.-';
                $road = isset($_POST['road']) && !empty($_POST['road']) ? '/ถ.'.$_POST['road'] : '/ถ.-';
                $province = isset($_POST['province']) && !empty($_POST['province']) ? '/จ.'.$_POST['province'] : null;
                $amphur = isset($_POST['amphur']) && !empty($_POST['amphur']) ? '/อ.'.$_POST['amphur'] : null;
                $district = isset($_POST['district']) && !empty($_POST['district']) ? '/ต.'.$_POST['district'] : null;
                $zipcode = isset($_POST['zipcode']) && !empty($_POST['zipcode']) ? '/'.$_POST['zipcode'] : null;
                $address = $_POST['address'].$mu.$alley.$road.$province.$amphur.$district.$zipcode;

                $con['table'] = 'member';
                $con['data'] = array(
                    'member_name' => $_POST['name'].' '.$_POST['last_name'],
                    'member_email' => $_POST['email'],
                    'member_address' => $address,
                    'member_card_id' => $_POST['card_id'],
                    'member_phone' => $_POST['phone_number']
                );
                if(isset($_POST['password']) && !empty($_POST['password'])):
                    $con['data']['member_password'] = $_POST['password'];
                endif;
                $con['where'] = 'member_id = "'.$_SESSION['member']->member_id.'"';
                $update_member = $this->cus->update($con);
                unset($con);
                if($update_member):
                    $con['table'] = 'member';
                    $con['select'] = 'member_password';
                    $con['where'] = 'member_id = "'.$_SESSION['member']->member_id.'"';
                    $re_login = $this->cus->select($con);
                    unset($con);
                    $username = $_POST['email'];
                    $password = $re_login[0]->member_password;
                    $con['table'] = 'member';
                    $con['select'] = "member_id,member_name,member_address,member_card_id,member_email,member_phone";
                    $con['where'] = "member_email = '$username' AND member_password = '$password'";
                    $member = $this->cus->select($con);
                    $_SESSION['member'] = $member[0];
                    $_SESSION['member']->address = $_SESSION['member']->member_address;
                    $address  = explode('/',$_SESSION['member']->member_address);
                    $_SESSION['member']->member_address = '';
                    $_SESSION['member']->member_address = implode(' ',$address);
                    unset($con);
                    echo json_encode('success');exit;
                endif;
            else:
                echo json_encode('used');
            endif;
        endif;
    }
    public function order($value='')
    {
        // echo $value;exit;
        if(isset($_SESSION['member']) && !empty($_SESSION['member'])):
            if(isset($value) && !empty($value)):
                switch ($value) {
                    case 'confirm':
                        // code...
                        $con['where'] = "order_status = 0 AND ";
                        $page = 'order_payment';
                        break;
                    case 'cancel':
                        // code...
                        $con['where'] = "order_status = 4 AND ";
                        $page = 'order_cancel';
                        break;

                    default:
                        // code...
                        $con['where'] = '';
                        $page = 'order';
                        break;
                }
                // $con['where'] = "order_status = 0 AND ";
                // $page = 'order_payment';
            else:
                $con['where'] = 'order_status != 4 AND ';
                $page = 'order';
            endif;
            $member_id = $_SESSION['member']->member_id;
            $con['table'] = 'tb_order';
            $con['where'] .= "member_id = '$member_id'";
            $con['order_by'] = 'order_id DESC';
            $data['order'] = $this->cus->select($con);
            unset($con);
            if(count($data['order']) > 0):

               foreach ($data['order'] as $key => $value):

                   //get order_status
                   $data['order'][$key]->order_status = $this->order_status($data['order'][$key]->order_status);

                   // get bank
                   $bank_name = $data['order'][$key]->bank_name;
                   $con['table'] = 'bank';
                   $con['where'] = "bank_name_en = '$bank_name'";
                   $data['order'][$key]->bank[] = $this->cus->select($con);
                   unset($con);
                   $data['order'][$key]->bank = $data['order'][$key]->bank[0][0];

                   // get confirm image
                   $order_id = $data['order'][$key]->order_id;
                   $con['table'] = 'payment';
                   $con['where'] = "order_id = '$order_id' AND status != 3";
                   $data['order'][$key]->payment[] = $this->cus->select($con);
                   unset($con);
                   //ลด key array ลง 1 key
                   $data['order'][$key]->payment = $data['order'][$key]->payment[0];

                   //get order_detail
                   $con['table'] = 'tb_order_detail';
                   $con['where'] = "order_id ='$order_id'";
                   $data['order'][$key]->order_detail = $this->cus->select($con);
                   unset($con);
                   $con['table'] = 'product';
                   $con['where'] = '';
                   $data['order'][$key]->total = 0;
                   $data['order'][$key]->discount = 0;
                   $data['order'][$key]->sum_total = 0;
                   foreach ($data['order'][$key]->order_detail as $key_detail => $value_detail):
                       $con['where'] = "product_id = '".$data['order'][$key]->order_detail[$key_detail]->product_id."'";
                       $data['order'][$key]->order_detail['product'][$key_detail] = $this->cus->select($con);
                       if(isset($data['order'][$key]->order_detail['product'][$key_detail][0])):
                           $data['order'][$key]->order_detail['product'][$key_detail] = $data['order'][$key]->order_detail['product'][$key_detail][0];
                           $data['order'][$key]->order_detail['product'][$key_detail]->amount = $data['order'][$key]->order_detail[$key_detail]->amount;
                           $data['order'][$key]->order_detail['product'][$key_detail]->sum = $data['order'][$key]->order_detail['product'][$key_detail]->amount*$data['order'][$key]->order_detail['product'][$key_detail]->product_price;
                           $data['order'][$key]->total += $data['order'][$key]->order_detail['product'][$key_detail]->sum;
                           $data['order'][$key]->order_detail['product'][$key_detail]->sum = number_format($data['order'][$key]->order_detail['product'][$key_detail]->sum);
                       endif;
                   endforeach;
                   // $data['order'][$key]->total = number_format($data['order'][$key]->total);

                   if(empty($data['order'][$key]->member_id)):
                       $data['order'][$key]->member_id = '';
                       $data['order'][$key]->discount = 0;
                       $data['order'][$key]->total = number_format($total);
                       $data['order'][$key]->sum_total = $data['order'][$key]->total;
                   else:
                       $data['order'][$key]->discount = $data['order'][$key]->total * 0.09;
                       $data['order'][$key]->sum_total = $data['order'][$key]->total - $data['order'][$key]->discount;
                       $data['order'][$key]->discount = number_format($data['order'][$key]->discount);
                       $data['order'][$key]->sum_total = number_format($data['order'][$key]->sum_total);
                       $data['order'][$key]->total = '<s>'.number_format($data['order'][$key]->total).'</s>';
                   endif;

                   $data['order'][$key]->order_date = $this->date_th($data['order'][$key]->order_date,1);
               endforeach;
            else:
               $data['order'] = '';
            endif;
            if ($data):
               // echo "<pre>";print_r($data);exit;
               $this->set_page('customer/'.$page,$data);
            endif;
        else:
            $this->redirect('login');
        endif;
    }
    protected function order_status($value)
    {
        switch ($value) {
            case 0:
                $value = 'รอการชำระเงิน';
                break;
            case 1:
                $value = 'รอตรวจสอบการชำระเงิน';
                break;
            case 2:
                $value = 'ชำระเงินแล้ว';
                break;
            case 3:
                $value = 'ส่งของแล้ว';
                break;
            case 4:
                $value = 'ถูกยกเลิก';
                break;
            default:
                break;
        }
        return $value;
    }
}
 ?>
