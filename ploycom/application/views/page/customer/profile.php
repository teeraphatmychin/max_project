<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            /* .customer .customer-content{
                margin-left: 250px;
            } */
            .block .block-body table th{
                width:20%;
                text-align: right;
            }
            .block .block-body table td{
                padding-left: 10px;
            }
            .block .block-body table td,.block .block-body table th{
                /* border-bottom: solid 1px #ddd!important; */
            }

            @media (min-width:601px){

            }
            @media (min-width:993px){

            }

        </style>
    </head>
    <body>
        <?php

        // echo "<pre>";print_r($_SESSION);exit;

        ?>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>
                <div class="row container margin-bottom">
                    <div class="xxlarge head-page border-theme">
                        <strong>ข้อมูลลูกค้า</strong>
                    </div>
                    <div class="customer row">
                        <div class="customer-left-nav col s3 padding-small large bar-block">
                            <a href="javascript:void(0)" class="bar-item theme-d5 center" style="cursor:default">เมนู</a>
                            <a href="<?php echo $this->base_url('customer/profile') ?>" class="bar-item button theme-d2 ">ข้อมูลลูกค้า</a>
                            <a href="<?php echo $this->base_url('customer/order') ?>" class="bar-item button theme-l4 hover-theme-l1">รายการคำสั่งซื้อ</a>
                            <a href="<?php echo $this->base_url('customer/order/confirm') ?>" class="bar-item button theme-l4 hover-theme-l1 ">แจ้งชำระเงิน</a>
                            <a href="<?php echo $this->base_url('login/logout') ?>" class="bar-item button theme-l4 hover-theme-l1 ">ออกจากระบบ</a>
                            <?php //$this->set_page('customer/customer_left_nav') ?>
                        </div>
                        <div class="customer-content col s9" style="padding:10px">
                            <div class="block">
                                <div class="block-head row head-page border-theme" >
                                    <h4 class="col s2 theme center" style="margin:0px 0px;border-radius: 4px 4px 0px 0px;">ข้อมูลลูกค้า</h4>
                                </div>
                                <div class="block-body" style="padding:10px">
                                    <table class="table-all">
                                        <tr>
                                            <th>รหัสสมาชิก :</th>
                                            <?php
                                                if (empty($member_id)):
                                                    $zero = '';
                                                    for ($i=count((array)$_SESSION['member']->member_id); $i < 5; $i++) {
                                                        $zero .= '0';
                                                    }
                                                    $member_id = $zero.$_SESSION['member']->member_id;
                                                endif;
                                             ?>
                                            <td><?php echo $member_id ?></td>
                                        </tr>
                                        <tr>
                                            <th>ชื่อ-นามสกุล :</th>
                                            <td><?php echo $_SESSION['member']->member_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>อีเมล์ :</th>
                                            <td><?php echo $_SESSION['member']->member_email ?></td>
                                        </tr>
                                        <tr>
                                            <th>โทรศัพท์มือถือ :</th>
                                            <td><?php echo $_SESSION['member']->member_phone ?></td>
                                        </tr>
                                        <tr>
                                            <th>เลขที่บัตรประชาชน :</th>
                                            <td><?php echo $_SESSION['member']->member_card_id ?></td>
                                        </tr>
                                        <tr>
                                            <th>ที่อยู่ :</th>
                                            <td><?php echo $_SESSION['member']->member_address ?></td>
                                        </tr>
                                    </table>
                                    <a href="javscript:void(0)" class="button theme-d4 round margin-top right btn-edit">แก้ไข</a>
                                </div>
                            </div>
                            <div class="form-edit hide row">
                                <div class="form-body col 6" style="margin:auto;float:unset">
                                    <form  method="post" action="<?php echo $this->base_url('customer/update_profile') ?>">
                                        <input type="hidden" name="url" value="<?php echo $url = isset($_POST['url_form_cart']) && !empty($_POST['url_form_cart'])? $_POST['url_form_cart'] : null; ?>">
                                        <div class="form-control row margin-bottom margin-top">
                                            <label for="email" class="col l3 m3 s12  margin-right hide-small ">อีเมล์ : </label>
                                            <input id="email" type="text" class="col l8 m8 s12 input border round" name="email" placeholder="อีเมล์" value="<?php echo $_SESSION['member']->member_email ?>">
                                        </div>
                                        <div class="form-control row margin-bottom ">
                                            <label for="name" class="col l3 m3 s12  margin-right hide-small ">ชื่อ : </label>
                                            <input id="name" type="text" class="col l8 m8 s12 input border round" name="name" placeholder="ชื่อ" value="<?php echo $first_name ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="last_name" class="col l3 m3 s12  margin-right hide-small ">นามสกุล : </label>
                                            <input id="last_name" type="text" class="col l8 m8 s12 input border round" name="last_name"  placeholder="นามสกุล" value="<?php echo $last_name ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="phone_number" class="col l3 m3 s12  margin-right hide-small ">โทรศัพท์มือถือ : </label>
                                            <input id="phone_number" type="text" class="col l8 m8 s12 input border round" name="phone_number"  placeholder="โทรศัพท์มือถือ" value="<?php echo $_SESSION['member']->member_phone ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="card_id" class="col l3 m3 s12  margin-right hide-small "><span class="text-red">*</span>เลขประจำตัวประชาชน : </label>
                                            <input id="card_id" type="text" class="col l8 m8 s12 input border round" name="card_id"  placeholder="เลขประจำตัวประชาชน" value="<?php echo $_SESSION['member']->member_card_id ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="address" class="col l3 m3 s12  margin-right hide-small "><span class="text-red">*</span>เลขที่ : </label>
                                            <input id="address" type="text" class="col l8 m8 s12 input border round" name="address"  placeholder="เลขที่" value="<?php echo $address[0] ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="mu" class="col l3 m3 s12  margin-right hide-small "><span class="text-red">*</span>หมู่ : </label>
                                            <input id="mu" type="text" class="col l8 m8 s12 input border round" name="mu"  placeholder="หมู่" value="<?php echo $mu ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="alley" class="col l3 m3 s12  margin-right hide-small ">ซอย : </label>
                                            <input id="alley" type="text" class="col l8 m8 s12 input border round" name="alley"  placeholder="ซอย" value="<?php echo $alley ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="road" class="col l3 m3 s12  margin-right hide-small ">ถนน : </label>
                                            <input id="road" type="text" class="col l8 m8 s12 input border round" name="road"  placeholder="ถนน" value="<?php echo $road ?>">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="province" class="col l3 m3 s12  margin-right "><span class="text-red">*</span>จังหวัด : </label>
                                            <select id="province" class="col l8 m8 s12 input border round" name="province"><option value="<?php echo $province ?>"><?php echo $province ?></option></select>
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="amphur" class="col l3 m3 s12  margin-right "><span class="text-red">*</span>เขต/อำเภอ : </label>
                                            <select id="amphur" class="col l8 m8 s12 input border round" name="amphur"><option value="<?php echo $amphur ?>"><?php echo $amphur ?></option></select>
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="district" class="col l3 m3 s12  margin-right "><span class="text-red">*</span>แขวง/ตำบล : </label>
                                            <select id="district" class="col l8 m8 s12 input border round" name="district"><option value="<?php echo $district ?>"><?php echo $district ?></option></select>
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="" class="col l3 m3 s12  margin-right hide-small "><span class="text-red">*</span>รหัสไปรษณีย์ : </label>
                                            <input id="zipcode" type="text" class="col l8 m8 s12 input border round" name="zipcode"  placeholder="รหัสไปรษณีย์" value="<?php echo $zipcode ?>" disabled>
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <div class=" col l3 m3 s1 right-align margin-right">
                                                <input id="self_code" type="checkbox" class="radio" name="" value="" >
                                            </div>
                                            <label for="self_code" class="col l8 m8 s9 left-align margin-right text-red">*ต้องการเพิ่มรหัสไปรษณีย์เอง </label>
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="password" class="col l3 m3 s12  margin-right hide-small ">รหัสผ่าน : </label>
                                            <input id="password" type="password" class="col l8 m8 s12 input border round" name="password" placeholder="รหัสผ่าน">
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="repassword" class="col l3 m3 s12  margin-right hide-small ">ใส่รหัสผ่านอีกครั้ง : </label>
                                            <input id="repassword" type="password" class="col l8 m8 s12 input border round" name="repassword" placeholder="ใส่รหัสผ่านอิกครั้ง">
                                        </div>
                                        <div class="margin-top col s6" style="margin:auto;float:unset">
                                            <button type="button" class="button red margin-top margin-right col s5 round btn-cancel">ยกเลิก</button>
                                            <button type="button" class="button theme-d4 margin-top col s5 round btn-confirm-edit">บันทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){
                // $('.form-edit').removeClass('hide');
                // $('.block').addClass('hide');

                $('.block').on('click','.block-body .btn-edit',function(){
                    $(this).closest('.block').addClass('hide');
                    $('.form-edit').removeClass('hide');
                });
                $('.form-edit').on('click','.btn-cancel',function(){
                    $('.form-edit').addClass('hide');
                    $('.block').removeClass('hide');
                });
                $('.form-edit').on('click','.form-body .btn-confirm-edit',function(){
                    let form_id = '.form-body';
                    let input = ['name','email','phone_number','last_name','card_id','address','mu','province','amphur','district','zipcode'];
                    if (validate(input,form_id)) {
                        // $(this).closest('form').submit();
                        // console.log( $(this).closest('form').serialize());
                        $('form #zipcode').attr('disabled',false);

                        $.each(['#province','#amphur','#district'], function(key, value){
                            $('form '+value).find('option:selected').val($('form '+value).find('option:selected').html());
                        });
                        $.ajax({
                            url: "<?php echo $this->base_url('customer/update_profile') ?>",
                            method: 'POST',
                            data: $(this).closest('form').serialize(),
                            dataType: 'json',
                            success: function(data){
                                switch (data) {
                                    case 'success':
                                        swal({
                                            type: 'success',
                                            title: 'แก้ไขข้อมูลสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        setTimeout(function(){window.location.href = "<?php echo $this->base_url('customer/profile') ?>"},1500);
                                        break;
                                    case 'used':
                                        swal({
                                            type: 'error',
                                            title: 'ไม่สามารถใช้อีเมล์นี้ได้',
                                        }).then((result) => {
                                            $('html, body').animate({scrollTop:($("#email").offset().top - 150)}, 500);
                                            $("#email").focus();
                                        });
                                    return false;
                                        break;
                                    default:

                                }
                            }
                        });
                    }else {
                        $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
                    }
                });



                $.ajax({
                    method: 'POST',
                    url: "<?php echo $this->base_url('payment/list_province') ?>",
                    dataType: 'json',
                    success: function(data){
                        let html = '<option value="<?php echo $province ?>"><?php echo $province ?></option>';
                        if (data[0] == 'success') {
                            $.each(data[1], function(key, value){
                                html += '<option value="'+value.province_id+'">'+value.province_name+'</option>';
                            });
                            $('form #province').html(html);
                        }
                    }
                });
                $('form').on('click','input#self_code',function(){
                    if ($(this).prop('checked') == true) {
                        $(this).closest('form').find('input#zipcode').prop('disabled',false);
                    }else {
                        $(this).closest('form').find('input#zipcode').prop('disabled',true);
                    }
                });
                $('form').on('change','select#province,select#amphur,select#district', function(){
                    let type = $(this).attr('id');
                    let value = $(this).val();
                    switch (type) {
                        case 'district':
                            $('form #zipcode').val($(this).val());
                            break;
                        default:
                        list_province(type,value);

                    }
                });
                function list_province(type,value){
                    $.ajax({
                        method: 'POST',
                        url: "<?php echo $this->base_url('payment/list_province') ?>",
                        data: {type:type,id:value},
                        dataType: 'json',
                        success: function(data){
                            let html = '';
                            if (data[0] == 'success') {
                                let a = true;
                                $.each(data[1], function(key, value){
                                    switch (data[2]) {
                                        case 'amphur':
                                            let amphur = value.amphur_name;
                                            if (amphur.indexOf('*') <= -1) {
                                                amphur = amphur.replace(/\s/g, '');
                                                html += '<option value="'+value.amphur_id+'">'+amphur+'</option>';
                                            }
                                            if (a) {
                                                a = false;
                                                list_province('amphur',value.amphur_id);
                                            }
                                            break;
                                        case 'district':
                                            if (value.zipcode != 0) {
                                                let district = value.district_name
                                                district = district.replace(/\s/g, '');
                                                html += '<option value="'+value.zipcode+'">'+district+'</option>';
                                            }
                                            if (a) {
                                                a = false;
                                                $('form #zipcode').val(value.zipcode);

                                            }
                                            break;
                                        default:

                                    }
                                });
                                $('form #'+data[2]).html(html);
                            }
                        }
                    });
                }
                $('.form-edit').on('focusin focusout keypress keyup','.form-body input[type!=checkbox]', function(){
                    let form_id = 'form';
                    let type = $(this).attr('id');
                    let input_value = $(this).val();
                    let input = [];
                    if (event.keyCode == 39 || event.keyCode == 34) {
                        event.returnValue = false;
                    }
                    // form.closest('.form-control').find('.help-block').remove();
                    switch (type) {
                        case 'phone_number':
                            if (event.keyCode < 48 || event.keyCode > 57){
                                event.returnValue = false;
                            }
                            if ($(this).val().length > 9) {
                                event.returnValue = false;
                            }
                            break;
                        case 'card_id':
                            if (event.keyCode < 48 || event.keyCode > 57){
                                event.returnValue = false;
                            }
                            if ($(this).val().length > 12) {
                                event.returnValue = false;
                            }
                            break;
                        case 'address':
                            var a = 47;
                            if ($(this).val().indexOf('/') > -1) {
                                a = 48;
                            }
                            if (event.keyCode < a || event.keyCode > 57){
                                event.returnValue = false;
                            }
                            break;
                        case 'mu':
                            if (event.keyCode < 48 || event.keyCode > 57 ){
                                event.returnValue = false;
                            }
                            if ($(this).val().length > 1) {
                                event.returnValue = false;
                            }
                            break;
                        case 'zipcode':
                            if (event.keyCode < 48 || event.keyCode > 57 ){
                                event.returnValue = false;
                            }
                            if ($(this).val().length > 4) {
                                event.returnValue = false;
                            }
                            break;
                        default:
                            if (event.keyCode == 39 || event.keyCode == 34 || event.keyCode == 44 || event.keyCode == 61){
                                event.returnValue = false;
                            }

                    }
                    if (type == 'alley' || type == 'road' || type == 'self_code') {
                        type = '';
                    }else {
                        input.push(type);
                        validate(input,form_id);
                    }
                });
                $('.form').on('click','.btn-form-registation',function(){
                    let form_id = 'form';

                    let input = ['name','email','phone_number','last_name','card_id','address','mu','province','amphur','district','zipcode','password','repassword'];
                    if (validate(input,form_id)) {
                        // $(this).closest('form').submit();
                        // console.log( $(this).closest('form').serialize());
                        $('form #zipcode').attr('disabled',false);

                        $.each(['#province','#amphur','#district'], function(key, value){
                            $('form '+value).find('option:selected').val($('form '+value).find('option:selected').html());
                        });
                        $.ajax({
                            url: "<?php echo $this->base_url('login/registation_ajax') ?>",
                            method: 'POST',
                            data: $(this).closest('form').serialize(),
                            dataType: 'json',
                            success: function(data){
                                // console.log(data);
                                switch (data[0]) {
                                    case 'success':
                                    swal({
                                        type: 'success',
                                        title: 'สมัครมาชิกสำเร็จแล้ว',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(function(){window.location.href = "<?php echo $this->base_url() ?>"+data[1]},1500);
                                        break;
                                    case 'used':
                                    swal({
                                        type: 'error',
                                        title: 'ไม่สามารถใช้อีเมล์นี้ได้',
                                    });
                                    return false;
                                        break;
                                    default:

                                }
                            }
                        });
                    }else {
                        $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
                    }
                });
                function validate_input(type,value){
                    switch (type) {
                        case 'email':
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return re.test(String(value).toLowerCase());
                            break;
                        default:

                    }
                }
                function validate(input,form_id,get_value = '') {
                    var error = 0;
                    var txt_error = '';
                    var array = [];
                    $.each(input, function( index, value ) {
                        txt_error = '<span class="help-block left-align">';
                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                        var input_value = $(form_id).find('#'+value).val();
                        if (value == 'province' || value == 'amphur' || value == 'district') {
                            if ($(form_id).find('#'+value).has('option:selected').length != 0) {
                                if ( $(form_id).find('#'+value).find('option:selected').val() != '') {
                                    var input_value = $(form_id).find('#'+value).find('option:selected').html();
                                }else {
                                    input_value = '';
                                }
                            }else {
                                input_value = '';
                            }
                        }
                        if (value == 'alley' || value == 'road' || value == 'self_code') {
                            // input_value = '';
                            if (input_value == '') {
                                inpuit_value = '';
                            }
                        }else {
                            if(input_value == ''){
                                error = 1;
                                txt_error += '<li>กรุณาใส่ข้อมูล</li>';
                                $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                            }
                        }
                            switch(value) {
                                case 'email':
                                    let email = input_value;
                                    if(validate_input('email',email) === false){
                                        error = 1;
                                        txt_error += '<li>กรุณาใส่อีเมล์ให้ถูกต้อง</li>';
                                        txt_error += '</span>';
                                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                        $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                    }
                                    break;
                                case 'phone_number':
                                    if (input_value.length < 10) {
                                        error = 1;
                                        txt_error += '<li>อย่างน้อย 10 ตัว</li>';
                                        txt_error += '</span>';
                                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                        $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                    }
                                    break;
                                case 'card_id':
                                    if (input_value.length < 13) {
                                        error = 1;
                                        txt_error += '<li>กรุณาใส่อย่างน้อย 13 ตัว</li>';
                                        txt_error += '</span>';
                                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                        $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                    }
                                    break;
                                case 'address':
                                    if (input_value.split('/').length > 2) {
                                        error = 1;
                                        txt_error += '<li>กรุณาใส่ข้อมูลให้ถูกต้อง</li>';
                                        txt_error += '</span>';
                                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                        $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                    }
                                    break;
                                    case 'password':
                                        let repassword_value =  $(form_id).find('#repassword').val();
                                        if (input_value != repassword_value) {
                                            error = 1;
                                            txt_error += '<li>รหัสผ่านไม่ตรงกัน</li>';
                                            txt_error += '</span>';
                                            $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                            $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                            $(form_id).find('#repassword').closest('.form-control').find('.help-block').remove();
                                            $(form_id).find('#repassword').closest('.form-control').append(txt_error);
                                        }else {
                                            if (input_value != '') {
                                                $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                                $(form_id).find('#repassword').closest('.form-control').find('.help-block').remove();
                                            }
                                        }
                                        break;
                                    case 'repassword':
                                        let password_value =  $(form_id).find('#password').val();
                                        if (input_value != password_value) {
                                            error = 1;
                                            txt_error += '<li>รหัสผ่านไม่ตรงกัน</li>';
                                            txt_error += '</span>';
                                            $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                            $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                                            $(form_id).find('#password').closest('.form-control').find('.help-block').remove();
                                            $(form_id).find('#password').closest('.form-control').append(txt_error);
                                        }else {
                                            if (input_value != '') {
                                                $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                                                $(form_id).find('#password').closest('.form-control').find('.help-block').remove();
                                            }
                                        }
                                        break;
                                default:
                            }
                        // array.push(input_value+','+value);
                        array.push(input_value);
                    });
                    if(error != 0){
                        return false;
                    }else{
                        if (get_value != '') {
                            return array;
                        }else {
                            return true;
                        }
                    }
                }
                // $('.customer').on('click','.customer-left-nav .button',function(){
                //     $(this).closest('.customer-left-nav').find('.button').removeClass('active');
                //     $(this).addClass('active');
                // });
            });
        </script>
    </body>
</html>
