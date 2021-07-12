<?php /**
 *
 */
class Admin extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->admin = $this->model('Admin_model');
    }
    public function index($value='')
    {
        if(isset($_SESSION['admin']) and !empty($_SESSION['admin'])):
            $con['table'] = 'tb_place';
            $data = $this->admin->select($con);
            unset($con);
            $con['table'] = 'tb_amphur';
            $con['select'] = 'amphur_id,amphur_name';
            $amphur = $this->admin->select($con);
            unset($con);
            $data_amphur = array();
            foreach ($amphur as $key_am => $value_am):
                $data_amphur[$key_am+1] = $value_am->amphur_name;
            endforeach;
            if(count($data) > 0):
                foreach ($data as $key => $value):
                    $data[$key]->amphur_name = $data_amphur[$value->amphur_id];
                endforeach;
            endif;

            $data['item'] = $data;
            $this->set_page('admin/homepage',$data);
        else:
            $this->set_page('admin/login');
        endif;
    }
    public function check_login($value='')
    {
        $con['table'] = 'tb_admin';
        $con['where'] = 'username = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"';
        $data = $this->admin->select($con);
        unset($con);
        if(count($data) > 0):
            $_SESSION['admin'] = $data[0];
            echo json_encode('success');
        else:
            echo json_encode('fail');
        endif;
    }
    public function list_home($value='')
    {
        $con['table'] = 'tb_homepage';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update_home($value='')
    {
        $con['table'] = 'tb_homepage';
        $con['where'] = 'home_id = "'.$_POST['home_id'].'"';
        $path = '';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
            endforeach;
        endif;
        $con['data'] = array(
            'home_content' => $_POST['home_content'],
            'home_name_img' => $_POST['home_name_img'],
            'home_img' => $path
        );
        $this->admin->update($con);
        $this->redirect('admin/');

    }
    public function list_item($value='')
    {
        $con['table'] = 'tb_place';
        $con['order_by'] = 'amphur_id ASC';
        if(isset($_POST['where']) and !empty($_POST['where'])):
            $con['where'] = 'place_type = "'.$_POST['where'].'"';
        endif;
        $data = $this->admin->select($con);
        unset($con);
        $con['table'] = 'tb_amphur';
        $con['select'] = 'amphur_id,amphur_name';
        $amphur = $this->admin->select($con);
        unset($con);

        $data_amphur = array();
        foreach ($amphur as $key_am => $value_am):
            $data_amphur[$key_am+1] = $value_am->amphur_name;
        endforeach;
        if(count($data) > 0):
            foreach ($data as $key => $value):
                $data[$key]->amphur_name = $data_amphur[$value->amphur_id];
            endforeach;
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function add_item($value='')
    {
        // echo "<pre>";print_r($_POST);
        // echo "<pre>";print_r($_FILES);exit;

        $con['table'] = 'tb_place';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data'] = array(
                    'place_img' => $path,
                    'place_name' => $_POST['place_name'],
                    'amphur_id' => $_POST['amphur_id'],
                    'place_detail' => $_POST['place_detail'],
                    'place_type' => $_POST['place_type']
                );
                $this->admin->insert($con);
            endforeach;
        endif;
        // if($_POST['place_type'] == 'attraction'):
        //     $_POST['place_type'] = $_POST['place_type'].'s';
        // endif;
        $this->redirect('admin/'.$_POST['place_type']);

    }
    public function list_amphur($value='')
    {
        $con['table'] = 'tb_amphur';
        $data = $this->admin->select($con);
        if (count($data) > 0) :
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;

    }
    public function update_item($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            switch ($_POST['type']) {
                case 'update_slide':
                    $con['table'] = 'tb_place';
                    $con['where'] = 'place_id = "'.$_POST['id'].'"';
                    $con['data'] = array(
                        'place_status' => $_POST['status']
                    );
                    break;
                case 'update_item':
                    // echo "<pre>";print_r($_POST);exit;
                    $con['table'] = 'tb_place';
                    $con['where'] = 'place_id = "'.$_POST['place_id'].'"';
                    $con['data'] = array(
                        'place_name' => $_POST['place_name'],
                        'amphur_id' => $_POST['amphur_id'],
                        'place_detail' => $_POST['place_detail']
                    );
                    if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
                        foreach ($_FILES["userfile"]["name"] as $key => $value) :
                            $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                            $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                            $image_name = '../travelblog/public/file/images/'.$file_name;
                            move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                            $path = $this->public_url('file/images/').$file_name;
                            $con['data']['place_img'] = $path;
                        endforeach;
                    endif;

                    $this->admin->update($con);
                    $this->redirect('admin/'.$_POST['place_type']);
                    break;

                default:
                    // code...
                    break;
            }

            $this->admin->update($con);
            unset($con);


        endif;
    }
    public function add_souvenir_shop($value='')
    {
        $con['table'] = 'tb_souvenir_shop';
        $path = '';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
            endforeach;
        endif;

        $con['data'] = array(
            'shop_name' => $_POST['shop_name'],
            'shop_detail' => $_POST['shop_detail'],
            'shop_img' => $path
        );
        $this->admin->insert($con);

        $this->redirect('admin/souvenir_shop');
    }
    public function list_souvenir_shop($value='')
    {
        $con['table'] = 'tb_souvenir_shop';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update_souvenir_shop($value='')
    {
        // echo "<pre>";print_r($_POST);exit;
        $con['table'] = 'tb_souvenir_shop';
        $con['where'] = 'shop_id = "'.$_POST['shop_id'].'"';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data']['shop_img'] = $path;
            endforeach;
        endif;

        $con['data']['shop_name'] = $_POST['shop_name'];
        $con['data']['shop_detail'] = $_POST['shop_detail'];

        $this->admin->update($con);

        $this->redirect('admin/souvenir_shop');
    }
    public function edit_contact($value='')
    {
        $con['table'] = 'tb_contact';
        $con['data']['contact_us'] = $_POST['contact_us'];
        $con['data']['contact_advertise'] = $_POST['contact_advertise'];

        $this->admin->update($con);

        $this->redirect('admin/contact');
    }
    public function list_contact($value='')
    {
        $con['table'] = 'tb_contact';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function tradition($value='')
    {
        $this->set_page('admin/tradition');
    }
    public function add_tradition($value='')
    {
        $con['table'] = 'tb_tradition';
        $con['data'] = array(
            'name' => $_POST['tradition_name'],
            'content' => $_POST['tradition_content'],
        );
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data']['img'] = $path;
            endforeach;
        endif;
        $data = $this->admin->insert($con);

        $this->redirect('admin/tradition');
    }
    public function update_tradition($value='')
    {
        $con['table'] = 'tb_tradition';
        $con['where'] = 'id = "'.$_POST['id'].'"';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data']['img'] = $path;
            endforeach;
        endif;

        $con['data']['name'] = $_POST['tradition_name'];
        $con['data']['content'] = $_POST['tradition_content'];

        $this->admin->update($con);

        $this->redirect('admin/tradition');
    }
    public function delete_tradition($value='')
    {
        $con['table'] = 'tb_tradition';
        $con['where'] = 'id = "'.$value.'"';
        $this->admin->delete($con);
        $this->redirect('admin/tradition');
    }
    public function list_tradition($value='')
    {
        $con['table'] = 'tb_tradition';
        $con['order_by'] = 'id DESC';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function attractions($value='')
    {
        $this->set_page('admin/attractions');
    }
    public function delete_item($value='',$select='')
    {
        $con['table'] = 'tb_place';
        $con['where'] = 'place_id = "'.$value.'"';
        $this->admin->delete($con);
        $this->redirect('admin/'.$select);
    }
    public function delete_souvenir_shop($value='',$select='')
    {
        $con['table'] = 'tb_souvenir_shop';
        $con['where'] = 'shop_id = "'.$value.'"';
        $this->admin->delete($con);
        $this->redirect('admin/'.$select);
    }
    public function add_advertise($value='')
    {
        $con['table'] = 'tb_advertise';
        $test = $this->admin->select($con);
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data']['ad_img'] = $path;
            endforeach;
        endif;
        $con['data']['ad_text'] = $_POST['ad_text'];
        if(count($test) < 1):
            $this->admin->insert($con);
        else:
            $this->admin->update($con);
        endif;

        $this->redirect('admin/');
    }
    public function get_ad($value='')
    {
        $con['table'] = 'tb_advertise';
        $con['order_by'] = 'ad_id DESC';
        $con['limit'] = '1';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function accommodation($value='')
    {
        $this->set_page('admin/accommodation');
    }
    public function restaurant($value='')
    {
        $this->set_page('admin/restaurant');
    }
    public function souvenir_shop($value='')
    {
        $this->set_page('admin/souvenir_shop');
    }
    public function car_rent($value='')
    {
        $this->set_page('admin/car_rent');
    }
    public function add_car_rent($value='')
    {
        $con['table'] = 'tb_car_rent';
        $path = '';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
            endforeach;
        endif;

        $con['data'] = array(
            'car_rent_name' => $_POST['car_rent_name'],
            'car_rent_detail' => $_POST['car_rent_detail'],
            'car_rent_img' => $path
        );
        $this->admin->insert($con);

        $this->redirect('admin/car_rent');
    }
    public function list_car_rent($value='')
    {
        $con['table'] = 'tb_car_rent';
        $data = $this->admin->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function contact($value='')
    {
        $this->set_page('admin/contact');
    }
    public function list_issue($value='')
    {
        echo "wait for it please!!";
    }
    public function list_customer_contact($value='')
    {
        $con['table'] = 'tb_customer_contact';
        $con['order_by'] = 'cc_id DESC';
        $data = $this->admin->select($con,1);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function update_car_rent($value='')
    {
        $con['table'] = 'tb_car_rent';
        $con['where'] = 'car_rent_id = "'.$_POST['car_rent_id'].'"';
        if(count($_FILES["userfile"]["name"]) > 0 and !empty($_FILES["userfile"]["name"][0])):
            foreach ($_FILES["userfile"]["name"] as $key => $value) :
                $last_name = explode(".", $_FILES["userfile"]["name"][$key]);
                $file_name = round(microtime(true)) . $key.'.' . end($last_name);
                $image_name = '../travelblog/public/file/images/'.$file_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'][$key],$image_name);
                $path = $this->public_url('file/images/').$file_name;
                $con['data']['car_rent_img'] = $path;
            endforeach;
        endif;

        $con['data']['car_rent_name'] = $_POST['car_rent_name'];
        $con['data']['car_rent_detail'] = $_POST['car_rent_detail'];

        $this->admin->update($con);

        $this->redirect('admin/car_rent');
    }
    public function delete_car_rent($value='',$select='')
    {
        $con['table'] = 'tb_car_rent';
        $con['where'] = 'car_rent_id = "'.$value.'"';
        $this->admin->delete($con);
        $this->redirect('admin/'.$select);
    }
    public function logout($value='')
    {
        unset($_SESSION['admin']);
        $this->redirect('admin/');
    }
}
 ?>
