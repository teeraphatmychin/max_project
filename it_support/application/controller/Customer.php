<?php /**
 *
 */
class Customer extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->cus = $this->model('Customer_model');
    }
    public function list($value='')
    {
        if(isset($_POST['get_customer']) and !empty($_POST['get_customer'])):
            $data = $this->cus->select();
            if(count($data) > 1):
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail','ไม่มีรายการลูกค้า'));
            endif;
        endif;
    }
    public function get($value='')
    {
        if(isset($_POST['id']) and !empty($_POST['id'])):
            $con['where'] = 'id = "'.$_POST['id'].'"';
            $data = $this->cus->select($con);
            unset($con);
            if(count($data) > 0):
                echo json_encode(array('success',$data));
            else:
                echo json_encode(array('fail','ไม่สามารถค้นหาได้'));
            endif;
        else:
            echo json_encode(array('fail','ไม่สามารถตรวจสอบค่าไอดีได้'));
        endif;
    }
}
 ?>
