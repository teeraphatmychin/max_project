<?php /**
 *
 */
class User extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->user = $this->model('Employee_model');
    }
    public function index($value='')
    {
        $data['check_session'] = '';
        if(isset($_SESSION['user']) and (count((array)$_SESSION['user']) > 0)):
            $data['check_session'] = $_SESSION['user']->menu_option[0]->option_path;
        endif;
        $this->set_page('employee/login',$data);
    }
    public function check_login($value='')
    {
        unset($_SESSION['user']);
        if(isset($_SESSION['user'])):
            echo json_encode(array('isset',$_SESSION['user']->menu_option[0]->option_path));
        else:
            if(isset($_POST['username']) and !empty($_POST['username'])):
                $con['table'] = 'tb_user';
                $con['select'] = 'id,login_user,user_id,level_id,first_name,last_name,position,active_flag,division,division_th,head,email,menu_option,tel,zone,token_no';
                $con['where'] = 'login_user = "'.$_POST['username'].'" AND new_login_pass = "'.$_POST['password'].'"';
                $data = $this->user->select($con);
                unset($con);
                if ($data == true):
                    $_SESSION['user'] = $data[0];
                    $con['table'] = 'tb_option';
                    $con['select'] = 'option_id,option_name,option_path,option_color,option_icon';
                    $con['where'] = 'option_id IN('.$_SESSION['user']->menu_option.')'; //here
                    $con['order_by'] = 'option_order ASC';
                    // $con['order_by'] = 'case option_id when 6 then 1 when 5 then 2 when 7 then 3 when 9 then 4 end;';
                    $data = $this->user->select($con);
                    unset($con);
                    if(count($data) > 0):
                        $_SESSION['user']->menu_option = $data;
                        echo json_encode(array('success',$_SESSION['user']->menu_option[0]->option_path));
                    else:
                        echo json_encode(array('No Permission'));
                    endif;
                    // $option = explode(',',$_SESSION['user']->menu_option);
                    // $_SESSION['user']->menu_option = array();
                    // foreach ($data as $key => $value):
                    //     // $option[$value->option_id] = $value;
                    //     // $data[$value->option_id] = $value;
                    //     // $data[$value->option_id]->test = $value->option_id;
                    //     // unset($data[$key]);
                    //     // echo $value->option_id;
                    //     $_SESSION['user']->menu_option[$key] = $data[$option[$key]];
                    // endforeach;
                    // // sort($option);
                    // echo "<pre>";print_r($_SESSION['user']->menu_option);exit;
                    // exit;
                else:
                    echo json_encode(array('fail'));
                endif;
            else:
                echo json_encode(array('isset',$_SESSION['user']->menu_option[0]->option_path));
            endif;
        endif;

    }
    public function get_user($value='')
    {
        if(isset($_POST['get_user']) and !empty($_POST['get_user'])):
            if(isset($_POST['user_id']) and !empty($_POST['user_id'])):
                $con['table'] = 'tb_user';
                $con['where'] = 'id = "'.$this->encode($_POST['user_id']).'"';
            else:
                echo json_encode(array('fail','มีบางอย่างผิดพลาด โปรดแจ้งเจ้าหน้าที่ IT'));
            endif;
        endif;
    }
}
 ?>
