<?php /**
 *
 */
class Software_license extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->license = $this->model('Software_license_model');
    }
    public function add($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            if(isset($_POST['license_customer_name']) and !empty($_POST['license_customer_name'])):/*condition customer name*/
                $con_cus['table'] = 'tb_customer';
                $con_cus['where'] = 'cus_name = "'.$_POST['license_customer_name'].'"';
                $check_cus = $this->license->select($con_cus);
                unset($con_cus);
                if(count($check_cus) < 1):
                    $con_cus['table'] = 'tb_customer';
                    $con_cus['data'] = array(
                        'cus_name' => $_POST['license_customer_name']
                    );
                    $this->license->insert($con_cus);
                    unset($con_cus);
                    $con_cus['table'] = 'tb_customer';
                    $con_cus['where'] = 'cus_name = "'.$_POST['license_customer_name'].'"';
                    $check_cus_insert = $this->license->select($con_cus);
                    unset($con_cus);
                    if(count($check_cus_insert) > 0):
                        $license_customer_id = $check_cus_insert[0]->id;
                    else:
                        echo json_encode(array("can not add"));exit;
                    endif;
                else:
                    $license_customer_id = $check_cus[0]->id;
                endif;
            else:
                $license_customer_id = $_POST['license_customer_id'];
            endif;
            /*option*/
            $option = array();
            $new_key = '';
            foreach ($_POST as $key => $value):
                if(strpos($key,'option_') !== false and !empty($value)):
                    $new_key = str_replace('option_','',$key);
                    $option[] = $new_key.'=>'.$value;
                endif;
            endforeach;
            $option = implode(',',$option);
            // $this->log($option);

            //get date now
            $date = date('Y-m-d H:i:s');

            //get license num
            $con_num['select'] = 'MAX(license_num) AS num_max';
            $license_num = $this->license->select($con_num);
            unset($con_num);
            if(count($license_num) == 1):
                $license_num = $license_num[0]->num_max + 1;
            endif;


            $con['data'] = array(
                'license_num' => $license_num,
                'license_of' => $license_of = isset($_POST['license_of']) && !empty($_POST['license_of'])?$_POST['license_of']:'',
                'license_po' => $license_po = isset($_POST['license_po']) && !empty($_POST['license_po'])?$_POST['license_po']:'',
                'license_remark' => $license_remark = isset($_POST['license_remark']) && !empty($_POST['license_remark'])?$_POST['license_remark']:'',
                'license_customer_id' => $license_customer_id,
                'license_son' => $_POST['license_son'],
                'license_software_sn' => $_POST['license_software_sn'],
                'license_option' => $option,
                'license_software_version' => $_POST['license_software_version'],
                'license_hardware_sn' => $_POST['license_hardware_sn'],
                'license_create_date' => $date,
                'license_creator' => $_SESSION['user']->id
            );
            $this->license->insert($con);
            unset($con);
            $con['where'] = 'license_create_date = "'.$date.'" AND license_creator = "'.$_SESSION['user']->id.'"';
            $check_insert_jo = $this->license->select($con);
            unset($con);
            if(count($check_insert_jo) > 0):
                echo json_encode(array('success'));exit;
            else:
                echo json_encode(array('fail'));exit;
            endif;
        endif;

    }
    public function list($value='')
    {
        if(isset($_POST['date_start']) and !empty($_POST['date_start'])):
            if(isset($_POST['date_end']) and !empty($_POST['date_end'])):
                $con['where'] = 'DATE(license_create_date) >= "'.$_POST['date_start'].'" AND DATE(license_create_date) <= "'.$_POST['date_end'].'"';
            else:
                $con['where'] = 'DATE(license_create_date) >= "'.$_POST['date_start'].'"';
            endif;
        else:
            // $con['where'] = ' license_status != "cancel" OR license_status != "edit"';
            $con['where'] = 'license_status != "edit" AND license_status != "cancel"';
            // $con['where'] = ' DATE(license_create_date) >= "'.date("Y-m-d", strtotime("-3 months")).'" AND license_status !="cancel"';
        endif;
        $con['order_by'] = 'license_id DESC';
        $data = $this->license->select($con);
        unset($con);
        if(count($data) > 0):
            $con['table'] = 'tb_customer';
            $data_customer = $this->license->select($con);
            unset($con);
            $customer = array();
            foreach ($data_customer as $key_cus => $value_cus):
                $customer[$value_cus->id] = $value_cus->cus_name;
            endforeach;

            foreach ($data as $key => $value):
                $value->license_id = $this->encode($value->license_id);
                $value->license_customer_name = $customer[$value->license_customer_id];
                // $value->license_option = explode(',',$value->license_option);
                // $option = array();
                // foreach ($value->license_option as $key_option => $value_option):
                //     $value_option = explode('=>',$value_option);
                //     $option[$value_option[0]] = $value_option[1];
                // endforeach;
                // $value->license_option = $option;
            endforeach;

            $user_status = '';
            switch ($_SESSION['user']->id):
                case ($_SESSION['user']->id == 71 || $_SESSION['user']->id == 157):
                    $user_status = 'admin';
                    break;
                default:
                    $user_status = 'defult';
                    break;
            endswitch;

            echo json_encode(array('success',$data,$user_status));
        endif;
    }
    public function get()
    {
        // $this->log($_POST);
        if(isset($_POST['license_id']) and !empty($_POST['license_id'])):
            $con['where'] = 'license_id = "'.$this->decode($_POST['license_id']).'"';
            $data = $this->license->select($con);
            unset($con);
            if(count($data) > 0):
                foreach ($data as $key => $value):
                    $con['table'] = 'tb_customer';
                    $con['where'] = 'id = "'.$value->license_customer_id.'"';
                    $data_customer = $this->license->select($con);
                    unset($con);
                    if(count($data_customer) > 0):
                        $value->license_customer_name = $data_customer[0]->cus_name;
                    endif;
                    $value->license_id = $this->encode($value->license_id);
                    if(!empty($value->license_option)):
                        $value->license_option = explode(',',$value->license_option);
                        $option = array();
                        foreach ($value->license_option as $key_option => $value_option):
                            $value_option = explode('=>',$value_option);
                            $option[$value_option[0]] = $value_option[1];
                        endforeach;
                        $value->license_option = $option;
                    endif;
                endforeach;

                $user_status = '';
                switch ($_SESSION['user']->id):
                    case ($_SESSION['user']->id == 71 || $_SESSION['user']->id == 157):
                        $user_status = 'admin';
                        break;
                    default:
                        $user_status = 'defult';
                        break;
                endswitch;
                echo json_encode(array('success',$data[0],$user_status));
            endif;
        else:
            $this->redirect();
        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            if($_POST['type'] == 'update'):
                if(isset($_POST['license_customer_name']) and !empty($_POST['license_customer_name'])):/*condition customer name*/
                    $con_cus['table'] = 'tb_customer';
                    $con_cus['where'] = 'cus_name = "'.$_POST['license_customer_name'].'"';
                    $check_cus = $this->license->select($con_cus);
                    unset($con_cus);
                    if(count($check_cus) < 1):
                        $con_cus['table'] = 'tb_customer';
                        $con_cus['data'] = array(
                            'cus_name' => $_POST['license_customer_name']
                        );
                        $this->license->insert($con_cus);
                        unset($con_cus);
                        $con_cus['table'] = 'tb_customer';
                        $con_cus['where'] = 'cus_name = "'.$_POST['license_customer_name'].'"';
                        $check_cus_insert = $this->license->select($con_cus);
                        unset($con_cus);
                        if(count($check_cus_insert) > 0):
                            $license_customer_id = $check_cus_insert[0]->id;
                        else:
                            echo json_encode(array("can not add"));exit;
                        endif;
                    else:
                        $license_customer_id = $check_cus[0]->id;
                    endif;
                else:
                    $license_customer_id = $_POST['license_customer_id'];
                endif;

                /*option*/
                $option = array();
                $new_key = '';
                foreach ($_POST as $key => $value):
                    if(strpos($key,'option_') !== false and !empty($value)):
                        $new_key = str_replace('option_','',$key);
                        $option[] = $new_key.'=>'.$value;
                    endif;
                endforeach;
                $option = implode(',',$option);

                //get license num
                $license_num = '';
                $con_num['where'] = 'license_id = "'.$this->decode($_POST['license_id']).'"';
                $license_num = $this->license->select($con_num);
                unset($con_num);
                if(count($license_num) == 1):
                    $license_num = $license_num[0]->license_num;
                endif;

                $date = date('Y-m-d H:i:s');

                $con['data'] = array(
                    'license_num' => $license_num,
                    'license_of' => $license_of = isset($_POST['license_of']) && !empty($_POST['license_of'])?$_POST['license_of']:'',
                    'license_po' => $license_po = isset($_POST['license_po']) && !empty($_POST['license_po'])?$_POST['license_po']:'',
                    'license_remark' => $license_remark = isset($_POST['license_remark']) && !empty($_POST['license_remark'])?$_POST['license_remark']:'',
                    'license_customer_id' => $license_customer_id,
                    'license_son' => $_POST['license_son'],
                    'license_software_sn' => $_POST['license_software_sn'],
                    'license_option' => $option,
                    'license_software_version' => $_POST['license_software_version'],
                    'license_hardware_sn' => $_POST['license_hardware_sn'],
                    'license_update_date' => $date,
                    'license_creator' => $_SESSION['user']->id
                );
                // $con['where'] = 'license_id = "'.$this->decode($_POST['license_id']).'"';
                $this->license->insert($con);
                unset($con);

                $con['data'] = array(
                    'license_status' => 'edit'
                );
                $con['where'] = 'license_id = "'.$this->decode($_POST['license_id']).'"';
                $this->license->update($con);
                unset($con);

                $con['where'] = 'license_status = "edit" AND license_id = "'.$this->decode($_POST['license_id']).'"';
                $check_update = $this->license->select($con);
                unset($con);
                if(count($check_update) == 1):
                    echo json_encode(array('success'));
                else:
                    echo json_encode(array('fail'));
                endif;
            elseif($_POST['type'] == 'cancel'):
                $con['data'] = array(
                    'license_status' => 'cancel'
                );
                $con['where'] = 'license_id = "'.$this->decode($_POST['license_id']).'"';
                $this->license->update($con);
                unset($con);

                $con['where'] = 'license_status = "cancel" AND license_id = "'.$this->decode($_POST['license_id']).'"';
                $check_cancel = $this->license->select($con);
                if(count($check_cancel) == 1):
                    echo json_encode(array('success'));
                else:
                    echo json_encode(array('fail'));
                endif;
            endif;

        endif;
    }
}
 ?>
