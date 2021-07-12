<?php
/**
 *
 */
class Product extends Core_controller
{
    private $product;

    function __construct()
    {
        parent::__construct();
        $this->pro = $this->model('Product_model');
        $this->cate = $this->model('Category_model');
    }
    public function index()
    {
        // echo "<pre>";print_r($_SESSION);exit;
        unset($_SESSION['brand']);
        $con['where'] = 'product_status != "1"';
        $con['order_by'] = 'product_id ASC';

        if(isset($_GET['sort']) && !empty($_GET['sort'])):
            $sort = explode('_',$_GET['sort']);
            $con['order_by'] = "product_$sort[0] $sort[1]";
        endif;

        $data['product'] = $this->pro->select($con);
        
        if (count($data['product']) > 0) {
            $this->set_page('product/product_list',$data);
        }else {
            echo "error something wrong";
        }
    }
    public function search($value='')
    {
        unset($_SESSION['brand']);
        $con['where'] = 'product_status != "1" AND ';
            if (!empty($_GET['keyword']) and !empty($_GET['sort'])) {
                $value = $_GET['keyword'];
                $data['search'] = $_GET['keyword'];
                $con['where'] .= "product_name LIKE '%$value%'";
                $sort = explode('_',$_GET['sort']);
                $con['order_by'] = "product_$sort[0] $sort[1]";
                $data['product'] = $this->pro->select($con);
                $data['link'] = $this->get_param();
            }else if (!empty($_GET['keyword'])) {
                $value = $_GET['keyword'];
                $data['search'] = $_GET['keyword'];
                $con['where'] .= "product_name LIKE '%$value%'";
                $data['product'] = $this->pro->select($con);
                $data['link'] = $this->get_param();
            }else if(!empty($_GET['sort'])){
                // echo "string";exit;
                $sort = explode('_',$_GET['sort']);
                // $con['where'] = 'product_status != "1"';
                $con['order_by'] = "product_$sort[0] $sort[1]";
                $data['product'] = $this->pro->select($con);
           }else {
               $this->redirect('product/');
           }
        if ($data['product']):
            $data['search'] = isset($value) ? $value : '';
            $this->set_page('product/product_list',$data);
            unset($value);
        else:
            $this->set_page('product/product_list',$data);
        endif;
    }
    public function category($value)
    {
        //** อยากทำเมื่อกดอันเดิมให้โชว์ทั้งหมดอ่ะ
        //** process คือ เก็บ brand เก่าเป็น session แล้วเอามาเทียบกับ get ใหม่ที่ส่ใหม่ที่ส่งมา
        //** ถ้ามันเท่ากันแสดงว่าเรากด brand เก่ามา จะทำให้ query where ไม่มี brand นั้น กลายเป็นโชว์สินค้า
        //** category นั้นทั้งหมด
        if (!empty($value)):
            $con['where'] = "category_eng_name = '$value'";
            $cate = $this->cate->select($con);
            $cate_id = $cate[0]->category_id;
            $con['where'] = "category_id = '$cate_id' AND product_status != '1' ";
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
            $this->redirect('product/');
        endif;
        if (count($data['product']) > 0) :
            $this->set_page('product/product_list',$data);
        else:
            // $this->error();
            $this->set_page('product/product_list',$data);

            // $this->set_page('product/product_list',$data);
        endif;
        if(!empty($value)):
            $_SESSION['value'] = $value;
        endif;

    }
    public function detail($value='')
    {
        // echo trim('');exit;
        if(isset($value) && !empty($value)):
            $value = base64_decode($value);
            $con['where'] = "product_name = '$value'";
            $data['product'] = $this->pro->select($con);
            if(count($data['product']) <= 0):
                $con['where'] = "product_name LIKE '%$value%'";
                $data['product'] = $this->pro->select($con);
            endif;

            $data['product'] = $data['product'][0];

            //get detail
            if(!empty($data['product']->product_detail)):
                $detail = explode('#',$data['product']->product_detail);
                $data['detail'] = $detail;
            endif;
            //end
            if(count((array)$data['product']) != 0):
                $this->set_page('product/product_detail',$data);
            endif;

        endif;
    }
    public function best_seller($value='')
    {
        $con['table'] = 'tb_order_detail';
        $con['select'] = 'product_id,amount';
        $data['product'] = $this->pro->select($con);
        unset($con);
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
        foreach ($check as $key_check => $value_check):
            if($key_check < 11):
                $max[$key_check] = $check[$key_check];
            endif;
        endforeach;


        $keys = array_keys($max);
        $keys = implode(',',$keys);

        unset($con);
        if(!empty($_GET['sort'])){
            $sort = explode('_',$_GET['sort']);
            $con['where'] .= " product_id IN ($keys)";
            $con['order_by'] = "product_$sort[0] $sort[1]";
            $data['product'] = $this->pro->select($con);
       }else {
           $con['where'] = "product_id IN ($keys)";
           $data['product'] = $this->pro->select($con);
       }
        $this->set_page('product/product_list',$data);

    }
    public function list_category()
    {
        $cate = $this->cate->select();
        echo json_encode($cate);
    }
    public function get_param()
    {
        $key = array_keys($_GET);
        $val = array_values($_GET);
        // return $_GET['url'].'?'.$key[1].'='.$val[1];
        return $key[1].'/'.$val[1];
    }
    public function __destruct()
    {

    }
}
 ?>
