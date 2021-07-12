<?php /**
 *
 */
class payment extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->pay = $this->model('Payment_model');
    }
    public function index()
    {
        // echo "<pre>";print_r($_SESSION);exit;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $this->set_page('payment');
        }else {
            $this->redirect('cart/');
        }
    }
    public function confirm()
    {
        if (isset($_POST) && !empty($_POST)):
            // get max id from tb_order
            $con['table'] = 'tb_order';
            $con['select'] = 'MAX(order_id) AS max';
            $max_id = $this->pay->select($con);
            unset($con);
            if (empty($max_id[0]->max)) {
                $max_id = 1;
            }else {
                $max_id = $max_id[0]->max;
                $max_id = $max_id+1;
            }
            // Create invioce and Add order
            $date = date('Y-m');
            $date = explode('-',$date);
            $invoice =  $date[0].$date[1].$max_id;
            $date_time = date('Y-m-d H:i:s');
            $con['table'] = 'tb_order';



            if($_POST['data-customer'] == 'member-address'):
                $con['data'] = array(
                    'invoice' => $invoice,
                    'order_date' => $date_time,
                    'method_of_shipping' => $_POST['method_of_shipping'],
                    'method_of_payment' => $_POST['method_of_payment'],
                    'bank_name' => $_POST['bank_name'],
                    'member_id' => $_SESSION['member']->member_id
                    // 'member_id' => $_SESSION['member']->member_id,
                    // 'name' => $_SESSION['member']->member_name,
                    // 'card_id' => $_SESSION['member']->member_card_id,
                    // 'phone_number' => $_SESSION['member']->member_phone,
                    // 'email' => $_SESSION['member']->member_email,
                    // 'address' => $_SESSION['member']->address
                );
            else:
                //get address
                $mu = isset($_POST['mu']) && !empty($_POST['mu']) ? '/ม.'.$_POST['mu'] : null;
                $alley = isset($_POST['alley']) && !empty($_POST['alley']) ? '/ซ.'.$_POST['alley'] : '/ซ.-';
                $road = isset($_POST['road']) && !empty($_POST['road']) ? '/ถ.'.$_POST['road'] : '/ถ.-';
                $province = isset($_POST['province']) && !empty($_POST['province']) ? '/จ.'.$_POST['province'] : null;
                $amphur = isset($_POST['amphur']) && !empty($_POST['amphur']) ? '/อ.'.$_POST['amphur'] : null;
                $district = isset($_POST['district']) && !empty($_POST['district']) ? '/ต.'.$_POST['district'] : null;
                $zipcode = isset($_POST['zipcode']) && !empty($_POST['zipcode']) ? '/'.$_POST['zipcode'] : null;
                $address = $_POST['address'].$mu.$alley.$road.$province.$amphur.$district.$zipcode;

                $con['data'] = array(
                    'invoice' => $invoice,
                    'order_date' => $date_time,
                    'method_of_shipping' => $_POST['method_of_shipping'],
                    'method_of_payment' => $_POST['method_of_payment'],
                    'bank_name' => $_POST['bank_name'],
                    'name' => $_POST['name'],
                    'card_id' => $_POST['card_id'],
                    'phone_number' => $_POST['phone_number'],
                    'email' => $_POST['email'],
                    'address' => $address
                    // 'order_status' => 0
                );
                if(isset($_SESSION['member']) && !empty($_SESSION['member'])):
                    $con['data']['member_id'] = $_SESSION['member']->member_id;
                endif;
            endif;
            // echo "<pre>";print_r($con);
            $this->pay->insert($con);
            unset($con);

            // Add order_detail to tb_order_detail
            $con['table'] = 'tb_order_detail';
            foreach ($_SESSION['cart'] as $key => $value):
                $con['data'] = array(
                    'order_id' => $max_id,
                    'product_id' => $key,
                    'amount' => $value
                );
                // echo "<pre>";print_r($con);
                $this->pay->insert($con);
            endforeach;
            unset($con);
            unset($_SESSION['cart']);
            $this->redirect("order/bill/$invoice");
        else:
            $this->redirect('payment');
        endif;
        // print_r($_SESSION['cart']);

    }
    public function list_province()
    {
        if (isset($_POST['type']) && !empty($_POST['type'])) {
            $id = $_POST['id'];
            switch ($_POST['type']) {
                case 'province':
                    $con['table'] = 'amphur';
                    $con['where'] = "province_id = $id";
                    break;
                case 'amphur':
                    $con['table'] = 'district';
                    $con['where'] = "amphur_id = $id";
                    break;
                case 'district':
                    $con['table'] = 'zipcode';
                    $con['where'] = "district_id = $id";
                    break;
                default:
                    break;
            }
        }else {
            $con['table'] = 'province';
        }
        $data = $this->pay->select($con);
        if ($data) {
            // echo "<pre>";print_r($data);exit;
            echo json_encode(array('success',$data,$con['table']));exit;
        }else {
            echo json_encode(array('fail'));exit;
        }

    }
    public function bank_list()
    {
        $con['table'] = 'bank';
        $data = $this->pay->select($con);
        if ($data) {
            echo json_encode(array('success',$data));exit;
        }else {
            echo json_encode(array('fail'));exit;
        }

    }
}
 ?>
