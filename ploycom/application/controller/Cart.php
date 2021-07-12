<?php
/**
 *
 */
class Cart extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->pro = $this->model('Product_model');
    }
    public function index()
    {
        // echo "<pre>";print_r($_SESSION['member']);exit;
        // if(isset($_SESSION['specification']) && !empty($_SESSION['specification'])):
        //     unset($_SESSION['specification']);
        // endif;
        $this->set_page('cart');
    }
    public function control()
    {
        if (isset($_POST['act']) && !empty($_POST['act'])):
            $act = $_POST['act'];
        endif;
        if(isset($_POST['product_id']) && !empty($_POST['product_id'])):
            $product_id = $_POST['product_id'];
        endif;
        $con['select'] = 'product_amount';
        $con['where'] = 'product_id = "'.$product_id.'"';
        $product_amount = $this->pro->select($con);
        if($product_amount[0]->product_amount != 0):
            switch ($act) {
                case 'add':
                    if(!isset($_SESSION['cart'])):
                        $_SESSION['cart'] = array();
                    endif;
                    if(isset($_SESSION['cart'][$product_id]) && !empty($_SESSION['cart'][$product_id])):
                        // if($_SESSION['cart'][$product_id] < 5):
                            $next_amount = $_SESSION['cart'][$product_id] + 1;
                            if($next_amount <= $product_amount[0]->product_amount):
                                $_SESSION['cart'][$product_id]++;
                            else:
                                echo json_encode(array('false','ไม่สามารถสั่งซื้อสินค้านี้ได้เกิน '.$_SESSION['cart'][$product_id].' ชิ้น'));
                            endif;
                        // else:
                            // echo json_encode(array('false','ท่านสามารถสั่งซื้อสินค้าได้ไม่เกิน 5 ชิ้น'));
                        // endif;
                    else:
                        $_SESSION['cart'][$product_id] = 1;
                    endif;
                    break;
                case 'update':
                    // $next_amount = $_POST['amount'];
                    // echo $_POST['amount'].'<br>';
                    // echo $product_amount[0]->product_amount;
                    if($_POST['amount'] <= $product_amount[0]->product_amount):
                        $_SESSION['cart'][$product_id] = $_POST['amount'];
                        echo json_encode(array('success'));
                    else:
                        echo json_encode(array('false','ไม่สามารถสั่งซื้อสินค้าได้เกิน '.$_SESSION['cart'][$product_id].' ชิ้น'));
                    endif;
                    break;
                case 'remove':
                    unset($_SESSION['cart'][$product_id]);
                    break;
                default:
                    // code...
                    break;
            }
        else:
            echo json_encode(array('false','สินค้าหมดชั่วคราว'));

        endif;


    }
    public function cart_list()
    {
        if(!isset($_SESSION['cart'])):
            echo json_encode(array('false','ไม่มีสินค้าในตะกร้า'));exit;
        else:
            if(count($_SESSION['cart']) < 1):
                echo json_encode(array('false','ไม่มีสินค้าในตะกร้า'));exit;
            endif;
        endif;
            $id = array_keys($_SESSION['cart']);
            $con['table'] = 'product';
            $con['where'] = "product_id IN (".implode(',',$id).")";
            $data['cart'] = $this->pro->select($con);
            $total = 0;
            $sum_amount = 0;
            foreach ($data['cart'] as $key => $value) {
                $data['cart'][$key]->amount = 0;
                $data['cart'][$key]->sum = 0;
                foreach ($_SESSION['cart'] as $key_ses => $value_ses) {
                    if ($data['cart'][$key]->product_id == $key_ses) {
                        $data['cart'][$key]->amount = $value_ses;
                        $sum_amount += $value_ses;
                        $data['cart'][$key]->sum = $data['cart'][$key]->product_price * $value_ses;
                        $total += $data['cart'][$key]->sum;
                        $data['cart'][$key]->sum = number_format($data['cart'][$key]->sum);
                    }
                }
                $data['cart'][$key]->product_price = number_format($data['cart'][$key]->product_price);
            }
            $total = number_format($total);
            echo json_encode(array($data['cart'],$total,$sum_amount));

    }
    public function amount_cart()
    {
        $amount_cart = 0;
        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
            foreach ($_SESSION['cart'] as $key => $value) {
                $amount_cart += $value;
            }
        endif;
        echo json_encode($amount_cart);
    }
}
 ?>
