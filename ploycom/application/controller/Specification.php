<?php /**
 *
 */
class Specification extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->pro = $this->model('Product_model');
        $this->cate = $this->model('Category_model');
    }
    public function index()
    {
        // echo "<pre>";print_r($_SESSION['specification']);exit;
        unset($_SESSION['brand']);
        $con['order_by'] = 'product_id ASC';
        if(isset($_GET['sort']) && !empty($_GET['sort'])):
            $sort = explode('_',$_GET['sort']);
            $con['order_by'] = "product_$sort[0] $sort[1]";
        endif;
        $data['product'] = $this->pro->select($con);
        if ($data['product']):
            $this->set_page('specification',$data);
        else:
            echo "error something wrong";
        endif;
    }
    public function spec_auto()
    {
        if(isset($_POST['value']) && !empty($_POST['value'])):
            switch ($_POST['value']) {
                case '20000':
                    $spec = array(
                        'case' => '25',
                        'cpu' => '21',
                        'harddisk' => '24',
                        'mainboard' => '22',
                        'powersupply' => '26',
                        'ram' => '23',
                        'vgacard' => '15',
                    );
                    break;
                case '25000':
                $spec = array(
                    'case' => '25',
                    'cpu' => '21',
                    'harddisk' => '24',
                    'mainboard' => '22',
                    'powersupply' => '28',
                    'ram' => '23',
                    'vgacard' => '27',
                );
                    break;
                case '30000':
                    $spec = array(
                        'case' => '32',
                        'cpu' => '21',
                        'harddisk' => '31',
                        'mainboard' => '34',
                        'powersupply' => '33',
                        'ram' => '30',
                        'vgacard' => '29',
                    );
                    break;
                case '35000':
                    $spec = array(
                        'case' => '32',
                        'cpu' => '36',
                        'harddisk' => '24',
                        'mainboard' => '37',
                        'powersupply' => '33',
                        'ram' => '40',
                        'vgacard' => '38',
                    );
                    break;
                case '40000':
                    $spec = array(
                        'case' => '45',
                        'cpu' => '41',
                        'harddisk' => '44',
                        'mainboard' => '42',
                        'powersupply' => '33',
                        'ram' => '43',
                        'vgacard' => '29',
                    );
                    break;
                case 'high':
                    $spec = array(
                        'case' => '50',
                        'cpu' => '46',
                        'harddisk' => '44',
                        'mainboard' => '47',
                        'powersupply' => '51',
                        'ram' => '49',
                        'vgacard' => '48',
                    );
                    break;
                case 'normal':
                    $spec = array(
                        'case' => '55',
                        'cpu' => '52',
                        'harddisk' => '44',
                        'mainboard' => '53',
                        'powersupply' => '26',
                        'ram' => '54',
                        'vgacard' => '20',
                    );
                    break;

                default:
                    // code...
                    break;
            }
            foreach ($spec as $key => $value):
                $_SESSION['specification'][$key]->product_id = $spec[$key];
            endforeach;
        endif;
    }
    public function search($value='')
    {
        unset($_SESSION['brand']);
            if (!empty($_GET['keyword']) and !empty($_GET['sort'])) {
                $value = $_GET['keyword'];
                $data['search'] = $_GET['keyword'];
                $con['where'] = "product_name LIKE '%$value%'";
                $sort = explode('_',$_GET['sort']);
                $con['order_by'] = "product_$sort[0] $sort[1]";
                $data['product'] = $this->pro->select($con);
                $data['link'] = $this->get_param();
            }else if (!empty($_GET['keyword'])) {
                $value = $_GET['keyword'];
                $data['search'] = $_GET['keyword'];
                $con['where'] = "product_name LIKE '%$value%'";
                $data['product'] = $this->pro->select($con);
                $data['link'] = $this->get_param();
            }else if(!empty($_GET['sort'])){
                $sort = explode('_',$_GET['sort']);
                $con['order_by'] = "product_$sort[0] $sort[1]";
                $data['product'] = $this->pro->select($con);
           }else {
               $this->redirect('specification/');
           }
        if ($data['product']):
            $data['search'] = isset($value) ? $value : '';
            $this->set_page('specification',$data);
            unset($value);
        else:
            $this->set_page('specification',$data);
        endif;
    }
    public function category($value)
    {
        if (!empty($value)):
            $con['where'] = "category_eng_name = '$value'";
            $cate = $this->cate->select($con);
            $cate_id = $cate[0]->category_id;
            $con['where'] = "category_id = '$cate_id'";
            if (!empty($_GET['brand']) && !empty($_GET['sort'])) :
                $brand = $_GET['brand'];
                $con['where'] .= "AND product_brand = '$brand'";
                $sort = explode('_',$_GET['sort']);
                $con['order_by'] = "product_$sort[0] $sort[1]";
                $data['param1'] = $this->get_param();
            elseif (!empty($_GET['sort'])):
                $sort = explode('_',$_GET['sort']);
                $con['order_by'] = "product_$sort[0] $sort[1]";
            elseif (!empty($_GET['brand'])):
                $brand = $_GET['brand'];
                $con['where'] .= "AND product_brand = '$brand'";
                $data['param1'] = $this->get_param();
            endif;

            $data['product'] = $this->pro->select($con);
            unset($con['order_by']);
            if (!isset($_SESSION['brand'])):
                $con['group_by'] = 'product_brand';
                $_SESSION['brand'] = $this->pro->select($con);
            elseif(isset($_SESSION['brand'])):
                if($_SESSION['value'] != $value):
                    $con['group_by'] = 'product_brand';
                    $_SESSION['brand'] = $this->pro->select($con);
                endif;
            endif;
        else:
            $this->redirect('specification/');
        endif;
        if (count($data['product']) > 0) :
            $this->set_page('specification',$data);
        else:
            $this->error();
            // $this->set_page('product/product_list',$data);
        endif;
        if(!empty($value)):
            $_SESSION['value'] = $value;
        endif;

    }
    public function control()
    {
        // code...
        // echo "<pre>";print_r($_POST);exit;
        if (isset($_POST['act']) && !empty($_POST['act'])):
            $act = $_POST['act'];
        endif;
        if(isset($_POST['product_id']) && !empty($_POST['product_id'])):
            $product_id = $_POST['product_id'];
        endif;

        // change type from intiger to word
        $category = $this->cate->select();
        foreach ($category as $key_cate => $value_cate):
            if($category[$key_cate]->category_id == $_POST['type']):
                $type = $category[$key_cate]->category_eng_name;
            endif;
        endforeach;
        // end

        switch ($act) {
            case 'add':
                if(isset($_SESSION['specification'])):
                    $_SESSION['specification'][$type]->product_id = $product_id;
                endif;
                break;
            case 'remove':
                $type = $_POST['target'];
                $_SESSION['specification'][$type]->product_id = '';
                $_SESSION['specification'][$type]->product_name = '';
                $_SESSION['specification'][$type]->image = '';
                break;
            default:
                // code...
                break;
        }
    }
    public function list_category()
    {
        $cate = $this->cate->select();
        $con['table'] = 'product';
        $product = $this->cate->select($con);
        unset($con);
        $sum = 0;

        // set defult session specification
        if(!isset($_SESSION['specification'])):
            foreach ($cate as $key => $value):
                $cate[$key]->image = '';
                $cate[$key]->product_name = '';
                $_SESSION['specification'][$cate[$key]->category_eng_name] = $cate[$key];
            endforeach;
        else:
            //  join session specification with product table for data
            if(isset($_SESSION['specification']) && !empty($_SESSION['specification'])):
                foreach ($_SESSION['specification'] as $key_spe => $value_spe):
                    foreach ($product as $key_pro => $value_pro):
                        if(isset($_SESSION['specification'][$key_spe]->product_id) && !empty($_SESSION['specification'][$key_spe]->product_id)):
                            if ($_SESSION['specification'][$key_spe]->product_id == $product[$key_pro]->product_id):
                                $_SESSION['specification'][$key_spe]->image = $product[$key_pro]->product_image;
                                $_SESSION['specification'][$key_spe]->product_name = $product[$key_pro]->product_name;
                                $sum += $product[$key_pro]->product_price;
                                $_SESSION['specification'][$key_spe]->product_price = number_format($product[$key_pro]->product_price);
                            endif;
                        endif;
                    endforeach;
                endforeach;
                $sum = number_format($sum);
            endif;
        endif;
        // echo "<pre>";print_r($cate);exit;
        // echo "<pre>";print_r($_SESSION['specification']);exit;
        echo json_encode(array($_SESSION['specification'],$sum));
    }
    public function buy_spec()
    {
        // echo "<pre>";print_r($_SESSION['specification']);exit;
        // unset($_SESSION['cart']['']);
        if (!isset($dat['dat'])):
            $data['dat'] = array();
        endif;
        if(isset($_SESSION['specification'])):
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                foreach ($_SESSION['specification'] as $key_spec => $value_spec):
                    foreach ($_SESSION['cart'] as $key_cart => $value_cart):
                        if(isset($_SESSION['specification'][$key_spec]->product_id) && !empty($_SESSION['specification'][$key_spec]->product_id)):
                            $con['select'] = 'product_amount';
                            $con['where'] = 'product_id = "'.$_SESSION['specification'][$key_spec]->product_id.'"';
                            $product_amount = $this->pro->select($con);
                            if(!empty($product_amount)):
                                if($product_amount[0]->product_amount != 0):
                                    if ($_SESSION['specification'][$key_spec]->product_id == $key_cart):
                                        $next_amount = $_SESSION['cart'][$key_cart] + 1;
                                        if($next_amount <= $product_amount[0]->product_amount):
                                            $_SESSION['cart'][$_SESSION['specification'][$key_spec]->product_id]++;
                                        else:
                                            $data['dat'][$_SESSION['specification'][$key_spec]->product_id] = array($_SESSION['specification'][$key_spec]->product_name,'ไม่สามารถสั่งซื้อได้เกิน '.$product_amount[0]->product_amount.' ชิ้น');
                                        endif;
                                    elseif(!isset($_SESSION['cart'][$_SESSION['specification'][$key_spec]->product_id]) && empty($_SESSION['cart'][$_SESSION['specification'][$key_spec]->product_id])):
                                        $_SESSION['cart'][$_SESSION['specification'][$key_spec]->product_id] = 1;
                                    endif;
                                else:
                                    $data['dat'][$_SESSION['specification'][$key_spec]->product_id] = array($_SESSION['specification'][$key_spec]->product_name,'สินค้าหมดชั่วคราว');;
                                endif;
                            endif;
                        endif;
                    endforeach;
                endforeach;
            else:
                $_SESSION['cart'] = array();
                foreach ($_SESSION['specification'] as $key => $value):
                    if (isset($_SESSION['specification'][$key]->product_id) && !empty($_SESSION['specification'][$key]->product_id)):
                        $_SESSION['cart'][$_SESSION['specification'][$key]->product_id] = 1;
                    endif;
                endforeach;
            endif;
        endif;
        // unset($_SESSION['specification']);
        // $product = $this->pro->select($con);

        $this->set_page('buy_spec',$data);

        // echo "<pre>";print_r($data['dat']);
        // echo "<pre>";print_r($_SESSION['cart']);exit;
    }
    public function unset_spec()
    {
        unset($_SESSION['specification']);
    }
    public function get_param()
    {
        $key = array_keys($_GET);
        $val = array_values($_GET);
        // return $_GET['url'].'?'.$key[1].'='.$val[1];
        return $key[1].'/'.$val[1];
    }
}
 ?>
