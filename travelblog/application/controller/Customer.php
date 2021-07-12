<?php /**
 *
 */
class Customer extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->cus = $this->model('Admin_model');
    }
    public function index($value='')
    {
        $con['table'] = 'tb_place';
        $data = $this->cus->select($con);
        unset($con);
        $con['table'] = 'tb_amphur';
        $con['select'] = 'amphur_id,amphur_name';
        $amphur = $this->cus->select($con);
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
        $this->set_page('customer/homepage',$data);
    }

    public function list_home($value='')
    {
        $con['table'] = 'tb_homepage';
        $data = $this->cus->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    function tradition($value='')
    {
        $this->set_page('customer/tradition');
    }

    public function list_tradition($value='')
    {
        $con['table'] = 'tb_tradition';
        $con['order_by'] = 'id DESC';
        $data = $this->cus->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function restaurant($value='',$select='')
    {
        if(!empty($value)):
            $con['table'] = 'tb_place';
            $con['where'] = 'place_type = "restaurant" AND amphur_id = "'.$select.'"';
            $con['order_by'] =  'place_id DESC';
            $data = $this->cus->select($con);
            if(count($data) > 0):
                $data['item'] = $data;
                $data['id'] = $value;
                $this->set_page('customer/detail_item',$data);
            endif;
        else:
            $this->set_page('customer/restaurant');
        endif;
    }
    public function souvenir_shop($value='')
    {
        $this->set_page('customer/souvenir_shop');

    }
    public function accommodation($value='',$select='')
    {
        if(!empty($value)):
            $con['table'] = 'tb_place';
            $con['where'] = 'place_type = "accommodation" AND amphur_id = "'.$select.'"';
            $con['order_by'] =  'place_id DESC';
            $data = $this->cus->select($con);
            if(count($data) > 0):
                $data['item'] = $data;
                $data['id'] = $value;
                $this->set_page('customer/detail_item',$data);
            endif;
        else:
            $this->set_page('customer/accommodation');
        endif;
    }
    public function attractions($value='',$select='')
    {
        if(!empty($value)):
            $con['table'] = 'tb_place';
            $con['where'] = 'place_type = "attraction" AND amphur_id = "'.$select.'"';
            $con['order_by'] =  'place_id DESC';
            $data = $this->cus->select($con);
            if(count($data) > 0):
                $data['item'] = $data;
                $data['id'] = $value;
                $this->set_page('customer/detail_item',$data);
            endif;
        else:
            $this->set_page('customer/attractions');
        endif;
    }
    public function list_item($value='')
    {
        $con['table'] = 'tb_place';
        $con['order_by'] = 'amphur_id ASC';
        if(isset($_POST['where']) and !empty($_POST['where'])):
            $con['where'] = 'place_type = "'.$_POST['where'].'"';
        endif;
        $data = $this->cus->select($con);
        unset($con);
        $con['table'] = 'tb_amphur';
        $con['select'] = 'amphur_id,amphur_name';
        $amphur = $this->cus->select($con);
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
    public function contact($value='')
    {
        $this->set_page('customer/contact');
    }

    public function get_ad($value='')
    {
        $con['table'] = 'tb_advertise';
        $con['order_by'] = 'ad_id DESC';
        $con['limit'] = '1';
        $data = $this->cus->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }

    public function list_souvenir_shop($value='')
    {
        $con['table'] = 'tb_souvenir_shop';
        $data = $this->cus->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function add_contact_cus($value='')
    {
        $con['table'] = 'tb_customer_contact';
        $con['data'] = array(
            'cc_name' => $_POST['name_contact'],
            'cc_email' => $_POST['name_contact'],
            'cc_subject' => $_POST['subject_contact'],
            'cc_detail' => $_POST['detail_contact']
        );
        $this->cus->insert($con);
        $this->redirect('customer/contact');
    }
    public function rental_car($value='')
    {
        $this->set_page('customer/car_rent');
    }
    public function list_contact($value='')
    {
        $con['table'] = 'tb_contact';
        $data = $this->cus->select($con);
        if(count($data) > 0):
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }

}
?>
