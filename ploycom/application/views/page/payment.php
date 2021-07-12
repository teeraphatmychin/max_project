<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .form-conclude .group div{
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
            }
        </style>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;background-color:white">
            <div class="hide-small" style="margin-top:115px"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="container">
                    <div class="margin-bottom row">
                        <div class="body-page row">
                            <div class="col card-payment">
                                <form class="" name="payment" action="<?php echo $this->base_url('payment/confirm') ?>" method="post">
                                <div class="round margin-top border border-theme-d1">
                                    <div class="large theme-d1 form-head padding">
                                        <span class="step">1</span>
                                        ที่อยู่ในการจัดส่ง
                                    </div>
                                    <div class="padding form-body margin data-customer">
                                        <?php $checked = 'checked' ?>
                                        <?php if (isset($_SESSION['member']) && !empty($_SESSION['member'])): ?>
                                            <?php $checked = ''; ?>
                                            <div class="form-address-member">
                                                <input id="member" type="radio" name="data-customer" value="member-address" checked>
                                                <input type="hidden" name="name" value="<?php echo $_SESSION['member']->member_name ?>">
                                                <input type="hidden" name="name" value="<?php echo $_SESSION['member']->member_address ?>">
                                                <label for="member"><b><?php echo $_SESSION['member']->member_name ?></b></label>
                                                <div class="col s12 margin-left"><?php echo $_SESSION['member']->member_address ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-address-other">
                                            <div class="form-address-other head">
                                                <input id="other" type="radio" name="data-customer" value="other-address" <?php echo $checked ?>>
                                                <label for="other"><b>ใช้ที่อยู่อื่น</b></label>
                                            </div>
                                            <div class="form-address-other body">
                                                <div class="form-control row margin-bottom">
                                                    <label for="name" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>ชื่อผู้รับ : </label>
                                                    <input id="name" type="text" class="col l8 m8 s12 input border round" name="name"  placeholder="ชื่อผู้รับ" >
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="email" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>อีเมล์ : </label>
                                                    <input id="email" type="text" class="col l8 m8 s12 input border round" name="email"  placeholder="อีเมล์" >
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="phone_number" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>โทรศัพท์มือถือ : </label>
                                                    <input id="phone_number" type="text" class="col l8 m8 s12 input border round" name="phone_number"  placeholder="เบอร์โทร" >
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="card_id" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>เลขประจำตัวประชาชน : </label>
                                                    <input id="card_id" type="text" class="col l8 m8 s12 input border round" name="card_id"  placeholder="เลขประจำตัวประชาชน">
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="address" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>เลขที่ : </label>
                                                    <input id="address" type="text" class="col l8 m8 s12 input border round" name="address"  placeholder="เลขที่">
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="mu" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>หมู่ : </label>
                                                    <input id="mu" type="text" class="col l8 m8 s12 input border round" name="mu"  placeholder="หมู่">
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="alley" class="col l3 m3 s3 right-align margin-right hide-small">ซอย : </label>
                                                    <input id="alley" type="text" class="col l8 m8 s12 input border round" name="alley"  placeholder="ซอย">
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="road" class="col l3 m3 s3 right-align margin-right hide-small">ถนน : </label>
                                                    <input id="road" type="text" class="col l8 m8 s12 input border round" name="road"  placeholder="ถนน">
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="province" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>จังหวัด : </label>
                                                    <select id="province" class="col l8 m8 s12 input border round" name="province"><option value="">กรุณาเลือกจังหวัด</option></select>
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="amphur" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>เขต/อำเภอ : </label>
                                                    <select id="amphur" class="col l8 m8 s12 input border round" name="amphur"></select>
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="district" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>แขวง/ตำบล : </label>
                                                    <select id="district" class="col l8 m8 s12 input border round" name="district"></select>
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <label for="" class="col l3 m3 s3 right-align margin-right hide-small"><span class="text-red">*</span>รหัสไปรษณีย์ : </label>
                                                    <input id="zipcode" type="text" class="col l8 m8 s12 input border round" name="zipcode"  placeholder="รหัสไปรษณีย์" disabled>
                                                </div>
                                                <div class="form-control row margin-bottom">
                                                    <div class="right-align col l3 m3 s1 margin-right">
                                                        <input id="self_code" type="checkbox" class="radio" name="" value="" >
                                                    </div>
                                                    <label for="self_code" class="col l8 m8 s9 left-align margin-right text-red">*ต้องการเพิ่มรหัสไปรษณีย์เอง </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer margin row">
                                            <div class="col l3 m3 s12 right button green medium round">ดำเนินการ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="round margin-top border border-theme-d1 testest">
                                    <div class="large theme-d1 form-head padding">
                                        <span class="step">2</span>
                                        รูปแบบการจัดส่ง
                                    </div>
                                    <div class="form-body margin-top hide method-of-shipping">
                                        <div class="form-control row margin-bottom border-bottom padding-24">
                                            <div class="col l2 m2 s2 right-align margin-right">
                                                <input id="get_send" type="radio" class="radio" name="method_of_shipping" value="shipping" >
                                            </div>
                                            <label for="get_send" class="col l8 m8 s8" style="text-align:left">ขนส่งโดยบริษัทขนส่ง</label>
                                        </div>
                                        <div class="form-control row margin-bottom border-bottom padding-24">
                                            <div class="col l2 m2 s2 right-align margin-right">
                                                <input id="get_self" type="radio" class="radio" name="method_of_shipping" value="self" >
                                            </div>
                                            <label for="get_self" class="col l8 m8 s8 " style="text-align:left">รับสินค้าที่ร้านพลอยคอม พิษณุโลก</label>
                                        </div>
                                        <div class="form-footer  margin row">
                                            <div class="col l3 m3 s12 right button green medium round">ดำเนินการ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="round margin-top border border-theme-d1 ">
                                    <div class="large theme-d1 form-head padding">
                                        <span class="step">3</span>
                                        วิธีการชำระเงิน
                                    </div>
                                    <div class="form-body method-of-payment hide">
                                        <div class="form-control row border-bottom padding-16">
                                            <label class="main-radio">
                                                <div class="col l1 m1 s1 right-align margin-right">
                                                    <input type="radio" class="radio" name="method_of_payment" value="Internet Banking">
                                                </div>
                                                <span>โอนผ่าน Internet Banking</span>
                                            </label>
                                            <div class="bank col s12 padding hide" style="margin-left:6%">

                                            </div>
                                        </div>
                                        <div class="form-control row border-bottom padding-16">
                                            <label class="main-radio">
                                                <div class="col l1 m1 s1 right-align margin-right">
                                                    <input type="radio" class="radio" name="method_of_payment" value="ATM" >
                                                </div>
                                                <span>โอผ่านธนาคาร / ATM</span>
                                            </label>
                                            <div class="bank col s12 padding hide" style="margin-left:6%">

                                            </div>
                                        </div>
                                        <div class="form-footer  margin row">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col card-payment right">
                                <div class="border margin-top round">
                                    <div class="bg-wraning center large padding text-white" >
                                        สรุปการสั่งซื้อ
                                    </div>
                                    <div class="form-conclude padding ">
                                        <div class="center border-bottom large">
                                            ท่านมีสินค้า <span class="amount-cart"></span> ชิ้น
                                        </div>
                                        <div class="customer">
                                            <b>ข้อมูลลูกค้า</b>
                                            <div class="border-bottom padding">
                                                <div class="group row">
                                                    <div class="col s6">รหัสสมาชิก :</div>
                                                    <div class="col s6 customer-id"></div>
                                                </div>
                                                <div class="group row">
                                                    <div class="col s6">อีเมล์ :</div>
                                                    <div class="col s6 customer-email"></div>
                                                </div>
                                                <div class="group row">
                                                    <div class="col s6">ชื่อ - นามสกุล :</div>
                                                    <div class="col s6 customer-name"></div>
                                                </div>
                                                <div class="group row">
                                                    <div class="col s6">เบอร์โทรศัพท์ :</div>
                                                    <div class="col s6 customer-phone"></div>
                                                </div>
                                                <div class="group row">
                                                    <div class="col s6">หมายเลขบัตรประชาชน :</div>
                                                    <div class="col s6 customer-card-id"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shipping-detail">
                                            <b>รายละเอียดการจัดส่ง</b>
                                            <div class="border-bottom padding">
                                                <div class="group row">
                                                    <div class="col s5">ชื่อที่อยู่ผู้รับ :</div>
                                                    <div class="col s7 shipping-name"></div>
                                                </div>
                                                <div class="grou row">
                                                    <div class="col s5">ที่อยู่ในการจัดส่ง :</div>
                                                    <div class="col s7 shipping-address"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <b>รายการสินค้า</b>
                                            <div class="border-bottom padding">
                                                <table  class="table" style="margin-bottom:0">
                                                    <thead>
                                                        <tr class="border-bottom">
                                                            <td width="40%">สินค้า</td>
                                                            <td width="25%">จำนวน</td>
                                                            <td width="25%" align="right">ราคา</td>
                                                            <td width="10%"></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                        </tr>
                                                   </tbody>
                                               </table>
                                            </div>
                                        </div>
                                        <div class="shipping padding border-bottom ">
                                            <div class="thead row">
                                                <div class="col s8"><b>รูปแบบการจัดส่ง</b></div>
                                            </div>
                                            <div class="tbody row">
                                                <div class="col s8"></div>
                                            </div>
                                        </div>
                                        <div class="payment padding border-bottom">
                                            <div class="thead row">
                                                <div class="col s12"><b>วิธีการชำระเงิน</b></div>
                                                <div class="col s8 medium method-of-payment"></div>
                                                <div class="col s4 bank-name"></div>
                                            </div>
                                        </div>
                                        <div class="total padding border-bottom">
                                            <div class="thead row">
                                                <div class="col s8"><b>ยอดสุทธิ</b></div>
                                                <div class="col s4 right-align medium"></div>
                                            </div>
                                        </div>
                                        <div class="padding large row center">
                                            <div class="btn-confirm-pay button green round disabled"><i class="fa fa-money"></i> ชำระเงิน</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            amount_cart();
            cart_list();
            bank_list();

            $('input[type=radio][name!=data-customer]').prop('checked',false);

            if ($('.data-customer .form-address-other').find('input[type=radio][name=data-customer]').prop('checked') == false) {
                $('.data-customer .form-address-other.body').hide();
            }
            $('.data-customer').on('click','input[type=radio][name=data-customer]',function(){
                if ($(this).prop('checked') == true) {
                    let id = $(this).attr('id');
                    $('.data-customer .form-address-other.body').hide();
                    if (id == 'other') {
                        $('.data-customer .form-address-other.body').show();
                    }
                }
            });

            $.ajax({
                method: 'POST',
                url: "<?php echo $this->base_url('payment/list_province') ?>",
                dataType: 'json',
                success: function(data){
                    let html = '<option value="">กรุณาเลือกจังหวัด</option>';
                    if (data[0] == 'success') {
                        $.each(data[1], function(key, value){
                            html += '<option value="'+value.province_id+'">'+value.province_name+'</option>';
                        });
                        $('.data-customer #province').html(html);
                    }
                }
            });

            $('.data-customer').on('change','select#province,select#amphur,select#district', function(){
                let type = $(this).attr('id');
                let value = $(this).val();
                switch (type) {
                    case 'district':
                        $('.data-customer #zipcode').val($(this).val());
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
                                            $('.data-customer #zipcode').val(value.zipcode);

                                        }
                                        break;
                                    default:

                                }
                            });
                            $('.data-customer #'+data[2]).html(html);
                        }
                    }
                });
            }

            $('.form-head').click(function(){
                if ($(this).next().hasClass('pass')) {
                    let form = $(this).next();
                    $('.form-body').addClass('hide');
                    if (form.hasClass('data-customer')) {
                        $('.method-of-payment,.method-of-shipping').addClass('hide');
                        $('.method-of-payment,.method-of-shipping').removeClass('pass');
                    }else if (form.hasClass('method-of-payment')) {
                        $('.method-of-shipping').addClass('hide');
                        $('.method-of-shipping').removeClass('pass');
                    }
                    $(this).next().removeClass('hide pass');
                    $('.form-conclude .btn-confirm-pay').addClass('disabled');
                    $(this).find('.form-body input[type=radio]').prop('checked',false);
                    $(this).closest('.card-payment').find('.bank').addClass('hide');
                }
            });
            $('.data-customer').on('click','input#self_code',function(){
                if ($(this).prop('checked') == true) {
                    $(this).closest('.data-customer').find('input#zipcode').prop('disabled',false);
                }else {
                    $(this).closest('.data-customer').find('input#zipcode').prop('disabled',true);
                }
            });

            $('.data-customer').on('focusout blur keyup keypress','input',function(){
                let value = $(this).val();
                let form = $(this).closest('.data-customer');
                let type = $(this).attr('id');
                let input = [];
                form.closest('.form-control').find('.help-block').remove();
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
                    validate(input,form);
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

            $('.data-customer').on('click','.button',function(){
                let type_id = $('.data-customer').find('input[type=radio][name=data-customer]:checked').attr('id');
                switch (type_id) {
                    case 'other':
                        let data_cus = $(this).closest('.data-customer');
                        let data = validate(['name','email','phone_number','card_id','address','mu','alley','road','province','amphur','district','zipcode'],data_cus,1);
                        if (data) {
                            data_cus.addClass('hide pass');
                            $('.method-of-shipping').removeClass('hide');
                            $('.method-of-shipping input[type=radio]').prop('checked',false);
                            $('html, body').animate({scrollTop:($(".method-of-shipping").offset().top - 150)}, 500);
                            let customer = [];
                            let index = ['name','email','phone_number','card_id','address','mu','alley','road','province','amphur','district','zipcode'];
                            let i = '';
                            $.each(data, function(key, value){
                                i = index[key];
                                if (value == '') {
                                    value = '-';
                                }
                                customer[i] = value;
                            });
                            let form_customer = $('.form-conclude').find('.customer');
                            form_customer.find('.customer-email').html(customer.email);
                            form_customer.find('.customer-name').html(customer.name);
                            form_customer.find('.customer-phone').html(customer.phone_number);
                            form_customer.find('.customer-card-id').html(customer.card_id);
                            let form_shipping_detail = $('.form-conclude').find('.shipping-detail');
                            form_shipping_detail.find('.shipping-name').html(customer.name);
                            form_shipping_detail.find('.shipping-address').html(customer.address+' หมู่'+customer.mu+' ซ.'+customer.alley+' ถ.'+customer.road+' จ.'+customer.province+' อ.'+customer.amphur+' ต.'+customer.district+' '+customer.zipcode);

                        }else {
                            $('html, body').animate({scrollTop:($(".help-block").offset().top - 150)}, 500);
                        }
                        break;
                    case 'member':
                        <?php $member = isset($_SESSION['member']) && !empty($_SESSION['member'])? $_SESSION['member']:null; ?>
                        let member = <?php echo json_encode($member) ?>;
                        if (member != '') {
                            $(this).closest('.data-customer').addClass('hide pass');
                            $('.method-of-shipping').removeClass('hide');
                            $('.method-of-shipping input[type=radio]').prop('checked',false);
                            $('html, body').animate({scrollTop:($(".method-of-shipping").offset().top - 150)}, 500);
                            let form_customer = $('.form-conclude').find('.customer');
                            let member_id = '';
                            for (var i =  member.member_id.length; i < 6; i++) {
                                member_id += '0';
                            }
                            member.member_id = member_id + member.member_id;
                            form_customer.find('.customer-id').html(member.member_id);
                            form_customer.find('.customer-email').html(member.member_email);
                            form_customer.find('.customer-name').html(member.member_name);
                            form_customer.find('.customer-phone').html(member.member_phone);
                            form_customer.find('.customer-card-id').html(member.member_card_id);
                            let form_shipping_detail = $('.form-conclude').find('.shipping-detail');
                            form_shipping_detail.find('.shipping-name').html(member.member_name);
                            form_shipping_detail.find('.shipping-address').html(member.member_address);
                        }else {
                            swal({
                                type: 'warnning',
                                title: 'คุณยังไมไ่ด้ทำการเข้าสู่ระบบ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                        break;

                    default:

                }


            });
            $('.method-of-shipping').on('click', '.button', function(){
                let form = $(this).closest('.method-of-shipping');
                let check1 = form.find('input#get_send');
                let check2 = form.find('input#get_self');

                if (check1.prop('checked') == false && check2.prop('checked') == false) {
                    swal({
                        type: 'warning',
                        title: 'กรุณาเลือกรูปแบบการจัดส่ง'
                    });
                }else {
                    let form_shipping = $('.form-conclude').find('.shipping');
                    form_shipping.find('.tbody').find('div:first-child').html(form.find('input:checked').closest('.form-control').find('label').html());
                    form.addClass('hide pass');
                    $('.method-of-payment').removeClass('hide');
                    $('.method-of-payment').find('input[type=radio]').prop('checked',false);
                }

            });
            $('.method-of-payment').on('click', '.form-control label', function(){
                if ($(this).hasClass('main-radio')) {
                    $('.method-of-payment').removeClass('pass');
                    $('.form-conclude .btn-confirm-pay').addClass('disabled');
                    $('.form-conclude .payment .bank-name').html('');
                    $(this).closest('.method-of-payment').find('.form-control label div input[type=radio]').prop('checked',false);
                    $(this).find('div input[type=radio]').prop('checked',true);
                    $(this).closest('.method-of-payment').find('.form-control .bank').addClass('hide');
                    $(this).closest('.form-control').find('.bank').removeClass('hide');
                    $(this).closest('.form-body').find('.bank input').prop('checked',false);
                    let method = $(this).closest('.form-body').find('input:checked').closest('.form-control').find('label span').html();
                    $('.form-conclude .payment .method-of-payment').html(method);
                }else if($(this).hasClass('sub-radio')){
                    $('.method-of-payment').addClass('pass');
                    $(this).closest('.form-body').find('.bank input').prop('checked',false);
                    $(this).find('div input[type=radio]').prop('checked',true);
                    let bank = $(this).find('span').html();
                    $('.form-conclude .payment .bank-name').html(bank);
                    $('html, body').animate({scrollTop:($('.form-conclude .btn-confirm-pay').offset().top - 150)}, 500);
                    $('.form-conclude .btn-confirm-pay').removeClass('disabled');
                }
            });
            $('.btn-confirm-pay').click(function(){
                if ($(this).hasClass('disabled') == false && validate_form()) {
                    // let type_id = $('.data-customer').find('input[type=radio][name=data-customer]:checked').attr('id');
                    // switch (type_id) {
                    //     case 'other':
                    //         $('.data-customer #zipcode').attr('disabled',false);
                    //         $.each(['#province','#amphur','#district'], function(key, value){
                    //             $('.data-customer '+value).find('option:selected').val($('.data-customer '+value).find('option:selected').html());
                    //         });
                    //         $('form[name=payment]').submit();
                    //         break;
                    //     case 'member':
                    //         $('form[name=payment]').submit();
                    //         break;
                    //     default:
                    // }
                    $('.data-customer #zipcode').attr('disabled',false);
                    $.each(['#province','#amphur','#district'], function(key, value){
                        $('.data-customer '+value).find('option:selected').val($('.data-customer '+value).find('option:selected').html());
                    });
                    $('form[name=payment]').submit();
                }else {
                    swal({
                        type: 'error',
                        title: 'กรุณาใส่ข้อมูลให้ครบถ้วน',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('html, body').animate({scrollTop:0}, 500);
                }
            });

            $('.product').on('click','div table .remove',function(){
                let id = $(this).attr('data');
                let act = 'remove';
                $.ajax({
                    method: 'POST',
                    data:{act:act,product_id:id},
                    url: "<?php echo $this->base_url('cart/control')?>",
                    success: function(){
                        cart_list();
                        amount_cart();
                    }
                });

            });
            function validate_form(){
                let a = true;
                $.each(['.data-customer','.method-of-shipping','.method-of-payment'],function(key, value){
                    if ($(value).hasClass('pass') == false) {
                        a = false;
                    }
                });
                return a;
            }
            function cart_list(){
                $.ajax({
                    url: "<?php echo $this->base_url().'cart/cart_list';?>",
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        let total = '';
                        if (data[0] != 'false') {
                            total = data[1];
                            $.each(data[0], function(key, value){
                                html += '<tr>';
                                html += '<td>'+value.product_name+'</td>';
                                html += '<td class="center">'+value.amount+'</td>';
                                html += '<td align="right">'+value.sum+'</td>';
                                html += '<td align="center" width="35px">';
                                    html += '<span style="cursor:pointer"  class="fa fa-trash remove" data="'+value.product_id+'"></span>';
                                html += '</td>';
                                html += '</tr>';
                            });
                            $('.product div table tbody').html(html);
                            $('.total .thead div').next().html(total);
                        }else {
                            window.location.replace("<?php echo $this->base_url('cart') ?>");
                        }

                    }
                });
            }
            function bank_list() {
                $.ajax({
                    url: '<?php echo $this->base_url('payment/bank_list') ?>',
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        let html = '';
                        if (data[1] != 'false') {
                            $.each(data[1],function(key,value){
                                html += '<div class="col l6 m6 s12">';
                                html += '<label class="sub-radio">';
                                html += '<div class="col s2 right-align margin-right">';
                                html += '<input type="radio" class="radio" name="bank_name" value="'+value.bank_name_en+'">';
                                html += '</div>';
                                html += '<div class="col s1 margin-right">';
                                html += '<img src="<?php echo $this->public_url('file/images/system/bank/') ?>'+value.bank_img+'" class="col s12" style="" alt="">';
                                html += '</div>';
                                html += '<span>'+value.bank_initials+'</span>';
                                html += '</label>';
                                html += '</div>';
                            });
                            $('.method-of-payment .bank').html(html);
                        }
                    }
                });
            }
            function amount_cart(){
                $.ajax({
                    url: "<?php echo $this->base_url('cart/amount_cart') ?>",
                    success: function(data){
                        if (data == 0) {
                            window.location.replace("<?php echo $this->base_url('cart') ?>");
                        }else {
                            $('span.amount-cart').html(data);
                            $('.link-cart .amount-cart').html(data);
                        }
                    }
                });
            }
        </script>
    </body>
</html>
