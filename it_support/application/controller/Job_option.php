<?php /**
 *
 */
class Job_option extends Core_controller
{

    function __construct()
    {
        parent::__construct();
        $this->job = $this->model('Job_option_model');
    }
    public function add($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            $con['table'] = 'tb_job_option';
            if(isset($_POST['jo_customer_name']) and !empty($_POST['jo_customer_name'])):
                $con_cus['table'] = 'tb_customer';
                $con_cus['where'] = 'cus_name = "'.$_POST['jo_customer_name'].'"';
                $check_cus = $this->job->select($con_cus);
                unset($con_cus);
                if(count($check_cus) < 1):
                    $con_cus['table'] = 'tb_customer';
                    $con_cus['data'] = array(
                        'cus_name' => $_POST['jo_customer_name'],
                        'cus_zone' => $_SESSION['user']->zone
                    );
                    $this->job->insert($con_cus);
                    unset($con_cus);
                    $con_cus['table'] = 'tb_customer';
                    $con_cus['where'] = 'cus_name = "'.$_POST['jo_customer_name'].'"';
                    $check_cus_insert = $this->job->select($con_cus);
                    unset($con_cus);
                    if(count($check_cus_insert) > 0):
                        $jo_customer_id = $check_cus_insert[0]->id;
                    else:
                        echo json_encode(array("can not add"));exit;
                    endif;
                else:
                    $jo_customer_id = $check_cus_insert[0]->id;
                    // echo json_encode(array('have it'));exit;
                endif;
            else:
                $jo_customer_id = $_POST['jo_customer_id'];
            endif;
            /*get jo_creator_detail*/
            $jo_creator_detail = 'tel=>'.$_POST['jo_tel'].'|mail=>'.$_POST['jo_mail'];

            /*get max id*/
            $con_max['select'] = 'MAX(jo_job_id) AS max_job_id';
            $max_id = $this->job->select($con_max);
            if(count($max_id) > 0):
                $max_id = $max_id[0]->max_job_id + 1;
            else:
                $max_id = 1;
            endif;


            $date = date('Y-m-d H:i:s');
            $con['data'] = array(
                'jo_job_id' => $max_id,
                'jo_order_form' => $_POST['jo_order_form'],
                'jo_customer_id' => $jo_customer_id,
                'jo_customer_department' => $_POST['jo_customer_department'],
                'jo_note_product_detail' => $_POST['jo_note_product_detail'],
                'jo_note_additional_option' => $_POST['jo_note_additional_option'],
                'jo_note_help' => $_POST['jo_note_help'],
                'jo_status' => 'new',
                'jo_creator' => $_SESSION['user']->id,
                'jo_creator_detail' => $jo_creator_detail,
                'jo_create_date' => $date
            );
            $this->job->insert($con);
            unset($con);

            $con['where'] = 'jo_create_date = "'.$date.'" AND jo_creator = "'.$_SESSION['user']->id.'"';
            $check_insert_jo = $this->job->select($con);
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
        $user_status = '';
        if(isset($_POST['date_start']) and !empty($_POST['date_start'])):
            if(isset($_POST['date_end']) and !empty($_POST['date_end'])):
                $con['where'] = 'DATE(jo_create_date) >= "'.$_POST['date_start'].'" AND DATE(jo_create_date) <= "'.$_POST['date_end'].'"';
            else:
                $con['where'] = 'DATE(jo_create_date) >= "'.$_POST['date_start'].'"';
            endif;
        else:
            $con['where'] = ' DATE(jo_create_date) >= "'.date("Y-m-d", strtotime("-3 months")).'" AND jo_status !="cancel"';
        endif;
        switch ($_SESSION['user']->id):
            case ($_SESSION['user']->id == 71 || $_SESSION['user']->id == 157):
                $user_status = 'admin';
                break;
            default:
                $user_status = 'defult';
                $con['where'] .= ' AND  jo_creator = "'.$_SESSION['user']->id.'"';
                break;
        endswitch;

        $con['order_by'] = 'jo_id DESC';
        $data = $this->job->select($con);
        unset($con);
        if(count($data) > 0):
            $con['table'] = 'tb_customer';
            $data_customer = $this->job->select($con);
            unset($con);
            $customer = array();
            foreach ($data_customer as $key_cus => $value_cus):
                $customer[$value_cus->id] = $value_cus->cus_name;
            endforeach;
            // $this->log($value->jo_customer_id);
            foreach ($data as $key => $value):
                $value->jo_id = $this->encode($value->jo_id);
                $value->jo_customer_name = $customer[$value->jo_customer_id];
                $value->jo_date_th = $this->date_th($value->jo_create_date,1);
            endforeach;



            echo json_encode(array('success',$data,$user_status));
        else:
            echo json_encode(array('fail'));
        endif;
    }
    public function get($value='')
    {
        if(isset($_POST['jo_id']) and !empty($_POST['jo_id'])):
            $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'"';
            $data = $this->job->select($con);
            unset($con);
            if(count($data) == 1):
                $con['table'] = 'tb_customer';
                $data_customer = $this->job->select($con);
                unset($con);
                $customer = array();
                foreach ($data_customer as $key_cus => $value_cus):
                    $customer[$value_cus->id] = $value_cus->cus_name;
                endforeach;
                $jo_status = '';
                foreach ($data as $key => $value):
                    $jo_status = $value->jo_status;
                    $value->jo_customer_name = $customer[$value->jo_customer_id];

                    $value->jo_id = $this->encode($value->jo_id);
                    $value->jo_date_th = $this->date_th($value->jo_create_date,1);
                    /*get createor name*/
                    $con['table'] = 'tb_user';
                    $con['select'] = 'first_name,last_name,zone';
                    $con['where'] = 'id = "'.$value->jo_creator.'"';
                    $creator = $this->job->select($con);
                    unset($con);
                    $value->jo_creator_name = $creator[0]->first_name.' '.$creator[0]->last_name;
                    $value->jo_creator_zone = $creator[0]->zone;

                    /*get ผู้รับเรื่อง*/
                    if(!empty($value->jo_it_id)):
                        $con['table'] = 'tb_user';
                        $con['select'] = 'first_name,last_name';
                        $con['where'] = 'id = "'.$value->jo_it_id.'"';
                        $it = $this->job->select($con);
                        unset($con);
                        $value->jo_it_name = $it[0]->first_name.' '.$it[0]->last_name;
                        $value->jo_it_date_th = $this->date_th($value->jo_it_date,1);
                    else:
                        $value->jo_it_name = '-';
                        $value->jo_it_date_th = '-';
                    endif;

                    /*get owner ผู้รับผิดชอบงาน*/
                    if(!empty($value->jo_owner)):
                        $con['table'] = 'tb_user';
                        $con['select'] = 'first_name,last_name';
                        $con['where'] = 'id = "'.$value->jo_owner.'"';
                        $owner = $this->job->select($con);
                        unset($con);
                        $value->jo_owner_name = $owner[0]->first_name.' '.$owner[0]->last_name;
                    else:
                        $value->jo_owner_name = '-';
                    endif;

                    /*get tel & email*/
                    if(!empty($value->jo_creator_detail)):
                        $creator_detail = explode('|',$value->jo_creator_detail);
                        $creator_tel = explode('=>',$creator_detail[0]);
                        $creator_mail = explode('=>',$creator_detail[1]);
                        $creator_tel = $creator_tel[1];
                        $creator_mail = $creator_mail[1];
                        $value->jo_creator_tel = $creator_tel;
                        $value->jo_creator_mail = $creator_mail;
                    else:
                        $value->jo_creator_tel = '-';
                        $value->jo_creator_mail = '-';
                    endif;

                    /*get job success*/
                    $value->jo_success_date = ($value->jo_success_date=='0')?'-':$value->jo_success_date;
                    if($value->jo_success_date != NULL):
                        $value->jo_success_date_th = $this->date_th($value->jo_success_date,1);
                    else:
                        $value->jo_success_date_th = '-';
                    endif;
                    $value->jo_remark = empty($value->jo_remark)?'-':$value->jo_remark;

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
                /*get btn option*/
                $btn = '';
                $form_modal = '';
                if($user_status == 'admin'):
                    switch ($jo_status):
                        case 'new':
                            $btn = '<button class="btn btn-success btn-option" option-type="accept"><i class="material-icons">done</i> รับเรื่อง</button>';
                            $form_modal = '<div class="row m-0 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2 wrap-form" style="font-size:0.8rem;height: fit-content;">';
                            $form_modal .= '<div class="col-12 form-owner" style="display:none"><form>';
                            $form_modal .= '<input type="hidden" name="type" value="accept">';
                            $form_modal .= '<input type="hidden" name="jo_id" value="'.$data[0]->jo_id.'">';
                            $form_modal .= '<div class="form-group bmd-form-group">';
                            $form_modal .= '<select class="form-control form-control-chosen list-owner" name="jo_owner" required></select></div></form>';
                            $form_modal .= '<div class="d-flex justify-content-between row mr-0 ml-0">';
                            $form_modal .= '<button class="btn btn-danger btn-cancel-form pl-3 pr-3" data-form="form-owner"><i class="material-icons">close</i> ยกเลิก</button><button class="btn btn-success btn-save-form pl-3 pr-3" data-form="form-owner"><i class="material-icons">save</i> บันทึก</button></div></div>';
                            $form_modal .= '</div>';
                        break;
                        case 'accept':
                            $btn = '<button class="btn btn-success btn-option" option-type="success"><i class="material-icons">done</i> ดำเนินการเรียบร้อย</button>';
                            $form_modal = '<div class="row m-0 col-sm-12 col-md-6 col-lg-6 mt-2 mb-2 wrap-form" style="font-size:0.8rem;height: fit-content;">';
                            $form_modal .= '<div class="col-12 form-remark" style="display:none"><form>';
                            $form_modal .= '<input type="hidden" name="type" value="success">';
                            $form_modal .= '<input type="hidden" name="jo_id" value="'.$data[0]->jo_id.'">';
                            $form_modal .= '<div class="form-group">';
                            $form_modal .= '<label class="bmd-label-floating text-dark"><strong>หมายเหตุ</strong></label>';
                            $form_modal .= '<div class="form-group bmd-form-group">';
                            $form_modal .= '<textarea class="form-control" name="jo_remark" rows="5"></textarea></div></form>';
                            $form_modal .= '<div class="d-flex justify-content-between row mr-0 ml-0">';
                            $form_modal .= '<button class="btn btn-danger btn-cancel-form pl-3 pr-3" data-form="form-remark"><i class="material-icons">close</i> ยกเลิก</button><button class="btn btn-success btn-save-form pl-3 pr-3" data-form="form-remark"><i class="material-icons">save</i> บันทึก</button></div></div>';
                            $form_modal .= '</div>';
                        break;
                        default:
                        break;
                    endswitch;
                elseif($user_status == 'defult'):
                    switch ($jo_status):
                        case 'new':
                            $btn = '<button class="btn btn-warning btn-option" option-type="edit" jo-id="'.$data[0]->jo_id.'"><i class="material-icons">edit</i> แก้ไข</button>';
                            $btn .= '<button class="btn btn-danger btn-option" option-type="cancel" jo-id="'.$data[0]->jo_id.'"><i class="material-icons">clear</i> ยกเลิก</button>';
                        break;
                        default:
                        break;
                    endswitch;
                endif;
                echo json_encode(array('success',$data,$user_status,$btn,$form_modal));
            else:
                echo json_encode(array('fail'));
            endif;

        endif;
    }
    public function update($value='')
    {
        if(isset($_POST['type']) and !empty($_POST['type'])):
            switch ($_POST['type']):
                case 'accept':
                    $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "new"';
                    $data = $this->job->select($con);
                    unset($con);
                    if(count($data) == 1):
                        $date = date('Y-m-d H:i:s');
                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'"';
                        $con['data'] = array(
                            'jo_status' => 'accept',
                            'jo_it_id' => $_SESSION['user']->id,
                            'jo_it_date' => $date,
                            'jo_update_date' => $date,
                            'jo_owner' => $this->decode($_POST['jo_owner'])
                        );
                        $this->job->update($con);
                        unset($con);

                        //check update
                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "accept"';
                        $check = $this->job->select($con);
                        if(count($check) == 1):
                            echo json_encode(array('success','ใบงานนี้รับเรื่องแล้ว',$_POST['type']));
                        else:
                            echo json_encode(array('fail','ไม่สามารถรับเรื่องได้'));
                        endif;
                    endif;

                    break;
                case 'success':
                    $con['where'] = 'jo_status = "accept" AND jo_id = "'.$this->decode($_POST['jo_id']).'"';
                    $check_accept = $this->job->select($con);
                    unset($con);
                    if(count($check_accept) == 1):
                        $date = date('Y-m-d H:i:s');
                        $remark = '-';
                        if(!empty($_POST['jo_remark'])):
                            $remark = $_POST['jo_remark'];
                        endif;
                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'"';
                        $con['data'] = array(
                            'jo_status' => 'success',
                            'jo_remark' => $remark,
                            'jo_success_date' => $date,
                        );
                        $this->job->update($con);
                        unset($con);

                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "success"';
                        $check_update = $this->job->select($con);
                        if(count($check_update) == 1):
                            echo json_encode(array('success','บันทึกสำเร็จ',$_POST['type'],$date,$remark));
                        else:
                            echo json_encode(array('fail','ไม่สามารถบันทึกได้'));
                        endif;
                    else:
                        echo json_encode(array('fail','ใบแจ้งงานนี้ยังไม่ได้รับเรื่อง'));
                    endif;
                    // code...
                    break;
                case 'cancel':
                    $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "new"';
                    $check_jo = $this->job->select($con);
                    unset($con);
                    if(count($check_jo) == 1):
                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'"';
                        $con['data'] = array(
                            'jo_status' => 'cancel',
                            'jo_update_date' => date('Y-m-d H:i:s')
                        );
                        $this->job->update($con);
                        unset($con);

                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "cancel"';
                        $check_update = $this->job->select($con);
                        if(count($check_update) == 1):
                            echo json_encode(array('success','ยกเลิกใบแจ้งงานสำเร็จ'));
                        else:
                            echo json_encode(array('fail','ไม่สามารถยกเลิกการแจ้งงานได้'));
                        endif;
                    else:
                        echo json_encode(array('fail','ไม่สามารถยกเลิกได้'));
                    endif;
                    break;
                case 'edit':
                    if(isset($_POST['jo_id']) and !empty($_POST['jo_id'])):
                        $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "new"';
                        $check_jo = $this->job->select($con);
                        if(count($check_jo) == 1):
                            if(isset($_POST['jo_customer_name']) and !empty($_POST['jo_customer_name'])):
                                $con_cus['table'] = 'tb_customer';
                                $con_cus['where'] = 'cus_name = "'.$_POST['jo_customer_name'].'"';
                                $check_cus = $this->job->select($con_cus);
                                unset($con_cus);
                                if(count($check_cus) < 1):
                                    $con_cus['table'] = 'tb_customer';
                                    $con_cus['data'] = array(
                                        'cus_name' => $_POST['jo_customer_name'],
                                        'cus_zone' => $_SESSION['user']->zone
                                    );
                                    $this->job->insert($con_cus);
                                    unset($con_cus);
                                    $con_cus['table'] = 'tb_customer';
                                    $con_cus['where'] = 'cus_name = "'.$_POST['jo_customer_name'].'"';
                                    $check_cus_insert = $this->job->select($con_cus);
                                    unset($con_cus);
                                    if(count($check_cus_insert) > 0):
                                        $jo_customer_id = $check_cus_insert[0]->id;
                                    else:
                                        echo json_encode(array("can not add"));exit;
                                    endif;
                                else:
                                    $jo_customer_id = $check_cus_insert[0]->id;
                                    // echo json_encode(array('have it'));exit;
                                endif;
                            else:
                                $jo_customer_id = $_POST['jo_customer_id'];
                            endif;
                            /*get jo_creator_detail*/
                            $jo_creator_detail = 'tel=>'.$_POST['jo_tel'].'|mail=>'.$_POST['jo_mail'];
                            /*get max id*/
                            // $con_max['select'] = 'MAX(jo_job_id) AS max_job_id';
                            // $max_id = $this->job->select($con_max);
                            // $max_id = $max_id[0]->max_job_id + 1;
                            $max_id = $check_jo[0]->jo_job_id;

                            $date = date('Y-m-d H:i:s');
                            $con['data'] = array(
                                'jo_job_id' => $max_id,
                                'jo_order_form' => $_POST['jo_order_form'],
                                'jo_customer_id' => $jo_customer_id,
                                'jo_customer_department' => $_POST['jo_customer_department'],
                                'jo_note_product_detail' => $_POST['jo_note_product_detail'],
                                'jo_note_additional_option' => $_POST['jo_note_additional_option'],
                                'jo_note_help' => $_POST['jo_note_help'],
                                'jo_status' => 'new',
                                'jo_creator' => $_SESSION['user']->id,
                                'jo_creator_detail' => $jo_creator_detail,
                                'jo_create_date' => $date
                            );
                            $this->job->insert($con);
                            unset($con);

                            /*update old job for history*/
                            $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'"';
                            $con['data'] = array('jo_status' => 'cancel');
                            $this->job->update($con);
                            unset($con);

                            /*check update*/
                            $con['where'] = 'jo_id = "'.$this->decode($_POST['jo_id']).'" AND jo_status = "cancel"';
                            $check_update = $this->job->select($con);
                            unset($con);

                            $con['where'] = 'jo_job_id = "'.$max_id.'" AND jo_status = "new"';
                            $check_new_job = $this->job->select($con);
                            unset($con);

                            if(count($check_update) == 1 and count($check_new_job) > 0):
                                echo json_encode(array('success'));
                            else:
                                echo json_encode(array('fail','ไม่สามารถแก้ไขการแจ้งงานได้'));
                            endif;

                        else:
                            echo json_encode(array('fail','การแจ้งงานนี้อยู่ในสถานะที่ไม่สามารถแก้ไขได้'));
                        endif;
                    endif;
                    break;
                default:
                    // code...
                    break;
            endswitch;
        endif;
    }
    public function list_owner($value='')
    {
        $con['table'] = 'tb_user';
        $con['where'] = 'division = "IT"';
        $data = $this->job->select($con);
        if(count($data) > 0):
            foreach ($data as $key => $value):
                $value->id = $this->encode($value->id);
            endforeach;
            echo json_encode(array('success',$data));
        else:
            echo json_encode(array('fail'));
        endif;
    }
}
 ?>
