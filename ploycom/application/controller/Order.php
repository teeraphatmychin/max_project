<?php /**
 *
 */
class order extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->order = $this->model('Order_model');

        $this_day = date('Y-m-d');
        $con['table'] = 'tb_order';
        $con['where'] = "DATE(order_date) <= '".date('Y-m-d')."'";
        $data['order'] = $this->order->select($con);
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
                    $this->order->update($con);
                    unset($con);
                endif;
            endif;
        endforeach;
        unset($data['order']);
    }
    public function bill($value)
    {
        if(isset($value) && !empty($value)):
            $data['invoice'] = $value;
            $con['where'] = "invoice = '$value'";
            $data['order'] = $this->order->select($con);
            // echo "<pre>";print_r($data);exit;
            unset($con);
            if ($data['order'] == 'false'):
                $this->redirect('login');exit;
            else:
                $bank_name = $data['order'][0]->bank_name;
                $con['table'] = 'bank';
                $con['where'] = "bank_name_en = '$bank_name'";
                $data['bank'] = $this->order->select($con);
                unset($con);

                $order_id = $data['order'][0]->order_id;
                $con['table'] = 'tb_order_detail';
                $con['where'] = "order_id = '$order_id'";
                $data['order_detail'] = $this->order->select($con);
                unset($con);


                $con['table'] = 'product';
                $data['product'] = array();
                foreach ($data['order_detail'] as $key => $value):
                    $con['where'] = "product_id = '".$data['order_detail'][$key]->product_id."'";
                    $data['product'][] = $this->order->select($con);
                endforeach;
                $total = 0;
                foreach ($data['product'] as $key => $value):
                    $data['product'][$key] = $data['product'][$key][0];
                    $data['product'][$key]->amount = $data['order_detail'][$key]->amount;
                    $data['product'][$key]->sum = $data['order_detail'][$key]->amount*$data['product'][$key]->product_price;
                    $total += $data['product'][$key]->sum;
                    $data['product'][$key]->sum = number_format($data['product'][$key]->sum );
                    $data['product'][$key]->product_price = number_format($data['product'][$key]->product_price);
                endforeach;
                // echo "<pre>";print_r($data);exit;

                // $data['order'][0]->member_id = 1;
                if(empty($data['order'][0]->member_id)):
                    $data['order'][0]->member_id = '';
                    $data['discount'] = 0;
                    $data['total'] = number_format($total);
                    $data['sum_total'] = $data['total'];
                else:
                    $data['discount'] = $total*0.09;
                    $data['sum_total'] = $total - $data['discount'];
                    $data['discount'] = number_format($data['discount']);
                    $data['sum_total'] = number_format($data['sum_total']);
                    $total = number_format($total);
                    $data['total'] = '<s>'.$total.'</s>';
                endif;

                //get name and address
                if(empty($data['order'][0]->name)):
                    if(!empty($data['order'][0]->member_id)):
                        $member_id = $data['order'][0]->member_id;
                        $con['table'] = 'member';
                        $con['where'] = "member_id = '$member_id'";
                        $member = $this->order->select($con);
                        unset($con);
                        $data['order'][0]->name = $member[0]->member_name;
                        $data['order'][0]->address = $member[0]->member_address;
                    endif;
                endif;

                $data['order'][0]->order_date = $this->date_th($data['order'][0]->order_date,$use=1);
                if ($data):
                    // echo "<pre>";print_r($data);exit;
                    $this->set_page('bill',$data);
                endif;
            endif;
        else:
            $this->redurect('order');
        endif;
    }
    public function print_bill($value)
    {
        if(isset($value) && !empty($value)):
            $data['invoice'] = $value;
            $con['where'] = "invoice = $value";
            $data['order'] = $this->order->select($con);
            unset($con);

            $bank_name = $data['order'][0]->bank_name;
            $con['table'] = 'bank';
            $con['where'] = "bank_name_en = '$bank_name'";
            $data['bank'] = $this->order->select($con);
            unset($con);

            $order_id = $data['order'][0]->order_id;
            $con['table'] = 'tb_order_detail';
            $con['where'] = "order_id = '$order_id'";
            $data['order_detail'] = $this->order->select($con);
            unset($con);


            $con['table'] = 'product';
            $data['product'] = array();
            foreach ($data['order_detail'] as $key => $value):
                $con['where'] = "product_id = '".$data['order_detail'][$key]->product_id."'";
                $data['product'][] = $this->order->select($con);
            endforeach;
            $total = 0;
            foreach ($data['product'] as $key => $value):
                $data['product'][$key] = $data['product'][$key][0];
                $data['product'][$key]->amount = $data['order_detail'][$key]->amount;
                $data['product'][$key]->sum = $data['order_detail'][$key]->amount*$data['product'][$key]->product_price;
                $total += $data['product'][$key]->sum;
                $data['product'][$key]->sum = number_format($data['product'][$key]->sum );
                $data['product'][$key]->product_price = number_format($data['product'][$key]->product_price);
            endforeach;

            $data['order'][0]->member_id = 1;
            if(empty($data['order'][0]->member_id)):
                $data['order'][0]->member_id = '';
                $data['discount'] = 0;
                $data['total'] = number_format($total);
                $data['sum_total'] = $data['total'];
            else:
                $data['discount'] = $total*0.09;
                $data['sum_total'] = $total - $data['discount'];
                $data['discount'] = number_format($data['discount']);
                $data['sum_total'] = number_format($data['sum_total']);
                $total = number_format($total);
                $data['total'] = '<s>'.$total.'</s>';
            endif;

            //get name and address
            if(empty($data['order'][0]->name)):
                if(!empty($data['order'][0]->member_id)):
                    $member_id = $data['order'][0]->member_id;
                    $con['table'] = 'member';
                    $con['where'] = "member_id = '$member_id'";
                    $member = $this->order->select($con);
                    unset($con);
                    $data['order'][0]->name = $member[0]->member_name;
                    $data['order'][0]->address = $member[0]->member_address;
                endif;
            endif;

            $data['order'][0]->order_date = $this->date_th($data['order'][0]->order_date,$use=1);

            if ($data):
                $this->set_page('print_bill',$data);
            endif;
        else:
            $this->redurect('order');
        endif;
        // $this->set_page('print_bill');
    }
    public function order_now($value)
    {
        if(isset($value) && !empty($value)):
            $data['invoice'] = $value;
            $con['where'] = "invoice = $value";
            $data['order'] = $this->order->select($con);
            if(count($data['order']) > 0):
                $data['order'][0]->order_status = $this->order_status($data['order'][0]->order_status);
                if (empty($data['order'][0]->member_id)):
                    $data['customer_name'] = $data['order'][0]->name;
                else:
                    $member_id = $data['order'][0]->member_id;
                    $con['table'] = 'member';
                    $con['where'] = "member_id = '$member_id'";
                    $member = $this->order->select($con);
                    $data['customer_name'] = $member[0]->member_name;
                    unset($con);
                    unset($member);
                endif;
                unset($con);

                $order_id = $data['order'][0]->order_id;
                $con['table'] = 'payment';
                $con['where'] = "order_id = '$order_id' AND status != 3";
                $data['payment'] = $this->order->select($con);
                unset($con);

                $bank_name = $data['order'][0]->bank_name;
                $con['table'] = 'bank';
                $con['where'] = "bank_name_en = '$bank_name'";
                $data['bank'] = $this->order->select($con);
                unset($con);

                $order_id = $data['order'][0]->order_id;
                $con['table'] = 'tb_order_detail';
                $con['where'] = "order_id = '$order_id'";
                $data['order_detail'] = $this->order->select($con);
                unset($con);


                $con['table'] = 'product';
                $data['product'] = array();
                foreach ($data['order_detail'] as $key => $value):
                    $con['where'] = "product_id = '".$data['order_detail'][$key]->product_id."'";
                    $data['product'][] = $this->order->select($con);
                endforeach;
                $total = 0;
                foreach ($data['product'] as $key => $value):
                    $data['product'][$key] = $data['product'][$key][0];
                    $data['product'][$key]->amount = $data['order_detail'][$key]->amount;
                    $data['product'][$key]->sum = $data['order_detail'][$key]->amount*$data['product'][$key]->product_price;
                    $total += $data['product'][$key]->sum;
                    $data['product'][$key]->sum = number_format($data['product'][$key]->sum );
                    $data['product'][$key]->product_price = number_format($data['product'][$key]->product_price);
                endforeach;

                if(empty($data['order'][0]->member_id)):
                        $data['order'][0]->member_id = '';
                        $data['discount'] = 0;
                        $data['total'] = number_format($total);
                        $data['sum_total'] = $data['total'];
                    else:
                        $data['discount'] = $total*0.09;
                        $data['sum_total'] = $total - $data['discount'];
                        $data['discount'] = number_format($data['discount']);
                        $data['sum_total'] = number_format($data['sum_total']);
                        $total = number_format($total);
                        $data['total'] = '<s>'.$total.'</s>';
                    endif;
                    $data['order'][0]->order_date = $this->date_th($data['order'][0]->order_date,$use=1);
                    if ($data):
                        // echo "<pre>";print_r($data);exit;
                        $this->set_page('order',$data);
                    endif;
            else:
                $this->redirect('login');
            endif;
        endif;


    }
    public function add_confirm_image()
    {
        if ($_FILES['file']['error'] == 0):
            $type = explode('.',$_FILES['file']['name']);
            $date = date('Y-m-d H_i_s').'.'.$type[1];
            $image_name = '../mvc/public/file/images/system/confirm_image/'.$date;
            move_uploaded_file($_FILES['file']['tmp_name'],$image_name);
            $order_id = $_POST['order_id'];
            $con['table'] = 'payment';
            $con['data'] = array(
                'order_id' => $order_id,
                'confirm_image' => $date
            );
            $this->order->insert($con);
            $con['table'] = 'payment';
            $con['where'] = "payment_id = '$payment_id'";
            $con['data'] = array(
                'status' => 3
            );
            $data = $this->order->update($con);
            unset($con);

            $con['where'] = "order_id = '$order_id'";
            $con['data'] = array(
                'order_status' => 1
            );
            $data = $this->order->update($con);
            unset($con);
            $this->redirect($_POST['url']);
        endif;
    }
    public function del_confirm_image()
    {
        if (isset($_POST['payment_id']) && !empty($_POST['payment_id'])) {
            $payment_id  = $_POST['payment_id'];
            $con = array();
            $con['table'] = 'payment';
            $con['where'] = "payment_id = '$payment_id'";
            $con['data'] = array(
                'status' => 3
            );
            $data = $this->order->update($con);
            unset($con);

            $con['table'] = 'payment';
            $con['where'] = "payment_id = '$payment_id'";
            $data_payment = $this->order->select($con);
            unset($con);

            $con['table'] = 'payment';
            $con['where'] = "order_id = '".$data_payment[0]->order_id."'";
            $count = $this->order->select($con);
            unset($con);
            if(count($count) <= 0):
                $con['where']  = 'order_id = "'.$data_payment[0]->order_id.'"';
                $con['data'] = array(
                    'order_status' => 0
                );
                $this->order->update($con);
                unset($con);
            endif;

            // echo $data;exit;
            if($data):
                $this->redirect($_POST['url']);
            endif;
        }
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
                $value = 'กำลังส่งของ';
                break;
            case 4:
                $value = 'ยกเลิก';
                break;
            default:
                break;
        }
        return $value;
    }
}
 ?>
