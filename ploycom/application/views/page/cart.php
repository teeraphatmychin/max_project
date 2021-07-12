<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Cart</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .update-cart .button.minus,.update-cart .button.plus{
                padding-top: 5.12%;
                padding-bottom: 5.12%;
                padding-right: 12%;
                padding-left: 7%;
            }

            .border-bottom{
                border-bottom: 1px dashed #ccc !important;
            }
            .update-cart input{
                padding:10.93%;
            }
            .update-cart .cart-body{
                padding-top: 3.299%;
            }
            .btn-pay{
                background-color:#fa4828;
                padding-left: 100px;
                padding-right: 100px;
            }
            /* .update-cart div.col {
                padding-top: 3.299%;
            }
            .update-cart div.col:first-child,.update-cart div.col.amount {
                padding-top: 0px;
            } */
        </style>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;background-color:white">
        <?php //$this->view('partail/left_nav') ?>
            <div class="hide-small" style="margin-top:150px"></div>
            <!-- !PAGE CONTENT! -->
            <div class="main" style="">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
                    <!-- <div class="border-bottom xxlarge border-blue" style="border-bottom: 2px solid blue !important"> -->
                    <div class="xxlarge head-page border-theme">
                        <strong><i class="fa fa-shopping-cart xxxlarge"></i> ท่านมีสินค้าในตะกร้า <span class="amount-cart"></span> ชิ้น</strong>
                    </div>
                    <div class="cart margin-bottom padding-24"></div>
                    <div class="conclude xxlarge right-align"></div>
                    <div class="col s12 right-align large footer-cart">
                        <a href="<?php echo $this->base_url('product') ?>" class="button margin-right round theme-d5 padding-16">เลือกสินค้าต่อ</a>
                        <!-- <a href="<?php //echo $this->base_url('payment') ?>" class="button margin-right round text-white padding-16 btn-pay">ชำระเงิน</a> -->
                        <a class="button margin-right round text-white padding-16 btn-pay">ชำระเงิน</a>
                    </div>
                    <div class="row col m6 s12 border round btn-how-pay center hide" style="margin:auto;float:unset;position:relative;padding:50px">
                        <div class="col s12 ">สั่งซื้อสินค้าโดย</div>
                        <div class="col s12 border-top">
                            <button  class="button green margin round" target="form-login">เข้าสู่ระบบ</button>
                        </div>
                        <div class="col s12 border-top">
                            <form class="" action="<?php echo $this->base_url('login/registation') ?>" method="post">
                                <input type="hidden" name="url_form_cart" value="payment">
                                <button type="submit" class="button theme-d3 margin round">สมัครสมาชิก</button>
                            </form>
                            <!-- <button  class="button theme-d3 margin round" target="form-regis">สมัครสมาชิก</button> -->
                        </div>
                        <div class="col s12 border-top">
                            <a href="<?php echo $this->base_url('payment') ?>" class="button theme-d5 margin round">สั่งซื้อทันที</a>
                        </div>
                    </div>
                    <div class="row col l6 m8 s12 round form-how-pay border hide" style="margin:auto;float:unset">
                        <div class="row container margin-bottom login hide" id="form-login">
                            <div class="xxlarge head-page border-theme">
                                <h2>เข้าสู่ระบบ</h2>
                            </div>
                            <div class="form col l6 m5 s12 row" style="margin:auto;float:unset">
                                <div class="form-body col s12" style="margin:auto;float:unset">
                                    <form name="form-login" method="post">
                                        <div class="form-control row">
                                            <label for="">Username</label>
                                            <input id="email-login" type="text" name="Username" class="input border round col s12" >
                                        </div>
                                        <div class="form-control row">
                                            <label for="">Password</label>
                                            <input id="password-login" type="password" name="Password" class="input border round col s12" >
                                        </div>
                                        <div class="row">
                                            <a href="<?php echo $this->base_url('login/forget') ?>" class="col s6 left left-align margin-top text-grey">
                                                ลืมรหัสผ่าน?
                                            </a>
                                            <a href="<?php echo $this->base_url('login/registation') ?>" class="col s6 right right-align margin-top text-grey">
                                                สมัครสมาชิก
                                            </a>
                                            <button type="button" class="button theme col s12 round btn-login">เข้าสู่ระบบ</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col s12">
                                    <div class="button left red round btn-forward"><i class="fa fa-angle-left"></i>&nbsp;ย้อนกลับ</div>
                                </div>
                            </div>
                        </div>
                        <div class="row container margin-bottom hide" id="form-regis">
                            <div class="xxlarge head-page border-theme">
                                <h2>สมัครสมาชิก</h2>
                            </div>
                            <div class="form col l11 m11 s12 row" style="margin:auto;float:unset">
                                <div class="form-body col s12" style="margin:auto;float:unset">
                                    <form name="form-registation" method="post">
                                        <div class="form-control row margin-bottom margin-top">
                                            <label for="email" class="col l3 m3 s12 margin-right ">อีเมล์ : </label>
                                            <input id="email" type="text" class="col l8 m8 s12 input border round" name="email" >
                                            <!-- <input id="email" type="text" class="col l8 m8 s12 input border round" name="email" value="maxsrisupan@gmail.com"> -->
                                        </div>
                                        <div class="form-control row margin-bottom ">
                                            <label for="name" class="col l3 m3 s12 margin-right ">ชื่อ : </label>
                                            <input id="name" type="text" class="col l8 m8 s12 input border round" name="name" >
                                            <!-- <input id="name" type="text" class="col l8 m8 s12 input border round" name="name" value="สุชาครีย์"> -->
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="last_name" class="col l3 m3 s12 margin-right ">นามสกุล : </label>
                                            <input id="last_name" type="text" class="col l8 m8 s12 input border round" name="last_name"  >
                                            <!-- <input id="last_name" type="text" class="col l8 m8 s12 input border round" name="last_name"  value="ศรีสุพรรณ"> -->
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="phone_number" class="col l3 m3 s12 margin-right ">โทรศัพท์มือถือ : </label>
                                            <input id="phone_number" type="text" class="col l8 m8 s12 input border round" name="phone_number" >
                                            <!-- <input id="phone_number" type="text" class="col l8 m8 s12 input border round" name="phone_number" value="0998277294"> -->
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="password" class="col l3 m3 s12 margin-right ">รหัสผ่าน : </label>
                                            <input id="password" type="password" class="col l8 m8 s12 input border round" name="password"  >
                                            <!-- <input id="password" type="password" class="col l8 m8 s12 input border round" name="password" value="61129118" > -->
                                        </div>
                                        <div class="form-control row margin-bottom">
                                            <label for="repassword" class="col l3 m3 s12 margin-right ">ใส่รหัสผ่านอีกครั้ง : </label>
                                            <input id="repassword" type="password" class="col l8 m8 s12 input border round" name="repassword" >
                                            <!-- <input id="repassword" type="password" class="col l8 m8 s12 input border round" name="repassword" value="61129118" > -->
                                        </div>
                                        <div class="margin-top col s6" style="margin:auto;float:unset">
                                            <button type="button" class="button theme margin-top col s12 round btn-form-registation">สมัครสมาชิก</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col s12">
                                    <div class="button left red round btn-forward"><i class="fa fa-angle-left"></i>&nbsp;ย้อนกลับ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->view('partail/footer') ?>
            </div>
        </div>


        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){

                amount_cart();
                cart_list();

                $('.btn-pay').click(function(){
                    let member = "<?php echo $member = isset($_SESSION['member']) && !empty($_SESSION['member'])? count((array)$_SESSION['member']) : 0; ?>";
                    $.ajax({
                        url: "<?php echo $this->base_url('cart/amount_cart') ?>",
                        dataType: 'json',
                        success: function(data){
                            if (data == 0) {
                                return false;
                            }else if (data != 0) {
                                if (member <= 0) {
                                    $('.footer-cart').addClass('hide');
                                    $('.btn-how-pay').removeClass('hide');
                                }else {
                                    window.location.href = "<?php echo $this->base_url('payment') ?>";
                                }
                            }
                        }
                    });
                });
                $('.cart').on('click','.update-cart .remove',function(){
                    let id = $(this).closest('.update-cart').attr('data');
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
                $('.cart').on('click','.update-cart .minus,.update-cart .plus',function(){
                    let json = [];
                    json.value = $(this).closest('.update-cart').find('.amount input').val();
                    json.id = $(this).closest('.update-cart').attr('data');
                    json.act = 'update';
                    if ($(this).hasClass('plus')) {
                        json.value++;
                    }else if($(this).hasClass('minus')){
                        json.value--;
                    }
                    if (json.value < 1) {
                        return false;
                    }
                    // if (json.value > 5) {
                    //     swal({
                    //         title: 'คุณสามารถสั่งซื้อสินค้าได้ไม่เกิน 5 ชิ้น',
                    //         type: 'warning'
                    //     }).then((result)=>{
                    //         cart_list();
                    //     })
                    //     return false;
                    // }
                    ajax_cart_control(json);
                });

                $('.cart').on('keypress keyup','.update-cart input',function(e){
                    let json = [];
                    if (event.keyCode < 48 || event.keyCode > 57){
                        event.returnValue = false;
                    }
                    if(e.keyCode == 13)
                    {
                        json.value = $(this).val();
                        if (json.value < 1 || json.value == '') {
                            swal({
                                type: 'warning',
                                title: 'ต้องมีสินค้าอย่างน้อย 1 ชิ้น'
                            }).then((result)=>{
                                cart_list();
                            });
                            return false;
                        }
                        // if (json.value > 5) {
                        //     swal({
                        //         title: 'คุณสามารถสั่งซื้อสินค้าได้ไม่เกิน 5 ชิ้น',
                        //         type: 'warning'
                        //     }).then((result)=>{
                        //         cart_list();
                        //     })
                        //     return false;
                        // }
                        json.id = $(this).closest('.update-cart').attr('data');
                        json.act = 'update';
                        if (isNaN(json.value)) {
                            swal({
                                title: 'กรุณากรอกเฉพาะตัวเลขเท่านั้น',
                                type: 'warning',
                            }).then((result)=>{
                                cart_list();
                            });
                        }else {
                            ajax_cart_control(json);
                            cart_list();
                        }
                        // console.log('id',id);
                    }
                    $(this).focusout(function(){
                        json.value = $(this).val();
                        if (json.value < 1 || json.value == '') {
                            swal({
                                type: 'warning',
                                title: 'ต้องมีสินค้าอย่างน้อย 1 ชิ้น'
                            }).then((result)=>{
                                cart_list();
                            });
                            return false;
                        }
                        // if (json.value > 5) {
                        //     swal({
                        //         title: 'คุณสามารถสั่งซื้อสินค้าได้ไม่เกิน 5 ชิ้น',
                        //         type: 'warning'
                        //     }).then((result)=>{
                        //         cart_list();
                        //     })
                        //     return false;
                        // }
                        json.id = $(this).closest('.update-cart').attr('data');
                        json.act = 'update';
                        if (isNaN(json.value)) {
                            swal({
                                title: 'กรุณากรอกเฉพาะตัวเลขเท่านั้น',
                                type: 'warning',
                            }).then((result)=>{
                                cart_list();
                            });
                        }else {
                            ajax_cart_control(json);
                            cart_list();
                        }
                    });
                });

                function ajax_cart_control(json){
                    $.ajax({
                        method: 'POST',
                        data:{act:json.act,product_id:json.id,amount:json.value},
                        url: "<?php echo $this->base_url('cart/control')?>",
                        dataType: 'json',
                        success: function(data){
                            if (data[0] == 'false') {
                                swal({
                                    type:'warning',
                                    title: data[1]
                                });
                            }else {
                                cart_list();
                                amount_cart();
                            }
                        }
                    });
                }


                $('.btn-how-pay').on('click','button',function(){
                    let target = $(this).attr('target');
                    $(this).closest('.btn-how-pay').addClass('hide');
                    $('.form-how-pay').removeClass('hide');
                    $('.form-how-pay').find('#'+target).removeClass('hide');
                });
                $('.form-how-pay').on('click','.btn-forward',function(){
                    $('.form-how-pay #form-login').addClass('hide');
                    $('.form-how-pay #form-regis').addClass('hide');
                    $('.btn-how-pay').removeClass('hide');

                });
                $('form[name=form-registation]').on('focusin focusout keypress keyup','input', function(){
                    let form_id = 'form[name='+$(this).closest('form').attr('name')+']';
                    let type = $(this).attr('id');
                    let input_value = $(this).val();
                    let input = [];
                    if (event.keyCode == 39 || event.keyCode == 34) {
                        event.returnValue = false;
                    }
                    switch (type) {
                        case 'phone_number':
                            if (input_value.length > 9) {
                                event.returnValue = false;
                            }
                            break;
                        default:
                    }
                    input.push(type);
                    validate(input,form_id);
                });
                $('form[name=form-login]').on('focusin focusout keypress keyup','input', function(){
                    let form_id = 'form[name='+$(this).closest('form').attr('name')+']';
                    let type = $(this).attr('id');
                    let input_value = $(this).val();
                    let input = [];
                    if (event.keyCode == 39 || event.keyCode == 34) {
                        event.returnValue = false;
                    }
                    switch (type) {
                        case 'phone_number':
                            if (input_value.length > 9) {
                                event.returnValue = false;
                            }
                            break;
                        default:
                    }
                    input.push(type);
                    validate(input,form_id);
                });
                $('.btn-login').click(function(){
                    let form_id = 'form[name='+$(this).closest('form[name=form-login]').attr('name')+']';
                    let form = $(this).closest('form[name=form-login]');
                    if (validate(['email-login','password-login'],form_id)) {
                        let user = form.find('input[name=Username]').val();
                        let pass = form.find('input[name=Password]').val();
                        $.ajax({
                            method: 'post',
                            url: "<?php echo $this->base_url('login/check_login') ?>",
                            data: {email:user,password:pass},
                            dataType:'json',
                            success: function(data){
                                if (data == "success") {
                                    window.location.href = "<?php echo $this->base_url('payment') ?>";
                                }else {
                                    swal({
                                        title: 'กรุณากรอก Username/Password ให้ถูกต้อง',
                                        type: 'warning'
                                    });
                                }
                            }

                        });
                    }
                });
                $('.form').on('click','.btn-form-registation',function(){
                    let form_id = 'form';
                    let input = ['email','name','last_name','phone_number','password','repassword'];
                    if (validate(input,form_id)) {
                        $.ajax({
                            url: "<?php echo $this->base_url('login/registation_ajax') ?>",
                            method: 'POST',
                            data: $(this).closest('form').serialize(),
                            dataType: 'json',
                            success: function(data){
                                switch (data) {
                                    case 'success':
                                        swal({
                                            type: 'success',
                                            title: 'สมัครมาชิกสำเร็จแล้ว',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        setTimeout(function(){window.location.href = "<?php echo $this->base_url('payment') ?>"},1500);
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
                    }else{
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
                function validate(input,form_id) {
                    var error = 0;
                    var txt_error = '';
                    $.each(input, function( index, value ) {
                        txt_error = '<span class="help-block left-align">';
                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                        var input_value = $(form_id).find('#'+value).val();
                        if(input_value == ''){
                            error = 1;
                            txt_error += '<li>กรุณาใส่ข้อมูล</li>';
                            $(form_id).find('#'+value).closest('.form-control').append(txt_error);
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
                            case 'email-login':
                                // let email = input_value;
                                if(validate_input('email',input_value) === false){
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
                    });
                    if(error != 0){return false;}else{return true;}
                }


                function cart_list(){
                    $.ajax({
                        url: "<?php echo $this->base_url().'cart/cart_list';?>",
                        dataType: 'json',
                        success: function(data) {
                            let html = '';
                            let total = '';
                            if (data[0] != 'false') {
                                total = 'ยอดรวมสุทธิ '+data[1]+ ' บาท';
                                $.each(data[0], function(key, value){
                                    html += '<div class="border-bottom row-padding update-cart margin-bottom" data="'+value.product_id+'" style="padding-bottom:20px">';
                                    html += '<div class="col l2 m2 s6 ">';
                                    html += '<h2><img src="<?php echo $this->public_url() ?>file/images/products/'+value.product_image+'" style="width:70%"></h2>';
                                    html += '</div>';
                                    html += '<div class="col l3 m2 s6 hide-medium hide-large margin-top"><b>'+value.product_name+'</b></div>';
                                    html += '<div class="col l10 m10 s12 cart-body">';
                                    html += '<div class="col l3 m3 s6 hide-small"><b>'+value.product_name+'</b></div>';
                                    html += '<div class="col l2 m2 s12 left">';
                                    html += '<div class="col l12 m12 s4 hide-large hide-medium left">ราคาต่อหน่วย</div>';
                                    html += '<div class="col l12 m12 s3 left hide-large hide-medium">'+value.product_price+' .-</div>';
                                    html += '<div class="col l12 m12 s3 center hide-small">'+value.product_price+' .-</div>';
                                    html += '</div>';
                                    html += '<div class="col s12 hide-large hide-medium">&nbsp;</div>';
                                    html += '<div class="col l3 m3 s12">';
                                    html += '<div class="col l12 m12 s4 left  hide-large hide-medium">จำนวน</div>';
                                    html += '<div class="col l12 m12 s7">';
                                    html += '<button class="button theme col l1 m1 s1 minus" style="border-radius: 5px 0px 0px 5px;"><i class="fa fa-minus"></i></button>';
                                    html += '<div class="col l5 m5 s5 amount"><input type="text" class="input border" value="'+value.amount+'"></div>';
                                    html += '<button class="button theme col l1 m1 s1 plus" style="border-radius: 0 5px 5px 0;"><i class="fa fa-plus"></i></button>';
                                    html += '</div>';
                                    html += '<div class="col l2 m1 s1 center hide-medium hide-large">';
                                    html += '<button class="button xlarge hover-text-theme remove"><i class="fa fa-trash"></i></button>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '<div class="col l2 m2 s12">';
                                    html += '<div class="col l12 m12 s4 left hide-large hide-medium">มูลค่าสินค้า</div>';
                                    html += '<div class="col l12 m12 s8 left hide-large hide-medium">'+value.sum+' .-</div>';
                                    html += '<div class="col l12 m12 s4 center hide-small">'+value.sum+' .-</div>';
                                    html += '</div>';
                                    html += '<div class="col l2 m1 s1 center hide-small">';
                                    html += '<button class="button xlarge hover-text-theme remove"><i class="fa fa-trash"></i></button>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                });
                            }else {
                                data[2] = 0;
                                html = '<div class="xlarge text-grey center border-bottom">'+data[1]+'</div>';
                            }

                            $('.cart').html(html);
                            $('.conclude').html(total);
                            $('span.amount-cart').html(data[2]);

                        }
                    });
                }
                function amount_cart(){
                    $.ajax({
                        url: "<?php echo $this->base_url('cart/amount_cart') ?>",
                        success: function(data){
                            $('.link-cart .amount-cart').html('');
                            $('.link-cart .amount-cart').html(data);
                        }
                    });
                }
            });
        </script>
    </body>
</html>
