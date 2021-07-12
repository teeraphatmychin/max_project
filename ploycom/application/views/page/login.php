<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>PLOYCOM</title>
        <?php $this->view('partail/main_css') ?>
        <style media="screen">
            .help-block{
                bottom: 74%;
            }
        </style>
    </head>
    <body>
        <?php $this->view('partail/top_nav') ?>
        <div class="content white" style="max-width:1200px;padding-top:0px;background-color:white">
        <?php $this->view('partail/left_nav') ?>
        <div class="hide-small" style="margin-top:115px"></div>

            <!-- !PAGE CONTENT! -->
            <div class="main">
                <!-- Push down content on small screens -->
                <div class="hide-large" style="margin-top:83px"></div>

                <div class="row container margin-bottom">
                    <div class="xxlarge head-page border-theme">
                        <strong>เข้าสู่ระบบ</strong>
                    </div>
                    <div class="form col l4 m5 s12 row" style="margin:auto;float:unset">
                        <div class="form-body col s12" style="margin:auto;float:unset">
                            <div id="form-login">
                                <div class="form-control row">
                                    <label for="">Username/Email</label>
                                    <input id="username" type="text" name="email" class="input border round col s12" placeholder="Email">
                                </div>
                                <div class="form-control row">
                                    <label for="">Password</label>
                                    <input id="password" type="password" name="password" class="input border round col s12" placeholder="password">
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
                            </div>
                            <div class="form-invoice col s12">
                                <form action="<?php echo $this->base_url('order/order_now/') ?>" method="post">
                                    <div class="margin-top col s12"><span class="text-red">*</span>กรณีไม่ได้สมัครสมาชิกกรุณาใส่เลขที่ใบสั่งซื้อ/ใบเสนอราคา</div>
                                    <div class="margin-top col s8 form-control">
                                        <input type="text" name="invoice" class="input border round col s12" value="">
                                    </div>
                                    <div class="margin-top col s3 right">
                                        <button type="button" class="button theme col s12 round btn-order-now">ตรวจสอบ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php $this->view('partail/main_js') ?>
        <script type="text/javascript">
            $(document).ready(function(){



                let check_swal_mail = "<?php echo $check_swal_mail = isset($_SESSION['check_swal_mail'])?$_SESSION['check_swal_mail']:''; ?>";
                if (check_swal_mail != '') {
                    confirm_mail();
                    <?php unset($_SESSION['check_swal_mail']) ?>
                }

                function confirm_mail(){

                            let check_confirm_mail = "<?php echo $check = !empty($check_confirm_mail)? $check_confirm_mail:''; ?>";
                            let mail = "<?php echo  $mail = !empty($mail)? base64_decode($mail): ''; ?>";

                            if (check_confirm_mail == '') {
                                if(mail != ''){
                                    swal({
                                        type:'success',
                                        title:'ยืนยันอีเมล์ '+mail+' สำเร็จแล้ว'
                                    });
                                }
                            }else {
                                if(mail != ''){
                                    swal({
                                        type:'success',
                                        title:'อีเมล์นี้ '+mail+' ถูกยืนยันเรียบร้อยแล้ว'
                                    });
                                }
                            }

                }
                $('.form-invoice').on('keyup keypress','input[name=invoice]',function(){
                    if (event.keyCode < 48 || event.keyCode > 57){
                        event.returnValue = false;
                    }
                });
                $('.btn-order-now').click(function(){
                    let form = $(this).closest('form');
                    let action = form.attr('action');
                    let value = form.find('input[name=invoice]').val();
                    form.attr('action',action+value);
                    form.submit();

                });

                $('#form-login').on('keypress','input[name=password]',function(){
                    if (event.keyCode == 13) {
                        submit_login($(this));
                    }
                });
                $('.btn-login').click(function(){
                    submit_login($(this));
                });

                function submit_login(tag){
                    let form = tag.closest('#form-login');
                    // let form = $(this).closest('#form-login');
                    if (validate(['username','password'],'#'+form.attr('id'))) {
                        let user = form.find('input[name=email]').val();
                        let pass = form.find('input[name=password]').val();
                        $.ajax({
                            method: 'post',
                            url: "<?php echo $this->base_url('login/check_login') ?>",
                            data: {email:user,password:pass},
                            dataType:'json',
                            success: function(data){
                                switch (data) {
                                    case 'success':
                                        window.location.href = "<?php echo $this->base_url('product') ?>";
                                        break;
                                    case 'fail':
                                        swal({
                                            type: 'warning',
                                            title: 'กรุณากรอก Username/Password ให้ถูกต้อง'
                                        });
                                        break;
                                    case 'close':
                                        swal({
                                            type: 'error',
                                            title: 'ถูกปิดการใช้งาน'
                                        });
                                        break;
                                    case 'not_verified':
                                        swal({
                                            type: 'warning',
                                            title: 'ยังไม่ได้ทำการยืนยันอีเมล์'
                                        });
                                        break;
                                    default:

                                }

                            }

                        });
                    }
                }
                function validate(input,form_id){
                    var error = 0;
                    var txt_error = '';
                    $.each(input, function( index, value ) {
                        txt_error = '<span class="help-block left-align">';
                        $(form_id).find('#'+value).closest('.form-control').find('.help-block').remove();
                        var input_value = $(form_id).find('#'+value).val();
                        if(input_value == ''){
                            error = 1;
                            txt_error += '<li>กรุณาใส่ข้อมูล</li>';
                            txt_error += '</span>';
                            $(form_id).find('#'+value).closest('.form-control').append(txt_error);
                        }
                    });
                    if(error != 0){return false;}else{return true;}
                }
            });
        </script>
    </body>
</html>
                                                                                                           
