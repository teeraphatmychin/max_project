<?php /**
 *
 */
class Admin extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->admin = $this->model('Admin_model');
        $this->order = $this->model('Order_model');
        $this->pro = $this->model('Product_model');
        $this->mem = $this->model('Member_model');
        $url = explode('/',$_SERVER['REQUEST_URI']);
        if (count($url) > 3):
            $url = $url[2].'/'.$url[3];
            if($url != 'admin/index' && $url != 'admin/check_login'):
                if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])):
                    $this->set_page('admin/check_login');exit;
                endif;
            endif;
        endif;

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
            elseif($data['order'][$key_order]->order_status == 1):
                $con['table'] = 'payment';
                $con['where'] = 'order_id = "'.$data['order'][$key_order]->order_id.'" AND status != 3';
                $data['payment'] = $this->order->select($con);
                unset($con);
                if(count($data['payment']) <= 0):
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
        // exit;
    }
    public function index()
    {
        $this->set_page('admin/login');
    }
    public function check_login()
    {
        $con['select'] = 'admin_id,admin_name';
        $con['where'] = 'admin_user ="'.$_POST['username'].'" AND admin_pass ="'.$_POST['password'].'"';
        $admin = $this->admin->select($con);

        if(isset($admin[0])):
            $_SESSION['admin'] = $admin[0];
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;
    }
    //product
    public function stock($value='')
    {
        $data['filter'] = explode('/',$_GET['url']);
        if(isset($value) && !empty($value)):
            switch ($value) {
                case 'nearly_out_of_stock':
                    $con['where'] = 'product_amount < 4';
                    break;
                case 'last_update':
                    $con['order_by'] = 'product_date DESC';
                    break;
                default:
                    break;
            }
            $data['product'] = $this->pro->select($con);
        else:
            $data['product'] = $this->pro->select();
        endif;
        $this->set_page('admin/stock',$data);
    }
    public function ajax_list_brand()
    {
        if(isset($_POST['cate_id']) && !empty($_POST['cate_id'])):
            $con['select'] = 'product_brand,product_detail';
            $con['where'] = 'category_id = "'.$_POST['cate_id'].'"';
            $con['group_by'] = 'product_brand';
            $data['brand'] = $this->pro->select($con);
            unset($con);
            if(count($data['brand']) > 0):
                echo json_encode($data['brand']);exit;
            else:
                echo json_encode('fail');exit;
            endif;

        endif;
    }
    public function add_product($value='')
    {
        // if():
            $con['table'] = 'category';
            $data['category'] = $this->pro->select($con);
            unset($con);
            $con['select'] = 'MAX(product_id) AS max_id';
            $data['product_id'] = $this->pro->select($con);
            if($data['product_id'][0]->max_id != 0 || $data['product_id'][0]->max_id != null):
                $data['product_id'] = $data['product_id'][0]->max_id + 1;
            else:
                $data['product_id'] = 1;
            endif;
            $this->set_page('admin/add_product',$data);
        // endif;
    }
    public function add_product_form()
    {
        $detail = '';
        $i = 1;
        $count = count($_POST['detail']);
        foreach ($_POST['detail'] as $key => $value):
            $detail .= $key.'=>';
            $j = 1;
            foreach ($_POST['detail'][$key] as $key_sub => $value_sub):
                $count_sub = count($_POST['detail'][$key]);
                $detail .= $key_sub.':'.$value_sub;
                if($j != $count_sub):
                    $detail .= '|';
                endif;
                $j++;
            endforeach;
            if ($i != $count) {
                $detail .= '#';
            }
            $i++;
        endforeach;

        $image_name = '../mvc/public/file/images/products/'.$_FILES['product_image']['name'];
        move_uploaded_file($_FILES['product_image']['tmp_name'],$image_name);
        $con['data'] = array(
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_detail' => $detail,
            'product_brand' => $_POST['product_brand'],
            'product_image' => $_FILES['product_image']['name'],
            'product_amount' => $_POST['product_amount'],
            'category_id' => $_POST['category_id'],
        );
        $this->pro->insert($con);
        unset($con);
        $_SESSION['add_product'] = 1;
        $this->redirect('admin/add_product');

    }
    public function edit_product($value)
    {
        if(isset($value) && !empty($value)):
            $value = base64_decode($value);
            $con['where'] = 'product_id = "'.$value.'"';
            $data['product'] = $this->pro->select($con);
            unset($con);

            $con['table'] = 'category';
            $data['category'] = $this->pro->select($con);

            foreach ($data['category'] as $key => $value):
                if($data['category'][$key]->category_id == $data['product'][0]->category_id):
                    $data['product'][0]->category_th_name = $data['category'][$key]->category_th_name;
                    $data['product'][0]->category_eng_name = $data['category'][$key]->category_eng_name;
                endif;
            endforeach;

            $data['detail'] = explode('#',$data['product'][0]->product_detail);

            if(count((array)$data['product'][0])>0):
                $this->set_page('admin/edit_product',$data);
            endif;
        endif;
    }
    public function edit_product_form()
    {
        // echo "<pre>";print_r($_POST);exit;
        $detail = '';
        $i = 1;
        $count = count($_POST['detail']);
        foreach ($_POST['detail'] as $key => $value):
            $detail .= $key.'=>';
            $j = 1;
            foreach ($_POST['detail'][$key] as $key_sub => $value_sub):
                $count_sub = count($_POST['detail'][$key]);
                $detail .= $key_sub.':'.$value_sub;
                if($j != $count_sub):
                    $detail .= '|';
                endif;
                $j++;
            endforeach;
            if ($i != $count) {
                $detail .= '#';
            }
            $i++;
        endforeach;

        $con['data'] = array(
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_detail' => $detail,
            'product_brand' => $_POST['product_brand'],
            'product_amount' => $_POST['product_amount'],
            'category_id' => $_POST['category_id'],
            'product_status' => $_POST['product_status']
        );

        if(isset($_FILES['product_image']) && !empty($_FILES['product_image']['name'])):
            $image_name = '../mvc/public/file/images/products/'.$_FILES['product_image']['name'];
            move_uploaded_file($_FILES['product_image']['tmp_name'],$image_name);
            $con['data']['product_image'] = $_FILES['product_image']['name'];
        endif;
        $con['where'] = 'product_id = "'.$_POST['product_id'].'"';
        $this->pro->update($con);
        unset($con);
        $this->redirect($_POST['url']);



    }
    //end product

    public function member_manage($value='',$member_id = '')
    {
        if(isset($value) && !empty($value)):
            switch ($value) {
                case 'on':
                    $con['where'] = 'member_status = 0';
                    break;
                case 'off':
                    $con['where'] = 'member_status = 1';
                    break;
                case 'edit_member':



                    $member_id =base64_decode($member_id);
                    $con['where'] = "member_id = '$member_id'";
                    $data['member'] = $this->mem->select($con);
                    unset($con);
                    $data['member'] = $data['member'][0];
                    // echo "<pre>";print_r($data['member']);exit;

                    // $name = explode(' ',$data['member'][0]->member_name);
                    // $data['first_name'] = $name[0];
                    // $data['last_name'] = $name[1];
                    // $data['member'][0]->member_address = implode(' ',explode('/',$data['member'][0]->member_address));
                    $name = explode(' ',$data['member']->member_name);
                    $data['first_name'] = $name[0];
                    $data['last_name'] = $name[1];
                    // echo "<pre>";print_r($_SESSION);exit;
                    $data['address'] = explode('/',$data['member']->member_address);
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



                    $this->set_page('admin/edit_member',$data);exit;


                    break;
                default:
                    // code...
                    break;
            }
        else:
            $con = '';
        endif;
        $data['member'] = $this->mem->select($con);
        foreach ($data['member'] as $key => $value):
            $data['member'][$key]->member_address = implode(' ',explode('/',$data['member'][$key]->member_address));
        endforeach;
        $this->set_page('admin/member_manage',$data);
    }
    public function edit_member_form($value='')
    {
        // code...
        if(isset($_POST['email']) && !empty($_POST['email'])):
            $con['table'] = 'member';
            $con['where'] = 'member_email = "'.$_POST['email'].'" AND member_id != "'.$_POST['member_id'].'"';
            $data['validate_email'] = $this->mem->select($con);
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
                $con['where'] = 'member_id = "'.$_POST['member_id'].'"';
                $update_member = $this->mem->update($con);
                unset($con);
                if($update_member):

                    echo json_encode('success');exit;
                endif;
            else:
                echo json_encode('used');
            endif;
        endif;
    }
    public function purchase_report($value='')
    {
        $data['filter'] = explode('/',$_GET['url']);
        $con['order_by'] = 'order_date DESC';

        if(isset($value) && !empty($value)):
            switch ($value) {
                case 'not_paid':
                    $con['where'] = 'order_status = 0';
                    break;
                case 'wait_to_check':
                    $con['where'] = 'order_status = 1';
                    break;
                case 'already_paid':
                    $con['where'] = 'order_status = 2';
                    break;
                case 'shipping':
                    $con['where'] = 'order_status = 3';
                    break;
                case 'canceled':
                    $con['where'] = 'order_status = 4';
                    break;
                default:
                    // code...
                    break;
            }
            $data['order'] = $this->order->select($con);
            unset($con);
        else:
            $data['order'] = $this->order->select($con);
            unset($con);
        endif;
        foreach ($data['order'] as $key => $value) :
            $data['order'][$key]->date_th = $this->date_th($data['order'][$key]->order_date,1);
        endforeach;
        $this->set_page('admin/purchase_report',$data);
    }
    public function delivery_report($value='')
    {
        $data['order'] = $this->order->select();
        foreach ($data['order'] as $key => $value) :
            $data['order'][$key]->date_th = $this->date_th($data['order'][$key]->order_date,1);
        endforeach;
        $this->set_page('admin/delivery_report',$data);
    }
    public function sale_report($value='')
    {
        if(isset($value) && !empty($value)):
            switch ($value) {
                case 'earnings':
                $this->set_page('admin/sale_report');
                break;
                case 'best_seller':
                    $con['table'] = 'tb_order_detail';
                    $con['select'] = 'product_id,amount';
                    $data['product'] = $this->order->select($con);
                    unset($con);
                    // echo "<pre>";print_r($data['product']);exit;

                    $max = array();
                    $check = array();
                    foreach ($data['product'] as $key => $value):
                        if(isset($check[$data['product'][$key]->product_id])):
                            $check[$data['product'][$key]->product_id]++;
                        else:
                            $check[$data['product'][$key]->product_id] = $data['product'][$key]->amount;
                        endif;
                    endforeach;
                    arsort($check);
                    // echo "<pre>";print_r($check);exit;
                    $i = 0;
                    foreach ($check as $key_check => $value_check):
                        if($i < 8):
                            $max[$key_check] = $check[$key_check];
                        endif;
                        $i++;
                    endforeach;
                    // echo "<pre>";print_r($max);exit;

                    $keys = array_keys($max);
                    $keys = implode(',',$keys);
                    $data['product'] = array();
                    foreach ($max as $key_max => $value_max) :
                        $con['where'] = "product_id = '$key_max'";
                        $data['product'][] = $this->pro->select($con);
                        unset($con);
                    endforeach;
                    foreach ($data['product'] as $key_product => $value_product):
                        $data['product'][$key_product] = $data['product'][$key_product][0];
                        foreach ($max as $key_max => $value_max):
                            if($key_max == $data['product'][$key_product]->product_id):
                                $data['product'][$key_product]->sale_amount = $max[$key_max];
                            endif;
                        endforeach;
                    endforeach;
                    // echo "<pre>";print_r($data['product']);exit;


                    $this->set_page('admin/sale_report',$data);
                break;
                default:
                // code...
                break;

            }
            // $this->set_page('admin/sale_report');
        else:
            $this->set_page('admin/sale_report');
        endif;
    }
    public function ajax_sale_report()
    {
        $con['select'] = 'order_id,invoice';
        $con['where'] = 'order_status = "2" OR order_status = "3" ';
        if(isset($_POST['data']['start_date']) && !empty($_POST['data']['start_date'])):
            $con['where'] = '(order_status = "2" OR order_status = "3") AND ';
            $con['where'] .= '(DATE(order_date) >= "'.$_POST['data']['start_date'].'"';

            $date = 'ตั้งแต่วันที่ '.$this->date_th($_POST['data']['start_date'],2).' ';

            if(isset($_POST['data']['end_date']) && !empty($_POST['data']['end_date'])):
                $con['where'] .= 'AND DATE(order_date) <= "'.$_POST['data']['end_date'].'")';
                $date .= ' จนถึง วันที่ '.$this->date_th($_POST['data']['end_date'],2);
            else:
                $con['where'] .= ')';
                $date .= ' จนถึงปัจุบัน';

            endif;
        endif;
        $data['order'] = $this->order->select($con);
        unset($con);

        $sum = 0;
        foreach ($data['order'] as $key => $value):
            $data['order'][$key]->order_id_detail = base64_encode($data['order'][$key]->order_id);
            $con['table'] = 'tb_order_detail';
            $con['where'] = "order_id = $value->order_id";
            $data['order'][$key]->order_detail = $this->order->select($con);
            unset($con);
            $data['order'][$key]->total = 0;
            foreach ($data['order'][$key]->order_detail as $key_order_detail => $value_order_detail):
                $con['select'] = 'product_name,product_price';
                $con['where'] = "product_id = '$value_order_detail->product_id'";
                $data['product'] = $this->pro->select($con);
                unset($con);
                foreach ($data['product'] as $key_pro => $value_pro):
                    $data['order'][$key]->order_detail[$key_order_detail]->product_name = $value_pro->product_name;
                    $data['order'][$key]->order_detail[$key_order_detail]->product_price = $value_pro->product_price;
                endforeach;
                $data['order'][$key]->total += $data['order'][$key]->order_detail[$key_order_detail]->product_price * $data['order'][$key]->order_detail[$key_order_detail]->amount;

            endforeach;
            $data['order'][$key]->show_total = number_format($data['order'][$key]->total,2);
            $sum += $data['order'][$key]->total;
        endforeach;
        $sum = number_format($sum,2);

        // echo "<pre>";
        // print_r($data);exit;
        echo json_encode(array($data['order'],$sum,$date));
    }

    public function order_detail($value)
    {
        if(isset($value) && !empty($value)):
            $value = base64_decode($value);
            $con['where'] = "order_id = $value";
            $data['order'] = $this->order->select($con);
            unset($con);
            if(count($data['order']) > 0):
                // $data['order'][0]->order_status = $this->order_status($data['order'][0]->order_status);
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
                        $this->set_page('admin/order_detail',$data);
                    endif;
            else:
                $this->redirect('login');
            endif;
        endif;
    }
    public function update_order_form()
    {
        // echo "<pre>";print_r($_POST);exit;
        $con['select'] = 'order_status';
        $con['where'] = "order_id = '".$_POST['order_id']."'";
        $order_status = $this->order->select($con);
        unset($con);
        // echo "<pre>";print_r($order_status);exit;
        if($order_status[0]->order_status == 1 and $_POST['order_status'] == 2):
            $con['table'] = 'tb_order_detail';
            $con['where'] = "order_id = '".$_POST['order_id']."'";
            $order_detail = $this->order->select($con);
            unset($con);
            foreach ($order_detail as $key_detail => $value_detail):
                $con['where'] = 'product_id = "'.$value_detail->product_id.'"';
                $con['data'] = array(
                    'product_amount' => 'product_amount-'.$value_detail->amount
                );
                $this->pro->update($con,'',1);
                unset($con);
            endforeach;
            // echo "<pre>";print_r($order_detail);exit;
        endif;
        // exit;
        if(isset($_POST['order_status']) && !empty($_POST['order_status'])):
            $con['where'] = "order_id = '".$_POST['order_id']."'";
            $con['data'] = array(
                'order_status' => $_POST['order_status']
            );
            if(isset($_POST['order_post']) && !empty($_POST['order_post'])):
                $con['data']['order_post'] = $_POST['order_post'];
            endif;
            $this->order->update($con);
            unset($con);

            $con['where'] = 'order_status = "'.$_POST['order_status'].'" AND order_id = "'.$_POST['order_id'].'"';
            $check = $this->order->select($con);
            unset($con);
            if(count((array)$check[0]) > 0):
                $url = 'admin/order_detail/'.base64_encode($_POST['order_id']);
                $this->redirect($url);
            endif;

        elseif(isset($_POST['payment_id']) && !empty($_POST['payment_id'])):
            $con['table'] = 'payment';
            $con['where'] = "payment_id = '".$_POST['payment_id']."'";
            $con['data'] = array(
                'status' => '2'
            );
            $this->order->update($con);
            unset($con);

            $con['table'] = 'payment';
            $con['where'] = 'status = "2" AND payment_id = "'.$_POST['payment_id'].'"';
            $check = $this->order->select($con);
            unset($con);
            if(count((array)$check[0]) > 0):
                $url = 'admin/order_detail/'.base64_encode($_POST['order_id']);
                $this->redirect($url);
            endif;
        endif;
    }
    public function edit_profile($value="")
    {
        if(isset($value) && !empty($value)):
            $con['table'] = 'admin';
            $con['where'] = 'admin_id = "'.$_POST['admin_id'].'"';
            $con['data'] = array(
                'admin_name' => $_POST['first_name'].' '.$_POST['last_name'],
                'admin_user' => $_POST['admin_user'],
                'admin_pass' => $_POST['admin_pass']
            );
            $this->mem->update($con);
            $this->redirect('admin/edit_profile');
        else:
            $con['table'] = "admin";
            $con['where'] = 'admin_id = "'.$_SESSION['admin']->admin_id.'"';
            $data['admin'] = $this->mem->select($con);
            unset($con);
            $data['admin'] = $data['admin'][0];
            $name = explode(' ',$data['admin']->admin_name);
            $data['first_name'] = $name[0];
            $data['last_name'] = $name[1];
            $this->set_page('admin/edit_profile',$data);
        endif;
    }
    public function logout()
    {
        unset($_SESSION['admin']);
        if(!isset($_SESSION['admin'])):
            $this->redirect('admin');
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
    public function destructor()
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
