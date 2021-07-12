<?php /**
 *
 */
class Product extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->pro = $this->model('Product_model');
    }
    public function search_product($value='')
    {
        $con['where'] = 'p_code LIKE "%'.$_POST['search'].'%"';
        if(strtolower($_SESSION['user']->division) == 'sale'):
            $con['where'] .= ' AND p_type = "supply"';
        endif;
        $con['limit'] = '100';
        $data = $this->pro->select($con);
        unset($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data,$_POST['search']));
        else:
            $con['where'] = 'p_code = "'.$_POST['search'].'"';
            if(strtolower($_SESSION['user']->division) == 'sale'):
                $con['where'] .= ' AND p_type = "supply"';
            endif;
            $con['limit'] = '100';
            $data = $this->pro->select($con);
            unset($con);
            if(count($data) > 0):
                echo json_encode(array('success',$data,$_POST['search']));
            else:
                $con['where'] = 'p_detail LIKE "%'.$_POST['search'].'%"';
                if(strtolower($_SESSION['user']->division) == 'sale'):
                    $con['where'] .= ' AND p_type = "supply"';
                endif;
                $con['limit'] = '100';
                $data = $this->pro->select($con);
                unset($con);
                if(count($data) > 0):
                    echo json_encode(array('success',$data,$_POST['search']));
                else:
                    $con['where'] = 'p_detail = "'.$_POST['search'].'"';
                    if(strtolower($_SESSION['user']->division) == 'sale'):
                        $con['where'] .= ' AND p_type = "supply"';
                    endif;
                    $con['limit'] = '100';
                    $data = $this->pro->select($con);
                    unset($con);
                    if(count($data) > 0):
                        echo json_encode(array('success',$data,$_POST['search']));
                    endif;
                endif;
            endif;
        endif;
    }
    public function add($value='')
    {
        if(isset($_POST['add_product']) and !empty($_POST['add_product'])):
            $p_img = '';
            if(isset($_POST['p_img']) and !empty($_POST['p_img'])):
                $p_img = $_POST['p_img'];
                $path_img = explode($this->base_url(),$p_img);
                $image_name = @end(explode('/',$p_img));
                $image_name = explode('_pre_upload',$image_name);
                $p_img = $this->public_url('file/images/product/').$image_name[0].$image_name[1];
                $image_name = $_SERVER['DOCUMENT_ROOT'].'/it_support/public/file/images/product/'.$image_name[0].$image_name[1];
                // $path_img = '/it_support/'.$path_img[1];
                $path_img = $_SERVER['DOCUMENT_ROOT'].'/'.'it_support/'.$path_img[1];
                // if(file_exists($path_img)):
                //     echo "string";
                // else:
                //     echo $path_img;
                // endif;
                // exit;
                // rename($path_img, $image_name);
                if(rename($path_img, $image_name)):
                    if(file_exists($path_img)):
                        unlink($path_img);
                    endif;
                else:
                    echo json_encode(array('rename fail'));
                    exit;
                endif;
                $p_img = str_replace($this->public_url(),'|path_url|',$p_img);
            endif;
            $con['data'] = array(
                'p_code' => $_POST['p_code'],
                'p_detail' => $_POST['p_detail'],
                'p_sub_detail' => $_POST['p_sub_detail'],
                'p_price3' => $_POST['p_price3'],
                'p_price2' => $_POST['p_price2'],
                'p_price1' => $_POST['p_price1'],
                'p_cate' => $_POST['p_cate'],
                'p_brand' => $_POST['p_brand'],
                'p_create_date' => date('Y-m-d H:i:s'),
                'p_img' => $p_img
            );
            if(strtolower($_SESSION['user']->division) == 'sale'):
                $con['data']['p_type'] = 'supply';
            endif;
            $insert = $this->pro->insert($con);
            echo json_encode(array('success'));
        endif;
    }
    public function list($value='')
    {
        if(isset($_POST['status']) and !empty($_POST['status'])):
            $con = array();
            if(strtolower($_SESSION['user']->division) == 'sale'):
                $con['where'] = 'p_type = "supply"';
            else:
                $con['where'] = 'p_type != "supply"';
                $con['limit'] = '500';
            endif;
            $check_status = false;
            switch ($_POST['status']):
                case 'check_new_product':
                    $con['where'] .= 'AND p_create_date > "'.$_POST['last_date'].'"';
                    $check_status = true;
                    break;
                default:
                    break;
            endswitch;
            $con['order_by'] = 'p_create_date DESC';
            $data = $this->pro->select($con);
            unset($con);
            if(count($data) > 0):
                foreach ($data as $key => $value):
                    $value->p_id = $this->encode($value->p_id);
                    $value->p_price3 = number_format($value->p_price3,2);
                    $value->p_price2 = number_format($value->p_price2,2);
                    $value->p_price1 = number_format($value->p_price1,2);
                    if(!empty($value->p_img)):
                        $value->p_img = str_replace('|path_url|',$this->public_url(),$value->p_img);
                    endif;
                endforeach;
                // echo "<pre>";print_r($data);exit;
                $last_date = isset($_POST['last_date']) and !empty($_POST['last_date'])?$_POST['last_date']:'';
                echo json_encode(array('success',$data,$_POST['status'],$last_date));
            else:
                if($check_status):
                    echo json_encode(array('empty',$_POST['status'],$_POST['last_date']));
                else:
                    echo json_encode(array('fail'));
                endif;
            endif;
        endif;
    }
    public function get($value='')
    {
        if(isset($_POST['p_id']) and !empty($_POST['p_id'])):
            if(isset($_POST['none_decode'])):
                $con['where'] = 'p_id = "'.$_POST['p_id'].'"';
            else:
                $con['where'] = 'p_id = "'.$this->decode($_POST['p_id']).'"';
            endif;
            $data = $this->pro->select($con);
            unset($con);
            if(count($data) > 0):
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail'));
            endif;
        endif;
    }
    public function get_new_product($value='')
    {
        // code...
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type']) and $_POST['type'] == 'update'):
            $p_img = '';
            if(isset($_POST['p_img']) and !empty($_POST['p_img'])):
                $p_img = $_POST['p_img'];
                $path_img = explode($this->base_url(),$p_img);
                $image_name = @end(explode('/',$p_img));
                $image_name = explode('_pre_upload',$image_name);
                $p_img = $this->public_url('file/images/product/').$image_name[0].$image_name[1];
                $image_name = $_SERVER['DOCUMENT_ROOT'].'/it_support/public/file/images/product/'.$image_name[0].$image_name[1];
                $path_img = $_SERVER['DOCUMENT_ROOT'].'/'.'it_support/'.$path_img[1];
                if(rename($path_img, $image_name)):
                    if(file_exists($path_img)):
                        unlink($path_img);
                    endif;
                else:
                    echo json_encode(array('rename fail'));
                    exit;
                endif;
                $p_img = str_replace($this->public_url(),'|path_url|',$p_img);
            endif;

            $con['table'] = 'tb_product';
            $con['data'] = array(
                'p_code' => $_POST['p_code'],
                'p_detail' => $_POST['p_detail'],
                'p_sub_detail' => $_POST['p_sub_detail'],
                'p_price3' => $_POST['p_price3'],
                'p_price2' => $_POST['p_price2'],
                'p_price1' => $_POST['p_price1'],
                'p_cate' => $_POST['p_cate'],
                'p_brand' => $_POST['p_brand'],
                'p_create_date' => date('Y-m-d H:i:s'),
                'p_img' => $p_img
            );
            if(strtolower($_SESSION['user']->division) == 'sale'):
                $con['data']['p_type'] = 'supply';
            endif;
            $con['where'] = 'p_id = "'.$this->decode($_POST['p_id']).'"';
            $this->pro->update($con);
            unset($con);
            echo json_encode(array('success'));
        endif;
    }
    public function upload_image($value='')
    {
        //เผื่อมีการทำ multi upload
        $data['upload_path'] = '../it_support/public/file/images/upload_image/' ;
        $data['file'] = $_FILES;
        // $data['new_size'] = '1920/1080';
        // $data['new_size'] = '1366';
        $data['suffix'] = 'pre_upload'; // ต่อท้ายชื่อรูปภาพ
        $data['path_image'] = $this->public_url();
        $path = $this->image_upload($data);

        if(isset($_POST['old_image']) and !empty($_POST['old_image'])):
            $get_name_old_image = @end(explode('/',$_POST['old_image']));
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/it_support/public/file/images/upload_image/'.$get_name_old_image)):
                unlink($_SERVER['DOCUMENT_ROOT'].'/it_support/public/file/images/upload_image/'.$get_name_old_image);
            endif;
        endif;


        echo json_encode($path);

    }
}
 ?>
